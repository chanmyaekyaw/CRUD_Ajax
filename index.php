<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1 class="text-center my-3">CRUD with Ajax and jQuery</h1>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<input type="" class="uid">
			<input type="" placeholder="Enter Product Name" class="form-control name"><br>
			<input type="" placeholder="Enter Price" class="form-control price"><br>
			<button class="btn btn-dark ibtn" onclick="insertData()">INSERT</button>
			<button style="display:none;" class="btn btn-dark ubtn" onclick="updateData()">UPDATE</button>
		</div>
	</div>
	<div class="row mt-2 table_area">
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){     //selectData ko amyl run ag ready event htl htae
		selectData();
	});
	function insertData()
	{
		var name=$('.name').val();
		var price=$('.price').val();
		// alert(name);
		// alert(price);
		$.ajax({
			url:"action.php",
			type:"POST",
			data:{name:name,price:price},
			success:function(data)
			{
				$('.name,.price').val(""); //to be no value after clicking insert
				selectData();   //d mr ll htae mha insert hnate yin table mr tann paw tr
			}
		});
	}
	function selectData()
	{
		$.ajax({
			url:"action.php",
			type:"POST",
			data:{select:1},  //true
			success:function(data)  //if table htl data htae tr success fik yin
			{
				$('.table_area').html(data);
			}
		});
	}
	function deleteData(id)
	{
		var id=id;
		// alert(id);
		$.ajax({
			url:"action.php",
			type:"POST",
			data:{id:id},
			success:function(data)
			{
				selectData();
			}
		});
	}
	function editData(eid)
	{
		var eid=eid;
		// alert(eid);
		$.ajax({
			url:"action.php",
			type:"POST",
			data:{eid:eid},
			dataType:"json",
			success:function(data)
			{
				$('.uid').val(data.id);
				$('.name').val(data.name);
				$('.price').val(data.price);
				$('.ibtn').hide();
				$('.ubtn').show();
			}
		});
	}
	function updateData()
	{
		var uid=$('.uid').val();
		var uname=$('.name').val();
		var uprice=$('.price').val();
		$.ajax({
			url:"action.php",
			type:"POST",
			data:{uid:uid,uname:uname,uprice:uprice},
			success:function(data)
			{
				selectData();
				$('.uid').val("");
				$('.name').val("");
				$('.price').val("");
				$('.ibtn').show();
				$('.ubtn').hide();
			}
		});
	}
</script>



</body>
</html>