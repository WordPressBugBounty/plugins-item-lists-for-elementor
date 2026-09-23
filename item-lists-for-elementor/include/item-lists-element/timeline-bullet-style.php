<?php
/**
 * Timeline Bullets render template.
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

<!-- Start Timeline Bullet Style -->
<?php use Elementor\Icons_Manager; ?>
<?php $item_lists_direction = in_array( $settings['list_items_box_column_direction'] ?? 'ltr', array( 'ltr', 'rtl' ), true ) ? $settings['list_items_box_column_direction'] : 'ltr'; ?>
<div class="ile-timeline-bullet-style" style="direction:<?php echo esc_attr( $item_lists_direction ); ?>;">
<?php
foreach ( $settings['timeline_item_lists'] as $item_lists_items => $item_lists_item ) {
	$item_lists_icon          = $item_lists_item['timeline_list_items_icon']['value'];
	$item_lists_title         = $item_lists_item['timeline_list_items_title'];
	$item_lists_content       = $item_lists_item['timeline_list_items_content'];
	$item_lists_icon_color    = $item_lists_item['timeline_icon_color'];
	$item_lists_icon_bg_color = $item_lists_item['timeline_icon_bg_color'];
	?>
		<div class="ile-container-holder">
			<div class="ile-timeline-vertical"></div>
			<div class="ile-timeline-horizontal"></div>
			<?php
			$item_lists_icon_bg_color_hex = sanitize_hex_color( $item_lists_icon_bg_color );
			$item_lists_icon_bg_color_hex = $item_lists_icon_bg_color_hex ? $item_lists_icon_bg_color_hex : '#000000';

			if ( 'icon' === $item_lists_item['timeline_list_items_display_icon'] ) {
				?>
				<div class="ile-icon-box" style="background-color:<?php echo esc_attr( $item_lists_icon_bg_color_hex ); ?>">
					<?php
					$item_lists_validated_icon_color = sanitize_hex_color( $item_lists_icon_color );
					$item_lists_validated_icon_color = $item_lists_validated_icon_color ? $item_lists_validated_icon_color : '#000000';
					Icons_Manager::render_icon(
						$item_lists_item['timeline_list_items_icon'],
						array(
							'aria-hidden' => 'true',
							'class'       => 'ile-icon',
							'fill'        => $item_lists_validated_icon_color,
						)
					);
					?>
				</div>
			<?php } elseif ( 'image' === $item_lists_item['timeline_list_items_display_icon'] ) { ?>
				<img src="<?php echo esc_url( $item_lists_item['timeline_list_items_image']['url'] ); ?>" class="ile-image" />
				<?php
			}
			?>
			<div class="ile-content-box">
				<h2 class="ile-title"><?php echo esc_html( $item_lists_title ); ?></h2>
				<p class="ile-content"><?php echo wp_kses_post( $item_lists_content ); ?></p>
			</div>
		</div>
		<?php
}
?>
</div>
<!-- End Timeline Bullet Style -->
