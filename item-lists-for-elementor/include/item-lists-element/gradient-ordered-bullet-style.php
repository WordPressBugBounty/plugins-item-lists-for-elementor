<?php
/**
 * Gradient Ordered Bullets render template.
 *
 * Included directly by Item_Lists_Elementor_Widget::render() with
 * $settings already populated by Elementor.
 *
 * @package ItemListsForElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Start Gradient Ordered Bullet Style -->
<div class="ile-gradient-ordered-bullet-style">
	<ol class="ile-container-holder">
	<?php
	$item_lists_alignment = $settings['list_items_number_box_alignment'];
	foreach ( $settings['gradient_ordered_item_lists'] as $item_lists_items => $item_lists_item ) {
		$item_lists_title   = $item_lists_item['gradient_ordered_list_items_title'];
		$item_lists_content = $item_lists_item['gradient_ordered_list_items_content'];
		?>
		<?php
		$item_lists_allowed_alignments  = array( 'top', 'middle', 'bottom' );
		$item_lists_validated_alignment = in_array( $item_lists_alignment ?? 'top', $item_lists_allowed_alignments, true ) ? $item_lists_alignment : 'top';
		?>
		<li class="ile-content-container ile-number-alignment-<?php echo esc_attr( $item_lists_validated_alignment ); ?>">
			<div class="ile-content-box">
				<h2 class="ile-title"><?php echo esc_html( $item_lists_title ); ?></h2>
				<p class="ile-content"><?php echo wp_kses_post( $item_lists_content ); ?></p>
			</div>
		</li>
		<?php
	}
	?>
	</ol>
</div>
<!-- End Gradient Ordered Bullet Style -->
