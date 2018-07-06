<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			 //do_action( 'woocommerce_single_product_summary' );

			global $product;
			$is_variable = $product->is_type( 'variable' );

			echo woocommerce_template_single_title();
			echo woocommerce_template_single_meta();

			echo '<br>';

			if ( $is_variable )
				echo apply_filters( 'the_content', get_post_field('post_content', get_the_ID()) );
			else
				echo woocommerce_template_single_excerpt();

			echo '<br>';

			echo woocommerce_template_single_price();

			if ( !$is_variable )
				echo woocommerce_template_single_add_to_cart();

		?>
	</div>

	<?php

		if ( $product->is_type( 'variable' ) ) {

	?>

	<div class="clearfix"></div>

	<div class="table-wrapper" class="col-sm-12">

			<?php

				$variations = $product->get_available_variations();

				$attr_array = array();

				foreach ($variations as $key => $variation) {
					?>

					<div class="table-row">

					<?php

						$variation_id = $variation[ "variation_id" ];
						$variation 		= new WC_Product_Variation( $variation_id );


						echo '<div class="table-cell">' . wp_get_attachment_image( $variation->get_image_id(), "full" ) . '</div>';

						echo '<div class="table-cell">' . $variation->get_attribute( "color" ) . '</div>';

						echo '<div class="table-cell">' . $variation->get_sku() . '</div>';
					?>
						<div class="table-cell">
							<form id="variations_table_form" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype="multipart/form-data">

								<div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">

									<div class="quantity">

										<label class="screen-reader-text" for="quantity">Quantity</label>
										<input type="number" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">

									</div>

									<button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>

									<input type="hidden" name="add-to-cart" value="<?php echo get_the_ID(); ?>">
									<input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
									<input type="hidden" name="variation_id" class="variation_id" value="<?php echo $variation_id ?>">

								</div>

							</form>
						</div>
					</div>

					<?php

				}

			 ?>

	</div>

	<?php } ?>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
