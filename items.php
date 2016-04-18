<?php

$items = array(
    array(
        'metadata' => array(
            'name' => 'Project',
            'description' => "A document that is broken out into it's constituent pages."
        ),
        'elements' => array()
    ),
    array(
        'metadata' => array(
            'name' => 'Digital Project',
            'description' => "A link to and metadata for an external digital project."
        ),
        'elements' => array()
    ),
    array(
        'metadata' => array(
            'name' => 'Person',
            'description' => "Information about a specific person."
        ),
        'elements' => array()
    ),
    array(
        'metadata' => array(
            'name' => 'Embedded Video',
            'description' => 'A video hosted at an external location such as Youtube or Vimeo.'
        ),
        'elements' => array(
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'URL'
            )
        )
    )
);
