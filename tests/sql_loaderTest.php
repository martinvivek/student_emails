<?php


namespace sql_loader;

require(__DIR__ . '/../classes/sql_loader.php');


class sql_loaderTest extends \PHPUnit_Framework_TestCase {
    function test_loader() {
        $this->assertEquals(1, 3);
    }
}
