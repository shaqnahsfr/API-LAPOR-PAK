<?php

    include('connect.php');

    $email      =$_POST['email'];
    $password   =$_POST['password'];

    $encrypted_password = md5($password);

    if(!empty($email) && !empty($password)){
        
        $sqlCheck = "SELECT * FROM user WHERE email='$email' AND password='$encrypted_password'";
        $queryCheck = mysqli_query($connect,$sqlCheck);
        $hasilCheck = mysqli_fetch_array($queryCheck);

        if($hasilCheck[0] > 0){
            $data['status'] = true;
            $data['result'] = 'Selamat Datang!';
            $data['nama_lengkap'] = $hasilCheck[nama_lengkap];
            $data['nik'] = $hasilCheck[nik];
            $data['no_hp'] = $hasilCheck[no_hp];
            $data['email'] = $hasilCheck[email];
            $data['username'] = $hasilCheck[username];
            $data['foto'] = $hasilCheck[foto];
        }else{
            $data['status'] = false;
            $data['result'] = 'Try Again!';
        }
    }else{
        $data['status'] = false;
        $data['result'] = "Gagal, data tidak boleh kosong!";
    }
            
 
    print_r(json_encode($data));

?>