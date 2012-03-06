<?php

	/**
	 * @codeCoverageIgnore
	 */
	call_user_func(function() {
		spl_autoload_register(function($class_name) {
			$relpaths = array (
				'/../library',
				'/../tests/mocks'
			);
			foreach ($relpaths as $relpath) {
				$path = realpath(__DIR__. $relpath). '/'. str_replace('_', '/', $class_name). '.php';
				var_dump($path, $relpath);
				if (!file_exists($path)) {
					continue;
				}
				require_once $path;
			}
		});
	});
	
