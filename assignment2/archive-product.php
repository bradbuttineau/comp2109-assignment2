<?php
get_header();
$shopFeaturedImg = wp_get_attachment_image_src( get_post_thumbnail_id( wc_get_page_id( 'shop' ) ), 'full' );
?>
<section class="shop-banner">
    <nav class="shop-nav">

    </nav>
    <div>
        <h1>Game shop</h1>
    </div>
</section>
<section class=" shop-body">
	<?php
	do_action( 'woocommerce_before_shop_loop' );
	echo do_shortcode( '[products limit="6" columns="4"]' );
	do_action( 'woocommerce_after_shop_loop' );

	?>
</section>
<?php
get_footer();
?>
