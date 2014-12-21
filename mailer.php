<?php
/**
 * Created by PhpStorm.
 * User: Code Architect
 * Date: 12/15/2014
 * Time: 1:17 AM
 */

//Check for $_POST data
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Get and Sanitize post values
    $name = strip_tags(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
    $message = trim($_POST['message']);
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];

    // Simple validation
    if(empty($name) OR empty($message) OR empty($email)){
        // Set 400 (bad request) request response code and exit
        http_response_code(400);
        echo 'Please check your form fields';
        exit();
    }

    //Build message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message: \n$message";

    //Build headers
    $headers = "From: $name <$email>";

    //Send email
    if(mail($recipient, $subject, $email_message, $headers)){
        //Set 200 Response (success)
        http_response_code(200);
        echo "Thank you.Your message has been send";
    }else{
        //Set 500 Response(internal server error)
        http_response_code(500);
        echo "Error: There was a problem sending your message";
    }

}else{
    // Set 403 Response; aka forbidden
    http_response_code(403);
    echo "There Was a problem with your submission. Please try again";
}




