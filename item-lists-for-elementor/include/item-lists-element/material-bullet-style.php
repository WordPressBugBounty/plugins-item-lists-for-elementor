<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Start Material Bullet Style -->
<?php use Elementor\Icons_Manager; ?>
<?php $item_lists_direction = in_array($settings['list_items_box_column_direction'] ?? 'ltr', ['ltr', 'rtl'], true) ? $settings['list_items_box_column_direction'] : 'ltr'; ?>
<div class="ile-material-bullet-style" style="direction:<?php echo esc_attr($item_lists_direction); ?>;">
    <div class="ile-container-holder">
    <?php foreach ($settings['material_item_lists'] as $item_lists_items => $item_lists_item) {
        $item_lists_icon = $item_lists_item['material_list_items_icon']['value'];
        $item_lists_title = $item_lists_item['material_list_items_title'];
        $item_lists_title_color = $item_lists_item['material_title_color'];
        $item_lists_content = $item_lists_item['material_list_items_content'];
        $item_lists_content_color = $item_lists_item['material_content_color'];
        $item_lists_content_bg_color = $item_lists_item['material_content_bg_color'];
        $item_lists_icon_color = $item_lists_item['material_icon_color'];
        $item_lists_icon_bg_color = $item_lists_item['material_icon_bg_color']; ?>
        <div class="ile-container-row"><?php
            if($item_lists_item['material_list_items_display_icon'] === 'icon') { ?>
                <div class="ile-icon-box" style="background-color:<?php echo esc_attr(sanitize_hex_color($item_lists_icon_bg_color) ?: '#000000'); ?>;">
                        <?php $item_lists_validated_icon_color = sanitize_hex_color($item_lists_icon_color) ?: '#000000'; Icons_Manager::render_icon($item_lists_item['material_list_items_icon'], [ 'aria-hidden' => 'true', 'class' => 'ile-icon', 'fill' => $item_lists_validated_icon_color ]); ?>
                    </div>
            <?php } else if ($item_lists_item['material_list_items_display_icon'] === 'image') { ?>
                <img src="<?php echo esc_url($item_lists_item['material_list_items_image']['url']); ?>" class="ile-image" />
            <?php } ?>
            <div class="ile-content-box" style="background-color:<?php echo esc_attr(sanitize_hex_color($item_lists_content_bg_color) ?: '#000000'); ?>">
                <h2 class="ile-title" style="color:<?php echo esc_attr(sanitize_hex_color($item_lists_title_color) ?: '#000000'); ?>;"><?php echo esc_html($item_lists_title); ?></h2>
                <p class="ile-content" style="color:<?php echo esc_attr(sanitize_hex_color($item_lists_content_color) ?: '#000000'); ?>;"><?php echo wp_kses_post($item_lists_content); ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- End Material Bullet Style -->
