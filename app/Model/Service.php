<?php
App::uses('AppModel', 'Model');
class Service extends AppModel {

    public function getOptions() {
        $fields = array('id', 'title_'.$this->getLang());
        $conditions = array('published' => 1);
        $order = array('sorting');
        return $this->find('list', compact('fields', 'conditions', 'order'));
    }
}
