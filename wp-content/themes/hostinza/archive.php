<?php
/**
 * archive.php
 *
 * The template for displaying archive pages. 
 */
?>

<?php get_header();
get_template_part( 'template-parts/header/content', 'archive-header' );
$sidebar = hostinza_option('blog_sidebar');
$column = ($sidebar == 1 ) ? 'col-md-12' : 'col-md-8';
        ?>
        <section id="main-container" class="xs-section-padding posts-list" role="main">
            <div class="container">
				<h2 class="mb-4"><?php single_cat_title('' , true )?></h2>
				
				
				
				
			
                <div class="row">
                    <?php
                    if($sidebar == 2){
                        get_sidebar();
                    }
                    ?>
					
                    <!--<div class="<?php echo esc_attr($column); ?>">-->
                        <?php if ( have_posts() ) : ?>

                            <?php while ( have_posts() ) : the_post(); ?>
								<?php $post_type = get_post_type();
								if($post_type == 'portfolio'){ ?>
								<div class="tlp-col-md-3 tlp-col-sm-4 tlp-col-xs-12 tlp-single-item tlp-grid-item tlp-equal-height">
									<?php get_template_part( 'template-parts/post/content', 'portfolio' ); ?>
								</div>
								<?php } else { ?>
									<?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>
								<?php } ?>
							<?php endwhile; ?>
							
                           
							
                        <?php else : ?>
                            <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
                        <?php endif; ?>
                    <!--</div>--> <!-- end main-content -->
 
                    <?php
                    if($sidebar == 3){
                        get_sidebar();
                    }
                    ?>
					
                </div>
<?php hostinza_paging_nav(); ?>
            </div>
        </section>
<?php get_footer(); ?>