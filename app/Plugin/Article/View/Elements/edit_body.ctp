<div id="summernote_1">
	<?=$this->request->data($this->PHForm->defaultModel.'.body')?>
</div>
<input type="hidden" id="summernote_value" name="data[<?=$this->PHForm->defaultModel?>][body]" value="">
<script>
jQuery(function(){
	$('#summernote_1').closest('form').submit(function(){
		$('#summernote_value').val($('#summernote_1').code());
		return true;
	});
});
</script>