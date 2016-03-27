<?php
App::uses('AppHelper', 'View/Helper');
App::uses('ArticleVars', 'View/Helper');
class PriceHelper extends AppHelper {
	public $helpers = array('ArticleVars');

	public function format($sum, $lang = '') {
		$lang = ($lang) ? $lang : $this->ArticleVars->getLang();
		$sum = number_format(
			$sum,
			Configure::read('Settings.decimals_'.$lang),
			Configure::read('Settings.float_div_'.$lang),
			Configure::read('Settings.int_div_'.$lang)
		);
		$sum = Configure::read('Settings.price_prefix_'.$lang).$sum.Configure::read('Settings.price_postfix_'.$lang);
		return str_replace('$P', '<span class="rubl">₽</span>', $sum);
	}
}
