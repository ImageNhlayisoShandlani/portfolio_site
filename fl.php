<?php
/*
Package: OnAir2
Description: Single member
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
	<?php  
	get_template_part ('phpincludes/menu');
	get_template_part ('phpincludes/part-searchbar'); 
	?>
	<div id="maincontent" class="qt-main">
		<?php 
		/**
		 * From V 2.5
		 */
		if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
			<hr class="qt-header-player-spacer">
		<?php } ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- ======================= HEADER SECTION ======================= -->
				<?php get_template_part( 'phpincludes/part-header-caption-member'); ?>
				<!-- ======================= CONTENT SECTION ======================= -->
				<div class="qt-container">
					<?php  
					/**
					 * [$category slug of taxonomy]
					 * @var [string]
					 */
					$members_show_pick = get_post_meta( get_the_ID(), 'members_show_pick', $single = true );
					if(is_array($members_show_pick)){
						if(count($members_show_pick) > 0){
							$shows_array = '';
							if(array_key_exists('membershow', $members_show_pick[0])){
								if($members_show_pick[0]['membershow'][0]){
									foreach($members_show_pick as $arr => $s){
										$shows_array .= $s['membershow'][0].',';
									}
									?>
									<!-- ======================= MANUALLY ASSOCIATED SHOWS ======================= -->
										<hr class="qt-spacer-m">
										<h5 class="qt-caption-small"><span><?php  echo get_the_title().' ' .esc_attr__("shows","onair2"); ?></span></h5>
										<hr class="qt-spacer-s">
										<?php 
										if(shortcode_exists('qt-slideshow-carousel' )){
											echo do_shortcode('[qt-slideshow-carousel posttype="shows" id="'.rtrim($shows_array,',').'"]' );
										}
										?>
									<!-- ======================= MANUALLY ASSOCIATED SHOWS END ======================= -->
									<?php
								}
							}
						}
					}  
					?>
					<div class="row qt-spacer-l">
						<div class="col s12 m12 l1 qt-pushpin-container">
							<div class="qt-pushpin">
								<?php get_template_part( 'phpincludes/sharepage' ); ?>
							</div>
							<hr class="qt-spacer-m">
						</div>
						<div class="col s12 m12 l8">
							<div class="qt-the-content">
								 <?php the_content(); ?>
							</div>
							<hr class="qt-spacer-l">
						</div>
						<div class="qt-sidebar col s12 m12 l3">
							<?php get_template_part (  'phpincludes/sidebar' ); ?>
							<hr class="qt-spacer-l">
						</div>
					</div>
				</div>
				<?php
				 //get_template_part ('phpincludes/part', 'related' );  
				?>
			</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>