<?php
include "data.php";
$data = new data();
if(!empty($_REQUEST['edit'])){
	$resp = $data->fetch($_REQUEST['edit']);
	$row1 = mysqli_fetch_assoc($resp);
}
if(!empty($_REQUEST['id'])){
	$params['id'] = $_REQUEST['id'];
	$params['name'] = $_REQUEST['name'];
	$params['city'] = $_REQUEST['city'];
	$resp = $data->update($params);
	if($resp == 'success'){
		$msg = "done";
	}else{	$msg = "error"; }
}
elseif(!empty($_POST)){
	$params['name'] = $_REQUEST['name'];
	$params['city'] = $_REQUEST['city'];
	$resp = $data->insert($params);
	if($resp == 'success'){
		$msg = "done";
	}else{	$msg = "error"; }
}
?>
<table>
<form action="" method="post">
	<?php if(!empty($msg)){ echo $msg; } 
		if(!empty($row1)){ ?>
	<input type="hidden" name="id" value="<?php echo (!empty($row1['id']))?$row1['id']: ""?>">
	<?php }else{ ?>
	<input type="hidden" name="save" value='0'>
	<?php } ?> 
<tr><td>Name</td>
	<td><input type="text" name="name" value="<?php echo (!empty($row1['name']))?$row1['name']: ""?>"></td>
</tr>
<tr><td>City</td>
	<td><input type="text" name="city" value="<?php echo (!empty($row1['city']))?$row1['city']: ""?>"></td>
</tr>
<tr><td><input type="submit" name="submit"/></td></tr>
</form>
</table>
<table>
<tr><th>Name</th><th>City</th><?php
		$sql = "select * from phpcrud";
		$query = mysqli_query($data->conn,$sql); 
	if(!empty($query)){  while($row3 = mysqli_fetch_assoc($query)){ ?>
	<tr><td><?php echo $row3['name']; ?></td>
		<td><?php echo $row3['city']; ?></td>
		<td><a href="index.php?edit=<?php echo $row3['id']; ?>">Edit</a></td>
	</tr>
<?php } }else{ echo "error"; }?>
</table>