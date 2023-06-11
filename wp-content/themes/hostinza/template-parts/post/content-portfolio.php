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
<div <?php post_class('post');?>>
	<?php
		if(get_post_format() == 'video'):
			if ( defined( 'FW' ) ) {
				$video_url	 = fw_get_db_post_option( get_the_ID(), 'video_url' );
			}else{
				$video_url = 'FDF';
			}
			
			?><div class="post-media"><?php

			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'post-thumbnail' );
			else:
				hostinza_get_youtube_image($video_url);
			endif;

			if($video_url != '' && $video_url != 'FDF'):
			?><div class="video-pop-up-content">
				<a href="<?php echo esc_url($video_url);?>" class="xs-video-popup gloosy-btn">
					<i class="icon icon-play-button2"></i>
				</a>
			</div>
			<?php endif; ?>
			<div class="xs-overlay xs-bg-black"></div>
			
			</div><?php
		elseif(get_post_format() == 'audio'):
			?><div class="post-media"><?php
			if ( defined( 'FW' ) ) {
				$soundcloud_embed	 = fw_get_db_post_option( get_the_ID(), 'soundcloud_embed' );
			}else{
				$soundcloud_embed = '';
			}
			echo hostinza_kses($soundcloud_embed);
			?></div><?php
		elseif(get_post_format() == 'gallery'):
			if ( defined( 'FW' ) ) {
				$gallery_images	 = fw_get_db_post_option( get_the_ID(), 'gallery_images' );
			}else{
				$gallery_images = '';
			}
			if(!empty($gallery_images) && $gallery_images != ''):
			?>
			<div class="post-media">
				<div class="post-gallery-slider owl-carousel">
					<?php 
					foreach($gallery_images as $gallery_image){
						?>
						<div class="item">
							<img src="<?php echo esc_url($gallery_image['url']);?>" alt="<?php esc_attr_e('blog list image','hostinza');?>">
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<?php
			else:
				
				if ( has_post_thumbnail() ) :
					?><div class="post-media"><?php
						the_post_thumbnail( 'post-thumbnail' );
					?></div><?php
				endif;
			endif;
		else:
			if ( has_post_thumbnail() ) :
				?><div class="post-media"><?php
					the_post_thumbnail( 'post-full' );
				?></div><?php
			endif;
		endif;
	?>
	<div class="post-body <?php echo !empty($video_url) && $video_url == 'FDF' ? 'no-video' : ''; ?>">
		<div class="entry-header">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php if ( is_sticky() ) {
					echo '<span class="meta-featured-post sticky"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Featured', 'hostinza' ) . ' </span>';
				} ?>
			</h2>
			<?php //hostinza_post_meta(); ?>
			<div class="portfolio-short-details"><?php echo wp_kses_post( wpautop( $short_description ) ); ?></div>
			
		</div>
	</div>
</div>