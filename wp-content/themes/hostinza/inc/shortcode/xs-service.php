<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class Xs_Service_Box_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'xs-service-box';
    }

    public function get_title()
    {
        return esc_html__('Hostinza Service', 'hostinza');
    }

    public function get_icon()
    {
        return 'eicon-insert-image';
    }

    public function get_categories()
    {
        return ['hostinza-elements'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Hostinza Service', 'hostinza'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'hostinza'),
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
                'label' => esc_html__('Image Size', 'hostinza'),
                'default' => 'full',
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'hostinza'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('99.9% Uptime Guarantee', 'hostinza'),
                'default' => esc_html__('Add Title', 'hostinza'),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__('Sub Title', 'hostinza'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__('Share processes and data secure lona need to know basis', 'hostinza'),

            ]
        );

        $this->add_control(
            'link_title',
            [
                'label' => esc_html__('Link Text', 'hostinza'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('Learn More', 'hostinza'),
                'default' => esc_html__('Learn More', 'hostinza'),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'hostinza'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => '#',
                'default' => '#',
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
                'label' => esc_html__('Title', 'hostinza'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'hostinza'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .xs-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'hostinza'),
                'selector' => '{{WRAPPER}} .xs-title a',
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
                'label' => esc_html__('Sub Title', 'hostinza'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => esc_html__('Color', 'hostinza'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .xs-service-block p ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => esc_html__('Typography', 'hostinza'),
                'selector' => '{{WRAPPER}} .xs-service-block p',
            ]
        );

        $this->end_controls_section();

        /**
         *
         *Link Style
         *
         */

        $this->start_controls_section(
            'section_link_tab',
            [
                'label' => esc_html__('Link Style', 'hostinza'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__('Color', 'hostinza'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .xs-service-block a.simple-btn.icon-right ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link_hover_color',
            [
                'label' => esc_html__('Hover Color', 'hostinza'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .xs-service-block a.simple-btn.icon-right:hover ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings();
        $title = $settings['title'];
        $sub_title = $settings['sub_title'];
        $link_title = $settings['link_title'];
        $link = $settings['link'];
        ?>

        <div class="xs-service-block">
            <div class="service-img">
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings); ?>
            </div>
            <h4 class="xs-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h4>
            <p><?php echo esc_html($sub_title); ?></p>
            <?php if($link_title != ''):?>
                <a href="<?php echo esc_url($link); ?>" class="simple-btn icon-right"><?php echo esc_html($link_title); ?><i
                        class="icon icon-play2"></i></a>
            <?php endif; ?>
        </div>
        <?php
    }


    protected function content_template()
    {
    }
}