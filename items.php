<?php

$items = array(
    array(
        'metadata' => array(
            'name' => 'Projects',
            'description' => "A document that is broken out into it's constituent pages."
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
