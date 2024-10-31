<?php
/*
	Plugin Name: Oceanpayment Konbini Gateway
	Plugin URI: http://www.oceanpayment.com/
	Description: WooCommerce Oceanpayment Konbini Gateway.
	Version: 6.0
	Author: Oceanpayment
	Requires at least: 4.0
	Tested up to: 6.1
    Text Domain: oceanpayment-konbini-gateway
*/


/**
 * Plugin updates
 */

load_plugin_textdomain( 'wc_konbini', false, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) );

add_action( 'plugins_loaded', 'woocommerce_konbini_init', 0 );

/**
 * Initialize the gateway.
 *
 * @since 1.0
 */
function woocommerce_konbini_init() {

	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;

	require_once( plugin_basename( 'class-wc-konbini.php' ) );

	add_filter('woocommerce_payment_gateways', 'woocommerce_konbini_add_gateway' );

} 

/**
 * Add the gateway to WooCommerce
 *
 * @since 1.0
 */
function woocommerce_konbini_add_gateway( $methods ) {
	$methods[] = 'WC_Gateway_Konbini';
	return $methods;
} 