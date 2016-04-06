<style>
    .dataTables_wrapper { margin-bottom: 40px; }
</style>
<?
    $title = __('Cart');
    $breadcrumbs = array(
        __('User area') => 'javascript:;',
        $title => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();
?>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
<?
    if ($songs) {
        echo $this->element('../User/_cart_songs');
    }
    if ($packs) {
        echo $this->element('../User/_cart_packs');
    }
    if ($customOrders) {
        echo $this->element('../User/_cart_customorders');
    }
    if ($songs || $packs || $customOrder) {
?>
        <div class="portlet-title">
            <div class="caption font-red">
                <span class="caption-subject bold uppercase"><?=__('Total')?></span>
            </div>
            <div class="actions" style="font-weight: bold;">
                <?=$this->Price->format(0, $lang)?>
            </div>
        </div>
        <div class="portlet-body">
            <button class="btn blue">
                <i class="fa fa-save"></i>
                <?=__('Save order')?>
            </button>
        </div>
<?
    } else {
        echo __('Your cart is empty');
    }
?>
            </div>
        </div>
    </div>

