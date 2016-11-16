<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package LCCC Framework
 */

get_header(); ?>

<div class="row page-content">
		<div class="small-12 medium-12 large-12 columns nopadding show-for-small-only">
  <div class="row show-for-small-only sub-mobile-menu-row" style="background:#000;">
 <div class="small-2 columns" style="padding-top: 0.5rem;padding-left: 1.625rem;"> <span data-responsive-toggle="sub-responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
      </span> </div>
    <div class="small-10 columns nopadding"><h3 class="sub-mobile-menu-header" style="color:#ffffff;"><?php single_post_title(); ?> Menu</h3></div>
  </div>
  <div id="sub-responsive-menu" class="show-for-small-only">
    <ul class="vertical menu" data-drilldown data-parent-link="true">

					<?php 	wp_nav_menu(array(
													'container' => false,
													'menu' => __( 'Drill Menu', 'textdomain' ),
													'menu_class' => 'vertical menu',
										'theme_location' => 'left-nav',
													'menu_id' => 'sub-mobile-primary-menu',
														//Recommend setting this to false, but if you need a fallback...
													'fallback_cb' => 'lc_drill_menu_fallback',
													'walker' => new lc_drill_menu_walker(),
												));
					?>

    </ul>
  </div>
</div>
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
	</div>
	
<div class="medium-4 large-4 columns hide-for-small-only">
	<div class="small-12 medium-12 large-12 columns sidebar-widget">
		<div class="small-12 medium-12 large-12 columns sidebar-menu-header">
	 <h3>
					<?php 
								$blog_title = get_bloginfo(); 
								echo $blog_title;
				?>		
	</h3>
		<?php 
			//echo 'current-> ' . $current . ' slug-> ' . $post->post_name . '<br />';
			//echo 'parent-> ' . $parent_id . ' slug-> ' . $parent_slug  . '<br />';
			//echo 'grandparent-> ' . $grandparent_id . ' slug-> ' . $grandparent_slug . '<br />';
		?>
		</div>
	<?php	if ( has_nav_menu( 'left-nav' ) ) : ?>
	<div id="secondary" class="medium-12 columns secondary nopadding">
		<?php if ( has_nav_menu( 'left-nav' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php

				// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'left-nav',
					) );
				?>
			</nav><!-- .main-navigation -->
				<?php endif; ?>
		</div>
		<?php endif; ?>

	</div>
	</div>
	<div class="small-12 medium-8 large-8 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<?php
					echo '<h1 class="page-title">'.single_cat_title('',false).'</h1>';
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
 <div class="small-12 medium-12 large-12 columns page-desription">
                <?php
																    // get category slug in wordpress
    										if ( is_single() ) {
        								$cats =  get_the_category();
        								$cat = $cats[0];
    										} else {
        										$cat = get_category( get_query_var( 'cat' ) );
    										}
    												$cat_slug = $cat->slug;
    												echo $cat_slug;
														
                $args = array(
                    'pagename' => $cat_slug,
                );
                $query = new WP_Query( $args );
                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        echo '<p>' . get_the_content() . '</p>';
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                } else {
                    // no posts found
                }
                ?>
            
            </div>
            <div class="small-12 medium-12 large-12 columns annoucments">
                <?php
                $lcccargs = array(
                    'post_type' => 'lccc_announcement',
                    'post_status' => 'publish',
																				'taxonomy'	=> 'category',
																				'term'	=> $cat_slug,
                    'orderby' => 'date',
																				'order' => 'DESC',
                    'posts_per_page' => -1,
                );
                $lcccquery = new WP_Query( $lcccargs );
                // The Loop
                if ( $lcccquery->have_posts() ) {
                    while ( $lcccquery->have_posts() ) {
                        $lcccquery->the_post();
                        $subheading = announcement_meta_box_get_meta('announcement_meta_box_sub_heading');
                        ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="small-12 medium-12 large-12 columns">
<a href="<?php the_permalink();?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>
		<h3><?php echo $subheading; ?></h3>
 </div>
	<?php  if ( has_post_thumbnail() ) { ?>
			<div class="small-12 medium-4 large-4 columns">
							<?php the_post_thumbnail(); ?>
			</div>
			<div class="small-12 medium-8 large-8 columns" style="padding-top: 0.3rem;">
		<header class="entry-header">
        <?php the_category( ', ' ); ?>
        <p>&nbsp;</p>
	</header><!-- .entry-header -->
	<div class="small-12 medium-12 large-12 columns nopadding">
	<div class="entry-content">
		<?php
			the_excerpt();
		?>
		      <a href="<?php the_permalink();?>">More Information</a>
		</div><!-- .entry-content -->	
			</div>
					</div>
	<?php }else{ ?>
	<div class="small-12 medium-12 large-12 columns">
	<header class="entry-header">
        <?php the_category( ', ' ); ?>
        <p>&nbsp;</p>
       
	</header><!-- .entry-header -->
	</div>
	
	<div class="small-12 medium-12 large-12 columns">
			<div class="entry-content">
		<?php
			the_excerpt();
		?>
		 <a href="<?php the_permalink();?>">More Information</a>
	</div><!-- .entry-content -->
</div>
	<?php } ?>

	<?php if ( get_edit_post_link() ) : ?>
		<div class="small-12 medium-12 large-12 columns">
			<p>&nbsp;</p>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit This Announcment  %s', 'lorainccc' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
				</div>
	<?php endif; ?>
</article><!-- #post-## -->
<div class="column row">
        <hr>
      </div>
                
                <?php
                    }
                    the_posts_navigation();
                    /* Restore original Post Data */
                    wp_reset_postdata();
                } else {
                    // no posts found
                }
                ?> 
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>	
</div>
<?php get_footer(); ?>

