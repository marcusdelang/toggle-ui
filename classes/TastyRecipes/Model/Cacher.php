<?php

namespace TastyRecipes\Model;

class Cacher {

	function caching_headers () {
		header('Cache-Control: max-age=3600*24, must-revalidate');
		header('Expires: Son, 02 Dec 2018 19:56:01 GMT');
		header('Last-Modified: Sat, 01 Dec 2018 19:56:01 GMT');
		
}
}

       
