<?php

/**
 * @package     omeka
 * @subpackage  moas-itemtypes
 * @copyright   2015 University of Nottingham
 * @license     MIT
 * @author      Adam Cooper <adam.cooper@nottingham.ac.uk>
 */

class MOASItemTypesPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'install',
        'uninstall',
        'uninstall_message',
        'upgrade'
    );

    public function __construct()
    {
        parent::__construct();

        // Get the data
        include 'items.php';
        $this->_items = $items;
    }

    /**
     * Install the plugin.
     */
    public function hookInstall()
    {
        $this->_updateItemTypes();
    }

    /**
     * Uninstall the plugin.
     */
    public function hookUninstall()
    {
        /** @var Table_ItemType $itemTypeTable */
        $itemTypeTable = $this->_db->getTable('ItemType');

        // load each item type from the database and delete it.
        foreach ($this->_items as $itemType) {
            $itemTypeFromDB = $itemTypeTable->findByName($itemType['metadata']['name']);
            if ($itemTypeFromDB !== null) {
                $itemTypeFromDB->delete();
            }
        }
    }

    /**
     * Display the uninstall message.
     */
    public function hookUninstallMessage()
    {
        echo __('%sWarning%s: This will remove all the item types managed '
            . 'by this plugin and disassociate all current items from those types.%s',
            '<p><strong>', '</strong>', '</p>');
    }

    public function hookUpgrade($args)
    {
        switch($args['old_version'])
        {
            // let the plugin cascade its upgrades
            case '1.0.0' :
            case '1.2.5' :
                $this->_125SpellingFix();
            default :
                $this->_updateItemTypes();
        }
    }

    protected function _buildElement(array $element)
    {
        // get database records.
        /** @var Table_Element $elementTable */
        $elementTable = $this->_db->getTable('Element');

        $elementReturn = $elementTable->findByElementSetNameAndElementName(
            $element['element_set'] ?: 'Item Type Metadata',
            $element['name']
        );

        // if we can't find it create a new one.
        if ($elementReturn === null) {
            $elementReturn = new Element();
        }

        // update it with the data from the config.
        $elementReturn->setArray($element);
        $elementReturn->save();

        return $elementReturn;
    }

    protected function _buildElements(array $elements)
    {
        $return = array();

        foreach ($elements as $element) {
            $return[] = $this->_buildElement($element);
        }

        return $return;
    }

    /**
     * Adds any elements that have been defined but are not present on the site.
     */
    protected function _updateItemTypes($remove = false)
    {
        // get database records.
        /** @var Table_ItemType $itemTypeTable */
        $itemTypeTable = $this->_db->getTable('ItemType');
        $itemTypes = $itemTypeTable->findAll();

        // walk our list of defined types and check against the ones pulled from the database.
        // if you find a match, update it.
        array_walk($this->_items, function($itemType, $index) use (&$itemTypes) {
            foreach ($itemTypes as $itemTypeFromDB) {
                if ($itemType['metadata']['name'] === $itemTypeFromDB->name) {
                    $itemTypeFromDB->description = $itemType['metadata']['description'];

                    // Simplest way to ensure the elements match what we want is to remove all and then
                    // add the ones we want back. This relies on the the implementation of the ItemType->afterSave()
                    // method.
                    $itemTypeFromDB->removeElements($itemTypeFromDB->Elements);
                    $itemTypeFromDB->addElements($this->_buildElements($itemType['elements']));

                    $itemTypeFromDB->save();

                    return;
                }
            }

            // didn't find it in the db already. make a new one.
            insert_item_type($itemType['metadata'], $this->_buildElements($itemType['elements']));
        });
    }

    private function _125SpellingFix()
    {
        $errors = array(
            'Juristiction - International' => 'Jurisdiction - International',
            'Juristiction - Domestic' => 'Jurisdiction - Domestic'
        );

        /** @var Table_Element $elementTable */
        $elementTable = $this->_db->getTable('Element');

        foreach ($errors as $error => $correction) {
            /** @var Element $element */
            $element = $elementTable->findByElementSetNameAndElementName(
                'Item Type Metadata', $error
            );

            $element->name = $correction;
            $element->save();
        }
    }
}
