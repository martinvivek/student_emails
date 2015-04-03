<?php
// REGISTER OUR PLUGIN WITH MOODLE

// YEAR + MONTH + DAY + 2 EXTRA DIGITS
$plugin->version = 2015040200;
$plugin->requires = 2010112400;
// Frequency with which the cron should be run (in seconds)
$plugin->cron = 604800; // 1 Week
$plugin->release = 'Alpha Version';
$plugin->maturity = MATURITY_ALPHA;
