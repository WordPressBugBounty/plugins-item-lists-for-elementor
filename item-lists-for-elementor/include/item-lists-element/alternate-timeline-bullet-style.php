<?php
/**
 * Alternate Timeline Bullets render template.
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

<!-- Start Alternate Timeline Bullet Style -->
<?php use Elementor\Icons_Manager; ?>
<div class="ile-alternate-timeline-bullet-style">
	<?php
	$item_lists_count = 0;
	foreach ( $settings['timeline_item_lists'] as $item_lists_items => $item_lists_item ) {
		$item_lists_icon             = $item_lists_item['timeline_list_items_icon']['value'];
		$item_lists_title            = $item_lists_item['timeline_list_items_title'];
		$item_lists_content          = $item_lists_item['timeline_list_items_content'];
		$item_lists_icon_color       = $item_lists_item['timeline_icon_color'];
		$item_lists_icon_bg_color    = $item_lists_item['timeline_icon_bg_color'];
		$item_lists_timeline_content = 'ile-timeline-right';
		if ( 0 === $item_lists_count % 2 ) {
			$item_lists_timeline_content = 'ile-timeline-left';
		}

		$item_lists_icon_bg_color_hex = sanitize_hex_color( $item_lists_icon_bg_color );
		$item_lists_icon_bg_color_hex = $item_lists_icon_bg_color_hex ? $item_lists_icon_bg_color_hex : '#000000';
		?>
		<div class="ile-container-holder <?php echo esc_attr( $item_lists_timeline_content ); ?>">
			<div class="ile-timeline-vertical"></div>
			<div class="ile-timeline-horizontal"></div>
			<?php if ( 'icon' === $item_lists_item['timeline_list_items_display_icon'] ) { ?>
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
		<?php ++$item_lists_count; } ?>
</div>
<!-- End Alternate Timeline Bullet Style -->
