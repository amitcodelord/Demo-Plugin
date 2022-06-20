<?php
/**
 * Plugin Name: Demo Plugin
 * Plugin URI: https://codelord.co.in
 * Description: Let's you add custom fields details to the database
 * Version: 1.1
 * Author: Amit Verma
 * Author URI: https://codelord.co.in
 */

if (!defined('ABSPATH')) {
    exit;
}

define( 'DEMO_PLUGIN_FILE', __FILE__ );

/**
 *  Require all functions under /includes
 */
$includes_import_root = new \RecursiveDirectoryIterator(__DIR__ . '/includes', \FilesystemIterator::SKIP_DOTS);

function custom_fields_iterator_check_traversal_callback($current, $key, $iterator)
{
    $file_name = $current->getFilename();

    // Only include *.php files
    if (!$current->isDir())
    {
        return preg_match('/^.+\.php$/i', $file_name);
    }
    
    // Don't include the /includes/admin folder when on the public site
    return 'admin' === $file_name
    ? is_admin()
    : true;

}

$iterator_filter = new \RecursiveCallbackFilterIterator($includes_import_root, 'custom_fields_iterator_check_traversal_callback');

foreach (new \RecursiveIteratorIterator($iterator_filter) as $file)
{
    include $file->getRealPath();
}

/**
 *  Require all functions under /includes
 */