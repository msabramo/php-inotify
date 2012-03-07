<?php
	
	call_user_func(function() {
		spl_autoload_register(function($class_name) {
			$libraries = array (
				'/../library',
				'/../tests/library',
				'/../tests/mocks'
			);
			foreach ($libraries as $relpath) {
				if (!file_exists($path = realpath(__DIR__. $relpath).
					'/'. str_replace('_', '/', $class_name). '.php')) {
					continue;
				}
				require_once $path;
			}
		});
	});
	
