<?
    $id = $this->request->data($objectType.'.id');
    $title = $this->ObjectType->getTitle('index', $objectType);
    $breadcrumbs = array(
        __('Users') => 'javascript:;',
        $this->ObjectType->getTitle('index', 'User') => array('controller' => 'AdminUsers', 'action' => 'index'),
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
    echo $this->PHForm->input('username');
    if ($id != 1) {
        echo $this->PHForm->input('email');
    }
    echo $this->PHForm->input('password', array('value' => '' , 'required' => !$id));
    echo $this->PHForm->input('password_confirm', array('type' => 'password', 'value' => '', 'required' => !$id,
        'label' => array('class' => 'col-md-3 control-label', 'text' => __('Confirm password'))
    ));
    if ($id != 1) {
        echo $this->PHForm->input('active');
    }
    echo $this->element('AdminUI/form_actions');
    echo $this->PHForm->end();
?>
        </div>
    </div>
</div>
