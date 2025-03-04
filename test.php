<?php
/*
Package: OnAir2
Description: Single show
Version: 3.9.5
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
			<!-- ======================= HEADER SECTION ======================= -->
			<?php get_template_part( 'phpincludes/part-header-caption-shows'); ?>
		
		
		
			<div class="qt-container qt-spacer-l qt-show-contents">
				<div class="row">
					
					<div class="bread"><a href="/goodhopefm/">Home</a>   |   <a href="/goodhopefm/lineup/">LineUp</a></div>
					
					<div class="col s12 m12 l9">
						<div class="qt-card qt-contents qt-showcard">
							<div class="row">
								 <div class="col s12 m12 l12">
									<h7><?php the_title(); ?></h7>
									 
									
									 
									<?php the_post_thumbnail( 'large' ); ?>
									<h4 class="qt-show-social">
									<?php get_template_part( 'phpincludes/part','singlesocial'); ?>
									</h4>

									<?php the_content(); ?>
									<!-- ======================= SCHEDULE SECTION ======================= -->
									 
									<?php get_template_part( 'phpincludes/part-show-single-table'); ?>
									 
									<!-- ======================= CONTENT SECTION ======================= -->
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="qt-sidebar col s12 m12 l3">
                            <?php get_template_part (  'phpincludes/sidebar' ); ?>
                            <hr class="qt-spacer-l">
                        </div>
				</div>
				
			</div>

			<?php  
			/**
			 * [$category slug of taxonomy]
			 * @var [string]
			 */
			$category = get_post_meta( get_the_ID(), 'show_podcastfilter', true );
			// echo  $show_podcastfilter;
			if($category != ''){
			?>
				<!-- ======================= RELATED PODCAST ======================= -->
				<div class="qt-container">
					<hr class="qt-spacer-m">
					<h5 class="qt-caption-small"><span><?php  echo esc_attr__("Podcast of previous episodes","onair2"); ?></span></h5>
					<hr class="qt-spacer-s">
					<?php 
					if(shortcode_exists('qt-slideshow-carousel' )){
						echo do_shortcode('[qt-slideshow-carousel posttype="podcast" category="'.$category.'" quantity="6"]' );
					}
					?>
				</div>
				<!-- ======================= RELATED PODCAST END ======================= -->
			<?php } ?>


			


			<?php  
			/**
			 * [$category slug of taxonomy]
			 * @var [string]
			 */
			$category = get_post_meta( get_the_ID(), 'show_chartcategory', true );
			if($category != ''){
			?>
				<!-- ======================= RELATED CHART ======================= -->
				<div class="qt-container">
					<hr class="qt-spacer-m">
					<h5 class="qt-caption-small"><span><?php  echo get_the_title().' ' .esc_attr__("charts","onair2"); ?></span></h5>
					<hr class="qt-spacer-s">
					<?php 
					if(shortcode_exists('qt-slideshow-carousel' )){
						echo do_shortcode('[qt-slideshow-carousel posttype="chart" category="'.$category.'" quantity="6"]' );
					}
					?>
				</div>
				<!-- ======================= RELATED CHART END ======================= -->
			<?php }  ?>


			<?php  
			/**
			 * [$category slug of taxonomy]
			 * @var [string]
			 */
			$membertype = get_post_meta( get_the_ID(), 'show_membertype', true );
			if($membertype != ''){
			?>
				<!-- ======================= RELATED MEMBERS ======================= -->
				<div class="qt-container">
					<hr class="qt-spacer-m">
					<h5 class="qt-caption-small"><span><?php  echo get_the_title().' ' .esc_attr__("team","onair2"); ?></span></h5>
					<hr class="qt-spacer-s">
					<?php 
					if(shortcode_exists('qt-slideshow-carousel' )){
						echo do_shortcode('[qt-slideshow-carousel posttype="members" category="'.$membertype.'" quantity="99"]' );
					}
					?>
				</div>
				<!-- ======================= RELATED MEMBERS END ======================= -->
			<?php }  ?>

			<?php  
			/**
			 * [$category slug of taxonomy]
			 * @var [string]
			 */
			$show_members_pick = get_post_meta( get_the_ID(), 'show_members_pick', true );
			if(is_array($show_members_pick)){
				if(count($show_members_pick) > 0){
					$members_array = '';
					if(array_key_exists('showmember', $show_members_pick[0])){

						if($show_members_pick[0]['showmember'][0]){

							foreach($show_members_pick as $arr => $s){
								$members_array .= $s['showmember'][0].',';
							}
							?>
							<!-- ======================= MANUALLY ASSOCIATED MEMBERS ======================= -->
							<div class="qt-container">
								<hr class="qt-spacer-m">
								<h5 class="qt-caption-small"><span><?php  echo get_the_title().' ' .esc_attr__("crew","onair2"); ?></span></h5>
								<hr class="qt-spacer-s">
								<?php 
								if(shortcode_exists('qt-slideshow-carousel' )){
									echo do_shortcode('[qt-slideshow-carousel posttype="members" id="'.rtrim($members_array,',').'"]' );
								}
								?>
							</div>
							<!-- ======================= RELATED MEMBERS END ======================= -->
							<?php
						}
					}
				}
			}  

			?>


			<?php  
			/**
			 * [$category slug of taxonomy]
			 * @var [string]
			 */
			$eventtype = get_post_meta( get_the_ID(), 'show_eventslist', true );
			if($eventtype != ''){
			?>
				<!-- ======================= RELATED MEMBERS ======================= -->
				<div class="qt-container">
					<hr class="qt-spacer-m">
					<h5 class="qt-caption-small"><span><?php  echo get_the_title().' ' .esc_attr__("events","onair2"); ?></span></h5>
					<hr class="qt-spacer-s">
					<?php 
					if(shortcode_exists('qt-slideshow-carousel' )){
						echo do_shortcode('[qt-slideshow-carousel posttype="event" category="'.$eventtype.'" quantity="99"]' );
					}
					?>
				</div>
				<!-- ======================= RELATED MEMBERS END ======================= -->
			<?php }  ?>


			



			<hr class="qt-spacer-l">
			<!-- ======================= RELATED SECTION ======================= -->
			
			<?php 
			get_template_part ('phpincludes/part', 'related' );  ?>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>