<?php
/**
 * Help functions and classes for MJQM
 * 
 * */
namespace no\malmanger\mjqm;

// =====================================================
// LOGING 
// =====================================================
define('MJQM_NOTHING', 10); // No logging
define('MJQM_ERROR', 8); // Log only errors
define('MJQM_WARNING', 6); // Log errors and warninga
define('MJQM_INFROMATION', 4); // Log errors, warnings and information
define('MJQM_DEBUG', 2); // log ALL
define('MJQM_DEFAULT', MJQM_WARNING); // Defaults to WANRING if not set
/**
 * Log class to handle all logging
 * 
 * */
class Log {
	/**
	 * $loglevels contains list of valid loglevels
	 * */
	public static $loglevels = array(MJQM_NOTHING => "Nothing", 
					MJQM_ERROR => "Error",
					MJQM_WARNING => "Warning",
					MJQM_INFROMATION => "Information",
					MJQM_DEBUG => "Debug");

	/**
	 * e - Log an error
	 * @param string $message The message to log
	 * @param optional string $source Identy the caller
	 * */
	public static function e($message, $source="") { static::mjqm_log($message, MJQM_ERROR, $source); }
	/**
	 * w - Log a warning
	 * @param string $message The message to log
	 * @param optional string $source Identy the caller
	 * */
	public static function w($message, $source="") { static::mjqm_log($message, MJQM_WARNING, $source); }
	/**
	 * i - Log an information message
	 * @param string $message The message to log
	 * @param optional string $source Identy the caller
	 * */
	public static function i($message, $source="") { static::mjqm_log($message, MJQM_INFROMATION, $source); }
	/**
	 * d - Log a debug message
	 * @param string $message The message to log
	 * @param optional string $source Identy the caller
	 * */
	public static function d($message, $source="") { static::mjqm_log($message, MJQM_DEBUG, $source); }
	/**
	 * mjqm_log - Log a debug message
	 * @param string $message The message to log
	 * @param string $loglevel The loglevel for this message
	 * @param optional string $source Identy the caller
	 * */
	private static function mjqm_log($message, $loglevel, $source="") {
		static $currentLevel = MJQM_DEFAULT;
		if(defined('MJQM_LOGLEVEL')) { $currentLevel = MJQM_LOGLEVEL; }
		if($loglevel >= MJQM_LOGLEVEL) {
			$from = "";
			if(strlen($source)>0) { $from = "[from:" . $source . "] ";}
			//TODO: Replace this with som real log funksjonality
			error_log("[MJQM:" . static::$loglevels[$loglevel] . "] " . $from . str_replace("\n", "<br>", $message));
		}
	}


} // End of Class Log

// =====================================================
// Case insensitive array functions
// =====================================================
/**
 * Case innsensitive search for key in array.
 * @param mixed $needle The case insensitive key to search for
 * @param array $haystack The array containing values
 * @return string|boolean Returns the proper cased key FALSE otherwise
 * */
function arri_find_key($needle, $haystack) {
	foreach ($haystack as $key => $value) {
		if (strtolower($needle) == strtolower($key)) {
			return $key;
		}
	}
	return false;
}

/**
 * Case innsensitive search for value in array.
 * @param mixed $needle The case insensitive value to search for
 * @param array $haystack The array containing values
 * @return string|boolean Returns the proper cased value FALSE otherwise
 * */
function arri_find_value($needle, $haystack) {
	foreach ($haystack as $key => $value) {
		if (strtolower($needle) == strtolower($value)) {
			return $value;
		}
	}
	return false;
}

/**
 * Case innsensitive search for value in array. Getting the key for the value.
 * @param mixed $needle The case insensitive value to search for
 * @param array $haystack The array containing values
 * @return string|boolean Returns the proper cased key FALSE otherwise
 * */
function arri_find_value_get_key($needle, $haystack) {
	foreach ($haystack as $key => $value) {
		if (strtolower($needle) == strtolower($value)) {
			return $key;
		}
	}
	return false;
}
