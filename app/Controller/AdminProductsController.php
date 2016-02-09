<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminProductsController extends AdminContentController {
    public $name = 'AdminProducts';
    public $uses = array('Product', 'Category', 'ParamGroup', 'Form.PMFormField', 'Form.PMFormValue');

    public $paginate = array(
        'fields' => array('parent_id', 'title', 'slug', 'published', 'featured', 'sorting'),
        'order' => array('sorting' => 'desc'),
        'limit' => 20
    );

    public function beforeRender() {
        parent::beforeRender();
        $this->set('aCategoryOptions', $this->Category->getObjectOptions());
    }

    protected function afterSave($id) {
        $this->PMFormValue->saveValues('ProductParam', $id, $this->request->data('PMFormValue'));
    }

    public function edit($id = 0, $parent_id = '') {
        parent::edit($id, $parent_id);

        $aParamGroups = $this->ParamGroup->findAllByParentId($this->parent_id, null, 'sorting');
        $aParamGroups = Hash::combine($aParamGroups, '{n}.ParamGroup.id', '{n}');

        $aParams = $this->PMFormField->findAllByParentId(array_keys($aParamGroups), null, 'sorting');
        $ids = Hash::extract($aParams, '{n}.PMFormField.id');
        $aParams = Hash::combine($aParams, '{n}.PMFormField.id', '{n}', '{n}.PMFormField.parent_id');
        $this->set('aFormGroups', $aParamGroups);
        $this->set('aForms', $aParams);

        $aValues = array();
        if ($this->request->is(array('put', 'post'))) {
            $aValues = $this->request->data('PMFormValue');
        } elseif ($id) {
            $aValues = $this->PMFormValue->getValues('ProductParam', $id);
        }
        $this->set('aValues', $aValues);
    }
}
