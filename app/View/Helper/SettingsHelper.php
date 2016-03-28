<?php
App::uses('AppHelper', 'View/Helper');
class SettingsHelper extends AppHelper {

	public function read($option, $lang = '') {
		$lang = ($lang) ? $lang : $this->getLang();
		return Configure::read('Settings.'.$option.'_'.$lang);
	}
}
