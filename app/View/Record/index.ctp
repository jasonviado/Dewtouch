
<div class="row-fluid">
	<table class="table table-bordered" id="table_records">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>	
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>

</div>
<?php $this->start('script_own')?>


<link rel="stylesheet" type="text/css" href="https://coderexample.com/demo/datatable-demo-server-side-in-phpmysql-and-ajax/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" language="javascript" src="https://coderexample.com/demo/datatable-demo-server-side-in-phpmysql-and-ajax/js/jquery.dataTables.js"></script>


<script>
$(document).ready(function(){
	var datatable = $("#table_records").dataTable({
		"deferRender" : true,
        "processing": true,
        "serverSide": true,
        "ajax":{
            url :"/Record", // json datasource
            type: "get",  // method  , by default get
            error: function(){  // error handling
            	alert();
            }
        },
		"columns": [
			{"data" : "id",name : "id"},
			{"data" : "name", name : "name"},
		]
	});

})
</script>
<?php $this->end()?>