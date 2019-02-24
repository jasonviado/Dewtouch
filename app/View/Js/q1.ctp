<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table id="table" class="table table-striped table-bordered table-hover">
<thead>
<th class="addRow"><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th class="quantity">Quantity</th>
<th class="unit-price">Unit Price</th>
</thead>

<tbody>
	<tr>
		<td></td>
		<td><textarea name="data[1][description]" class="m-wrap description viewing required" ></textarea></td>
		<td><input name="data[1][quantity]" class="numbers viewing"></td>
		<td><input name="data[1][unit_price]" class="numbers viewing"></td>
	</tr>
</tbody>

</table>


<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="/video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>



<?php $this->start('script_own');?>
<style type="text/css">
	table .viewing{
		resize: none;
	    outline: none;
	    border: none;
	    cursor: pointer;
	    background-color: transparent;
	}
	table textarea{
		width: 100%;
		height: 80px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;	
	}
	table th.addRow{
		width: 50px;
	}
	table th.quantity{
		width: 50px;
	}
	table th.unit-price{
		width: 50px;
	}
	table input.numbers{
		text-align: right;
	}
</style>
<?php $this->end();?>

<?php $this->start('script_own');?>
<script>
$(document).ready(function(){
	$("#add_item_button").click(function(){
		var i = 0;
		while (i >= 0) {
			if ($("[name='data["+ i +"][description]'").length == 0) {
				$("#table").append('<tr>'+
					'<td></td>'+
					'<td><textarea name="data['+i+'][description]" class="m-wrap description viewing required" ></textarea></td>'+
					'<td><input name="data['+i+'][quantity]" class="numbers viewing"></td>'+
					'<td><input name="data['+i+'][unit_price]"  class="numbers viewing"></td>'+
				'</tr>');
				i = -1;
			}else{
		  		i++;
			}
		}
	});

	$(document).delegate("textarea,input","focus",function(){
		$("textarea,input").addClass('viewing');
		$(this).removeClass('viewing');
	});

	$(document).delegate("textarea,input","click",function(){
		$("textarea,input").addClass('viewing');
		$(this).removeClass('viewing');
	});


	$(document).delegate("textarea","keyup",function(){
	    var that = $(this);
	    if (that.scrollTop()) {
	        $(this).height(function(i,h){
	            return h + 40;
	        });
	    }
	})

	$('html').click(function(){
		$("textarea,input").addClass('viewing');
	});

});
</script>
<?php $this->end();?>

