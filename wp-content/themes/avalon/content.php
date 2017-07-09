<?php
/**
 * The default template for displaying post content
 *
 */
?>

<div class="post dt">
	<?php 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$thumb = $thumb['0'];
	?>
	<div class="dtt">
		<div class="featured-image" style="background-image: url(<?php echo $thumb; ?>);"></div>
	</div>
	<div class="post-content dtt">
		<div class="heading"><?php the_title(); ?></div>
		<div class="copy mt20"><?php the_excerpt(); ?></div>
		<a href="<?php echo get_permalink(); ?>" class="btn white-bd green-hover">Read More</a>
	</div>
</div>


