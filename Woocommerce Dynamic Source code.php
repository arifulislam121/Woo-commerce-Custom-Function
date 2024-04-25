
<====Call this code below body tag otherwise not work woocommerce php code=====>

<?php

============ Woocommerce all source code available in below url ============


https://businessbloomer.com/woocommerce-easily-get-order-info-total-items-etc-from-order-object/

============================== END ========================






<!-----start-------->

<?php global $woocommerce;?>


<!----end-------->



<====If you want to woocommerce support in your theme please include below code in functions.php===>



<!-----start-------->

<?php

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
	
add_image_size('product',45,45,true); //Product image resize
	
	}
	
add_action( 'after_setup_theme', 'woocommerce_support' );

?>

<!----end-------->





<====How to create woocommerce.php for woocommerce===>


<!-----start-------->



<!-- Duplicate your theme page.php and rename woocommerce.php and then edit woocommerce.php after past below code
(no loop requirement ) or read more follow Documentation / Plugins / WooCommerce / Codex / Theming-->

<?php woocommerce_content(); ?>	




<!----end-------->



============ if woocommerce archive-product.php overwrite not working
 include below code in woocommerce.php instead <?php woocommerce_content(); ?> ========
				
				
				<?php
		
			
			if(is_singular('product')){
				
				 woocommerce_content();
				}
				else{
					
					woocommerce_get_template('archive-product.php');
				}
		
		
      ?>

=====================end====================================




<=======You want to login & register area manualy dynamic  use below this code functio====>


<!-----start-------->
		
		 <?php if(is_user_logged_in()) : ?>
	
		<?php else : ?>
			<a href="<?php bloginfo('home');?>/wp-login.php?action=login">Login</a> <a href="<?php bloginfo('home');?>/wp-login.php?action=register">Register</a>
		<?php endif; ?>
		
<!----end-------->
		

		
<====you want to Myaccount,checkout,cart & wishlist manualy dynamic  use this below code function===>	

	
<!-----start-------->

			
			<a href="<?php echo get_permalink(get_option('yith_wcwl_wishlist_page_id'));?>" id="wishlist-total">Wish List (<?php echo yith_wcwl_count_products(); ?>)</a>
			<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id'));?>">My Account</a> 
			<a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id'));?>">Checkout</a>
			<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id'));?>">Cart</a>
			
			or 
			
			page url


		woocommerce_get_page_id( ‘cart’ );
		woocommerce_get_page_id( ‘change_password’ );
		woocommerce_get_page_id( ‘checkout’ );
		woocommerce_get_page_id( ‘edit_address’ );
		woocommerce_get_page_id( ‘logout’ );
		woocommerce_get_page_id( ‘lost_password’ );
		woocommerce_get_page_id( ‘myaccount’ );
		woocommerce_get_page_id( ‘pay’ );
		woocommerce_get_page_id( ‘view_order’ );
		woocommerce_get_page_id( ‘shop’ );
		woocommerce_get_page_id( ‘terms’ );
		woocommerce_get_page_id( ‘thanks’ );



display pages

<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>

			
<!----end-------->




=============== Display Woocommerce image url,regular and sale price and currency symbol,and add to cart url and text ==========

 <?php global  $woocommerce;  ?>
<?php while($query->have_posts()) : $query->the_post(); global $product; ?>	

 <div class="single-shop-slider">
<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="shop">
	<div class="shop-info">
		<h5><?php echo get_woocommerce_currency_symbol();?><?php echo $product->get_sale_price();?> <span><?php echo get_woocommerce_currency_symbol();?><?php echo $product->get_regular_price();?></span></h5>
		<h4><?php if ( get_the_title() ) the_title(); else the_ID(); ?></h4>
		
		<a href="<?php echo $product->add_to_cart_url();?>" class="site-btn"><?php echo $product->add_to_cart_text();?></a>
	</div>
</div>

<?php endwhile; wp_reset_postdata(); ?>	


============end==========


=============== Display Woocommerce Featured Product ==========
<?php

$args = array(
        'post_type' => 'product',
        'order' => QSInspection_set( $lapaleteriashop_slide,'order'),
        'posts_per_page' => QSInspection_set( $lapaleteriashop_slide,'number'),
        'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
    );
	
	
$query = new WP_Query($args);	
?>	
 

============end==========

=============== Display Woocommerce Product Tag List ==========
<?php $terms = get_terms(array('taxonomy' => 'product_tag', 'hide_empty' => false)); ?>
	<div class="product-tags">
	<?php foreach ( $terms as $term ) { ?>
		<a href="<?php echo get_term_link( $term->term_id, 'product_tag' ); ?> " rel="tag"><?php echo $term->name; ?></a>
	<?php } ?>
	</div>

============end==========


=============== Eadsily Get Product Info (ID, SKU, $) From $product Object ==========

<?php

$product->get_id();
  
// Get Product General Info
  
$product->get_type();
$product->get_name();
$product->get_slug();
$product->get_date_created();
$product->get_date_modified();
$product->get_status();
$product->get_featured();
$product->get_catalog_visibility();
$product->get_description();
$product->get_short_description();
$product->get_sku();
$product->get_menu_order();
$product->get_virtual();
get_permalink( $product->get_id() );
  
// Get Product Prices
  
$product->get_price();
$product->get_regular_price();
$product->get_sale_price();
$product->get_date_on_sale_from();
$product->get_date_on_sale_to();
$product->get_total_sales();
  
// Get Product Tax, Shipping & Stock
  
$product->get_tax_status();
$product->get_tax_class();
$product->get_manage_stock();
$product->get_stock_quantity();
$product->get_stock_status();
$product->get_backorders();
$product->get_sold_individually();
$product->get_purchase_note();
$product->get_shipping_class_id();
  
// Get Product Dimensions
  
$product->get_weight();
$product->get_length();
$product->get_width();
$product->get_height();
$product->get_dimensions();
  
// Get Linked Products
  
$product->get_upsell_ids();
$product->get_cross_sell_ids();
$product->get_parent_id();
  
// Get Product Variations and Attributes
 
$product->get_children(); // get variations
$product->get_attributes();
$product->get_default_attributes();
$product->get_attribute( 'attributeid' ); //get specific attribute value
  
// Get Product Taxonomies
  
$product->get_categories();
$product->get_category_ids();
$product->get_tag_ids();
  
// Get Product Downloads
  
$product->get_downloads();
$product->get_download_expiry();
$product->get_downloadable();
$product->get_download_limit();
  
// Get Product Images
  
$product->get_image_id();
$product->get_image();
$product->get_gallery_image_ids();
  
// Get Product Reviews
  
$product->get_reviews_allowed();
$product->get_rating_counts();
$product->get_average_rating();
$product->get_review_count();
?>

============end==========


=============== Display  Product Category In While Loop For Each Product  ==========
<?php 
global $post, $product;
$categ = $product->get_categories();
echo $categ; 
?>

============end==========

=============== Display Woo Product Category and subcategory with thumbnail rule-01 ==========

<?php global  $woocommerce;  ?>

<?php
	$taxonomy     = 'product_cat';
	  $orderby      = 'name';
	  $show_count   = 0;      // 1 for yes, 0 for no
	  $pad_counts   = 0;      // 1 for yes, 0 for no
	  $hierarchical = 1;      // 1 for yes, 0 for no
	  $title        = '';
	  $empty        = 0;

	  $args = array(
			 'taxonomy'     => $taxonomy,
			 'orderby'      => $orderby,
			 'show_count'   => $show_count,
			 'pad_counts'   => $pad_counts,
			 'hierarchical' => $hierarchical,
			 'title_li'     => $title,
			 'hide_empty'   => $empty
	  );
	 $all_categories = get_categories( $args );
	 foreach ($all_categories as $cat) {
		if($cat->category_parent == 0) {
			$category_id = $cat->term_id;       
			echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>'; ?>

<?php    $args2 = array(
					'taxonomy'     => $taxonomy,
					'child_of'     => 0,
					'parent'       => $category_id,
					'orderby'      => $orderby,
					'show_count'   => $show_count,
					'pad_counts'   => $pad_counts,
					'hierarchical' => $hierarchical,
					'title_li'     => $title,
					'hide_empty'   => $empty
			);
			$sub_cats = get_categories( $args2 );
			if($sub_cats) {
				foreach($sub_cats as $sub_category) {
					 echo  $sub_category->name ;
					 $thumbnail_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true );
					 $image = wp_get_attachment_url( $thumbnail_id );
					 echo  '<img src="'.$image.'" alt="" height="20" width="20">';
					//add other code here to display child details

				}   
			}
		}       
	}

	?>

