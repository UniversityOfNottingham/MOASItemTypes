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
            'name' => 'Embedded Video',
            'description' => 'A video hosted at an external location such as Youtube or Vimeo.'
        ),
        'elements' => array(
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'URL'
            )
        )
    ),
    array(
        'metadata' => array(
            'name' => 'Digital Project',
            'description' => 'Information on and a link to an external Digital Project.'
        ),
        'elements' => array(
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Video URL'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Project URL'
            )
        )
    ),

    array(
        'metadata' => array(
            'name' => 'People',
            'description' => 'Person profiles. eg PGRs, academics, lawyers, historians.'
        ),
        'elements' => array(
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Name',
                'description' => 'eg Fred Bloggs (note: not title).'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Job Title',
                'description' => 'eg Studying for PHD in xxx; eg Professor of Origami.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Institution',
                'description' => 'eg University of Nottingham.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Institution Profile URL',
                'description' => 'eg http://nottingham.ac.uk/people/xxxx.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Bio',
                'description' => 'Biography (may be several paragraphs).'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Profile Video URL',
                'description' => 'eg YouTube URL.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Thesis Title',
                'description' => 'PGR Thesis Title.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Website URL',
                'description' => 'URL for a personal webiste.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Website URL',
                'description' => 'URL for a personal website. If you want to show a title for the site, add it after the url. E.g. "http://www.google.com, Google" would show the link as "Google" and not as a URL.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Email Address',
                'description' => 'Email Address.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Twitter Handle',
                'description' => 'eg @teamantislavery.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Show Twitter Feed'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'School/Department',
                'description' => 'eg School of Geography.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Research Centre',
                'description' => 'Name of Research Centre.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Supervisor',
                'description' => 'eg Prof Zoe Trodd.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Themes',
                'description' => 'Areas of interest.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Publications',
                'description' => 'Use if want to list ALL Publications; bulleted list.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Selected Publications',
                'description' => 'Use if want to list SELECTED Publications + link to all; bulleted list.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Publication List',
                'description' => 'URL for all publications on another site (eg staff profile; academia.edu) if using Selected Publications.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Public Engagement Activities',
                'description' => 'Bulleted list of Public Engagement Activities.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Awards',
                'description' => 'Bulleted list of Awards.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Other Networks',
                'description' => 'Other Networks.'
            ),
            array(
                'element_set' => 'Item Type Metadata',
                'name' => 'Conferences',
                'description' => 'Conferences.'
            )
        )
    )
);
