<?php


    $errors = [];
    $data = [];
    

    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required.';
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required.';
    }

    if (empty($_POST['phone'])) {
        $errors['phone'] = 'Number is required.';
    }
    if (empty($_POST['subject'])) {
        $errors['subject'] = 'Subject is required.';
    }

    if (empty($_POST['message'])) {
        $errors['message'] = 'Message is required.';
    }
    
    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
       
        
        require_once 'config.php';

      
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];


        $sql = "INSERT INTO spscontact (name, email, phone,subject, message) VALUES('$name', '$email', '$phone', '$subject', '$message')";
        $query = mysqli_query($conn, $sql);
        
        $data['success'] = true;
        $data['message'] =  "Success!";
      
        
    }
    
    echo json_encode($data);