<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

DEFINE('SITENAME', pathinfo(SITEPATH, PATHINFO_FILENAME));
DEFINE('NETWORKPATH', __DIR__);

//live will be inside the preview so need to go an extra level up
function contains2($haystack, $needle) { return stripos($haystack, $needle) !== false; }
$extraUp = contains2(SITEPATH, 'live') ? '/..' : '';
include_once __DIR__ . $extraUp . '/../../awe/core/framework/1-entry.php';

variables([
	'use-preview' => true,
	'network' => true
]);

if (DEFINED('SITEVARS')) variables(SITEVARS);
runFrameworkFile('site');
