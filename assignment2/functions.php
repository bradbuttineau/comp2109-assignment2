<?php

function fourthTheme_theme_setup() {
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu',
	) );
}

add_action( 'after_setup_theme', 'fourthTheme_theme_setup' );
add_theme_support( 'post-thumbnails' );

function footer_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget One', 'footerwidget' ),
		'id'            => 'footer-widget-one',
		'description'   => __( 'The first footer widget', 'footerwidget' ),
		'before_widget' => '<div class= "logo-widget">',
		'after_widget'  => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Two', 'footerwidget' ),
		'id'            => 'footer-widget-two',
		'description'   => __( 'The second footer widget', 'footerwidget' ),
		'before_widget' => '<div class= "foot-menu-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class= "title-widget">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Three', 'footerwidget' ),
		'id'            => 'footer-widget-three',
		'description'   => __( 'The third footer', 'footerwidget' ),
		'before_widget' => '<div class= "contact-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class= "title-widget">',
		'after_title'   => '</h4>',
	) );
	add_action( 'widgets_init', 'footer_widgets_init' );
}

function game_init() {
	$args = array(
		'label'           => 'game',
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'taxonomies'      => array( 'category' ),
		'hierarchical'    => 'false',
		'query_var'       => true,
		'menu_icon'       => 'dashicons-smiley',
		'supports'        => array(
			'title',
			'editor',
			'excerpts',
			'comments',
			'thumbnail',
			'author',
			'post-formats',
			'page-attributes',
		)
	);
	register_post_type( 'game', $args );
}

add_action( 'init', 'game_init' );
//shortcode
function game_shortcode() {
	$query = new WP_Query( array( 'post_type' => 'game', 'post_per_page' => 3, 'order' => 'asc' ) );
	while ( $query->have_posts() ) : $query->the_post(); ?>
        <div>
            <div>
                <div class="col-sm-6 d-flex justify-content-center">
                    <div class="card" style="width: 30rem">
                        <img src="<?php echo $mainImg[0]; ?>" class="card-img-top" alt="post featured image" ?
                        <div class="card-body">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <p class="card-text"> <?php the_excerpt() ?></p>
                            <p><?php the_tags(); ?></p>
							<?php echo the_category( ',', '', '', get_the_ID() ); ?>
                            <a href="#" class="btn btn-primary">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php wp_reset_postdata(); ?>
	<?php
	endwhile;
	wp_reset_postdata();
}

add_shortcode( 'game', 'game_shortcode' );

//woocommerce functions//
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_product_additional_information', 'wc_display_product_attributes', 10 );

remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );

//Add back our information back in a different order
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15 );


add_action( 'woocommerce_ after_single_product_summary', 'woocommerce_output_related_products', 15 );
add_action( 'woocommerce_ after_single_product_summary', 'woocommerce_output_product_data_tabs', 15 );
add_action( 'woocommerce_ after_single_product_summary', 'wc_display_products_attributes', 15 );

function web_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );

add_action( 'after_setup_theme', 'web_add_woocommerce_support' );


