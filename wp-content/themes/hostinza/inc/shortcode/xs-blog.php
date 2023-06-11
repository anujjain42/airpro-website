<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Xs_Post_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'xs-blog';
    }

    public function get_title() {
        return esc_html__( 'Hostinza Post', 'hostinza' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'hostinza-elements' ];
    }

    private function xs_get_blog_posts() {
        $terms = get_terms( array(
            'taxonomy'    => 'category',
            'hide_empty'  => false,
        ) );


        $cat_list = [];
        if(is_array($terms) && '' != $terms) :
        foreach($terms as $post) {

            $cat_list[$post->term_id]  = [$post->name];
        }
       endif;
        return $cat_list;
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Post', 'hostinza'),
            ]
        );

        $this->add_control(
            'blog_style',
            [
                'label'     => esc_html__( 'Select Style', 'hostinza' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                  'style1'     => esc_html__( 'Blog Grid', 'hostinza' ),
                ],
                'default' => 'style1'
            ]
        );

        $this->add_control(
          'post_count',
          [
            'label'         => esc_html__( 'Post count', 'hostinza' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => esc_html__( '3', 'hostinza' ),

          ]
        );

        $this->add_control(
            'count_col',
            [
                'label'     => esc_html__( 'Select Column', 'hostinza' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 4,
                'options'   => [
                      '6'     => esc_html__( '2 Column', 'hostinza' ),
                      '4'     => esc_html__( '3 Column', 'hostinza' ),
                ],
                'condition' => [
                    'blog_style!' => 'style4',
                ]
            ]
        );

        $this->add_control(
          'xs_post_cat',
          [
             'label'       => esc_html__( 'Select category', 'hostinza' ),
             'type'        => Controls_Manager::SELECT2,
             'options'     => $this->xs_get_blog_posts(),
             'multiple'    => true,
             'label_block' => true,
          ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_subtitle_style', [
                'label'	 =>esc_html__( 'Sub Title', 'hostinza' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'boder_width',
            [
                'label' =>esc_html__( 'Border Width', 'hostinza' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0 ,
                    'left' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .xs-news-content' =>  'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'border_color', [
                'label'		 =>esc_html__( 'Border color', 'hostinza' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .xs-news-content' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render( ) {
          $settings = $this->get_settings();
          $style = $settings['blog_style'];
          $xs_post_cat = $settings['xs_post_cat'];
          $count_col = $settings['count_col'];
          $post_count = $settings['post_count'];

          $paged = 1;
          if ( get_query_var('paged') ) $paged = get_query_var('paged');
          if ( get_query_var('page') ) $paged = get_query_var('page');
          $query = array(
              'post_type'      => 'post',
              'post_status'    => 'publish',
              'posts_per_page' => $post_count,
              'cat' => $xs_post_cat,
              'paged' => $paged,
          );
          $xs_query = new \WP_Query( $query );
          if($xs_query->have_posts()):
          ?>
              <div class="row xs-blog-grid">
                <?php
                while ($xs_query->have_posts()) :
                    $xs_query->the_post();
                    $terms  = get_the_terms( get_the_ID(), 'category' );
                    if ( $terms && ! is_wp_error( $terms ) ) :
                      $cat_temp = '';
                      foreach ( $terms as $term ) {
                          $cat_temp .= '<a href="'.get_category_link($term->term_id).'" class="xs-blog-meta-tag green-bg bold color-white xs-border-radius" rel="category tag">'.esc_html($term->name).'</a>';
                      }
                    endif;

                    switch ($style) {
                      case 'style1':
                        require HOSTINZA_SHORTCODE_DIR_STYLE.'/blog/style1.php';
                        break;

                    }
                endwhile;
                ?>
              </div>
            <?php
          endif;
          wp_reset_postdata();
    }
    protected function content_template() { }
}