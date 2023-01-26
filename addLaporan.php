<?php

	include('connect.php');

	$jenis_laporan		=$_POST['jenis_laporan'];
	$username			=$_POST['username'];
	$nama_lengkap 		=$_POST['nama_lengkap'];
	$no_hp				=$_POST['no_hp'];
	$maps				=$_POST['maps'];
	$ltd				=$_POST['ltd'];
	$lng 				=$_POST['lng'];
	$lokasi_detail		=$_POST['lokasi_detail'];
	$tgl_kejadian		=$_POST['tgl_kejadian'];
	$keterangan			=$_POST['keterangan'];
	$status_laporan		=$_POST['status_laporan'];
	
	date_default_timezone_set('Asia/Makassar');
    $dateImage      = date('YmdHis');
    $web            = "LAPOR-PAK!";
    $foto          = $_POST['foto'];
    $nama_foto     = $web."_".$dateImage.".jpg";

    $photo_loc      ='image_laporpak/'.$nama_foto;
    file_put_contents($photo_loc, base64_decode($foto));

    if(!empty($jenis_laporan) && !empty($username) && !empty($nama_lengkap) && !empty($no_hp) && !empty($maps) && !empty($ltd) && !empty($lng) && !empty($tgl_kejadian) && !empty($keterangan) && !empty($status_laporan)){

    	$sql = "INSERT INTO table_laporan (jenis_laporan,username,nama_lengkap,no_hp,maps,ltd,lng,lokasi_detail,tgl_kejadian,keterangan,status_laporan,foto) VALUES('$jenis_laporan','$username','$nama_lengkap','$no_hp','$maps','$ltd','$lng','$lokasi_detail','$tgl_kejadian','$keterangan','$status_laporan','$nama_foto')";
    	$query = mysqli_query($connect,$sql);

    	if (mysqli_affected_rows($connect) > 0) {
    		$data['status'] = true;
            $data['result'] = "Berhasil";
    	}else{
    		$data['status'] = false;
            $data['result'] = "Gagal";
    	}

    }else{
    	$data['status'] = false;
        $data['result'] = "Gagal, Data tidak boleh kosong!";
    }

    print_r(json_encode($data));

?>