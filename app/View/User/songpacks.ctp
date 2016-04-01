<?
    $title = $this->ObjectType->getTitle('index', $objectType);
    $breadcrumbs = array(
        __('User area') => 'javascript:;',
        $title => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();

    $checkboxes = true;

    $columns = $this->PHTableGrid->getDefaultColumns($objectType);
    $columns[$objectType.'.title_'.$lang]['label'] = __('Title');
    $columns[$objectType.'.filesize'] = array(
        'key' => 'SongPack.filesize',
        'label' => __('File size'),
        'format' => 'integer'
    );

    $rowset = $this->PHTableGrid->getDefaultRowset($objectType);
    foreach($rowset as &$row) {
        $id = $row[$objectType]['id'];
        $row[$objectType]['filesize'] = $this->PHMedia->MediaPath->filesizeFormat($aMedia[$id]['Media']['orig_fsize'], 1);
    }

    $row_actions = false;
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $title))?>
            <div class="portlet-body dataTables_wrapper">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="<?=$this->Html->url(array('action' => 'songpacks', 0))?>">
                                    <i class="fa fa-shopping-cart"></i> <?=__('Add to cart')?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <?=$this->PHTableGrid->render($objectType, compact('columns', 'row_actions', 'checkboxes', 'rowset'))?>
            </div>
        </div>
    </div>
</div>
