<?php

// Hash the last modification time of the current PHP file
$file_last_mod_time = md5(filemtime(__FILE__));

// Get last modification time of the main content (that user sees)
$content_last_mod_time = date("F d Y H:i:s." , filemtime(__FILE__));

// Combine both to generate a unique ETag for a unique content
// Specification says ETag should be specified within double quotes
$etag = '"' . $file_last_mod_time . '.' . $content_last_mod_time . '"';

// Set Cache-Control header
header('Cache-Control: max-age=86400');

// Set ETag header
header('ETag: ' . $etag);

// Check whether browser had sent a HTTP_IF_NONE_MATCH request header
if(isset($_SERVER['HTTP_IF_NONE_MATCH'])) {
	// If HTTP_IF_NONE_MATCH is same as the generated ETag => content is the same as browser cache
	// So send a 304 Not Modified response header and exit
	if($_SERVER['HTTP_IF_NONE_MATCH'] == $etag) {
		header('HTTP/1.1 304 Not Modified', true, 304);
		exit();
	}
}

?>