============end==========



=============== Display Woo Product Category and thumbanil image rule-02 ==========

<?php global  $woocommerce;  ?>
					
	<?php

	$terms = get_terms( array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		) ); // Get Terms

	
		
	foreach ($terms as $key => $value) 
	{
		$metaterms = get_term_meta($value->term_id);
		$thumbnail_id = get_woocommerce_term_meta($value->term_id, 'thumbnail_id', true );
		$cat_id=$value->term_id;
		
		
		
		
		$image = wp_get_attachment_url( $thumbnail_id );
		$product_cat_name = $value->name; 

		echo '<div class="single-category-item">
			<div class="category-item-box">
				<div class="category-box-bg"></div>
				<img src="'.$image.'" alt="Product">
				<div class="category-item-info">
					<h5><a href="'. get_category_link( $cat_id ) .'">'.$product_cat_name.'</a></h5>
					<a href="'. get_category_link( $cat_id ) .'">
						<i class="fas fa-arrow-right"></i>
					</a>
				</div>
			</div>
		</div>';
	} // Get Images

	?>

============end==========

=============== Display Specific Category Name By ID Wise ==========
$categ =array(25,15,16,17); //category id

foreach($categ as $test){
	$term_link = get_term_link( $test );
	if(!empty($term = get_term_by( 'id', $test, 'product_cat' )) ){
    echo '<a href="' . esc_url( $term_link ) . '">'.$term->name.'</a>'."</br>";
}
}
============end==========

=============== Display Product Category With Post Count ==========

<!----first child class active---->
					
		<script type="text/javascript"> 
			
			 jQuery(document).ready(function(){
			  jQuery('#tabactive button:first').addClass('active');
			});
		
		</script>
		
			<ul id="tabactive">
			
			<?php
			
			$product_categories = get_terms( 'product_cat', $args );

			foreach( $product_categories as $cat )  { 
				
			   
			   echo '<li>
					<button>
						<span>'.$cat->name.'</span>
						<span>'.$cat->count.'</span>
					</button>
				</li>';
			}
		?>

============end==========



=============== manualy page linking with id ==========

<a href="<?php echo get_page_link(page id); ?>"> Amar page</a>

============end==========



<=====you want to Mini Shopping Cart Manualy dynamic use below code function====>


<!-----start-------->

			<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
		
				<section id="cart">
					<div class="heading">
				
						<h4><img width="32" height="32" alt="" src="<?php  echo get_template_directory_uri();?>/image/cart-bg.png"></h4>
						<a><span id="cart-total"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> - <?php echo $woocommerce->cart->get_cart_total();  ?></span></a>

					</div>

				</section>

			</a>

<!----end-------->	



<====== If you want to show cart Product info in Mini Shopping Cart dropdown
		use below function code or find (plugin/woocommerce/templates/cart/cart.php) ========>


		<!-----start-------->

		
<div class="mini-cart-info"> 


	<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<table class="shop_table cart" cellspacing="0">
			<thead>
				<tr>
					<th class="product-remove">&nbsp;</th>
					<th class="product-thumbnail">&nbsp;</th>
					<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
					<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
					<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
					<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<td class="product-remove">
								<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
								?>
							</td>

							<td class="product-thumbnail">
								<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

									if ( ! $_product->is_visible() ) {
										echo $thumbnail;
									} else {
										printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
									}
								?>
							</td>

							<td class="product-name">
								<?php
									if ( ! $_product->is_visible() ) {
										echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
									} else {
										echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
									}

									// Meta data
									echo WC()->cart->get_item_data( $cart_item );

									// Backorder notification
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
									}
								?>
							</td>

							<td class="product-price">
								<?php
									echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								?>
							</td>

							<td class="product-quantity">
								<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
											'min_value'   => '0'
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
								?>
							</td>

							<td class="product-subtotal">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>
							</td>
						</tr>
						<?php
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>
				<tr>
					<td colspan="6" class="actions">

						<?php if ( WC()->cart->coupons_enabled() ) { ?>
							<div class="coupon">

								<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

								<?php do_action( 'woocommerce_cart_coupon' ); ?>
							</div>
						<?php } ?>

						<input type="submit" class="button" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" />

						<?php do_action( 'woocommerce_cart_actions' ); ?>

						<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					</td>
				</tr>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>

		<?php do_action( 'woocommerce_after_cart_table' ); ?>

	</form>

</div>

		<!----end-------->	


<====== If you want to display mini-cart sub-total amount in Mini Shopping Cart dropdown
		use below function code or find (plugin/woocommerce/templates/cart/cart-totals.php) ========>
		
		
	<!-----start-------->	
	
	
	<div class="mini-cart-total">
		<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

					<?php do_action( 'woocommerce_before_cart_totals' ); ?>

					<h2><?php _e( 'Cart Totals', 'woocommerce' ); ?></h2>

			<table cellspacing="0">

				<tr class="cart-subtotal">
					<th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
					<td><?php wc_cart_totals_subtotal_html(); ?></td>
				</tr>

				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
					<tr class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
						<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
						<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
					</tr>
				<?php endforeach; ?>

				<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

					<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

					<?php wc_cart_totals_shipping_html(); ?>

					<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

				<?php elseif ( WC()->cart->needs_shipping() ) : ?>

					<tr class="shipping">
						<th><?php _e( 'Shipping', 'woocommerce' ); ?></th>
						<td><?php woocommerce_shipping_calculator(); ?></td>
					</tr>

				<?php endif; ?>

				<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
					<tr class="fee">
						<th><?php echo esc_html( $fee->name ); ?></th>
						<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
					</tr>
				<?php endforeach; ?>

				<?php if ( WC()->cart->tax_display_cart == 'excl' ) : ?>
					<?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
						<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
							<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
								<th><?php echo esc_html( $tax->label ); ?></th>
								<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr class="tax-total">
							<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
							<td><?php wc_cart_totals_taxes_total_html(); ?></td>
						</tr>
					<?php endif; ?>
				<?php endif; ?>

				<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

				<tr class="order-total">
					<th><?php _e( 'Total', 'woocommerce' ); ?></th>
					<td><?php wc_cart_totals_order_total_html(); ?></td>
				</tr>

				<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

			</table>

			<?php if ( WC()->cart->get_cart_tax() ) : ?>
				<p><small><?php

					$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
						? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
						: '';

					printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

				?></small></p>
			<?php endif; ?>

			<div class="wc-proceed-to-checkout">

				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

			</div>

			<?php do_action( 'woocommerce_after_cart_totals' ); ?>

	</div>

</div>
		
	<!----end-------->	



<======If you want to add wishlist button inside product item include below code in functions.php====>



<!-----start-------->

<?php 

function show_add_to_wishlist(){
	
	echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}

add_action( 'woocommerce_after_shop_loop_item','show_add_to_wishlist', 50 );

?>

<!----end-------->	



=============Follow Law -01==================


<!---------Product query with jquery & shortcode------------>

<!---sample html code---->

     <section class="box">
          <div class="box-heading">Featured</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider featured_carousel">
                <ul class="slides">
    
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/samsung_syncmaster_941bw-210x210.jpg" alt="Samsung SyncMaster 941BW" /></a></div>
                      <div class="name"><a href="product.html">Samsung SyncMaster 941BW</a></div>
                      <div class="price"> $237.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
				  
                </ul>
              </div>
            </div>
          </div>
        </section>
		
		
<!----Dynamic code------->


 <section class="box">
         <div class="box-heading">Featured</div>
			<div  class="box-content">
				<div id="elemet_change"  class="box-product">
			
			
				<script type="text/javascript"> 
				
				jQuery(document).ready(function(){
						jQuery("#elemet_change div.woocommerce").addClass("flexslider featured_carousel").removeClass("woocommerce");
						jQuery("#elemet_change ul.products").addClass("slides");
						
				});		

				</script>
				
				
				<?php echo do_shortcode('[product_category category="feature" per_page="12" columns="4" orderby="date" order="desc"]');?>
			
			
             
            </div>
         </div>
   </section>		
		

		
