<table class="table table-striped table-bordered table-hover table-header-fixed dataTable">
	<thead>
	<tr class="">
<?
	list($order) = array_keys($_paginate['order']);
	list($dir) = array_values($_paginate['order']);
	foreach($_paginate['_columns'] as $field) {
		$class = 'sorting';
		if ($field['key'] == $order) {
			$class = 'sorting_'.$dir;
		}
?>
		<th class="<?=$class?>">
			<?=$this->Paginator->sort($field['key'], $field['label'])?>
		</th>
<?
	}
?>
		<th><?=__('Actions')?></th>
	</tr>
	</thead>
	<tbody>
<?
	foreach($_paginate['_rowset'] as $row) {
		$id = Hash::get($row, $_paginate['_model'].'.id');
?>
		<tr>
<?
		foreach($_paginate['_columns'] as $field) {
			$field['value'] = Hash::get($row, $field['key']);
			if ($field['format'] == 'date' || $field['format'] == 'datetime') {
				echo $this->element('Table.date', $field);
			} elseif ($field['format'] == 'boolean') {
				echo $this->element('Table.boolean', $field);
			} elseif ($field['format'] == 'integer' || $field['format'] == 'float') {
				echo $this->element('Table.number', $field);
			} else {
				echo $this->element('Table.string', $field);
			}
		}
?>
			<td nowrap="nowrap">
<?
		$tmpl = (isset($options['row_actions']) && $options['row_actions']) ? $options['row_actions'] : 'Table.row_actions';
		echo $this->element($tmpl, compact('id', 'row'));
?>
			</td>
		</tr>

<?
	}
?>

	</tbody>
</table>
<?
	echo $this->element('AdminUI/pagination');
?>