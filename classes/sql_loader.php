<?php

namespace sql_loader;

require_once(__DIR__ . '/../../../config.php');

define('SQL_DIR', __DIR__ . '/../sql/');

// if a file has been loaded before it will be stored here
global $sql_loader_cache;
$sql_loader_cache = array();

function get_sql_file($file_name) {
    global $sql_loader_cache;
    // If the file is in the cache we don't need to load it again, just get it from there
    if ($sql_loader_cache[$file_name]) {
        return $sql_loader_cache[$file_name];
    } else {
        // Get file as string
        $sql_query = file_get_contents(SQL_DIR . $file_name);
        // Replace moodle prefix with {} to let moodle replace it itself (if mdl_ is mdl2_ for example)
        $sql_query = preg_replace('/mdl_(\w+)/','{$1}', $sql_query);
        // Save in cache
        $sql_loader_cache[$file_name] = $sql_query;

        return $sql_query;
    }
}