<!----end-------->	
	

============end======================



=============Follow Law -02==================


<!---------Product Display With Custom Query------------>


<!---sample html code---->

<div id="tab-special" class="tab_content">
            <div class="box-product">
              <div class="flexslider special_carousel_tab">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-210x210.jpg" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price"> $131.25 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>

                </ul>
              </div>
            </div>
          </div>


<!----Dynamic code------->

<div id="tab-special" class="tab_content">
            <div class="box-product">
              <div class="flexslider special_carousel_tab">
                <ul class="slides">
				
				
						<?php

							global $post;
							$args=array('posts_per_page'=>-1,'post_type'=>'product','product_cat'=>'special');

							$myposts = get_posts($args);

							foreach( $myposts as $post) : setup_postdata($post);
						?>

						  <li>
							<div class="slide-inner">
							  <div class="image"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
							  <div class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
							  <div class="price"> 
									<?php if ( $price_html = $product->get_price_html() ) : ?>
										<span class="price"><?php echo $price_html; ?></span>
									<?php endif; ?>
								</div>
							  
							  
							<!--Add to Cart button--->  
							  <div class="cart">
							  
							  <?php global $product;?>
							  
									<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
										sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button ami %s product_type_%s">%s</a>',
											esc_url( $product->add_to_cart_url() ),
											esc_attr( $product->id ),
											esc_attr( $product->get_sku() ),
											esc_attr( isset( $quantity ) ? $quantity : 1 ),
											$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
											esc_attr( $product->product_type ),
											esc_html( $product->add_to_cart_text() )
										),
									$product );?>
								</div>
								<!--end---->
								
								
								<div class="add_to_wishlist"> 
						
								<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
								<?php echo do_shortcode('[yith_compare_button]');?>
								
								</div>
							  <div class="clear"></div>
							</div>
						  </li>


					<?php endforeach;?>
				
				
                 
                </ul>
              </div>
            </div>
          </div>

<!----end-------->	

============end======================





=========== Woocommerce  Sample Product Query ==========


<div class="product_query_sample"> 

	<ul class="products eight columns">
<?php
    $args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => 'special', 'orderby' => 'rand' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

            <li class="product product-items ">    

                <div class="product-item">

                    <?php woocommerce_show_product_sale_flash( $post, $product ); ?>

                    <div class="product-thumbnail">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
                    </div>

                    <div class="product-info">
                    <h3><a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php the_title(); ?></a></h3>

                    <?php echo $product->get_sku(); ?>
                    <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>


                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                        <span class="price"><?php echo $price_html; ?></span>
                    <?php endif; ?>  


                    <div class="product-rating">
                    <?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'; ?>
                    </div>

                    <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

                    </div>

                </div>



            </li>

<?php endwhile; ?>
<?php wp_reset_query(); ?>
</ul><!--/.products-->

</div>


================== END ====================






================woocommerce product query right way system========


<section id="yt_spotlight5" class="block">
			<div class="container">
				<div class="row">
					<div id="bottom1" class="col-md-12">
						<h3 class="section-heading"><b></b><span style="background: none repeat scroll 0 0 #ffd700;
    padding: 12px 52px;"  class="section-title-main-heading">Kids Item</span><b></b></h3>
					</div>
				</div>
				<div class="row">
				
					<div class="col-md-2 col-xs-12 col-sm-3">
					
						<div class="category_list" id="">
				
							
								
							
						</div>
						
						
						
						
					</div>
				

					<div class="col-md-10 col-xs-12 col-sm-10">
						
								
										
				<div id="product-tab">						
						
													<?php

							global $post;
							$args=array('posts_per_page'=>3,'post_type'=>'product','product_cat'=>'kids-item');

							$myposts = get_posts($args);

							foreach( $myposts as $post) : setup_postdata($post);
						?>

						
						
						<div class="item col-md-4 col-xs-12 col-sm-4">
							<div class="product-thumb sub-hover">
								<div class="new">
									New
								</div>
						<?php echo woocommerce_get_product_thumbnail(); ?>
								<div class="button-group">
									<div class="wishlist"><a href="<?php echo get_permalink(get_option('yith_wcwl_wishlist_page_id'));?>"><i class="fa fa-heart" aria-hidden="true"></i></a></div>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<a href="<?php the_permalink();?>">Quick View</a>
										
									</div>
								</div>
							</div>
							<div class="caption product-detail text-center">
							<small> 
							
	
							
							
							<?php 
						$product_cat_name = get_term_by( 'slug', 'slugname', 'product_cat' );	
							 foreach($product_cat_name as $catTerm){ 
							
    
							 echo $product_cat_name->name;}
?></small>
								
								<span class="price"><span class="amount"><span class="currencySymbol"><?php if ( $price_html = $product->get_price_html() ) : ?>
										<span class="price"><?php echo $price_html; ?></span>
									<?php endif; ?></span>
									</span></br>
									<h6 data-name="product_name" class="product-name"><a href="<?php the_permalink();?>" title="Casual Shirt With Ruffle Hem"><?php echo get_the_title();?></a></h6>
									<p class="redtitel"><i>FREE & FAST HOME DELIVERY</i></p>
							</div>
						</div>	
						
						
								
							<?php endforeach;?>
						
						
									
					</div>
								
					</div>
						
						
						
									
					</div>
					

					

				</div>
			</div>
		</section>
	


====================end===================================












============ How to Dynamic woocommerce sidebar (Bestsellar) product Item============

<!---sample html code---->

<div class="box">
  <div class="box-heading">Bestsellers</div>
  <div class="box-content">
	<div class="box-product">
	  <div class="flexslider">
		<ul class="slides">
		 
  
		  <li>
			<div class="slide-inner">
			  <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-45x45.jpg" alt="Jeep-Casual-Shoes" /></a></div>
			  <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
			  <div class="price">$131.25</div>
			  <div class="clear"></div>
			</div>
		  </li>
		  
		</ul>
	  </div>
	</div>
  </div>
</div>


<!----Dynamic code------->

 <div class="box">
  <div class="box-heading">Bestsellers</div>
  <div class="box-content">
	<div class="box-product">
	  <div class="flexslider">
		<ul class="slides">
		

			<?php

				global $post;
				$args=array('posts_per_page'=>-1,'post_type'=>'product','product_cat'=>'special');

				$myposts = get_posts($args);

				foreach( $myposts as $post) : setup_postdata($post);?>

					
			 <li>
				<div class="slide-inner">
				  <div class="image"><a href="<?php the_permalink();?>"><?php the_post_thumbnail('product');?>
									<!--if you want image resize (1.call add_image_size('product',45,45,true); in function.php at theme support 2.call function  ID Which image resize --->
				  </a></div>
				  <div class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
				  <div class="price"><?php echo get_woocommerce_currency_symbol();?><?php echo get_post_meta(get_the_ID(),'_regular_price',true);?></div>
				  <div class="clear"></div>
				</div>
			  </li>

		<?php endforeach;?>

		
		
		</ul>
	  </div>
	</div>
  </div>
</div>

============================== END ========================



============ How to add Read more button in woocommerce ============

<a href="<?php echo apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ); ?>" class="button"><?php echo apply_filters( 'out_of_stock_add_to_cart_text', __( 'Read More', 'woocommerce' ) ); ?></a>


============================== END ========================



 =========How to Remove default sorting dropdown from shop page=======


<!-- Remove default sorting dropdown from shop page in woocommerce-->

<?php
 
  remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);

 ?>
 
 
 ================== END ====================
 
 
 =========How to Remove woocommerce default styleshheet=======
 
 
 <!---remove custom style sheet for woocommerce--->
 
 
<?php


function jk_denqueue_styles($enqueue_styles){
	
	unset($enqueue_styles ['woocommerce-general']); //remove the gloss
	unset($enqueue_styles ['woocommerce-layout']);  //remove the layout
	unset($enqueue_styles ['woocommerce-smallscreen']); //remove the smallscreen optimisation
	return $enqueue_styles;
	
}
 add_filter('woocommerce_enqueue_styles','jk_denqueue_styles');
 
