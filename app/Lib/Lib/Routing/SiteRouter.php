<?
App::uses('Router', 'Cake/Routing');
class SiteRouter extends Router {

	static public function getObjectType($article) {
		list($objectType) = array_keys($article);
		return $objectType;
	}
	
	static public function url($article) {
		$objectType = self::getObjectType($article);
		if ($objectType == 'Product') {
			$url = array(
				'controller' => 'Products',
				'action' => 'view',
				$article['Product']['slug']
			);
		} elseif ($objectType == 'News') {
			$url = array(
				'controller' => 'News',
				'action' => 'view',
				$article['News']['slug']
			);
		} else {
			$url = array(
				'controller' => 'Articles', 
				'action' => 'view',
				'objectType' => $objectType,
				'slug' => $article[$objectType]['slug']
			);
		}
		return parent::url($url);
	}
	
}