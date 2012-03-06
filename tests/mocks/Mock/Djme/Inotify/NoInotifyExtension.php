<?php
	
	/**
	 * @codeCoverageIgnore
	 */
	class Mock_Djme_Inotify_NoInotifyExtension extends Djme_Inotify {
		
		protected static function isInotifyPhpExtensionLoaded() {
			return false;
		}
		
	}
	