?>
 
 
 or
 
 <!---remove all style sheet for woocommerce--->
 
 <?php 

 
 add_filter('woocommerce_enqueue_styles','__return_false');
 
 ?>

=============end===============



===========Woocommerce product search form======


<!----Woocommerce product search form----->

	<div class="product_serch"> 
		
		<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
					<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" />
					<input type="hidden" name="post_type" value="product" />
		</form>
			
	</div>
	
	
	
	//or call Woo Product Search Form widget function in any place use below code//
	
	<?php echo get_product_search_form();?>
	
	
	
	//Customise the search results by post type 
	
	<?php 
			if ( !is_admin() ) {
		function searchfilter($query) {
		 if ($query->is_search && !is_admin() ) {
		 $query->set('post_type',array('product','page')); //Notice that the key argument is ‘product’. You can use the following keys to determine which type of posts to display:‘product’ = Products‘post’ = Posts (blog articles)‘page’ = Static pagesYou can include multiple post types by setting the arguments:$query->set('post_type',array('product','page'));
		 }
		return $query;
		}
		add_filter('pre_get_posts','searchfilter');
		}
	?>	
	
		
		
============end=================		




===========Display woocommerce number of item and total amount in cart option=====

<!----Display woocommerce number of item and total amount---->

<?php global $woocommerce; ?>

<a class=”cart-contents” href=”<?php echo $woocommerce->cart->get_cart_url(); ?>” title=”<?php _e(‘View your shopping cart’, ‘woothemes’); ?>”><?php echo sprintf(_n(‘%d item’, ‘%d items’, $woocommerce->cart->cart_contents_count, ‘woothemes’), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>


==========end=========================


==========display Woocommerce product reviews tab======

<!--don't display your product reviews tab use below function---->

<?php

function woocommerce_template_product_review() {

woocommerce_get_template( ‘single-product/tabs/tabs.php’ );

}

add_action('woocommerce_single_product_summary','woocommerce_template_product_review', 20 );

?>

=============end===========================



=============Woocommerce Login form=========



<div class="woo_login_form"> 
	

		<form method="post" class="login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>

			<p class="form-row form-row-first">
				<label for="username"><?php _e( 'Username or email', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="input-text" name="username" id="username" />
			</p>
			<p class="form-row form-row-last">
				<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="input-text" type="password" name="password" id="password" />
			</p>
			<div class="clear"></div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
				<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
				<label for="rememberme" class="inline">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
				</label>
			</p>
			<p class="lost_password">
				<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<div class="clear"></div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>


</div>

============end=====================



==========Woocommerce sidebar remove from shop page======

<?php

//woocommerce shop page sidebar remove

remove_action('woocommerce_sidebar','woocommerce_get_sidebar');

?>

============end=========================



=============woocommerce products columns set with functions=======

<?php

//woocommerce product column set with functions

function set_column($columns){
	
	return 4;
}

add_filter('loop_shop_columns','set_column');

?>

 <!--Or use below functions-------->
 
 
 <?php 
 
 //Change product columns number on shop pages
 
 
 function woo_product_columns_frontend() {

global $woocommerce;

// Default Value also used for categories and sub_categories

$columns = 4;

// Product List

if ( is_product_category() ) :

$columns = 4;

endif;

//Related Products

if ( is_product() ) :

$columns = 2;

endif;

 //Cross Sells

if ( is_checkout() ) :

$columns = 4;

endif;

return $columns;
}
add_filter('loop_shop_columns', 'woo_product_columns_frontend');

 
 
 ?>



=========================end====================


=============woocommerce Logged-In Users Custom Template=======

<?php
/*
* Template Name: Logged-In Users Page
 */

// source: http://www.rlmseo.com/blog/require-login-for-wordpress-pages/

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php if(is_user_logged_in()):?>

				<?php while ( have_posts() ) : the_post(); ?>				
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			<?php else: ?>

				<article  class="page type-page status-publish hentry">
					<header class="entry-header">
					    <h1 class="entry-title">
					        Checkout
					    </h1>
					</header>
					<div class="entry-content">
						<div class="woocommerce">
							<?php include( 'woocommerce/myaccount/form-login.php' ); ?>
						</div>
					</div>
				</article>			

			<?php endif ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>



 ===================end========================================



=========== When user login then showing MyAccount link or 
            when user logout then showing login/register link ====

 <?php if ( is_user_logged_in() ) { ?>
 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
 <?php } 
 else { ?>
 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
 <?php } ?>
 
 
 ===================end========================================



=============== woocommerce redirect link /url after user click ======


<!---After logging in-->

<?php
// Custom redirect for users after logging in

add_filter('woocommerce_login_redirect', 'bryce_wc_login_redirect');
function bryce_wc_login_redirect( $redirect ) {
     $redirect = 'http://localhost/xampp/wordpress/';
     return $redirect;
}

?>


<!---After logging out-->

Now let’s open up the file found in /wp-content/YOUR_THEME/woocommerce/myaccount/my-account.php.

Approximately around line 21, you will find the following line:

wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )

We’re going to want to change this line to set a custom URL to redirect to after logging out. If, for example, you wanted to send customers to Google after logging out, you could change it to this:

wp_logout_url( 'http://localhost/xampp/wordpress/' )



<<<<<or use below code in function.php for redirect to homepage after when user logout >>>>>>

<?php
add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));
?>


<!---After registering-->

<?php

// Custom redirect for users after logging in

add_filter('woocommerce_registration_redirect', 'bryce_wc_register_redirect');
function bryce_wc_register_redirect( $redirect ) {
     $redirect = 'http://localhost/xampp/wordpress/';
     return $redirect;
}

?>


<!---After clicking ‘return to shop’ on the cart page-->

<?php

// Custom redirect for users after clicking 'return to shop'

add_filter('woocommerce_return_to_shop_redirect', 'bryce_wc_return_to_shop_redirect');
function bryce_wc_return_to_shop_redirect( $redirect ) {
     $redirect = 'http://google.com/';
     return $redirect;
}

?>


<!---After clicking ‘continue shopping’ after adding an item to the cart-->


<?php

// Custom redirect for users after clicking 'return to shop'

add_filter('woocommerce_continue_shopping_redirect', 'bryce_wc_continue_shopping_redirect');
function bryce_wc_continue_shopping_redirect( $redirect ) {
     $redirect = 'http://google.com/';
     return $redirect;
}

?>


<!---After adding an item to the cart-->



<?php

// Custom redirect for users after adding to cart

add_filter('add_to_cart_redirect', 'bryce_wc_add_to_cart_redirect');
function bryce_wc_add_to_cart_redirect( $redirect ) {
     $redirect = 'http://google.com/';
     return $redirect;
}

?>


<!---Change the url of the button Return to shop in the empty cart-->


<?php

function wc_empty_cart_redirect_url(){
	
	return 'http://localhost/xampp/wordpress/';
}

add_filter('woocommerce_return_to_shop_redirect','wc_empty_cart_redirect_url');


?>



================== end =======================


====== Redirect to custom Thanks you page Template When user place order complete ==========

<?php

add_action( 'template_redirect', 'wc_custom_redirect_after_purchase' ); 
function wc_custom_redirect_after_purchase() {
	global $wp;

	if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {
		wp_redirect( 'http://www.yoururl.com/your-page/' );
		exit;
	}
}


?>

====================END==========================



============== Woocommerce Various page url ===================

<!---WooCommerce Shop page URL-->

<a href="<?php echo $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );?>">shop</a>

<!---WooCommerce myaccount page URL-->

<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id'));?>">myaccount</a>

<!---WooCommerce cart page URL-->

<?php global $woocommerce;?>

<a href="<?php echo $cart_url = $woocommerce->cart->get_cart_url();?>">cart</a>

<!---WooCommerce checkout page URL-->

<?php global $woocommerce;?>

<a href="<?php echo $checkout_url = $woocommerce->cart->get_checkout_url();?>">checkout</a>

<!---WooCommerce payment page URL-->

<a href="<?php echo $payment_page = get_permalink( woocommerce_get_page_id( 'pay' ) );?>">payment</a>


=========================== end =============================



============= Woocommerce Currency  =========================

<!---Currency symbol automatic change when user input from backend-->

<?php echo get_woocommerce_currency_symbol();?>

<!--or currency symbol specific------>

