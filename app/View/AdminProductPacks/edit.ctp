<?
    $id = $this->request->data($objectType.'.id');
    $title = $this->ObjectType->getTitle('index', $objectType);
    $indexURL = array('controller' => 'AdminProductPacks', 'action' => 'index', $parent_id);
    $breadcrumbs = array(
        __('eCommerce') => 'javascript:;',
        $this->ObjectType->getTitle('index', 'Product') => array('controller' => 'AdminProducts', 'action' => 'index'),
        Hash::get($parentArticle, 'Product.title') => 'javascript:;',
        $this->ObjectType->getTitle('index', 'ProductPack') => $indexURL,
        __('Edit') => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">

<?
    echo $this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle($id ? 'edit' : 'create', $objectType)));
    echo $this->PHForm->create($objectType);

    $tabs = array(
        __('General') => $this->Html->div('form-body',
            $this->PHForm->input('title')
            .$this->PHForm->input('price', array('label' => array('class' => 'col-md-3 control-label', 'text' => __('Price').', '.Configure::read('Settings.price_postfix'))))
            .$this->PHForm->input('sorting', array('class' => 'form-control input-small'))
        ),
    );
    foreach($aFormGroups as $id => $group) {
        $title = $group['ParamGroup']['title'];
        if ($form = Hash::get($aForms, $id)) {
            $tabs[$title] = $this->PHForm->renderForm($form, $aValues);
        }
    }

    echo $this->element('AdminUI/tabs', compact('tabs'));
    echo $this->element('AdminUI/form_actions', array('backURL' => $indexURL));
    echo $this->PHForm->end();
?>
        </div>
    </div>
</div>
