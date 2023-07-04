<?php
/**
 * single.php
 *
 * The template for displaying single posts.
 */

get_header();
 
get_template_part( 'template-parts/header/content', 'portfolio-header' );

?>

<section class="xs-section-padding">
    <div class="container">
        <div class="row"> 
            
            <div class="<?php echo esc_attr($column); ?>">
                <div class="blog-post-group">
                    <div class="xs-blog-list blog-lsit-style-2">
                        <?php 
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'single-portfolio' );

                            hostinza_post_nav();

                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile;
                        ?>
                    </div>
				</div>
            </div>
            <?php if($sidebar == 3){
                get_sidebar();
            } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>