<?php echo get_woocommerce_currency_symbol("USD");?>


<!---How to show the Currency Selector widget anywhere --->


At first go to google.com and then search this woocommerce-aelia-currencyswitcher plugin 
after download and install & use this below shortcode for display currency switcher in 
anywhere or if you want to know more info please visit https://aelia.freshdesk.com/

<?php 

 //get with currencies in a dropdown list
 
 echo do_shortcode('[aelia_currency_selector_widget title="My widget title" widget_type="dropdown"]');

?>
 
 <?php 
// Display the widget with currencies as buttons

echo do_shortcode('[aelia_currency_selector_widget title="My widget title" widget_type="buttons"]');

?>






====================== end =========================


============= Woocommerce Prices  =========================

<!---normaly regular price showing use below code------->

<?php echo get_post_meta(get_the_ID(),'_regular_price',true);?>


<!---Automatic Product price with currency display from woocommerce use below code--->


 <div class="price">
	 <?php if ( $price_html = $product->get_price_html() ) : ?>
		<span class="price"><?php echo $price_html; ?></span>
	<?php endif; ?>
 </div>
 
 <!--- or Automatic only product price display according wc currency switcher use below code-->
 
 
 <?php echo $product->get_price(); ?>
 
 
 <!---product instock & outstock display inside product use below code---->
 
 <?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>
 

======================= end=========================


============= Woocommerce Add to cart button text change with function =====

<?php 

// if you want to change your add to cart button text use below function
 
function woo_archive_custom_cart_button_text() {
 
        return __( 'My Button Text', 'woocommerce' );
 
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );   



//Customise ‘add to cart’ text on single product pages


add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );                                
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    

function woo_custom_cart_button_text() {

        return __( 'My Button Text', 'woocommerce' );

}


//Change the ‘add to cart’ text on product archives

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );                        
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text' );   
 
function woo_custom_cart_button_text() {
 
        return __( 'My Button Text', 'woocommerce' );
 
}


 

?>

=================== End ===========================================




====== Remove product showing result count functionality in shop page==========

<?php

function woocommerce_result_count(){
	
	return;
}

?>

====================END==========================


======= woocommerce place order button text change ========


<?php 

add_filter('woocommerce_order_button_text',create_function('','return"make payment";'));

?>

============================END=============================



======== Add a message above the Woocommerce login / register form ======


<?php

add_action( 'woocommerce_before_customer_login_form', 'jk_login_message' );
function jk_login_message() {
    if ( get_option( 'woocommerce_enable_myaccount_registration' ) == 'yes' ) {
	?>
		<div class="woocommerce-info">
			<p><?php _e( 'Returning customers login. New users register for next time so you can:' ); ?></p>
			<ul>
				<li><?php _e( 'View your order history' ); ?></li>
				<li><?php _e( 'Check on your orders' ); ?></li>
				<li><?php _e( 'Edit your addresses' ); ?></li>
				<li><?php _e( 'Change your password' ); ?></li>
			</ul>
		</div>
	<?php
	}
}

?>

=============== END ======================================



====How to add custom fields in user registration on the "My Account" page ====


<?php

//Add new register fields for WooCommerce registration. (step-01)


function wooc_extra_register_fields() {
	?>

	<p class="form-row form-row-first">
	<label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
	</p>

	<p class="form-row form-row-last">
	<label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
	</p>

	<div class="clear"></div>

	<p class="form-row form-row-wide">
	<label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
	</p>
	
	<p class="form-row form-row-wide">
	<label for="reg_billing_company"><?php _e( 'company', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_company" id="reg_billing_company" value="<?php if ( ! empty( $_POST['billing_company'] ) ) esc_attr_e( $_POST['billing_company'] ); ?>" />
	</p>
	

	<?php
}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );


//Validate the extra register fields.(step-02)


function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
	if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
		$validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
		$validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
	}


	if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
		$validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );
	}
	
	
	if ( isset( $_POST['billing_company'] ) && empty( $_POST['billing_company'] ) ) {
		$validation_errors->add( 'billing_company_error', __( '<strong>Error</strong>: company is required!.', 'woocommerce' ) );
	}
	
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );



//Save the extra register fields.(step-03)


function wooc_save_extra_register_fields( $customer_id ) {
	if ( isset( $_POST['billing_first_name'] ) ) {
		// WordPress default first name field.
		update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

		// WooCommerce billing first name.
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}

	if ( isset( $_POST['billing_last_name'] ) ) {
		// WordPress default last name field.
		update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );

		// WooCommerce billing last name.
		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}

	if ( isset( $_POST['billing_phone'] ) ) {
		// WooCommerce billing phone
		update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
	}
	
	
	if ( isset( $_POST['billing_company'] ) ) {
		// WooCommerce billing phone
		update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
	}
	
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );




// Here is the list of all the fields that we can use:

    billing_first_name
    billing_last_name
    billing_company
    billing_address_1
    billing_address_2
    billing_city
    billing_postcode
    billing_country
    billing_state
    billing_email
    billing_phone

Now the registration form looks like:



?>



================= Woocommerce sale flash ===========

<?php 


// How add sale flash or badge label in your custom html theme

//step-01------

function woocommerce_show_product_loop_sale_flash() {
    wc_get_template( 'loop/sale-flash.php' );
  }
  
//step-02(if you want to show sale flash or badge)

<?php echo woocommerce_show_product_loop_sale_flash();?>


//step-03----

<style type="text/css"> 

 span.onsale{background: none repeat scroll 0 0 green;
    border-radius: 50%;
    color: #fff;
    font-weight: bold;
    padding: 18px;
    position: absolute;
    right: 0;
    top: 0;
 }

</style>




//change sale flash text

add_filter( 'woocommerce_sale_flash', 'wc_custom_replace_sale_text' );
function wc_custom_replace_sale_text( $html ) {
    return str_replace( __( 'Sale!', 'woocommerce' ), __( 'My sale text!', 'woocommerce' ), $html );
}

use css
.woocommerce .onsale, .woocommerce-page .onsale { height: 110px; line-height: 200px; }


// or use for sale flash text change

add_filter('woocommerce_sale_flash', 'avia_change_sale_content', 10, 3);
function avia_change_sale_content($content, $post, $product){
$content = '<span class="onsale">'.__( 'Sale custom text!', 'woocommerce' ).'</span>';
return $content;
}



//How to Use a Custom Sales Badge Icon in WooCommerce

add_filter( 'woocommerce_sale_flash', 'my_custom_sales_badge' );
function my_custom_sales_badge() {
	$img = '<span class="onsale"><img src="http://localhost/xampp/wordpress/wp-content/uploads/2016/05/Chrysanthemum1.jpg" /></span>';
	return $img;
}



//Remove "Sale" tag on product image

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );


//Remove "Sale" tag on single product summary

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );




?>



======= How to show Woocommerce Product discount offer percentage on sale flash badge ====


//step-01------ (read this) 
So what I have here is a code snippet to calculate individual product discount and display it in sale bubble. Replace all the codes in following files your theme folder/woocommerce/loop/sale-flash.php and  your theme folder/woocommerce/single-product/sale-flash.php with below code.

//step-02------ (include code on sale-flash.php according to above rule)


