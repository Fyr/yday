<style>
    .dataTables_wrapper { margin-bottom: 40px; }
    .form-text { margin-top: 8px;}
</style>
<?
    $title = __('View order');
    $breadcrumbs = array(
        __('Catalogs') => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => array('action' => 'orders'),
        $title => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));

    $title = __('View order');
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
<?
    echo $this->element('AdminUI/form_title', array('title' => __('Order info')));
    echo $this->PHForm->create($objectType);
?>
            <div class="form-group">
                <label class="col-md-3 control-label" for="OrderId"><?=__('Order N')?></label>
                <div class="col-md-9">
                    <div class="form-text">
                        <?=$this->request->data('Order.id')?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="OrderCreated"><?=__('Created')?></label>
                <div class="col-md-9">
                    <div class="form-text">
                        <?=$this->PHTime->niceShort($this->request->data('Order.created'))?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="OrderTotalRus"><?=__('Sum')?></label>
                <div class="col-md-9">
                    <div class="form-text">
                        <?=$this->Price->format($this->request->data('Order.total_'.$lang), $lang)?>
                    </div>
                </div>
            </div>
<?

    echo $this->PHForm->input('status', array(
        'class' => 'form-control input-medium',
        'options' => $this->Settings->getstatus('Order', null)
    ));
/*
    echo $this->PHForm->input('url', array(
        'label' => array('class' => 'col-md-3 control-label', 'text' => __('URL'))
    ));
*/
    echo $this->element('AdminUI/form_save');
    echo $this->PHForm->end();
?>

        </div>
    </div>
</div>


    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
<?
    if ($orderData['OrderSongs']) {
        echo $this->element('../AdminOrders/_edit_order_songs');
    }
    if ($orderData['OrderPacks']) {
        echo $this->element('../AdminOrders/_edit_order_packs');
    }
    if ($orderData['OrderCustoms']) {
        echo $this->element('../AdminOrders/_edit_order_customorders');
    }
?>
            </div>
        </div>
    </div>
