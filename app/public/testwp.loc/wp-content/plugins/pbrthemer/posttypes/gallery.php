<?php
 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author      Team <opalwordpress@gmail.com >
  * @copyright  Copyright (C) 2015 prestabrain.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.wpopal.com
  * @support  http://www.wpopal.com/questions/
  */
if(!function_exists('pbr_create_type_gallery')   ){
    function pbr_create_type_gallery(){
      $labels = array(
          'name'               => __( 'Gallerys', "pbrthemer" ),
          'singular_name'      => __( 'Gallery', "pbrthemer" ),
          'add_new'            => __( 'Add New Gallery', "pbrthemer" ),
          'add_new_item'       => __( 'Add New Gallery', "pbrthemer" ),
          'edit_item'          => __( 'Edit Gallery', "pbrthemer" ),
          'new_item'           => __( 'New Gallery', "pbrthemer" ),
          'view_item'          => __( 'View Gallery', "pbrthemer" ),
          'search_items'       => __( 'Search Gallerys', "pbrthemer" ),
          'not_found'          => __( 'No Gallerys found', "pbrthemer" ),
          'not_found_in_trash' => __( 'No Gallerys found in Trash', "pbrthemer" ),
          'parent_item_colon'  => __( 'Parent Gallery:', "pbrthemer" ),
          'menu_name'          => __( 'Gallerys', "pbrthemer" ),
      );

      $args = array(
          'labels'              => $labels,
          'hierarchical'        => false,
          'description'         => 'List Gallery',
          'supports'            => array( 'title', 'editor', 'author', 'thumbnail','excerpt','custom-fields' ), //page-attributes, post-formats
          'taxonomies'          => array( 'gallery_category','skills','post_tag' ),
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 5,
          'menu_icon'           => '',
          'show_in_nav_menus'   => false,
          'publicly_queryable'  => true,
          'exclude_from_search' => false,
          'has_archive'         => true,
          'query_var'           => true,
          'can_export'          => true,
          'rewrite'             => array('slug'=>'gallery'),
          'capability_type'     => 'post',
      );
      register_post_type( 'gallery', $args );

      //Add Port folio Skill
      // Add new taxonomy, make it hierarchical like categories
      //first do the translations part for GUI
      $labels = array(
        'name'              => __( 'Categories', "pbrthemer" ),
        'singular_name'     => __( 'Category', "pbrthemer" ),
        'search_items'      => __( 'Search Category', "pbrthemer" ),
        'all_items'         => __( 'All Categories', "pbrthemer" ),
        'parent_item'       => __( 'Parent Category', "pbrthemer" ),
        'parent_item_colon' => __( 'Parent Category:', "pbrthemer" ),
        'edit_item'         => __( 'Edit Category', "pbrthemer" ),
        'update_item'       => __( 'Update Category', "pbrthemer" ),
        'add_new_item'      => __( 'Add New Category', "pbrthemer" ),
        'new_item_name'     => __( 'New Category Name', "pbrthemer" ),
        'menu_name'         => __( 'Categories', "pbrthemer" ),
      );
      // Now register the taxonomy
      register_taxonomy('gallery_category',array('gallery'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'show_in_nav_menus' => false,
              'rewrite'           => array( 'slug' => 'gallery-category'
          ),
      ));
  }
  add_action( 'init','pbr_create_type_gallery' );
}

if( class_exists("WPBakeryVisualComposerAbstract") ){

    Class Pbr_Themer_Vc_Vendor_Gallery implements Vc_Vendor_Interface {

        public function load(){

            vc_map( array(
                "name" => __("PBR Gallery", "pbrthemer"),
                "base" => "pbr_gallery",
                'icon' => PBR_THEMER_PLUGIN_THEMER_URL. "assets/css/opal.png",
                'description'=>'Show list gallery ',
                "class" => "",
                "category" => __('PBR Widgets', "pbrthemer"),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => __("Title", 'pbrthemer'),
                        "param_name" => "title",
                        "value" => '',
                        "admin_label" => true
                    ),
                    array(
                        "type" => "textarea",
                        'heading' => __( 'Description', 'pbrthemer' ),
                        "param_name" => "description",
                        "value" => ''
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Number of portfolio to show", 'pbrthemer'),
                        "param_name" => "number",
                        "value" => '6'
                    ),

                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Columns count', 'pbrthemer' ),
                        'param_name' => 'columns_count',
                        'value' => array( 6, 5, 4, 3, 2, 1 ),
                        'std' => 3,
                        'admin_label' => true,
                        'description' => __( 'Select columns count.', 'pbrthemer' )
                    ),

                    array(
                        "type" => "checkbox",
                        "heading" => __("Item No Padding", 'pbrthemer'),
                        "param_name" => "nopadding",
                        "value" => array(
                            'Yes, It is Ok' => true
                        ),
                        'std' => true
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name", 'pbrthemer'),
                        "param_name" => "el_class",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'pbrthemer')
                    )
                )
            ));
        }
    }
    if(!class_exists('WPBakeryShortCode_Pbr_Gallery')){

        class WPBakeryShortCode_Pbr_Gallery extends Pbrthemer_Shortcode_Base {}
        function pbrthemer_fnc_init_vc_gallery_vendors(){
            $vendor = new Pbr_Themer_Vc_Vendor_Gallery();
            add_action( 'vc_after_set_mode', array(
                $vendor,
                'load'
            ), 99 );
        }
        pbrthemer_fnc_init_vc_gallery_vendors();
    }
}