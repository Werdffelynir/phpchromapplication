<?php

use Pa\Pa;

/**
 * 
 */
Pa::routeNotFound(function () {
	die(Pa::render('views/404.php'));
});


/**
 * 
 */
Pa::route('/', function () {
	// 
	Pa::set('page', Pa::render('views/page.php'));
});


/**
 * 
 */
Pa::route('/login', function () {
	Pa::set('page', Pa::render('views/login.php'));
	// die('for JSON');
});


/**
 * 
 */
Pa::route('/status', function () {
	// Pa::redirect('/login');
	Pa::set('page', "Page @ STATUS = OK!");
});


/**
 * 
 */
Pa::route('/exit', function () {
	Pa::app_close();
});


/**
 * 
 */
Pa::route('/cataloge/id:n', function ($id) {
	Pa::set('page', "Page @ {$id} ...");
});


/**
 * 
 */
Pa::route('/cataloge/category:s/id:n', function ($category, $id) {
	Pa::set('page', "Page cataloge @ category {$category} {$id}");
});

