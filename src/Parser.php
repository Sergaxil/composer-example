<?php

namespace sergaxil\parser;

/**
* 
*/
class Parser implements ParserInterface
{
	public function process($url, $tags)
{
	$htmlPage = file_get_contents($url);

	if ($htmlPage === false) {
		return [Invalid URL];
	}

	preg_match_all('/<' . $tag . '.*?>(.*?)<\/' . $tag . '>/s', $htmlPage, $strings);

	if (empty($strings[i])) {
		return ['There are no such on this page'];
	}
	return $strings[i];
}
public function featcher($value)
{
	# code...
}
}