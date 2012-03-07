<?php
	
	/**
	 * @todo refactor tests
	 */
	class Djme_InotifyIntegrationTest extends Djme_TestCase {
		
		/**
		 * @todo add test_read_accessWithoutTrigger
		 * @todo add test_read_access
		 */
		
		/**
		 * @todo add test for files in watched directory
		 */
		public function test_addWatch_modifyWithoutTrigger() {
			// setup
			$inotify = new Djme_Inotify();
			$pathname = $this->createTemporaryFile();
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
			$pathname = $this->createTemporaryFile();
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
			$pathname = $this->createTemporaryFile();
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
			$pathname = $this->createTemporaryFile();
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
		 * @todo add test_read_closeWrite
		 * @todo add test_read_closeNowriteWithoutTrigger
		 * @todo add test_read_closeNowrite
		 * @todo add test_read_openWithoutTrigger
		 * @todo add test_read_open
		 * @todo add test_read_accessWithoutTrigger
		 * @todo add test_read_access
		 * @todo add test_read_movedToWithoutTrigger
		 * @todo add test_read_movedTo
		 * @todo add test_read_movedFromWithoutTrigger
		 * @todo add test_read_movedFrom
		 * @todo add test_read_createWithoutTrigger
		 * @todo add test_read_create
		 * @todo add test_read_deleteWithoutTrigger
		 * @todo add test_read_delete
		 * @todo add test_read_deleteSelfWithoutTrigger
		 * @todo add test_read_deleteSelf
		 * @todo add test_read_moveSelfWithoutTrigger
		 * @todo add test_read_moveSelf
		 * @todo add test_read_closeWithoutTrigger
		 * @todo add test_read_close
		 * @todo add test_read_moveWithoutTrigger
		 * @todo add test_read_move
		 * @todo add test_read_allEventsWithoutTrigger
		 * @todo add test_read_allEvents
		 * @todo add test_read_unmountWithoutTrigger
		 * @todo add test_read_unmount
		 * @todo add test_read_qOverflowWithoutTrigger
		 * @todo add test_read_qOverflow
		 * @todo add test_read_ignoredWithoutTrigger
		 * @todo add test_read_ignored
		 * @todo add test_read_isdirWithoutTrigger
		 * @todo add test_read_isdir
		 * @todo add test_read_onlydirWithoutTrigger
		 * @todo add test_read_onlydir
		 * @todo add test_read_dontFollowWithoutTrigger
		 * @todo add test_read_dontFollow
		 * @todo add test_read_maskAddWithoutTrigger
		 * @todo add test_read_maskAdd
		 * @todo add test_read_oneshotWithoutTrigger
		 * @todo add test_read_oneshot
		 */
		
	}
