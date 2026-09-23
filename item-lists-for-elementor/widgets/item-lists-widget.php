<?php
/**
 * Item Lists Elementor widget.
 *
 * @package ItemListsForElementor
 */

namespace Elementor;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Item Lists Elementor widget: registers the "Item Lists" widget with
 * Elementor and renders it using one of five bullet list styles.
 */
class Item_Lists_Elementor_Widget extends Widget_Base {

	/**
	 * Get the widget's registered slug (Elementor widget type).
	 *
	 * @return string Widget slug.
	 */
	public function get_name() {
		return 'ile-item-lists-elementor-widget';
	}

	/**
	 * Get the widget's display title, shown in the Elementor panel.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Item Lists', 'item-lists-for-elementor' );
	}

	/**
	 * Get the widget's icon, shown in the Elementor panel.
	 *
	 * @return string Icon class.
	 */
	public function get_icon() {
		return 'eicon-bullet-list';
	}

	/**
	 * Get the Elementor category this widget belongs to.
	 *
	 * @return string[] Category slugs.
	 */
	public function get_categories() {
		return array( 'item-lists' );
	}

	/**
	 * Get the widget's search keywords.
	 *
	 * @return string[] Keywords.
	 */
	public function get_keywords() {
		return array( 'item list', 'icon list', 'bullet list' );
	}

