<?php
$evisa_country_metabox = 'evisa_country_meta';

CSF::createMetabox( $evisa_country_metabox, array(
    'title'     => 'Country Options',
    'post_type' => 'evisa_country',
    'menu_position'=>0,
) );

// Header Section
CSF::createSection( $evisa_country_metabox, array(
    'fields' => array(

        array(
            'id' =>'country_flag',
            'type'=>'media',
            'title'=>esc_html__( 'Country Flag', 'xpress-core' ),
            'library'      => 'image',
            'url'          => false,
            'button_title' => esc_html__( 'Upload Flag', 'xpress-core' ),
            'desc'         => esc_html__( 'Upload Flag image', 'xpress-core' ),
        ),
    ),
) );