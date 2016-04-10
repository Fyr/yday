<?
    $title = $this->ObjectType->getTitle('index', $objectType);
    $breadcrumbs = array(
        __('Catalogs') => 'javascript:;',
        $title => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();

    $columns = $this->PHTableGrid->getDefaultColumns($objectType);
    $columns = array(
        'Order.id' => array(
            'key' => 'Order.id',
            'label' => __('Order N'),
            'format' => 'integer'
        ),
        'Order.user_id' => array(
            'key' => 'Order.user_id',
            'label' => __('User'),
            'format' => 'string'
        ),
        'Order.created' => $columns['Order.created'],
        'Order.order_body' => array(
            'key' => 'Order.order_body',
            'label' => __('Ordered'),
            'format' => 'string'
        ),
        'Order.total_'.$lang => array(
            'key' => 'Order.total_'.$lang,
            'label' => __('Sum'),
            'format' => 'integer'
        ),
        'Order.status' => $columns['Order.status'],
    );

    $rowset = $this->PHTableGrid->getDefaultRowset($objectType);
    foreach($rowset as &$row) {
        $row['Order']['order_body'] = $this->element('../User/_orders_body', compact('row', 'orders', 'lang'));
        $row['Order']['status'] = $this->Settings->getStatus('Order', $row['Order']['status']);
        $row['Order']['total_'.$lang] = $this->Price->format($row['Order']['total_'.$lang], $lang);
        $user_id = $row['Order']['user_id'];
        $row['Order']['user_id'] = $this->Html->link($users[$user_id]['username'], 'mailto:'.$users[$user_id]['email']);
    }
    $row_actions = '../AdminOrders/_index_row_actions';
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $title))?>
            <div class="portlet-body dataTables_wrapper">
                <?=$this->PHTableGrid->render($objectType, compact('row_actions', 'rowset', 'columns'))?>
            </div>
        </div>
    </div>
</div>