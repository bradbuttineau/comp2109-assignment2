<?php
/**
 * Template Name: Homepage Advance Custom Fields
 * Template Post Type: page
 */
get_header();
?>
<main>
    <section class="banner" style="">
        <h1><?php echo wp_kses_post( get_field( 'banner_title' ) ); ?></h1>
        <p class="banner-des">Find the games for PS4 and PS5 and add-ons and subscribe below!!!!</p>
    </section>

    <div class="card-body">
		<?php
		$the_query = new WP_Query( 'posts_per_page=3' );
		while ( $the_query->have_posts() ) :
		$the_query->the_post();
		$mainImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		?>
        <img src="<?php echo $mainImg[0]; ?>" class="card-img-top" alt="post featured image">

        <h3 class="card-title"><?php the_title(); ?></h3>
        <p class="card-text"> <?php the_excerpt() ?></p>
        <p><?php the_tags(); ?></p>
		<?php echo the_category( ',', '', '', get_the_ID() ); ?>
        <a href="#" class="btn btn-primary">Learn more</a>
    </div>


	<?php
	endwhile;
	wp_reset_postdata()
	?>

	<?php get_footer() ?>

</main>
