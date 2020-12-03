<?php
$conn=mysqli_connect("localhost","root","","product");

//insert
if(isset($_POST['name']) && isset($_POST['price']))
{
	$name=$_POST['name'];
	$price=$_POST['price'];
	mysqli_query($conn,"INSERT INTO item(name,price) VALUES ('$name','$price')");
}

//select
if(isset($_POST['select']))
{
	$sql=mysqli_query($conn,"SELECT * FROM item");
	$data="";
	$data.='<table class="table table-bordered table-striped"> 
			<tr class="bg bg-dark text-white">
				<th>ID</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>';
	while($row=mysqli_fetch_assoc($sql))
	{
		$data.='<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['price'].'</td>
				<td><button class="btn btn-danger" onclick="editData('.$row['id'].')">Edit</button></td>
				<td><button class="btn btn-dark" onclick="deleteData('.$row['id'].')">Delete</button></td>
			</tr>';
	}
	$data.='</table>';
	echo $data;
}

//delete
if(isset($_POST['id']))
{
	$id=$_POST['id'];
	mysqli_query($conn,"DELETE FROM item WHERE id='$id'");
}

//edit
if(isset($_POST['eid']))
{
	$id=$_POST['eid'];
	$sql=mysqli_query($conn,"SELECT * FROM item WHERE id='$id'");
	$row=mysqli_fetch_assoc($sql);
	echo json_encode($row); //assoc array ko jason format pygg
}

//update
if(isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['uprice']))
{
	$id=$_POST['uid'];
	$name=$_POST['uname'];
	$price=$_POST['uprice'];
	mysqli_query($conn,"UPDATE item SET name='$name',price='$price' WHERE id='$id'");
}

?>