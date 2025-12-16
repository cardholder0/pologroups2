<?php

$evisa_temp_meta = 'evisa_temp_meta';

CSF::createMetabox( $evisa_temp_meta, array(
    'title'     => 'Template Type',
    'post_type' => array('evisa_template'),
    'data_type' => 'unserialize'
) );

// Header Section
CSF::createSection( $evisa_temp_meta, array(
    'fields' => array(
        array(
            'id'          => 'evisa_template_type',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => 'Select Template Type',
            'placeholder' => 'Select Template Type',
            'options'     => array(
                'tf_header_key'  => 'Header',
                'tf_footer_key'  => 'Footer',
            ),
            'default'     => ''
        ),
    ),
) );
