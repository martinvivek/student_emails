<?php

require_once('vendor/autoload.php');
require_once(__DIR__ . '/../../config.php');

use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles as CssInliner;

class renderer {
    private static $sql_file = '/../sql/courses.sql';
    private static $template_dir = '/templates/';

    private $twig, $sql_query, $courses;

    function __construct() {
        // Make CSS inline
        $html = file_get_contents(renderer::$template_dir . 'infographic.twig');
        $css = file_get_contents(renderer::$template_dir . 'infographic.css');
        $css_inliner = new CssInliner();
        $css_inliner->setHTML($html);
        $css_inliner->setCSS($css);
        $html_with_css = $css_inliner->convert();

        // Initialize Twig
        $twig_filesystem = new Twig_Loader_Array(array('infographic' => $html_with_css));
        $this->twig = new Twig_Environment($twig_filesystem);

        // Load the sql file and maximize compatibility by allowing moodle to replace {} with mdl_ or mdl1 or whatever prefix
        // The {} are not present in the source so that PHPStorm can get the actual table data
        $this->sql_query = preg_replace('/mdl_(\w+)/', '{$1}', file_get_contents(__DIR__ . renderer::$sql_file));

    }

    private function inline_css_html() {

    }

    function render_course() {

    }
}

function render_email() {


    // Load Course Data
    // TODO

    $twig_filesystem = new Twig_Loader_Filesystem($template_dir);
    $twig = new Twig_Environment($twig_filesystem);

    // Render and make CSS Inline (for GMail compatibility)
    $html = $twig->render('infographic.twig');
    $css = file_get_contents($template_dir . 'infographic.twig');
    $css_inliner = new CssInliner();
    $css_inliner->setHTML($html);
    $css_inliner->setCSS($css);
}
