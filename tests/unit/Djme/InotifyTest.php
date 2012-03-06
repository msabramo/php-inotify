<?php
	
	class Djme_InotifyTest extends PHPUnit_Framework_TestCase {
		
		private $temporaryFilepaths = array ();
		
		protected function tearDown() {
			foreach ($this->temporaryFilepaths as $path) {
				unlink($path);
			}
		}
		
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
		
		public function test_addWatch_withEmptyPathname() {
			$inotify = new Djme_Inotify();
			$this->setExpectedException(
				'Djme_Inotify_Exception_PathNotFound',
				'Path \'\' not found.');
			$inotify->addWatch('', null);
		}
		
		public function test_addWatch_wherePathnameDoesNotExist() {
			$inotify = new Djme_Inotify();
			$this->setExpectedException(
				'Djme_Inotify_Exception_PathNotFound',
				'Path \'/thispathreallyshouldnoteverexist\' not found.'
				);
			$inotify->addWatch('/thispathreallyshouldnoteverexist',
				null);
		}
		
		public function test_addWatch_withValidPathnameButNullMask() {
			$inotify = new Djme_Inotify();
			$pathname = tempnam(sys_get_temp_dir(), 'pre');
			$this->temporaryFilepaths[] = $pathname;
			$this->setExpectedException(
				'Djme_Inotify_Exception_NullMask',
				'Mask cannot be null.');
			$inotify->addWatch($pathname, null);
		}
		
	}
	