<?php
/**
 * Product loop sale flash
 *
 * @author 	Vivek R @ WPSTuffs.com
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product;
?>
<?php if ($product->is_on_sale() && $product->product_type == 'variable') : ?>

	<div class="bubble">
            <div class="inside">
              <div class="inside-text">
              	<?php 
			$available_variations = $product->get_available_variations();								
			$maximumper = 0;
			for ($i = 0; $i < count($available_variations); ++$i) {
				$variation_id=$available_variations[$i]['variation_id'];
				$variable_product1= new WC_Product_Variation( $variation_id );
				$regular_price = $variable_product1 ->regular_price;
				$sales_price = $variable_product1 ->sale_price;
				$percentage= round((( ( $regular_price - $sales_price ) / $regular_price ) * 100),1) ;
					if ($percentage > $maximumper) {
						$maximumper = $percentage;
					}
				}
				echo $price . sprintf( __('%s', 'woocommerce' ), $maximumper . '%' ); ?></div>
            </div>
     </div><!-- end callout -->

<?php elseif($product->is_on_sale() && $product->product_type == 'simple') : ?>
	
	<div class="bubble">
	           <div class="inside">
	             <div class="inside-text">
	             	<?php 
				$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
				echo $price . sprintf( __('%s', 'woocommerce' ), $percentage . '%' ); ?></div>
	           </div>
	    </div><!-- end bubble -->

<?php endif; ?>


//step-03 ----(include css on style.css)

<style type="text/css"> 

	.bubble {
  left: 0px;
  position: absolute;
  text-transform: uppercase;
  top: 20px;
  z-index: 9;
}

.bubble .inside {
  background-color: #e74c3c;
  border-radius: 999px;
  display: table;
  height: 42px;
  position: relative;
  width: 42px;
  -webkit-border-radius: 999px;
}

.bubble .inside .inside-text {
  color: #fff;
  display: table-cell;
  font-size: 14px;
  font-weight: bold;
  line-height: 14px;
  text-align: center;
  vertical-align: middle;
}

</style>



================ END ==========================





================= Woocommerce star rating ===========


// How add star rating in your custom html theme


//step-01------

function woocommerce_template_loop_rating() {
    wc_get_template( 'loop/rating.php' );
  }
  
 
//step-02(if you want to show star rating) 

<?php echo woocommerce_template_loop_rating();?>

//or use below code

<div class="product-rating">
    <?php if ($average = $product->get_average_rating()) : ?>
        <?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'; ?>
    <?php endif; ?>
</div>

//step-03--( use below css)

<style type="text/css"> 

#reviews .comment .star-rating {
    float: none;
    font-size: 1em;
    margin: 0;
    position: absolute;
    top: 2px;
    right: 20px;
}
.star-rating {
    overflow: hidden;
    height: 1em;
    line-height: 1em;
    width: 5.1em;
    font-family: "fontawesome";
}

.star-rating:before {
    content: "\f006\f006\f006\f006\f006";
    float: left;
    top: 284;
    left: 70;
    position: absolute;
    letter-spacing: 0.1em;
    letter-spacing: 0\9;
    color: black;
}

.star-rating span {
    overflow: hidden;
    float: left;
    top: 284;
    left: 70;
    position: absolute;
    padding-top: 1.5em;
}

.star-rating span:before {
    content: "\f005\f005\f005\f005\f005";
    top: 0;
    position: absolute;
    left: 0;
    letter-spacing: 0.1em;
    letter-spacing: 0\9;
    color: red;
}

.star-rating {
    line-height: 1em;
    font-size: 1em;
    font-family: "fontawesome";
}


</style>


=================== END ======================


=========== Styling WooCommerce Themes ==========

function your_theme_woocommerce_scripts() {
  wp_enqueue_style( 'custom-woocommerce-style', get_template_directory_uri() . '/css/custom-woocommerce.css' );
}
add_action( 'wp_enqueue_scripts', 'your_theme_woocommerce_scripts' );


// or use--------------------

function wp_enqueue_woocommerce_style(){
	wp_register_style( 'mytheme-woocommerce', get_template_directory_uri() . '/css/woocommerce.css' );
	
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'mytheme-woocommerce' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );


//or use ---------------------


add_action('wp_enqueue_scripts', 'override_woo_frontend_styles');
function override_woo_frontend_styles(){
    $file_general = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/twentyfifteen/css/custom.css';
    if( file_exists($file_general) ){
        wp_dequeue_style('woocommerce-general');
        wp_enqueue_style('woocommerce-general-custom', get_template_directory_uri() . '/css/custom.css');
    }
}


//or use ----------------------


// Disable WooCommerce's Default Stylesheets
function disable_woocommerce_default_css( $styles ) {

  // Disable the stylesheets below via unset():
  unset( $styles['woocommerce-general'] );  // Styling of buttons, dropdowns, etc.
  // unset( $styles['woocommerce-layout'] );        // Layout for columns, positioning.
  // unset( $styles['woocommerce-smallscreen'] );   // Responsive design for mobile devices.

  return $styles;
}
add_action('woocommerce_enqueue_styles', 'disable_woocommerce_default_css');


//or use ----------------------


// Add a custom stylesheet to replace woocommerce.css
function use_woocommerce_custom_css() {
  // Custom CSS file located in [Theme]/woocommerce/woocommerce.css
  wp_enqueue_style(
      'woocommerce-custom', 
      get_template_directory_uri() . '/woocommerce/woocommerce.css'
  );
}
add_action('wp_enqueue_scripts', 'use_woocommerce_custom_css', 15);



=================== END ======================



========== Woocommerce Product TabS Customize ======== 


//Remove specific (or all) of the product tabs 

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}




//Want to re-order the product tabs?

add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {
 

$tabs['reviews']['priority'] = 5; // Reviews first
$tabs['description']['priority'] = 10; // Description second
$tabs['additional_information']['priority'] = 15; // Additional information third
 

return $tabs;
}




//woocommerce review tab star rating css

<style type="text/css"> 

	.star-rating{float:right;width:80px;height:16px;background:url(images/star.png) repeat-x left 0} 
.star-rating span{background:url(images/star.png) repeat-x left -32px;height:0;padding-top:16px;overflow:hidden;float:left} 
.hreview-aggregate .star-rating{margin:10px 0 0 0} 
#review_form #respond{position:static;margin:0;width:auto;padding:0 0 0;background:transparent none;border:0} 
#review_form #respond:after{content:"";display:block;clear:both} 
#review_form #respond p{margin:0 0 10px} 
#review_form #respond .form-submit input{left:auto} 
#review_form #respond textarea{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;width:100%} 
p.stars:after{content:"";display:block;clear:both} 
p.stars span{width:80px;height:16px;position:relative;float:left;background:url(images/star.png) repeat-x left 0} 
p.stars span a{float:left;position:absolute;left:0;top:0;width:16px;height:0;padding-top:16px;overflow:hidden} 
p.stars span a:hover,p.stars span a:focus{background:url(images/star.png) repeat-x left -16px} 
p.stars span a.active{background:url(images/star.png) repeat-x left -32px} 
p.stars span a.star-1{width:16px;z-index:10} 
p.stars span a.star-2{width:32px;z-index:9} 
p.stars span a.star-3{width:48px;z-index:8} 
p.stars span a.star-4{width:64px;z-index:7} 
p.stars span a.star-5{width:80px;z-index:6}

.star-rating span:before, ul.products li.product .product-details .star-rating:before {
content:none; 
}

</style>


//Show the product description underneath an image

add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 5);



============= END =========================




=========== Don’t want products from a particular category to show on the shop page=====

add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
function custom_pre_get_posts_query( $q ) {
if ( ! $q->is_main_query() ) return;
if ( ! $q->is_post_type_archive() ) return;
if ( ! is_admin() ) {
$q->set( 'tax_query', array(array(
'taxonomy' => 'product_cat',
'field' => 'slug',
'terms' => array( 'PUT YOUR CATEGORY HERE' ), // Don't display products in the membership category on the shop page . For multiple category , separate it with comma.
'operator' => 'NOT IN'
)));
}
remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
}


============================== END ============================




===========Change the number of related products displayed in your shop====

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
woocommerce_related_products(4,2); // Display 4 products in rows of 2
}

============================== END ============================


===========Customise the number of columns and products displayed per page====

// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

============================== END ============================


===========Add a checkbox field to checkout with a simple snippet====


/**
 * Add checkbox field to the checkout
 **/
add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');
 
function my_custom_checkout_field( $checkout ) {
 
    echo '<div id="my-new-field"><h3>'.__('My Checkbox: ').'</h3>';
 
    woocommerce_form_field( 'my_checkbox', array(
        'type'          => 'checkbox',
        'class'         => array('input-checkbox'),
        'label'         => __('I have read and agreed.'),
        'required'  => true,
        ), $checkout->get_value( 'my_checkbox' ));
 
    echo '</div>';
}


============================== END ============================

/**
 * Add checkbox field to the checkout
 **/
add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');
 
function my_custom_checkout_field( $checkout ) {
 
    echo '<div id="my-new-field"><h3>'.__('My Checkbox: ').'</h3>';
 
    woocommerce_form_field( 'my_checkbox', array(
        'type'          => 'checkbox',
        'class'         => array('input-checkbox'),
        'label'         => __('I have read and agreed.'),
        'required'  => true,
        ), $checkout->get_value( 'my_checkbox' ));
 
    echo '</div>';
}



