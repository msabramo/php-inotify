<?php
	
	class Djme_InotifyTest extends PHPUnit_Framework_TestCase {
		
		public function test_contructor_basic() {
			$inotify = new Djme_Inotify();
			$this->assertInstanceOf('Djme_Inotify', $inotify);
		}
		
		public function test_contructor_mockNoInotifyExtension() {
			$this->setExpectedException(
				'Djme_Inotify_Exception_MissingPhpModule',
				'Missing PHP module \'inotify\'.');
			$inotify = new Mock_Djme_Inotify_NoInotifyExtension();
		}
		
	}
	
