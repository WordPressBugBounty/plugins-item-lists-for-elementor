<?php
/**
 * Shape Bullets render template.
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

<!-- Start Shape Bullet Style -->
<?php use Elementor\Icons_Manager; ?>
<?php $item_lists_direction = in_array( $settings['list_items_box_column_direction'] ?? 'ltr', array( 'ltr', 'rtl' ), true ) ? $settings['list_items_box_column_direction'] : 'ltr'; ?>
<div class="ile-shape-bullet-style" style="direction:<?php echo esc_attr( $item_lists_direction ); ?>;">
<?php
foreach ( $settings['shape_item_lists'] as $item_lists_items => $item_lists_item ) {
	$item_lists_icon     = $item_lists_item['shape_list_items_icon']['value'];
	$item_lists_title    = $item_lists_item['shape_list_items_title'];
	$item_lists_content  = $item_lists_item['shape_list_items_content'];
	$item_lists_icon_box = $item_lists_item['shape_list_item_icon_style']
	?>
	<div class="ile-container-holder">
		<div class="ile-container-icon-line">
			<div class="ile-icon-box">
			<?php
			if ( 'diamond-icon-style' === $item_lists_icon_box ) {
				$item_lists_diamond_svg = '<svg class="ile-icon-shape" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.41423 46.528L46.53 1.41421L91.6418 46.528L46.528 91.6418L1.41423 46.528Z" stroke="black" stroke-width="1"/>
                    </svg>';
				echo wp_kses_post( $item_lists_diamond_svg );
			} elseif ( 'circle-icon-style' === $item_lists_icon_box ) {
				$item_lists_circle_svg = '<svg class="ile-icon-shape" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M56.0851 56.0846C43.6274 68.5424 23.429 68.5428 10.9714 56.0851C-1.4865 43.6273 -1.48583 23.4285 10.9723 10.9709C23.4303 -1.48657 43.6287 -1.4866 56.0861 10.9713C68.5433 23.4291 68.5427 43.6271 56.0851 56.0846Z" stroke="black" stroke-width="1"/>
                    </svg>';
				echo wp_kses_post( $item_lists_circle_svg );
			} else {
				$item_lists_square_svg = '<svg class="ile-icon-shape" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.5 0.5H49.5V49.5H0.5V0.5Z" stroke="black"/>
                    </svg>';
				echo wp_kses_post( $item_lists_square_svg );
			}
			if ( 'icon' === $item_lists_item['shape_list_items_display_icon'] ) {
				Icons_Manager::render_icon(
					$item_lists_item['shape_list_items_icon'],
					array(
						'aria-hidden' => 'true',
						'class'       => 'ile-icon',
					)
				);
			}
			?>
			</div>
			<div class="ile-line"></div>
		</div>
		<div class="ile-content-box">
			<h2 class="ile-title"><?php echo esc_html( $item_lists_title ); ?></h2>
			<p class="ile-content"><?php echo wp_kses_post( $item_lists_content ); ?></p>
		</div>
	</div>
	<?php } ?>
</div>
<!-- End Shape Bullet Style -->
