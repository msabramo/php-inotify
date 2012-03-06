<?php
	
	class Djme_Inotify {
		
		const ACCESS = IN_ACCESS;
		
		const MODIFY = IN_MODIFY;
		
		const ATTRIB = IN_ATTRIB;
		
		const CLOSE_WRITE = IN_CLOSE_WRITE;
		
		const CLOSE_NOWRITE = IN_CLOSE_NOWRITE;
		
		const OPEN = IN_OPEN;
		
		const MOVED_TO = IN_MOVED_TO;
		
		const MOVED_FROM = IN_MOVED_FROM;
		
		const CREATE = IN_CREATE;
		
		const DELETE = IN_DELETE;
		
		const DELETE_SELF = IN_DELETE_SELF;
		
		const MOVE_SELF = IN_MOVE_SELF;
		
		const CLOSE = IN_CLOSE;
		
		const MOVE = IN_MOVE;
		
		const ALL_EVENTS = IN_ALL_EVENTS;
		
		const UNMOUNT = IN_UNMOUNT;
		
		const Q_OVERFLOW = IN_Q_OVERFLOW;
		
		const IGNORED = IN_IGNORED;
		
		const ISDIR = IN_ISDIR;
		
		const ONLYDIR = IN_ONLYDIR;
		
		const DONT_FOLLOW = IN_DONT_FOLLOW;
		
		const MASK_ADD = IN_MASK_ADD;
		
		const ONESHOT = IN_ONESHOT;
		
		private $handle;
		
		protected static function isInotifyPhpExtensionLoaded() {
			return extension_loaded('inotify');
		}
		
		public function __construct() {
			if (!$this->isInotifyPhpExtensionLoaded()) {
				throw new Djme_Inotify_Exception_MissingPhpModule(
					'Missing PHP module \'inotify\'.');
			}
			$this->handle = inotify_init();
		}
		
		public function addWatch($pathname, $mask = null) {
			if (!file_exists($pathname)) {
				throw new Djme_Inotify_Exception_PathNotFound(
					'Path \''. $pathname. '\' not found.');
			}
			return inotify_add_watch($this->handle, $pathname,
				is_null($mask) ? self::ALL_EVENTS : $mask);
		}
		
		public function queueLen() {
			return inotify_queue_len($this->handle);
		}
		
		public function read() {
			$results = array ();
			foreach (inotify_read($this->handle) as $info) {
				$results[] = new Djme_Inotify_Read_Result(
					$info['wd'],
					$info['mask'],
					$info['cookie'],
					$info['name']);
			}
			return $results;
		}
		
		public function rmWatch($watch_descriptor) {
			return inotify_rm_watch($watch_descriptor);
		}
		
	}
	
