<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require('../vendor/autoload.php');

new Aoloe\Debug();

$site_structure = file_get_contents('content/structure.yaml');
$site_structure = Spyc::YAMLLoadString($site_structure);
// Aoloe\debug('site_structure', $site_structure);

$site = new Aoloe\Site();

$route = new Aoloe\Route();

$route->set_structure($site_structure);

$route->read_url_request();

// Aoloe\debug('get_url_structure()', $route->get_url_structure(''));
if ($route->get_url_structure() == '') {
    $page = $route->get_page_from_structure('home');
} else {
    $page = $route->get_page_from_structure();
}
$page_query = $route->get_query();

$module = new Aoloe\Module();
$module->set_page($page);
$module->set_page_url($route->get_url_structure());
$module->set_parameter($page_query);
$module->set_site($site);
$content_page = $module->get_rendered();

if (isset($content_page)) {
    $template = new Aoloe\Template();

    include_once('library/Navigation.php');
    $navigation = new Navigation();
    $content_navigation = $navigation->get_rendered($site_structure, $route->get_url_structure());
    // Aoloe\debug('content_navigation', $content_navigation);

    $site->add_css('css/reset.css');
    $site->add_css('css/style.css'); // from lingulo
    $site->add_css('css/bc-oberurdorf.css'); // move the lingulo styles into this
    $site->add_css('css/lightbox.css'); // move the lingulo styles into this

    $site->add_js('js/modernizr.js');
    $site->add_js('js/respond.min.js');
    // <link href='http://fonts.googleapis.com/css?family=Open+Sans|Baumans' rel='stylesheet' type='text/css'>
    // <link rel="stylesheet" href="css/font-awesome.min.css"> // for the icons
    $site->add_js('js/jquery-2.1.1.min.js', 'http://code.jquery.com/jquery-1.7.2.min.js');

    $site->add_js('js/lightbox.js');
    $site->add_js('js/prefixfree.min.js');
    $site->add_js('js/jquery.slides.min.js');

    $template->clear();
    $template->set('path', $site->get_path_relative());
    $template->set('language', 'de');
    $template->set('site_title', 'BC Oberurdorf');
    $template->set('header_title', null);
    $template->set('header_logo', 'images/bc-oberurdorf_75.png');
    $template->set('favicon', 'images/favicon.png');
    // $template->set('fonts', $site->get_font());
    $template->set('js', $site->get_js());
    $template->set('css', $site->get_css());
    $template->set('header_navigation', $content_navigation);
    // $template->set('navigation', $content_navigation);
    $template->set('content', $content_page);
    echo $template->fetch('template/bc-oberurdorf.php');
}
