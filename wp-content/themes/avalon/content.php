<?php
/**
 * The default template for displaying post content
 */
?>

<?php

	$photos = get_field('photos');
	// echo '<pre>'; print_r($photos); echo '</pre>';
?>

<div class="property-single">

	<?php if (!empty($photos)) : ?>

		<div class="photos">
			<div class="row">
				<div class="col-sm-9">

					<div class="slideshow-slider">
						<?php foreach($photos as $photo) : ?>
							<div class="slide">
								<img src="<?php echo $photo['photo']; ?>" alt="">
							</div>
						<?php endforeach; ?>
					</div>

					<div class="slideshow-nav">
						<?php foreach($photos as $photo) : ?>
							<div class="slide">
								<img src="<?php echo $photo['photo']; ?>" alt="">
							</div>
						<?php endforeach; ?>
					</div>	
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>


	<?php endif; ?>

	<div class="dtt">
		<div class="featured-image" style="background-image: url(<?php echo $thumb; ?>);"></div>
	</div>
	<div class="post-content dtt">
		<div class="heading"><?php the_title(); ?></div>
		<div class="copy mt20"><?php the_content(); ?></div>
	</div>
</div>


