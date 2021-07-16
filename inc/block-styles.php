<?php
/**
 * Block Styles
 */



// Buttons
add_action('init', function() {
	register_block_style('core/button', [
		'name' => 'button-primary',
		'label' => __('Primary button', 'generatepress'),
	]);
});

add_action('init', function() {
	register_block_style('core/button', [
		'name' => 'button-secondary',
		'label' => __('Secondary button', 'generatepress'),
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
		'name' => 'button-underline-primary',
		'label' => __('Underline Button - Primary', 'generatepress'),
	]);
});

add_action('init', function() {
	register_block_style('core/button', [
		'name' => 'button-underline-secondary',
		'label' => __('Underline Button - secondary', 'generatepress'),
	]);
});


// Gallery

add_action('init', function() {
	register_block_style('core/gallery', [
		'name' => 'gallery-1lg-2sm',
		'label' => __('1 large landscape image and 2 landscape to the side', 'generatepress'),
	]);
});

add_action('init', function() {
	register_block_style('core/gallery', [
		'name' => 'gallery-1lg-portrait-left-2sm',
		'label' => __('1 large portrait image left and 2 landscape to the side', 'generatepress'),
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

//  Quotes

add_action('init', function() {
	register_block_style('core/quote', [
		'name' => 'quotation-marks',
		'label' => __('Quote with Quotation marks', 'generatepress'),
	]);
});


add_action('init', function() {
	register_block_style('core/pullquote', [
		'name' => 'primary-pullquote',
		'label' => __('Primary color pullquote', 'generatepress'),
	]);
});
