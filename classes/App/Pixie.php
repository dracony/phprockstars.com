<?php

namespace App;

/**
 * Pixie dependency container
 *
 * @property-read \PHPixie\Twitter $twitter Twitter api
 */
class Pixie extends \PHPixie\Pixie {

	protected $modules = array(
		'twitter' => '\App\Twitter'
	);

	/**
	 * Constructs a view helper
	 *
	 * @return \PHPixie\View\Helper
	 */
	public function view_helper() {
		return new \App\View\Helper($this);
	}
    
	public function handle_exception($exception) {
		header("HTTP/1.1 404 Not Found");
        echo "404 Not Found";
	}
}
