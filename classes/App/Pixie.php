<?php

namespace App;

/**
 * Pixie dependency container
 *
 * @property-read \PHPixie\Twitter $twitter Twitter api
 */
class Pixie extends \PHPixie\Pixie {

    
	public function handle_exception($exception) {
		header("HTTP/1.1 404 Not Found");
        echo "404 Not Found";
	}
}
