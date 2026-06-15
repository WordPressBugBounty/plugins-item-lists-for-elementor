<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Start Material Bullet Style -->
<?php use Elementor\Icons_Manager; ?>
<?php $direction = in_array($settings['list_items_box_column_direction'] ?? 'ltr', ['ltr', 'rtl'], true) ? $settings['list_items_box_column_direction'] : 'ltr'; ?>
<div class="ile-material-bullet-style" style="direction:<?php echo esc_attr($direction); ?>;">
    <div class="ile-container-holder">
    <?php foreach ($settings['material_item_lists'] as $items => $item) {
        $icon = $item['material_list_items_icon']['value'];
        $title = $item['material_list_items_title'];
        $title_color = $item['material_title_color'];
        $content = $item['material_list_items_content'];
        $content_color = $item['material_content_color'];
        $content_bg_color = $item['material_content_bg_color'];
        $icon_color = $item['material_icon_color'];
        $icon_bg_color = $item['material_icon_bg_color']; ?>
        <div class="ile-container-row"><?php
            if($item['material_list_items_display_icon'] === 'icon') { ?>
                <div class="ile-icon-box" style="background-color:<?php echo esc_attr(sanitize_hex_color($icon_bg_color) ?: '#000000'); ?>;">
                        <?php $validated_icon_color = sanitize_hex_color($icon_color) ?: '#000000'; Icons_Manager::render_icon($item['material_list_items_icon'], [ 'aria-hidden' => 'true', 'class' => 'ile-icon', 'fill' => $validated_icon_color ]); ?>
                    </div>
            <?php } else if ($item['material_list_items_display_icon'] === 'image') { ?>
                <img src="<?php echo esc_url($item['material_list_items_image']['url']); ?>" class="ile-image" />
            <?php } ?>
            <div class="ile-content-box" style="background-color:<?php echo esc_attr(sanitize_hex_color($content_bg_color) ?: '#000000'); ?>">
                <h2 class="ile-title" style="color:<?php echo esc_attr(sanitize_hex_color($title_color) ?: '#000000'); ?>;"><?php echo esc_html($title); ?></h2>
                <p class="ile-content" style="color:<?php echo esc_attr(sanitize_hex_color($content_color) ?: '#000000'); ?>;"><?php echo wp_kses_post($content); ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- End Material Bullet Style -->