	/**
	 * Register the widget's Elementor controls (content and style tabs).
	 */
	protected function register_controls() {

		// Start Item Lists General Section.
		$this->start_controls_section(
			'section_general',
			array(
				'label' => __( 'General', 'item-lists-for-elementor' ),
			)
		);

		$this->add_control(
			'item_lists_style',
			array(
				'label'   => __( 'List Style', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'material-bullet-style'           => __( 'Material Bullets', 'item-lists-for-elementor' ),
					'shape-bullet-style'              => __( 'Shape Bullets', 'item-lists-for-elementor' ),
					'timeline-bullet-style'           => __( 'Timeline Bullets', 'item-lists-for-elementor' ),
					'alternate-timeline-bullet-style' => __( 'Alternate Timeline Bullets', 'item-lists-for-elementor' ),
					'gradient-ordered-bullet-style'   => __( 'Gradient Ordered Bullets', 'item-lists-for-elementor' ),
				),
				'default' => 'material-bullet-style',
			)
		);

		$this->end_controls_section();
		// End Item Lists General Section.

		// Start Item Lists Items Section
		// Material Bullet Style Items.
		$this->start_controls_section(
			'section_material_list_items',
			array(
				'label'     => __( 'Items', 'item-lists-for-elementor' ),
				'condition' => array(
					'item_lists_style' => 'material-bullet-style',
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'material_list_items_title',
			array(
				'label'   => __( 'Title', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'item-lists-for-elementor' ),
			)
		);

		$repeater->add_control(
			'material_list_items_content',
			array(
				'label'   => __( 'Content', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', 'item-lists-for-elementor' ),
			)
		);

		$repeater->add_control(
			'material_list_items_display_icon',
			array(
				'label'   => __( 'Icon', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'none'  => array(
						'title' => __( 'None', 'item-lists-for-elementor' ),
						'icon'  => 'fa fa-ban',
					),
					'icon'  => array(
						'title' => __( 'Icon', 'item-lists-for-elementor' ),
						'icon'  => 'fa fa-info-circle',
					),
					'image' => array(
						'title' => __( 'Image', 'item-lists-for-elementor' ),
						'icon'  => 'fas fa-image',
					),
				),
				'default' => 'icon',
			)
		);

		$repeater->add_control(
			'material_list_items_image',
			array(
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'material_list_items_display_icon' => 'image',
				),
			)
		);

		$repeater->add_control(
			'material_list_items_icon',
			array(
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-leaf',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'material_list_items_display_icon' => 'icon',
				),
			)
		);

		$repeater->add_control(
			'material_icon_color',
			array(
				'label'     => __( 'Icon Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'condition' => array(
					'material_list_items_display_icon' => 'icon',
				),
			)
		);

		$repeater->add_control(
			'material_icon_bg_color',
			array(
				'label'     => __( 'Icon Background Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ff8181',
				'condition' => array(
					'material_list_items_display_icon' => 'icon',
				),
			)
		);

		$repeater->add_control(
			'material_title_color',
			array(
				'label'   => __( 'Title Color', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#ffffff',
			)
		);

		$repeater->add_control(
			'material_content_color',
			array(
				'label'   => __( 'Content Color', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#ffffff',
			)
		);

		$repeater->add_control(
			'material_content_bg_color',
			array(
				'label'   => __( 'Content Background Color', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#ec6161',
			)
		);

		$this->add_control(
			'material_item_lists',
			array(
				'label'       => __( 'List Items', 'item-lists-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'render_type' => 'template',
				'default'     => array(
					array(
						'material_list_items_title' => 'List One',
						'material_content_bg_color' => '#ec6161',
					),
					array(
						'material_list_items_title' => 'List Two',
						'material_content_bg_color' => '#2DCEC6',
						'material_icon_bg_color'    => '#32DDD4',
						'material_list_items_icon'  => array(
							'value'   => 'fas fa-laugh',
							'library' => 'fa-solid',
						),
					),
					array(
						'material_list_items_title' => 'List Three',
						'material_content_bg_color' => '#C56EE3',
						'material_icon_bg_color'    => '#DB87F7',
						'material_list_items_icon'  => array(
							'value'   => 'fas fa-paw',
							'library' => 'fa-solid',
						),
					),
					array(
						'material_list_items_title' => 'List Four',
						'material_content_bg_color' => '#868BFF',
						'material_icon_bg_color'    => '#A8ADFF',
						'material_list_items_icon'  => array(
							'value'   => 'fas fa-magnet',
							'library' => 'fa-solid',
						),
					),
				),
				'title_field' => '{{{ material_list_items_title }}}',
			)
		);

		$this->end_controls_section();

		// Shape Bullet Style Items.
		$this->start_controls_section(
			'section_shape_list_items',
			array(
				'label'     => __( 'Items', 'item-lists-for-elementor' ),
				'condition' => array(
					'item_lists_style' => 'shape-bullet-style',
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'shape_list_items_title',
			array(
				'label'   => __( 'Title', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'item-lists-for-elementor' ),
			)
		);

		$repeater->add_control(
			'shape_list_items_content',
			array(
				'label'   => __( 'Content', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', 'item-lists-for-elementor' ),
			)
		);

		$repeater->add_control(
			'shape_list_items_display_icon',
			array(
				'label'   => __( 'Icon', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'none' => array(
						'title' => __( 'None', 'item-lists-for-elementor' ),
						'icon'  => 'fa fa-ban',
					),
					'icon' => array(
						'title' => __( 'Icon', 'item-lists-for-elementor' ),
						'icon'  => 'fa fa-info-circle',
					),
				),
				'default' => 'icon',
			)
		);

		$repeater->add_control(
			'shape_list_items_icon',
			array(
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-leaf',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'shape_list_items_display_icon' => 'icon',
				),
			)
		);

		$repeater->add_control(
			'shape_list_item_icon_style',
			array(
				'label'   => __( 'Icon Box Style', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'diamond-icon-style' => __( 'Diamond', 'item-lists-for-elementor' ),
					'circle-icon-style'  => __( 'Circle', 'item-lists-for-elementor' ),
					'square-icon-style'  => __( 'Square', 'item-lists-for-elementor' ),
				),
				'default' => 'diamond-icon-style',
			)
		);

		$this->add_control(
			'shape_item_lists',
			array(
				'label'       => __( 'List Items', 'item-lists-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'render_type' => 'template',
				'default'     => array(
					array(
						'shape_list_items_title' => 'List One',
					),
					array(
						'shape_list_items_title'     => 'List Two',
						'shape_list_item_icon_style' => 'circle-icon-style',
						'shape_list_items_icon'      => array(
							'value'   => 'fas fa-laugh',
							'library' => 'fa-solid',
						),
					),
					array(
						'shape_list_items_title'     => 'List Three',
						'shape_list_item_icon_style' => 'square-icon-style',
						'shape_list_items_icon'      => array(
							'value'   => 'fas fa-paw',
							'library' => 'fa-solid',
						),
					),
				),
				'title_field' => '{{{ shape_list_items_title }}}',
			)
		);

		$this->end_controls_section();

		// Timeline Bullet & Alternate Timeline Bullet Style Items.
		$this->start_controls_section(
			'section_timeline_list_items',
			array(
				'label'     => __( 'Items', 'item-lists-for-elementor' ),
				'condition' => array(
					'item_lists_style' => array( 'timeline-bullet-style', 'alternate-timeline-bullet-style' ),
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'timeline_list_items_title',
			array(
				'label'   => __( 'Title', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'item-lists-for-elementor' ),
			)
		);

		$repeater->add_control(
			'timeline_list_items_content',
			array(
				'label'   => __( 'Content', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', 'item-lists-for-elementor' ),
			)
		);

		$repeater->add_control(
			'timeline_list_items_display_icon',
			array(
				'label'   => __( 'Icon', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => array(
					'none'  => array(
						'title' => __( 'None', 'item-lists-for-elementor' ),
						'icon'  => 'fa fa-ban',
					),
					'icon'  => array(
						'title' => __( 'Icon', 'item-lists-for-elementor' ),
						'icon'  => 'fa fa-info-circle',
					),
					'image' => array(
						'title' => __( 'Image', 'item-lists-for-elementor' ),
						'icon'  => 'fas fa-image',
					),
				),
				'default' => 'icon',
			)
		);

		$repeater->add_control(
			'timeline_list_items_image',
			array(
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'timeline_list_items_display_icon' => 'image',
				),
			)
		);

		$repeater->add_control(
			'timeline_list_items_icon',
			array(
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-leaf',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'timeline_list_items_display_icon' => 'icon',
				),
			)
		);

		$repeater->add_control(
			'timeline_icon_color',
			array(
				'label'     => __( 'Icon Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'condition' => array(
					'timeline_list_items_display_icon' => 'icon',
				),
			)
		);

		$repeater->add_control(
			'timeline_icon_bg_color',
			array(
				'label'     => __( 'Icon Background Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ff8181',
				'condition' => array(
					'timeline_list_items_display_icon' => 'icon',
				),
			)
		);

		$this->add_control(
			'timeline_item_lists',
			array(
				'label'       => __( 'List Items', 'item-lists-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'render_type' => 'template',
				'default'     => array(
					array(
						'timeline_list_items_title' => 'List One',
					),
					array(
						'timeline_list_items_title' => 'List Two',
						'timeline_icon_bg_color'    => '#32DDD4',
						'timeline_list_items_icon'  => array(
							'value'   => 'fas fa-laugh',
							'library' => 'fa-solid',
						),
					),
					array(
						'timeline_list_items_title' => 'List Three',
						'timeline_icon_bg_color'    => '#DB87F7',
						'timeline_list_items_icon'  => array(
							'value'   => 'fas fa-paw',
							'library' => 'fa-solid',
						),
					),
					array(
						'timeline_list_items_title' => 'List Four',
						'timeline_icon_bg_color'    => '#A8ADFF',
						'timeline_list_items_icon'  => array(
							'value'   => 'fas fa-magnet',
							'library' => 'fa-solid',
						),
					),
				),
				'title_field' => '{{{ timeline_list_items_title }}}',
			)
		);

		$this->end_controls_section();

		// Gradient Ordered Bullet Style Items.
		$this->start_controls_section(
			'section_gradient_ordered_list_items',
			array(
				'label'     => __( 'Items', 'item-lists-for-elementor' ),
				'condition' => array(
					'item_lists_style' => 'gradient-ordered-bullet-style',
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'gradient_ordered_list_items_title',
			array(
				'label'   => __( 'Title', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Title', 'item-lists-for-elementor' ),
			)
		);

		$repeater->add_control(
			'gradient_ordered_list_items_content',
			array(
				'label'   => __( 'Content', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eiusmod tempor incididunt ut abore et dolore magna', 'item-lists-for-elementor' ),
			)
		);

		$this->add_control(
			'gradient_ordered_item_lists',
			array(
				'label'       => __( 'List Items', 'item-lists-for-elementor' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'render_type' => 'template',
				'default'     => array(
					array(
						'gradient_ordered_list_items_title'     => 'List One',
					),
					array(
						'gradient_ordered_list_items_title'     => 'List Two',
					),
					array(
						'gradient_ordered_list_items_title'     => 'List Three',
					),
					array(
						'gradient_ordered_list_items_title'     => 'List Four',
					),
				),
				'title_field' => '{{{ gradient_ordered_list_items_title }}}',
			)
		);

		$this->end_controls_section();
		// End Item Lists Items Section.

		// Start Box Style Control.
		$this->start_controls_section(
			'list_items_box_style',
			array(
				'label' => __( 'Box', 'item-lists-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'list_items_box_column_direction',
			array(
				'label'     => __( 'Direction', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'ltr' => __( 'LTR', 'item-lists-for-elementor' ),
					'rtl' => __( 'RTL', 'item-lists-for-elementor' ),
				),
				'condition' => array(
					'item_lists_style!' => array( 'alternate-timeline-bullet-style', 'gradient-ordered-bullet-style' ),
				),
				'default'   => 'ltr',
			)
		);

		$this->add_control(
			'list_items_number_box_background_color',
			array(
				'label'     => __( 'Background Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#F0F0F0',
				'selectors' => array(
					'{{WRAPPER}} .ile-gradient-ordered-bullet-style .ile-content-box'    => 'background: {{VALUE}};',
				),
				'condition' => array(
					'item_lists_style' => 'gradient-ordered-bullet-style',
				),
			)
		);

		$this->add_control(
			'list_items_box_margin',
			array(
				'label'      => __( 'Box Margin', 'item-lists-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .ile-gradient-ordered-bullet-style .ile-content-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'item_lists_style' => 'gradient-ordered-bullet-style',
				),
			)
		);

		$this->add_control(
			'list_items_box_padding',
			array(
				'label'      => __( 'Content Padding', 'item-lists-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .ile-content-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_box_spacing',
			array(
				'label'     => __( 'Space Between Box', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array( 'size' => 20 ),
				'selectors' => array(
					'{{WRAPPER}} .ile-container-row,
                     {{WRAPPER}} .ile-shape-bullet-style .ile-content-box' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ile-timeline-bullet-style .ile-container-holder,
                     {{WRAPPER}} .ile-alternate-timeline-bullet-style .ile-container-holder' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				),
				'condition' => array(
					'item_lists_style!' => 'gradient-ordered-bullet-style',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_box_border_radius',
			array(
				'label'     => __( 'Border Radius', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'condition' => array(
					'item_lists_style' => 'material-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-container-row' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
		// End Box Style Control.

		// Start Timeline Style Control.
		$this->start_controls_section(
			'list_items_timeline_style',
			array(
				'label'     => __( 'Timeline', 'item-lists-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'item_lists_style' => array( 'timeline-bullet-style', 'alternate-timeline-bullet-style' ),
				),
			)
		);

		$this->add_control(
			'list_items_timeline_color',
			array(
				'label'     => __( 'Timeline Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#d6d6d6',
				'selectors' => array(
					'{{WRAPPER}} .ile-timeline-vertical,
                     {{WRAPPER}} .ile-timeline-horizontal' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_timeline_width',
			array(
				'label'     => __( 'Timeline Width', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 10,
					),
				),
				'default'   => array( 'size' => 2 ),
				'selectors' => array(
					'{{WRAPPER}} .ile-timeline-vertical'   => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ile-timeline-horizontal' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ile-timeline-right'      => 'margin-right: calc({{SIZE}}{{UNIT}} / 2);',
					'{{WRAPPER}} .ile-timeline-left'       => 'margin-left: calc({{SIZE}}{{UNIT}} / 2);',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_timeline_horizontal_width',
			array(
				'label'     => __( 'Timeline Horizontal Width', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array( 'size' => 50 ),
				'selectors' => array(
					'{{WRAPPER}} .ile-timeline-horizontal' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_timeline_horizontal_spacing',
			array(
				'label'     => __( 'Timeline Horizontal Spacing', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array( 'size' => 40 ),
				'selectors' => array(
					'{{WRAPPER}} .ile-timeline-horizontal' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
		// End Timeline Style Control.

		// Start Number Style Control.
		$this->start_controls_section(
			'list_items_number_style',
			array(
				'label'     => __( 'Number', 'item-lists-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'item_lists_style' => 'gradient-ordered-bullet-style',
				),
			)
		);

		$this->add_control(
			'list_items_number_color',
			array(
				'label'     => __( 'Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'typography_list_item_number',
				'selector' => '{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before',
			)
		);

		$this->add_responsive_control(
			'list_items_number_box_size',
			array(
				'label'     => __( 'Background Size', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'default'   => array( 'size' => 60 ),
				'selectors' => array(
					'{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before'    => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'list_items_number_box_alignment',
			array(
				'label'   => __( 'Vertical Alignment', 'item-lists-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'top'    => __( 'Top', 'item-lists-for-elementor' ),
					'middle' => __( 'Middle', 'item-lists-for-elementor' ),
					'bottom' => __( 'Botttom', 'item-lists-for-elementor' ),
				),
				'default' => 'top',
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'list_items_number_background_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before',
			)
		);

		$this->add_control(
			'list_items_number_radius',
			array(
				'label'      => __( 'Radius', 'item-lists-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .ile-gradient-ordered-bullet-style li.ile-content-container::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
		// End Number Style Control.

		// Start Icon Style Control.
		$this->start_controls_section(
			'list_items_icon_style',
			array(
				'label'     => __( 'Icon', 'item-lists-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'item_lists_style!' => 'gradient-ordered-bullet-style',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_icon_size',
			array(
				'label'     => __( 'Icon Size', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array( 'size' => 25 ),
				'selectors' => array(
					'{{WRAPPER}} .ile-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ile-shape-bullet-style svg:not(.ile-icon-shape),
                     {{WRAPPER}} .ile-material-bullet-style svg,
                     {{WRAPPER}} .ile-timeline-bullet-style .ile-icon-box svg,
                     {{WRAPPER}} .ile-alternate-timeline-bullet-style .ile-icon-box svg' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'list_items_icon_color',
			array(
				'label'     => __( 'Icon Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#00DAE6',
				'condition' => array(
					'item_lists_style' => 'shape-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-icon path' => 'fill: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_icon_box_material_width',
			array(
				'label'     => __( 'Icon Box Width', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'default'   => array( 'size' => 100 ),
				'condition' => array(
					'item_lists_style' => 'material-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-icon-box' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_icon_box_width',
			array(
				'label'     => __( 'Icon Box Size', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'default'   => array( 'size' => 80 ),
				'condition' => array(
					'item_lists_style!' => 'material-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-icon-box' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'list_items_icon_bg_color',
			array(
				'label'     => __( 'Icon Background Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'condition' => array(
					'item_lists_style' => 'shape-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-icon-box .ile-icon-shape path'    => 'fill: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_icon_border_width',
			array(
				'label'     => __( 'Icon Border Width', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 10,
					),
				),
				'default'   => array( 'size' => 2 ),
				'condition' => array(
					'item_lists_style' => 'shape-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-icon-box svg path' => 'stroke-width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'list_items_icon_border_color',
			array(
				'label'     => __( 'Icon Border Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#00DAE6',
				'condition' => array(
					'item_lists_style' => 'shape-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-icon-box svg path' => 'stroke: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_icon_line_width',
			array(
				'label'     => __( 'Line Width', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 10,
					),
				),
				'default'   => array( 'size' => 2 ),
				'condition' => array(
					'item_lists_style' => 'shape-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-shape-bullet-style .ile-line' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'list_items_icon_line_color',
			array(
				'label'     => __( 'Line Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'condition' => array(
					'item_lists_style' => 'shape-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-shape-bullet-style .ile-line' => 'background-color: {{VALUE}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_icon_box_radius',
			array(
				'label'     => __( 'Icon Box Radius', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'default'   => array( 'size' => 100 ),
				'condition' => array(
					'item_lists_style' => array( 'timeline-bullet-style', 'alternate-timeline-bullet-style' ),
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-timeline-bullet-style .ile-icon-box,
                     {{WRAPPER}} .ile-alternate-timeline-bullet-style .ile-icon-box' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
		// End Icon Style Control.

		// Start Image Style Control.
		$this->start_controls_section(
			'list_items_image_style',
			array(
				'label'     => __( 'Image', 'item-lists-for-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'item_lists_style' => array( 'material-bullet-style', 'timeline-bullet-style', 'alternate-timeline-bullet-style' ),
				),
			)
		);

		$this->add_responsive_control(
			'list_items_image_box_material_width',
			array(
				'label'     => __( 'Image Width', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-image' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'list_items_image_box_material_radius',
			array(
				'label'     => __( 'Radius', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'default'   => array( 'size' => 100 ),
				'condition' => array(
					'item_lists_style' => array( 'timeline-bullet-style', 'alternate-timeline-bullet-style' ),
				),
				'selectors' => array(
					'{{WRAPPER}} .ile-image' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
		// End Image Style Control.

		// Start Title Style Control.
		$this->start_controls_section(
			'list_items_title_style',
			array(
				'label' => __( 'Title', 'item-lists-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'list_items_title_color',
			array(
				'label'     => __( 'Title Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'condition' => array(
					'item_lists_style!' => 'material-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} h2.ile-title' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'typography_list_item_title',
				'selector' => '{{WRAPPER}} .ile-title',
			)
		);

		$this->add_responsive_control(
			'list_item_title_spacing',
			array(
				'label'     => __( 'Title Spacing', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'   => array( 'size' => 0 ),
				'selectors' => array(
					'{{WRAPPER}} .ile-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();
		// End Title Style Control.

		// Start Content Style Control.
		$this->start_controls_section(
			'list_items_content_style',
			array(
				'label' => __( 'Content', 'item-lists-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'list_items_content_color',
			array(
				'label'     => __( 'Content Color', 'item-lists-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#999999',
				'condition' => array(
					'item_lists_style!' => 'material-bullet-style',
				),
				'selectors' => array(
					'{{WRAPPER}} p.ile-content' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'typography_list_item_content',
				'selector' => '{{WRAPPER}} .ile-content',
			)
		);

		$this->end_controls_section();
		// End Content Style Control.
	}

	/**
	 * Render Item List Elements widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings();

		switch ( $settings['item_lists_style'] ) {
			case 'material-bullet-style':
				include ILE_PATH . 'include/item-lists-element/material-bullet-style.php'; // Material Bullets Style.
				break;
			case 'shape-bullet-style':
				include ILE_PATH . 'include/item-lists-element/shape-bullet-style.php'; // Shape Bullets Style.
				break;
			case 'timeline-bullet-style':
				include ILE_PATH . 'include/item-lists-element/timeline-bullet-style.php'; // Timeline Bullets Style.
				break;
			case 'alternate-timeline-bullet-style':
				include ILE_PATH . 'include/item-lists-element/alternate-timeline-bullet-style.php'; // Alternate Timeline Bullets Style.
				break;
			case 'gradient-ordered-bullet-style':
				include ILE_PATH . 'include/item-lists-element/gradient-ordered-bullet-style.php'; // Gradient Ordered Bullets Style.
				break;
			default:
				include ILE_PATH . 'include/item-lists-element/material-bullet-style.php'; // Default.
				break;
		}
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Item_Lists_Elementor_Widget() );
