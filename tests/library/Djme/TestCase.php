<?php
	
	abstract class Djme_TestCase extends PHPUnit_Framework_TestCase {
		
		private $temporaryFilepaths = array ();
		
		protected function tearDown() {
			foreach ($this->temporaryFilepaths as $path) {
				unlink($path);
			}
		}
		
		protected function createTemporaryFile() {
			$pathname = tempnam(sys_get_temp_dir(), 'pre');
			$this->temporaryFilepaths[] = $pathname;
			return $pathname;
		}
		
	}
