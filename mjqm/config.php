<?php
/**
 * MJQM - Menu JQuery Mobile for php
 * Library initially built to support MPH (My Precious Home)
 * 
 * Primary include file for this library
 * 
 * @author Bjørne Malmanger <bjorne _a_t_ malmanger _d_o_t_ no>
 * namespace no\malmanger\mjqm
 * */
namespace no\malmanger\mjqm;

/**
 * */
// Need some helper functions
require_once("helper.php");

define("MJQM_DIR", dirname(__FILE__));
define('MJQM_LOGLEVEL', MJQM_DEBUG);
define("CHARSET", "UTF-8"); // Why the f**k would anyone change this - DON'T!!!

/**
 * For debugging purposes
 * */
error_reporting(E_ALL | E_STRICT);


// Set autoloading of Classes and Interfaces
// Name of interfaces sould start with "I", but it's not required
/**
 * Class and Interface autoloader
 * 
 * @param string $className Name of the class to load
 * */
function __autoload_mjqm($className)
{
	$me = __FILE__ . '?' . __FUNCTION__;
	$parts = explode('\\', $className);
	$classname = strtolower(end($parts));

	$autoloadType = null;

	//first check for interface
	$loadFile = MJQM_DIR . "/classes/{$classname}.interface.php";
	if(file_exists($loadFile)) { 
		$autoloadType = "interface";

	} else {
		// check for class
		$loadFile = MJQM_DIR . "/classes/{$classname}.class.php";	
		if(file_exists($loadFile)) {
			$autoloadType = "class";
		} else {
			// autoloadType still null
		}
	}	

	
	if(!is_null($autoloadType)) {
		Log::d("Loading $autoloadType " . $className . " File=" . $loadFile, $me);
		require_once($loadFile); 
	} else {
		Log::w("Unable to find " . $className, $me);
	}
}
spl_autoload_register(__NAMESPACE__ . '\__autoload_mjqm');




