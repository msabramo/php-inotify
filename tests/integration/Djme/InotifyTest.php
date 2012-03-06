<?php
	
	class Djme_InotifyIntegrationTest extends PHPUnit_Framework_TestCase {
	
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		/**
		 * @todo add test for files in watched directory
		 */
		public function test_addWatch_modifyWithoutTrigger() {
			// setup
			$inotify = new Djme_Inotify();
			$pathname = tempnam(sys_get_temp_dir(), 'pre');
			$this->temporaryFilepaths[] = $pathname;
			$this->assertInternalType('integer',
				$inotify->addWatch($pathname, Djme_Inotify::MODIFY));
			
			// action
			$results = $inotify->read();
			
			// check
			$this->assertCount(0, $results);
		}
		
		/**
		 * @todo add test for files in watched directory
		 */
		public function test_addWatch_modify() {
			// setup
			$inotify = new Djme_Inotify();
			$pathname = tempnam(sys_get_temp_dir(), 'pre');
			$this->temporaryFilepaths[] = $pathname;
			$this->assertInternalType('integer',
				$inotify->addWatch($pathname, Djme_Inotify::MODIFY));
			
			// action
			file_put_contents($pathname, 'foo');
			$results = $inotify->read();
			
			// check
			$this->assertCount(2, $results);
			$result = $results[0];
			$this->assertEquals(1, $result->getWd());
			$this->assertEquals(Djme_Inotify::MODIFY, $result->getMask());
			$this->assertEquals(0, $result->getCookie());
			$this->assertEquals('', $result->getName());
			
			$result = $results[1];
			$this->assertEquals(1, $result->getWd());
			$this->assertEquals(Djme_Inotify::MODIFY, $result->getMask());
			$this->assertEquals(0, $result->getCookie());
			$this->assertEquals('', $result->getName());
		}
		
		/**
		 * @todo add test for files in watched directory
		 */
		public function test_read_attribWithoutTrigger() {
			// setup
			$inotify = new Djme_Inotify();
			$pathname = tempnam(sys_get_temp_dir(), 'pre');
			$this->temporaryFilepaths[] = $pathname;
			$this->assertInternalType('integer',
				$inotify->addWatch($pathname, Djme_Inotify::ATTRIB));
			
			// action
			$results = $inotify->read();
			
			// check
			$this->assertCount(0, $results);
		}
		
		/**
		 * @todo add test for files in watched directory
		 */
		public function test_addWatch_attrib() {
			// setup
			$inotify = new Djme_Inotify();
			$pathname = tempnam(sys_get_temp_dir(), 'pre');
			$this->temporaryFilepaths[] = $pathname;
			$this->assertInternalType('integer',
				$inotify->addWatch($pathname, Djme_Inotify::ATTRIB));
			
			// action
			touch($pathname);
			$results = $inotify->read();
			
			// check
			$this->assertCount(1, $results);
			$result = $results[0];
			$this->assertEquals(1, $result->getWd());
			$this->assertEquals(Djme_Inotify::ATTRIB, $result->getMask());
			$this->assertEquals(0, $result->getCookie());
			$this->assertEquals('', $result->getName());
		}
		
		/**
		 * @todo add test_read_closeWriteWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_closeWrite
		 */
		
		/**
		 * @todo add test_read_closeNowriteWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_closeNowrite
		 */
		
		/**
		 * @todo add test_read_openWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_open
		 */
		
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const MOVED_TO = IN_MOVED_TO;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const MOVED_FROM = IN_MOVED_FROM;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const CREATE = IN_CREATE;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const DELETE = IN_DELETE;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const DELETE_SELF = IN_DELETE_SELF;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const MOVE_SELF = IN_MOVE_SELF;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const CLOSE = IN_CLOSE;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const MOVE = IN_MOVE;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const ALL_EVENTS = IN_ALL_EVENTS;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const UNMOUNT = IN_UNMOUNT;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const Q_OVERFLOW = IN_Q_OVERFLOW;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const IGNORED = IN_IGNORED;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const ISDIR = IN_ISDIR;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const ONLYDIR = IN_ONLYDIR;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const DONT_FOLLOW = IN_DONT_FOLLOW;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const MASK_ADD = IN_MASK_ADD;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
		const ONESHOT = IN_ONESHOT;
		/**
		 * @todo add test_read_accessWithoutTrigger
		 */
		 
		/**
		 * @todo add test_read_access
		 */
		
	}
