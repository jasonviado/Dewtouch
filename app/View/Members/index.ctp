<div class="row-fluid">
	<div class="alert">
		<h3>Import File For Migration. *this make take time</h3>
	</div>
	<?php if($message){?>
		<div class="alert alert-success">
			<h4><?php echo $message; ?></h4>
		</div>
	<?php }?>

	<?php
	echo $this->Form->create('Members',array('enctype' => 'multipart/form-data'));
	echo $this->Form->input('file', array('label' => 'File Upload', 'type' => 'file'));
	echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
	echo $this->Form->end();
	?>

	<hr />
</div>	