<?php

	include('../connect.php');

	$id = $_POST['id'];

	$sql = "UPDATE table_laporan set status_laporan='Diproses' WHERE id='$id'";
	$query = mysqli_query($connect,$sql);

	if(mysqli_affected_rows($connect) > 0){
        $data['status'] = true;
        $data['result'] = "Berhasil";
    }else{
        $data['status'] = false;
        $data['result'] = "Gagal";
    }

    print_r(json_encode($data));

?>