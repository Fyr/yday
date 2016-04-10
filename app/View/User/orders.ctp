<?
    $title = __('My orders');
    $breadcrumbs = array(
        __('User area') => 'javascript:;',
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
        'Order.created' => $columns['Order.created'],
        'Order.order_body' => array(
            'key' => 'Order.order_body',
            'label' => __('Ordered'),
            'format' => 'string'
        ),
        'Order.statuc' => $columns['Order.status'],
    );

    $rowset = $this->PHTableGrid->getDefaultRowset($objectType);
    foreach($rowset as &$row) {
        $row['Order']['order_body'] = $this->element('../User/_orders_body', compact('row', 'orders', 'lang'));
    }
    $row_actions = '../User/_orders_rowactions';
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $title))?>
            <div class="portlet-body dataTables_wrapper">
                <!--div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <button id="addCart" class="btn green" onclick="item_addCart()" disabled="disabled">
                                    <i class="fa fa-shopping-cart"></i> <?=__('Add to cart')?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div-->
                <?=$this->PHTableGrid->render($objectType, compact('row_actions', 'rowset', 'columns'))?>
            </div>
        </div>
    </div>
</div>