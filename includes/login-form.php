<?php


    $errors = [];
    $data = [];
 

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required.';
    }


    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required.';
    }
    
    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
       
        
        require_once 'config.php';

      
        $email = $_POST['email'];
        $pass = $_POST['password'];


        // $sql = "INSERT INTO spscontact (name, email, phone,subject, message) VALUES('$name', '$email', '$phone', '$subject', '$message')";
        $sql = "SELECT * FROM login
WHERE email='$email' and password='$pass'";
        $query = mysqli_query($conn, $sql);

        if($query){
            $row = mysqli_num_rows($query);
            if ($row)
              {
                 $data['success'] = true;
        $data['message'] =  "Success!";
              }
        }
        
        
      
        
    }
    
    echo json_encode($data);