<?php
/**
 * Template Name: Single Post template*
 * Template Post Type: post
 */

get_header();
$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>

<main>
    <div class="card-body">
        <h1><?php the_title(); ?></h1>
    </div>
    <div>
		<?php
		$the_query = new WP_Query( 'posts_per_page=1' );
		while ( $the_query->have_posts() ) :
		$the_query->the_post();
		$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		?>

        <div class="card-group">
            <img src="<?php echo $mainImg[0]; ?>" class="card-img-top" alt="post featured image">
            <div class="card-body">
                <h3 class="card-title"><?php the_title(); ?></h3>
                <p class="card-text"> <?php the_excerpt() ?></p>
                <p><?php the_tags(); ?></p>
				<?php echo the_category( ',', '', '', get_the_ID() ); ?>
                <a href="#" class="btn btn-primary">Learn more</a>
            </div>
        </div>
    </div>

    </section>

	<?php
	endwhile;
	wp_reset_postdata()
	?>


	<?php get_footer() ?>

</main>

