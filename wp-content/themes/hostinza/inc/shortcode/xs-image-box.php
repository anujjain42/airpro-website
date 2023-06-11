<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Image_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-image-box';
    }

    public function get_title() {
        return esc_html__( 'Hostinza Image Box', 'hostinza' );
    }

    public function get_icon() {
        return 'eicon-insert-image';
    }

    public function get_categories() {
        return [ 'hostinza-elements' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' =>esc_html__('Hostinza Image Box', 'hostinza'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' =>esc_html__( 'Image', 'hostinza' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'label' =>esc_html__( 'Image Size', 'hostinza' ),
                'default' => 'full',
            ]
        );


        $this->add_control(
            'title',
            [
                'label' =>esc_html__( 'Title', 'hostinza' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' =>esc_html__( '99.9% Uptime Guarantee', 'hostinza' ),
                'default' =>esc_html__( 'Add Title', 'hostinza' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' =>esc_html__( 'Sub Title', 'hostinza' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Share processes and data secure lona need to know basis', 'hostinza' ),
                
            ]
        );

        $this->end_controls_section();

        /**
		 *
		 *Title Style
		 *
		*/

        $this->start_controls_section(
			'section_title_tab',
			[
				'label' =>esc_html__( 'Title', 'hostinza' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' =>esc_html__( 'Color', 'hostinza' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} h4.xs-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' =>esc_html__( 'Typography', 'hostinza' ),
				'selector' => '{{WRAPPER}} .xs-title, h4',
			]
		);

		$this->end_controls_section();


		/**
		 *
		 *Sub Title Style
		 *
		*/

        $this->start_controls_section(
			'section_sub_title_tab',
			[
				'label' =>esc_html__( 'Sub Title', 'hostinza' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' =>esc_html__( 'Color', 'hostinza' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .why-choose-us-block p ' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'label' =>esc_html__( 'Typography', 'hostinza' ),
				'selector' => '{{WRAPPER}} .why-choose-us-block p',
			]
		);

		$this->end_controls_section();

    }

    protected function render( ) {
    	
        $settings = $this->get_settings();
        $title = $settings['title'];
        $sub_title = $settings['sub_title'];
        ?>
        <div class="why-choose-us-block">
            <div class="choose-us-img">
                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings); ?>
            </div>
            <h4 class="xs-title"><?php echo esc_html( $title ); ?></h4>
            <p><?php echo esc_html( $sub_title ); ?></p>
        </div>
        <?php
    }



    protected function content_template() { }
}