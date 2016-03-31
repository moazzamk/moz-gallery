<?php

/*
Plugin Name: Moz Gallery
Plugin URI:  http:///
Description: Image gallery with support for putting images on CDN
Author: Moazzam Khan
Author URI: http://moazzam-khan.com
License: GPL?
 */


define('MOZ_GALLERY_PLUGIN_DIR', plugin_dir_path(__FILE__));

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/install.php';

$container = '';
function moz_gallery_init()
{
    global $container, $wpdb;

    $container = new \MozGallery\Service\Container();
    $container->set('db', $wpdb);
    $container->set('TableFactory', function ($c) {
        return new \MozGallery\Service\TableFactory($c->get('db'));
    });

    $container->set('AdminController', function ($c) {
        return new \MozGallery\Controller\Admin($c->get('TableFactory')->get('MozGallery'));
    });

    $container->set('GalleryController', function ($c) {
        return new \MozGallery\Controller\Gallery($c->get('TableFactory')->get('MozGallery'));
    });
}

function moz_gallery_menu()
{
    add_menu_page('Moz Gallery', 'Moz Gallery', 'manage_options', 'moz-gallery', 'moz_gallery_list_images');
    add_submenu_page('moz-gallery', 'Add New', 'Add New', 'manage_options', 'moz-gallery-add-new', 'moz_gallery_add_edit_form');
}

function moz_gallery_admin_page()
{
    moz_gallery_add_edit_form();
}

/**
 * Show the add/edit form
 */
function moz_gallery_add_edit_form()
{
    global $container;

    $container->get('AdminController')->addForm();
}

/**
 * Process form submission for adding new images
 */
function moz_gallery_add_image()
{
    global $container;

    $controller = $container->get('AdminController');
    if (empty($_REQUEST['id'])) {
        $controller->add($_REQUEST);
        $controller->listImages();
    }
    else {
        $controller->update($_REQUEST);
    }
}

function moz_gallery_list_images()
{
    global $container;

    $container->get('AdminController')->listImages();
}

function moz_gallery_show_gallery()
{
    global $container;
    
    $container->get('GalleryController')->listImages();
}

function moz_gallery_show_image()
{
    global $container;

    $container->get('GalleryController')->get();
}


register_activation_hook( __FILE__, 'moz_gallery_install' );

add_action('init', 'moz_gallery_init');
add_action('admin_menu', 'moz_gallery_menu');
add_action('admin_post_moz_gallery_add_image', 'moz_gallery_add_image');
add_shortcode('moz-gallery', 'moz_gallery_show_gallery');


