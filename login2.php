<?php

    include('connect.php');

    $email      =$_POST['email'];
    $password   =$_POST['password'];

    $encrypted_password = md5($password);

    if(!empty($email) && !empty($password)){
        
        $sqlCheck = "SELECT * FROM user WHERE email='$email' AND password='$encrypted_password'";
        $obj_query = mysqli_query($connect, $sqlCheck);
        $data = mysqli_fetch_assoc($obj_query);

        if($data[0] > 0){
            echo json_encode(
                array(
                    'response' => true,
                    'payload' => array(
                        "nama_lengkap" => $data["nama_lengkap"],
                        "nik" => $data["nik"]
                    )
                )
            );
        }else{
            echo json_encode(
                array(
                    'response' => false,
                    'payload' => null
                )
            );
        }
    }else{
        echo json_encode(
            array(
                'response' => false,
                'payload' => "Data tidak boleh kosong"
            )
        );
    }

?>