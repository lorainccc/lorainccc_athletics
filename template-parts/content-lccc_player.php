<?php
/**
 * @package LCCC Framework
 */

//Get custom fields
$year = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_year');
$height = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_height');
$highschool = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_high_school');
$hometown =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_hometown');
$jerseynumber =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_jersey_number');
$acadmajor = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_acadmajor');
$parents = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_parents');
$sport = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_sport');
$sport = strtolower($sport);
$sport = str_replace(' ', '-', $sport);
$secondaryposition = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_secondary_position');
$secondaryposition = str_replace('-', ' ', $secondaryposition);
$secondaryposition = trim($secondaryposition);

switch($sport){
    case 'baseball':
                        $position =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_position_baseball');
    break;
    case 'basketball':
                        $position =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_position_basketball');
    break;
    case 'fastpitch-softball':
                        $position =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_position_softball');
    break;
    case 'soccer':
                        $position =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_position_soccer');
    break;
    case 'volleyball':
                        $position =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_position_volleyball');
    break;
    default:
}


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
    if ( has_post_thumbnail() ) {
    ?>
	<div class="small-12 medium-4 columns"><?php the_post_thumbnail(); ?></div>
    <?php
    } else {?>
<div class="small-12 medium-4 columns">&nbsp;</div>
    <? } ?>
    <div class="small-12 medium-8 columns"><span style="font-size:1.2rem;font-weight:600;padding-bottom:3px;border-bottom:solid 2px #939393;">About the player</span>
    <ul style="list-style: none; border-left: dashed 2px #939393; padding: 0 0 0 5px; margin:2px 0 0 0!important;">
     <li style="margin:0;"><b>Player:</b> # <?php echo $jerseynumber; ?></li>
     <li style="margin:0;"><b>Height:</b> <?php echo $height; ?></li>
     <li style="margin:0;"><b>Academic Year:</b> <?php 
        switch($year){
            case 'FR':
                echo 'Freshman';
            break;
            case 'SO':
                echo 'Sophomore';
            break;
            case 'JR':
                echo 'Junior';
            break;
            case 'SR':
                echo 'Senior';
            break;
        }
     ?></li>
      <li style="margin:0;"><b>Position:</b> <?php echo $position; ?></li>
      <li style="margin:0;"><b>High School:</b> <?php echo $highschool; ?></li>
      <li style="margin:0;"><b>Home Town:</b> <?php echo $hometown . ', OH'; ?></li>
      <li style="margin:0;"><b>Major:</b> <?php echo $acadmajor; ?></li>
      <li style="margin:0;"><b>Parents:</b> <?php echo $parents; ?></li>
    </ul>
    </div>
    


    <div class="small-12 medium-12 large-12 columns">
		<?php the_content(); ?>
    </div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lccc-framework' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php lorainccc_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->