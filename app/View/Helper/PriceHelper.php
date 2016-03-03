<?php
App::uses('AppHelper', 'View/Helper');
class PriceHelper extends AppHelper {

	public function format($sum) {
		$sum = number_format($sum, 0, 3, Configure::read('Settings.int_div'));
		return Configure::read('Settings.price_prefix').$sum.Configure::read('Settings.price_postfix');
	}
}
