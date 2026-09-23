<?php
/**
 * Helper for checking whether the Elementor plugin is installed.
 *
 * @package ItemListsForElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check whether the Elementor plugin is installed (regardless of activation state).
 *
 * @return bool True if Elementor is installed, false otherwise.
 */
function item_lists_elementor_installed() {

	$file_path         = 'elementor/elementor.php';
	$installed_plugins = get_plugins();

	return isset( $installed_plugins[ $file_path ] );
}
