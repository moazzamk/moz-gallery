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
}

function moz_gallery_menu()
{
    add_menu_page('Moz Gallery', 'Moz Gallery', 'manage_options', 'moz-gallery', 'moz_gallery_admin_page');
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

    $controller = new \MozGallery\Controller\Admin($container->get('TableFactory')->get('MozGallery'));
    $controller->addForm();
}

/**
 * Process form submission for adding new images
 */
function moz_gallery_add_image()
{
    global $container;

    $controller = new \MozGallery\Controller\Admin($container->get('TableFactory')->get('MozGallery'));
    if (empty($_REQUEST['id'])) {
        $controller->add($_REQUEST);
    }
    else {
        $controller->update($_REQUEST);
    }

}


function moz_gallery_shortcodes()
{

}


register_activation_hook( __FILE__, 'moz_gallery_install' );

add_action('init', 'moz_gallery_init');
add_action('admin_menu', 'moz_gallery_menu');
add_action('admin_post_moz_gallery_add_image', 'moz_gallery_add_image');