/**
 * Process the checkout
 **/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
 
function my_custom_checkout_field_process() {
    global $woocommerce;
 
    // Check if set, if its not set add an error.
    if (!$_POST['my_checkbox'])
         $woocommerce->add_error( __('Please agree to my checkbox.') );
}
 
/**
 * Update the order meta with field value
 **/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');
 
function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['my_checkbox']) update_post_meta( $order_id, 'My Checkbox', esc_attr($_POST['my_checkbox']));
}


============================== END ============================




===================== Woocommerce Coupon ==== ===========

// hide coupon form everywhere

function hide_coupon_field( $enabled ) {
	if ( is_cart() || is_checkout() ) {
		$enabled = false;
	}
	
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field' );


// rename the coupon field on the cart page

function woocommerce_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
	// bail if not modifying frontend woocommerce text
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ( 'Apply Coupon' === $text ) {
		$translated_text = 'Apply Promo Code';
	}
	return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );


============================== END ============================




===== how to display woocommerce cart contents/total=============



<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>


============================== END ============================



===========Replace the add to cart button on product archive 
(shop) page with a button that links to each product page=======


/*STEP 1 - REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */

function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');



/*STEP 2 -ADD NEW BUTTON THAT LINKS TO PRODUCT PAGE FOR EACH PRODUCT */

add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
global $product;
$link = $product->get_permalink();
echo do_shortcode('<a href="' . esc_attr($link) . '">Read more</a>');
}


<!---or use below code in function.php---->

// change read more button for out of stock items to read contack us

		if(!function_exists('woocommerce_template_loop_add_to_cart')){
			
			function woocommerce_template_loop_add_to_cart() {
				global $product;
				
				if(!$product ->is_in_stock()){
					
					echo '<a href="'.get_permalink().'" rel="nofollow" class="outstock_button">contack us</a>';
				}
				else
				{
					woocommerce_get_template('loop/add-to-cart.php');
				}
			}
		}


============================== END ============================



=========== Customise the ‘Home’ text to say whatever you’d like====


add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_home_text' );

function jk_change_breadcrumb_home_text( $defaults ) {

// Change the breadcrumb home text from 'Home' to 'Appartment'

$defaults['home'] = 'Appartment';

return $defaults;

}

============================== END ============================



========== Woocommerce breadcrumb ===============


//Change the Home link to a different URL

add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );

function woo_custom_breadrumb_home_url() {

return 'http://woothemes.com';

}

//Remove woocommerce breadcrumb 

add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


============================== END ============================


========== Woocommerce Pagination ===============


//Replace WooCommerce Default Pagination with WP-PageNavi Pagination

remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);

function woocommerce_pagination() {

wp_pagenavi();

}

add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

============================== END ====================================



========== simply unhook WooCommerce Emails Notification ===============



