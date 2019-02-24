
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php $options_new = array(
 		'Type1' => __('<span class="showDescription" style="color:blue">Type1</span>
	 					<div class="description-container">
							<span style="display:inline-block">
								<ul><li>Description .......</li>
	 							<li>Description 2</li></ul>
	 						</span>
	 					</div>'),
 		'Type2' => __('<span class="showDescription" style="color:blue">Type2</span>
	 					<div class="description-container">
							<span style="display:inline-block">
								<ul><li>Desc 1 .....</li>
 								<li>Desc 2...</li></ul>
	 						</span>
	 					</div>'), 		
		);?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>


<?php echo $this->Form->end();?>

<button id="save" type="button">Save</button>

</div>

<style>
.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

.radio.line{
	position: relative;
}

.description-container{
    position: absolute;
    top: -10px;
    background: #ffffff;
    border: 1px solid #ccc;
    padding: 20px;
    margin-left: 60px;
    width: auto;
    display: none;
}

.description-container:after, .description-container:before{
	bottom: 100%;
	left: 50px;
	border: solid transparent;
	content: " ";
	position: absolute;
}

.description-container:after{
	width: 0px;
    height: 0px;
    border: 10px solid;
    border-color: rgb(204, 204, 204, 0);
    position: absolute;
    top: 8px;
    left: -20px;
    border-right-color: #ccc;
    border-width: 10px;
}

.description-container:before{
    width: 0px;
    height: 0px;
    border: 10px solid;
    border-color: transparent #ffffff transparent transparent;
    position: absolute;
    left: -18px;
    top: 8px;
    z-index: 1;
}

.showDescription:hover + .description-container {
    display: block;
}

#save{
	display: none;
}

</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){
	var selectedHtml = "";
	$(".radio.line").click(function(){
		$("#save").hide();
		if ($(this).children("input[type='radio']").prop('checked')) {
		    selectedHtml = $(this).children('.description-container').html();
		    $("#save").show();
		}
	});
	$("#save").click(function(){
		var w = window.open();
		$(w.document.body).html(selectedHtml);
	});

});


</script>
<?php $this->end()?>