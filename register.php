<?php

	include('connect.php');

	$nama_lengkap	=$_POST['nama_lengkap'];
	$nik			=$_POST['nik'];
	$no_hp			=$_POST['no_hp'];
	$email			=$_POST['email'];
	$username		=$_POST['username'];
	$password		=md5($_POST['password']);

	if(!empty($nama_lengkap) && !empty($nik) && !empty($no_hp) && !empty($email) && !empty($username) && !empty($password)){

		$sqlCheck = "SELECT COUNT(*) FROM user WHERE nik='$nik' OR email='$email' OR username='$username'";
		$queryCheck = mysqli_query($connect,$sqlCheck);
		$hasilCheck = mysqli_fetch_array($queryCheck);
		

		if($hasilCheck[0] == 0){
			$sql = "INSERT INTO user (nama_lengkap,nik,no_hp,email,username,password) VALUES('$nama_lengkap','$nik','$no_hp','$email','$username','$password')";
            $query  =  mysqli_query($connect,$sql);

            if(mysqli_affected_rows($connect) > 0){
                $data['status'] = true;
                $data['result'] = "Berhasil";
            }else{
                $data['status'] = false;
                $data['result'] = "Gagal";
            }
		}else{
			$data['status'] = false;
            $data['result'] = "Gagal, Gunakan NIK, Email dan Username yang Belum Terdaftar";	
		}

	}else{
		$data['status'] = false;
        $data['result'] = "Gagal, data tidak boleh kosong!";
	}

	print_r(json_encode($data));

?>