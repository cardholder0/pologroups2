<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $evisa_category_meta = 'evisa_category_color';

    //
    // Create taxonomy options
    CSF::createTaxonomyOptions( $evisa_category_meta, array(
        'taxonomy'  => 'category',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    //
    // Create a section
    CSF::createSection( $evisa_category_meta, array(
        'fields' => array(
            array(
                'id'    => 'cat-color',
                'type'  => 'color',
                'title' => 'Color',
            ),

        )
    ) );

}