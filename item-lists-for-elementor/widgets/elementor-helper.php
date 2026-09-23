<?php
/**
 * Registers the "Item Lists Element" category with Elementor.
 *
 * @package ItemListsForElementor
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add the "Item Lists Element" category to Elementor's elements manager.
 */
function init_item_lists_category() {
	Plugin::instance()->elements_manager->add_category(
		'item-lists',
		array(
			'title' => esc_html__( 'Item Lists Element', 'item-lists-for-elementor' ),
			'icon'  => 'font',
		),
		1
	);
}

add_action( 'elementor/init', 'Elementor\init_item_lists_category' );
