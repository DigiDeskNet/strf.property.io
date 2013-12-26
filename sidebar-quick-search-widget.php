<?php 
//hook into blueprints search wiget
add_filter('pls_widget_quick_search_context', 'columbus_custom_side_search_widget_context');

// set the context so we can modify the search widget without collisions 
function columbus_custom_side_search_widget_context () {
	return 'columbus_search_widget';
}


add_filter('pls_listings_search_form_outer_columbus_search_widget', 'custom_side_search_widget_html', 10, 5);

function custom_side_search_widget_html ($form, $form_html, $form_options, $section_title, $form_data) {
	ob_start();
	?>

<section id="search-widget">
	<div class="widget-inner">

		<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>listings" id="simple-search">
			<div class="col-01">
				<label>City</label>
				<?php echo $form_html['cities']; ?>
        <div id="min_price_container">
          <label>Price from</label>
          <?php echo $form_html['min_price']; ?>
        </div>
				<label>Bedrooms</label>
				<?php echo $form_html['bedrooms']; ?>
			</div><!--COL-01-->

			<div class="col-02">
				<div id="purchase_type_container">
				  <label>Rent/Buy</label>
				  <?php echo $form_html['purchase_types'] ?>
				</div>
				<div id="max_price_container">
				  <label>Price to</label>
				  <?php echo $form_html['max_price']; ?>
			  </div>
				<label>Bathrooms</label>
				<?php echo $form_html['bathrooms']; ?>
			</div><!--COL-02-->

			<div class="clearfix"></div>

			<input type="submit" id="search" name="submit" Value="SEARCH NOW" class="button b-blue" />

			<div class="clearfix"></div>
		</form>
		<div style="display:none" id="rental_max_options">
		  	<?php echo $form_html['max_price_rental'] ?>
		</div>
		<div style="display:none" id="sale_max_options">
			<?php echo $form_html['max_price'] ?>
		</div>
		<div style="display:none" id="rental_min_options">
		  	<?php echo $form_html['min_price_rental'] ?>
		</div>
		<div style="display:none" id="sale_min_options">
			<?php echo $form_html['min_price'] ?>
		</div>

	</div><!--widget-inner-->
</section><!--SEARCH-->


	<?php
	return trim(ob_get_clean());

}
