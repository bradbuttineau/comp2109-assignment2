<?php
/**
 *The main template file
 *
 * This is the most generic template file in WordPress theme
 *and one of the two required files for a theme( the other being style.css).
 *It is used to display a page when nothing more specific matches a query.
 *E.g., it puts together the home page when no home.php file exists.
 */
get_header(); ?>
<section class="general-banner">
    <h1><?php the_title(); ?></h1>
</section>
<section>
	<?php the_content(); ?>
</section>
<?php
get_footer(); ?>
