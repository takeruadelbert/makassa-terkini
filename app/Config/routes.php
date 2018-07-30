<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
// header-1 area
Router::connect('/login-register', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'login_register'));
Router::connect('/lupa-password', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'lupa_password'));
Router::connect('/reset-password/:token', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'reset_password'), ["pass" => ["token"]]);
Router::connect('/stop-subscribe/:id', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'stop_subscribe_newsletter'), ["pass" => ["id"]]);

// header-2 area
Router::connect('/', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'homex'));
Router::connect('/kategori/:kategori', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'kategori'), ["pass" => ["kategori"]]);
Router::connect('/berita/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_news'), ["pass" => [ "id", "judul"]]);
Router::connect('/video/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_news'), ["pass" => [ "id", "judul"]]);
Router::connect('/foto/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_photo_news'), ["pass" => [ "id", "judul"]]);
Router::connect('/event/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_event'), ["pass" => [ "id", "judul"]]);
Router::connect('/indeks', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'indeks'));
Router::connect('/citizen-report', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'citizen_report'));
Router::connect('/citizen-report/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_citizen_report'), ["pass" => ["id", "judul"]]);
Router::connect('/citizen-report-foto/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_citizen_report_photo_news'), ["pass" => ["id", "judul"]]);
Router::connect('/logout', array('front' => true, 'controller' => 'users', 'action' => 'logout_member'));
Router::connect('/newsletter/:id', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'newsletter'), ['pass' => ['id']]);
Router::connect('/berita-terkini', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'recent_news'));
Router::connect('/berita-populer', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'popular_news'));
Router::connect('/berita-rekomendasi', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'recommended_news'));
Router::connect('/foto-populer', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'popular_photo'));
Router::connect('/video-populer', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'popular_video'));
Router::connect('/event-terkini', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'recent_event'));
Router::connect('/semua-citizen-report', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'all_citizen_report'));
Router::connect('/semua-berita-kategori', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'all_news_category'));
Router::connect('/kategori/:kategori/lihat-semua', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'semua_kategori'), ["pass" => ["kategori"]]);
Router::connect('/galeri-foto', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'gallery_photo'));
Router::connect('/galeri-foto/lihat-semua', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'semua_galeri_foto'));
Router::connect('/galeri-video', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'gallery_video'));
Router::connect('/galeri-video/lihat-semua', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'semua_galeri_video'));

// footer-1 area
Router::connect('/event', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'event'));

// footer-2 area
Router::connect('/kontak', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'kontak'));
Router::connect('/disklaimer', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'disclaimer'));
Router::connect('/tentang_kami', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'tentang_kami'));
Router::connect('/privacy_policy', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'privacy_policy'));
Router::connect('/pedoman', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'pedoman'));

// Social Media
Router::connect('/profile_member', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'profile_member'));
Router::connect('/social_login/*', array('controller' => 'users', 'action' => 'social_login'));
Router::connect('/social_endpoint/*', array('controller' => 'users', 'action' => 'social_endpoint'));

Router::connect('/m/social_login/*', array('mobile' => true, 'controller' => 'users', 'action' => 'social_login'));
Router::connect('/m/social_endpoint/*', array('mobile' => true, 'controller' => 'users', 'action' => 'social_endpoint'));

