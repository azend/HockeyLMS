<?php

class UrlHelper {
	function genUrl($path) {
		$url = '';

		if (REWRITE_ENABLED) {
			$url = $path;
		}
		else {
			$url = '?path=/'. $path;
		}

		return $url;
	}

}
