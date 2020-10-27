<?php
/**
 * Froala Editor PHP SDK
 *
 * @copyright  2016 Froala Labs
 */

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'autoload.php');

if (version_compare(PHP_VERSION, '7.2.15', '<')) {
    throw new Braintree_Exception('PHP version >= 7.2.15 required'); //5.4.0
}

function requireDependencies() {
    $requiredExtensions = ['fileinfo', 'imagick'];
    foreach ($requiredExtensions AS $ext) {
        if (!extension_loaded($ext)) {
            throw new Exception('The Froala Editor SDK library requires the ' . $ext . ' extension.');
        }
    }
}

requireDependencies();
