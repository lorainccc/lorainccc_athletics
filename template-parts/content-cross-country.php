<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

?>
<?php
		$year = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_year');
		$hieght = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_height');
		$highschool = lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_high_school');
		$hometown =	lccc_athletics_player_profile_get_meta('lccc_athletics_player_profile_hometown');
		
		$post_id = get_the_ID();
?>
<tr>
	<td style="text-align:left; padding-left:1rem;">
	<a href="<?php echo get_permalink($post_id); ?>">
					<?php 	the_title( '<p class="roster-name">', '</p>' ); ?>
	</a>
	</td>
	<td>
					<?php echo '<p>'.$year.'</p>'; ?>
	</td>
	<td>
				<?php echo '<p>'.$hieght.'</p>'; ?>
	</td>
	<td>
				<?php echo '<p>'.$highschool.'</p>'; ?>
	</td>
	<td>
				<?php echo '<p>'.$hometown.'</p>'; ?>
	</td>
</tr>