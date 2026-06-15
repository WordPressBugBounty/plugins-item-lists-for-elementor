<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Start Timeline Bullet Style -->
<?php use Elementor\Icons_Manager; ?>
<?php $direction = in_array($settings['list_items_box_column_direction'] ?? 'ltr', ['ltr', 'rtl'], true) ? $settings['list_items_box_column_direction'] : 'ltr'; ?>
<div class="ile-timeline-bullet-style" style="direction:<?php echo esc_attr($direction) ?>;"><?php
    foreach ($settings['timeline_item_lists'] as $items => $item) {
        $icon = $item['timeline_list_items_icon']['value'];
        $title = $item['timeline_list_items_title'];
        $content = $item['timeline_list_items_content'];
        $icon_color = $item['timeline_icon_color'];
        $icon_bg_color = $item['timeline_icon_bg_color']; ?>
        <div class="ile-container-holder">
            <div class="ile-timeline-vertical"></div>
            <div class="ile-timeline-horizontal"></div><?php
            if($item['timeline_list_items_display_icon'] === 'icon') { ?>
                <div class="ile-icon-box" style="background-color:<?php echo esc_attr(sanitize_hex_color($icon_bg_color) ?: '#000000'); ?>">
                    <?php $validated_icon_color = sanitize_hex_color($icon_color) ?: '#000000'; Icons_Manager::render_icon($item['timeline_list_items_icon'], [ 'aria-hidden' => 'true', 'class' => 'ile-icon', 'fill' => $validated_icon_color ]); ?>
                </div>
            <?php }  else if($item['timeline_list_items_display_icon'] === 'image') { ?>
                <img src="<?php  echo esc_url($item['timeline_list_items_image']['url']); ?>" class="ile-image" /><?php
            } ?>
            <div class="ile-content-box">
                <h2 class="ile-title"><?php echo esc_html($title); ?></h2>
                <p class="ile-content"><?php echo wp_kses_post($content); ?></p>
            </div>
        </div><?php
    } ?>
</div>
<!-- End Timeline Bullet Style -->
