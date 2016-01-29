<?php
App::uses('AppModel', 'Model');
App::uses('Article', 'Article.Model');
class News extends Article {
    protected $objectType = 'News';
}
