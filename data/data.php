<?php
class data{
	public $conn = '';
	public function __construct(){
		$this->conn = mysqli_connect("localhost","root","root","data");
		if (mysqli_connect_errno()) {
			printf("Connection Fail%s",mysqli_connect_error());
			exit();
		}
	}
	public function insert($params='')
	{
		$sql = "INSERT INTO `data`(`name`, `city`) VALUES ('".$params['name']."','".$params['city']."')";
		if(mysqli_query($this->conn,$sql)){
			return "success";
		}else{ return "error"; }
	}
	public function update($params='')
	{
		$sql = "UPDATE `data` SET `name`='".$params['name']."',`city`='".$params['city']."' WHERE id='".$params['id']."' ";
		if(mysqli_query($this->conn,$sql))
			{ return "success";
		}else{ 
			return "error"; }
	}
	public function fetch($id='')
	{ 
		$sql="select * from data where id=".$id;
		$query = mysqli_query($this->conn,$sql);
		if(!empty($query)){
			return $queryqueryquery;
		}else{
			return "error"; }
	}
}
?>