// Mobile Version
Router::connect('/m', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'home'));
Router::connect('/m/index', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'home'));
Router::connect('/m/home', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'home'));
Router::connect('/m/berita/:id/:judul', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_news'), ["pass" => [ "id", "judul"]]);
Router::connect('/m/foto/:id/:judul', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_photo_news'), ["pass" => [ "id", "judul"]]);
Router::connect('/m/video/:id/:judul', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_video_news'), ["pass" => [ "id", "judul"]]);
Router::connect('/m/citizen-report', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'citizen_report'));
Router::connect('/m/citizen-report/:id/:judul', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_citizen_report'), ["pass" => [ "id", "judul"]]);
Router::connect('/m/login', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'login'));
Router::connect('/m/forgot-password', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'forgot_password'));
Router::connect('/m/register', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'register'));
Router::connect('/m/profile', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'profile'));
Router::connect('/m/logout', array('mobile' => true, 'controller' => 'users', 'action' => 'logout_member'));
Router::connect('/m/reset-password/:token', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'reset_password'), ["pass" => ["token"]]);
Router::connect('/m/kontak', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'contact'));
Router::connect('/m/kategori/:kategori', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'category'), ["pass" => ["kategori"]]);
Router::connect('/m/event', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'event'));
Router::connect('/m/event/:id/:judul', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_event'), ["pass" => [ "id", "judul"]]);
Router::connect('/m/search', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'search'));
Router::connect('/m/galeri-foto', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'gallery_photo'));
Router::connect('/m/galeri-video', array('mobile' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'gallery_video'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

//=======================================================================================================
//front end
//pqp
Router::connect('/search', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'search'));
Router::connect('/event_search', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'event_search'));

//member-area
Router::connect('/profil', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'profil'));
Router::connect('/member/logout', array('controller' => 'accounts', 'action' => 'logout_member'));

//Router::connect('/:lang/:page', array('front' => true, 'controller' => 'fronts', 'action' => 'display'), array("pass" => array('lang', 'page'), "lang" => "[A-Z]{2}"));
//=======================================================================================================
//admin area
Router::connect('/admin/change-password', array('admin' => true, 'controller' => 'accounts', 'action' => 'change_password'));
Router::connect('/admin', array('controller' => 'accounts', 'action' => 'login_admin'));
Router::connect('/admin/lupa-password', array('controller' => 'accounts', 'action' => 'lupa_password_admin'));
Router::connect('/admin/dashboard', array('admin' => true, 'controller' => 'accounts', 'action' => 'dashboard'));
Router::connect('/admin/logout', array('controller' => 'accounts', 'action' => 'logout_admin'));
Router::connect('/reset-password-admin/*', array('controller' => 'accounts', 'action' => 'ganti_password_admin'));

//index
Router::connect('/module/*', array('admin' => true, 'controller' => 'modules', 'action' => 'index'));
Router::connect('/module-content/*', array('admin' => true, 'controller' => 'module_contents', 'action' => 'index'));
Router::connect('/account/*', array('admin' => true, 'controller' => 'accounts', 'action' => 'index'));

//add
Router::connect('/module-add', array('admin' => true, 'controller' => 'modules', 'action' => 'add'));
Router::connect('/module-content-add', array('admin' => true, 'controller' => 'module_contents', 'action' => 'add'));
Router::connect('/account-add', array('admin' => true, 'controller' => 'accounts', 'action' => 'add'));

//edit
Router::connect('/module-edit/*', array('admin' => true, 'controller' => 'modules', 'action' => 'edit'));
Router::connect('/module-content-edit/*', array('admin' => true, 'controller' => 'module_contents', 'action' => 'edit'));
Router::connect('/account-edit/*', array('admin' => true, 'controller' => 'accounts', 'action' => 'edit'));

//Report
Router::connect('/report-product/*', array('admin' => true, 'controller' => 'products', 'action' => 'report'));
Router::connect('/report-payment-confirmation/*', array('admin' => true, 'controller' => 'payment_confirmations', 'action' => 'report'));
Router::connect('/report-shipping/*', array('admin' => true, 'controller' => 'orders', 'action' => 'report_shipping'));
Router::connect('/report-order/*', array('admin' => true, 'controller' => 'orders', 'action' => 'report_order'));

Router::connect("/admin/restriction", array("admin" => true, "controller" => "accounts", "action" => "restriction"));

//Setting
Router::connect('/setting', array('admin' => true, 'controller' => 'company_profiles', 'action' => 'edit', '1'));

Router::connect('/sample', array('controller' => 'modules', 'action' => 'sample'));

//detail

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
