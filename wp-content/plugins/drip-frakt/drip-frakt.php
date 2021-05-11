<?php
/*
Plugin Name: Drip Cykelbud
Description: Ett cykelbud som ba drippar med smycken cyklar hem till dig med din beställning 
*/
if (!defined('ABSPATH')) {
	exit;
}
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

	function your_shipping_method_init()
	{
		if (!class_exists('WC_Your_Shipping_Method')) {
			class WC_Your_Shipping_Method extends WC_Shipping_Method
			{
				/**
				 * Constructor for your shipping class
				 *
				 * @access public
				 * @return void
				 */
				public function __construct()
				{
					$this->id                 = 'your_shipping_method';
					$this->method_title       = __('Bicycle courier');
					$this->method_description = __(
						'<p>If your carts total weight is over 5 kilos the 
						bicycle courier cost is 150 kr</p>'
					);
					$this->enabled            = "yes";
					$this->title              = "Bicycle courier";
					$this->init();
					$this->init_settings();
					$this->cost = $this->settings['option_name'];
					add_action('woocommerce_update_options_shipping_methods', array(&$this, 'process_admin_options'));
				}
				/**
				 * Init your settings
				 *
				 * @access public
				 * @return void
				 */
				function init(){
					// Load the settings API
					$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
					$this->init_settings(); // This is part of the settings API. Loads settings you previously init.
					// Save settings in admin if you have any defined
					add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
				}
				/**
				 * Initialise Gateway Settings Form Fields
				 */
				public function init_form_fields(){
					$this->form_fields = array(
						'option_name' => array(
							'title' => 'Choose cost for when cart-weight is under 5 kg',
							'description' => '',
							'type' => 'select',
							'default' => '500',
							'class' => 'Class for the input',
							'css' => 'CSS rules added line to the input',
							'label' => 'Label',
							'options' => array(
								'50' => '50',
								'75' => '75',
								'100' => '100',
							)
						),
					);
				} // End init_form_fields()
				function admin_options(){
					?>
					<h2><?php _e('Drip Bicycle Courier', 'woocommerce'); ?></h2>
					<table class="form-table">
						<?php $this->generate_settings_html(); ?>
					</table> <?php
							}

							/**
							 * calculate_shipping function.
							 *
							 * @access public
							 * @param mixed $package
							 * @return void
							 */
							/* function that checks if distance is to far for cykelbud, kostar 2000 om det ej är någon av följande postkoder */
							public function distance_calculation(){
								$current_user = wp_get_current_user();
								$shipping_postcode = get_user_meta( $current_user->ID, 'shipping_postcode', true );
								if($shipping_postcode == '41664' || $shipping_postcode == '25220' || $shipping_postcode == '11121'){

									return false;
								}else{
									return true;
								}
							}

							public function calculate_shipping($package = array()){

								$cost = $this->cost;
								$list_quantity = [];
								$tofaraway = $this->distance_calculation();

								global $woocommerce;
								$items = $woocommerce->cart->get_cart();

								foreach ($items as $item => $values) {
									$quantity = $values['quantity'];
									$weight = (float) $values['data']->get_weight();

									$tolist = $quantity * $weight;
									array_push($list_quantity, $tolist);
								}
								$total_quantity = array_sum($list_quantity);

								if ($total_quantity > 5) {
									$cost = '150';
								}
								if ($tofaraway) {
									$cost = '2000';
								}

								$rate = array(
									'id' => $this->id,
									'label' => $this->title,
									'cost' => $cost,
									'calc_tax' => 'per_item'
								);

								// Register the rate
								$this->add_rate($rate);
							}
						}
					}
				}

				add_action('woocommerce_shipping_init', 'your_shipping_method_init');

				function add_your_shipping_method($methods)
				{
					$methods['your_shipping_method'] = 'WC_Your_Shipping_Method';
					return $methods;
				}

				add_filter('woocommerce_shipping_methods', 'add_your_shipping_method');
			}
