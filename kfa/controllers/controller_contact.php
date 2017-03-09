<?php

session_start();

include '../libs/phpmailer/PHPMailerAutoload.php';

$errors = array();

if(isset($_POST['name'], $_POST['email'], $_POST['message'])){
    
    $fields = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'message' => $_POST['message']
    );
    
    foreach($fields as $field => $data){
        if(empty($data)){
            $errors[] = 'The ' . $field . ' field is required.';
        }
    }
    
    if(filter_var($fields['email'], FILTER_VALIDATE_EMAIL)){
            
        } else {
            $errors[] = $fields['email'] . ' is not email an address.';
        }
    
    if(empty($errors)){
        
        $m = new PHPMailer;
        
        $m->isSMTP();
        $m->SMTPAuth = true;
        
        $m->Host = 'takeo.hcservers.com';
        $m->Username = 'info@kfa.com.kh';
        $m->Password = '$KFA@123';
        $m->SMTPSecure = 'ssl';
        $m->Port = 465;
        
//        $m->isHTML();
        
        $m->Subject = 'This email is sent from www.kfa.com.kh by Customer';
        $m->Body = "From: ". $fields['name'] ." (". $fields['email'] .")\n\r". $fields['message'];
        
        $m->FromName = 'Customer';
        
        $m->AddReplyTo($fields['email'], $fields['name']);
        
        $m->AddAddress('info@kfa.com.kh', 'KFA Info');
        
        if($m->send()){
            $succeed = 'Your email has been sent successfully. Our agency will contact to you soon. Please continue browsing or return our to <a href="http://kfa.com.kh/index.php">home page</a> ';
            header('Location:http://kfa.com.kh/contact.php');
//            die();
        } else {
            $errors[] = 'Sorry, could not send email. Please check your internet connection and try again later.';
        }
        
    }
    
} else {
    $errors = 'Something went wrong';
}

$_SESSION['errors']=$errors;
$_SESSION['fields']=$fields;
$_SESSION['succeed']=$succeed;

header('Location:http://kfa.com.kh/contact.php');



?>