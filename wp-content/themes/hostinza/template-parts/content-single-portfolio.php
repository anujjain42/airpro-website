<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>

<?php
global $post;

	$designation       = wp_strip_all_tags( get_the_term_list( $post->ID, TLPPortfolio()->taxonomies['category'], null, ',' ) );
	$settings          = get_option( TLPPortfolio()->options['settings'] );
	$short_description = get_post_meta( $post->ID, 'short_description', true );
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( ' post-details' ); ?>>
	
	<div class="post-body clearfix">

		<!-- Article content -->
		<div class="entry-content hostinza-main-content clearfix">
			<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				wpautop(the_content( esc_html__( 'Continue reading &rarr;', 'hostinza' ) ));

				hostinza_link_pages();
			}
			?>
		</div> <!-- end entry-content -->
		
    </div> <!-- end post-body -->

</article>