<?php

	include('../connect.php');

	$sql = "SELECT * FROM table_info_aplikasi";

	$query = mysqli_query($connect,$sql);

	if(mysqli_num_rows($query) > 0){
		while($row = mysqli_fetch_object($query)){
			$data['status'] = true;
			$data['result'][] = $row;
		}
	}else{
		$data['status'] = false;
		$data['result'] = "Data not found";
	}

	print_r(json_encode($data));

?>