function unhook_those_pesky_emails( $email_class ) {

		/**
		 * Hooks for sending emails during store events
		 **/
		remove_action( 'woocommerce_low_stock_notification', array( $email_class, 'low_stock' ) );
		remove_action( 'woocommerce_no_stock_notification', array( $email_class, 'no_stock' ) );
		remove_action( 'woocommerce_product_on_backorder_notification', array( $email_class, 'backorder' ) );
		
		// New order emails
		remove_action( 'woocommerce_order_status_pending_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_pending_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_pending_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_failed_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_failed_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_failed_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		
		// Processing order emails
		remove_action( 'woocommerce_order_status_pending_to_processing_notification', array( $email_class->emails['WC_Email_Customer_Processing_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_pending_to_on-hold_notification', array( $email_class->emails['WC_Email_Customer_Processing_Order'], 'trigger' ) );
		
		// Completed order emails
		remove_action( 'woocommerce_order_status_completed_notification', array( $email_class->emails['WC_Email_Customer_Completed_Order'], 'trigger' ) );
			
		// Note emails
		remove_action( 'woocommerce_new_customer_note_notification', array( $email_class->emails['WC_Email_Customer_Note'], 'trigger' ) );
}


add_action( 'woocommerce_email', 'unhook_those_pesky_emails' );


============================== END ====================================


======== Woocommerce out of stock text change =============



 add_filter('woocommerce_get_availability', 'availability_filter_func');

function availability_filter_func($availability)

{

$availability['availability'] = str_ireplace('Out of stock', 'Sold', $availability['availability']);

return $availability;

}

============================== END ========================




============Add in your own alternative “from” email address============

function woo_custom_wp_mail_from() {

global $woocommerce;

return html_entity_decode( 'your@email.com' );

}

add_filter( 'wp_mail_from', 'woo_custom_wp_mail_from', 99 );


============================== END ========================




============Replace default paypal logo with your own chosen image============

/**
 * Custom icon for PayPal payment option on WooCommerce checkout page.
 */
function isa_extended_paypal_icon() {
        // picture of accepted credit card icons for PayPal payments
    return get_bloginfo('template_directory').'/images/paypal-payments.jpg';
}
add_filter( 'woocommerce_paypal_icon', 'isa_extended_paypal_icon' );



============================== END ========================




============Change woocommerce widget title============

/*

* Change widget title

*/

add_filter( 'widget_title', 'woo_widget_title', 10, 3);

function woo_widget_title( $title, $instance, $id_base ) {

if( 'onsale' == $id_base) {

return "My new title";

}

}

============================== END ========================


============Add a background image to the shop page only============


add_filter( 'wp_head', 'wo_custom_shop_background' );
function wo_custom_shop_background() {
 if( is_shop() && !is_admin() ) {
 ?>
 <style>
 body {
 background: url(http://localhost/xampp/wordpress/wp-content/uploads/2016/05/Hydrangeas.jpg) no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
 }
 </style>
 <?php
 }
}


============================== END ========================





============Removes woocommerce related products============


/***
 * Removes related products
 */
function wc_remove_related_products( $args ) {
  return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);

============================== END ========================






============ Add to Cart button Align in shop page============


// Add to Cart button Align in shop page

<style type="text/css"> 

	.archive #main ul li a h3 {
  min-height: 50px;
}

</style>

============================== END ========================




============ Product Alignment in shop page ============


// Product Alignment in shop page 

<style type="text/css"> 

	.woocommerce ul.products li.product:nth-child(4n+1) {
    clear: both;
}

</style>

============================== END ========================



============ How to Change the Shop archive page title ============

/**
 * Change the Shop archive page title.
 * @param  string $title
 * @return string
 */
function wc_custom_shop_archive_title( $title ) {
    if ( is_shop() ) {
        return str_replace( __( 'Products', 'woocommerce' ), 'My title', $title );
    }

    return $title;
}
add_filter( 'wp_title', 'wc_custom_shop_archive_title' );

============================== END ========================




============ How to Change the description tab title &tab heading ============

// Change the description tab title to product name
add_filter( 'woocommerce_product_tabs', 'wc_change_product_description_tab_title', 10, 1 );
function wc_change_product_description_tab_title( $tabs ) {
  global $post;
	if ( isset( $tabs['description']['title'] ) )
		$tabs['description']['title'] = $post->post_title;
	return $tabs;
}
// Change the description tab heading to product name
add_filter( 'woocommerce_product_description_heading', 'wc_change_product_description_tab_heading', 10, 1 );
function wc_change_product_description_tab_heading( $title ) {
	global $post;
	return $post->post_title;
}


============================== END ========================


============ How to Change the description tab title &tab heading ============

// Change the description tab title to product name
add_filter( 'woocommerce_product_tabs', 'wc_change_product_description_tab_title', 10, 1 );
function wc_change_product_description_tab_title( $tabs ) {
  global $post;
	if ( isset( $tabs['description']['title'] ) )
		$tabs['description']['title'] = $post->post_title;
	return $tabs;
}
// Change the description tab heading to product name
add_filter( 'woocommerce_product_description_heading', 'wc_change_product_description_tab_heading', 10, 1 );
function wc_change_product_description_tab_heading( $title ) {
	global $post;
	return $post->post_title;
}


============================== END ========================


============ Hide loop read more buttons for out of stock items ============


if (!function_exists('woocommerce_template_loop_add_to_cart')) {
	function woocommerce_template_loop_add_to_cart() {
	global $product;
	if (!$product->is_in_stock()) return;
	woocommerce_get_template('loop/add-to-cart.php');
	}
	}


============================== END ========================




============ How to add Custom tracking code for the thanks page ============


add_action( 'woocommerce_thankyou', 'my_custom_tracking' );
	
	function my_custom_tracking( $order_id ) {
	
	// Lets grab the order
	$order = wc_get_order( $order_id );
	
	/**
	* Put your tracking code here
	* You can get the order total etc e.g. $order->get_order_total();
	**/
	
	}


============================== END ========================




============ Add Quantity field inside add to cart button in woo shop page or others page ============


// Add Quantity field inside add to cart button

add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
	
	function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
	$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
	$html .= woocommerce_quantity_input( array(), $product, false );
	$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
	$html .= '</form>';
	}
	return $html;
	}


============================== END ========================
<?php
/**
* Add quantity field on the archive page.
*/
function custom_quantity_field_archive() {
$product = wc_get_product( get_the_ID() );
if ( ! $product->is_sold_individually() && 'variable' != $product->product_type && $product->is_purchasable() ) {
woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
}
}
add_action( 'woocommerce_after_shop_loop_item', 'custom_quantity_field_archive', 0, 9 );
/**
* Add requires JavaScript.
*/
function custom_add_to_cart_quantity_handler() {
wc_enqueue_js( '
jQuery( ".post-type-archive-product" ).on( "click", ".quantity input", function() {
return false;
});
jQuery( ".post-type-archive-product" ).on( "change input", ".quantity .qty", function() {
var add_to_cart_button = jQuery( this ).parents( ".product" ).find( ".add_to_cart_button" );
// For AJAX add-to-cart actions
add_to_cart_button.data( "quantity", jQuery( this ).val() );
// For non-AJAX add-to-cart actions
add_to_cart_button.attr( "href", "?add-to-cart=" + add_to_cart_button.attr( "data-product_id" ) + "&quantity=" + jQuery( this ).val() );
});
' );
}
add_action( 'init', 'custom_add_to_cart_quantity_handler' );


============  ============




============================== END ========================
// remove default sorting dropdown
 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


============ query ============


<?php  
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
<        'product_cat'    => 'hoodies'
    );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.get_the_title().'</a>';
    endwhile;

    wp_reset_query();


?>





============================== END ========================



============ quantity field ============

<?php 

//quantity field

https://stackoverflow.com/questions/26507890/how-to-add-quantity-field-and-add-to-cart-button-in-a-custom-template


//category sub category


https://code.tutsplus.com/tutorials/display-woocommerce-categories-subcategories-and-products-in-separate-lists--cms-25479


//related product


https://stackoverflow.com/questions/40603459/display-woocommerce-related-products-under-product-gallery


https://stackoverflow.com/questions/26316952/woocommerce-only-show-related-products-from-same-subcategory



============================== END ========================



============ condition wise category page display in loop ============

<?php if (is_category('Category A')) : ?>
<p>This is the text to describe category A</p>
<?php elseif (is_category('Category B')) : ?>
<p>This is the text to describe category B</p>
<?php else : ?>
<p>This is some generic text to describe all other category pages, 
I could be left blank</p>
<?php endif; ?>



============================== END ========================



============  condition wise woocommece sidebar display  ============

	<div class="row">
				
				

				
				
				
				
				<?php 
				if ( is_single() ) {?>
					
					
				
					<div class="col-md-12 col-xs-12 col-sm-12">
						
								
						<?php woocommerce_content(); ?>	 		
								
					</div>
					
					
					
					
					
				<?php }else {?>
				
				
				<div class="col-md-3 col-xs-12 col-sm-4">
					
						<div class="left-sidebar3" id="left-sidebarmanu">
							<h4 class="left-sidebarmanutitle">SHOP BY CATAGORY</h4>
							<div class="is-divider small"></div>
							<div class="panel-group category-products" id="accordian"><!--category-productsr-->
								<div class="panel panel-default">
									
									
									
									<div id="" class="">
										<div class="panel-body">
										
										<?php
						$args = array(
									  'taxonomy' => 'product_cat',
									  'hide_empty' => false,
									  'parent'   => 0
								  );
							  $product_cat = get_terms( $args );

							  foreach ($product_cat as $parent_product_cat)
							  {

							  echo '
								  <ul>
									<li><a href="'.get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'('.$parent_product_cat->count.')<i class="fa fa-angle-right"></i></a>
									<ul class=" dropdown-menu">
									  ';
							  $child_args = array(
										  'taxonomy' => 'product_cat',
										  'hide_empty' => false,
										  'parent'   => $parent_product_cat->term_id
									  );
							  $child_product_cats = get_terms( $child_args );
							  foreach ($child_product_cats as $child_product_cat)
							  {
								echo '<li><a href="'.get_term_link($child_product_cat->term_id).'">'.$child_product_cat->name.'('.$child_product_cat->count.')<i class="fa fa-angle-right"></i></a></li>';
							  }

							  echo '</ul>
								  </li>
								</ul>';
							  }
						?>
										
										
											
											
											
										</div>
									</div>
									
									
									
									
									
									
								</div>
							</div><!--/category-productsr-->
						
								
							
						</div>
						
						
						
						
					</div>
					<div class="col-md-9 col-xs-12 col-sm-9">
						
								
						<?php woocommerce_content(); ?>	 		
								
					</div>
				
				
				
				
				
				
    
<?php }
?>
				
				
		
				

				
				</div>


============================== END ========================



============ woocommerce user login ============

<?php if ( is_user_logged_in() ) { ?>
 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
 <?php } 
 else { ?>
 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
 <?php } ?>

Or

$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
if ( $myaccount_page_id ) {
  $myaccount_page_url = get_permalink( $myaccount_page_id );
}



//-----------raw code (dynamic )-------------//


<?php if ( is_user_logged_in() ) { ?>
										<!-- dropdown container -->
<div class="dropdown">

    <!-- trigger button -->
    <button>My Account <i class="fa fa-user"></i></button>

    <!-- dropdown menu -->
    <ul class="dropdown-menu">
        <li><a href="http://saveasave.com/my-account/">Dashboard</a></li>
        <li><a href="http://saveasave.com/my-account/orders/">Orders</a></li>
        <li><a href="http://saveasave.com/my-account/downloads/">Download</a></li>
        <li><a href="http://saveasave.com/my-account/edit-address/">Addresses</a></li>
        <li><a href="http://saveasave.com/wishlist/">wishlist</a></li>
        <li><a href="http://saveasave.com/my-account/edit-account/">Account details</a></li>
        <li><a href="http://saveasave.com/my-account/customer-logout/">Logout</a></li>
    </ul>
</div>
										 <?php } 
									 else { ?>
										<a style=" border: 2px solid #ffd700;color: black;font-weight: 300; margin-left: -36px;padding: 9px;" class="loginstyle" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
									 <?php } ?>
								</li>
								<li class="header-divider"></li>
								<li class="cart-item has-icon has-dropdown">
									<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="Cart" class="header-cart-link is-small">
										<span class="header-cart-title">
										   Cart   /<span class="Price-currencySymbol"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
										</span>
										<span class="cart-icon image-icon">
											<strong><?php echo sprintf(_n('%d ', '%d ', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?></strong>
										</span>					
									</a>
									
									
									 <ul class="nav-dropdown nav-dropdown-simple">
									<li class="html widget_shopping_cart">
									  <div class="widget_shopping_cart_content">
									<p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
									  </div>
									</li>
									 </ul>
														
																	
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		


============================== END ========================




============ conditions wise page display  ============

<?php if (is_page('wholesale')) {
	echo '<li class="wholesale"><a href="http://saveasave.com/retails-store/">Retails Store</a></li>';
 }elseif(is_page('retails-store')){
	 echo '<li class="wholesale"><a href="http://saveasave.com/wholesale/">wholesale shop</a></li>';
}else{
	
	 echo '<li class="wholesale"><a href="http://saveasave.com/wholesale/">wholesale shop</a></li>';
} ?>



============================== END ========================



============  ============




============================== END ========================




============  ============




============================== END ========================




============  ============




============================== END ========================






















































































