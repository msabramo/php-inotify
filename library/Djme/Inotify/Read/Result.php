<?php
	
	class Djme_Inotify_Read_Result {
		
		private $wd;
		
		private $mask;
		
		private $cookie;
		
		private $name;
		
		public function __construct($wd, $mask, $cookie, $name) {
			list ($this->wd, $this->mask, $this->cookie, $this->name)
				= array ($wd, $mask, $cookie, $name);
		}
		
		public function getWd() {
			return $this->wd;
		}
		
		public function getMask() {
			return $this->mask;
		}
		
		public function getCookie() {
			return $this->cookie;
		}
		
		public function getName() {
			return $this->name;
		}
		
	}
	