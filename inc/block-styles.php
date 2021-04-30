<?php
/**
 * Block Styles
 */



// Buttons
add_action('init', function() {
	register_block_style('core/button', [
		'name' => 'button-highlight',
		'label' => __('Highlight button', 'generatepress'),
	]);
});

add_action('init', function() {
	register_block_style('core/button', [
		'name' => 'button-light',
		'label' => __('Lighter Button - Dark gray Hover', 'generatepress'),
	]);
});

add_action('init', function() {
	register_block_style('core/button', [
		'name' => 'button-simple',
		'label' => __('Simple Button - Without background', 'generatepress'),
	]);
});

// Gallery

add_action('init', function() {
	register_block_style('core/gallery', [
		'name' => 'gallery-1lg-2sm',
		'label' => __('Gallery with 1 large image and 2 to the side', 'generatepress'),
	]);
});

add_action('init', function() {
	register_block_style('core/gallery', [
		'name' => 'gallery-scroll',
		'label' => __('Gallery full width with scroll overflow', 'generatepress'),
	]);
});

// Images

add_action('init', function() {
	register_block_style('core/image', [
		'name' => 'image-cover',
		'label' => __('Image 100% height - Object fit: cover', 'generatepress'),
	]);
});

// Block Quotes

add_action('init', function() {
	register_block_style('core/quote', [
		'name' => 'quotation-marks',
		'label' => __('Quote with Quotation marks', 'generatepress'),
	]);
});
