<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Nom requis ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email requis ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject requis ";
} else {
    $msg_subject = $_POST["msg_subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message requis ";
} else {
    $message = $_POST["message"];
}

//Add your email here
$EmailTo = "augustin.meignan@gmail.com";
$Subject = "Nouveau message CV";

// prepare email body text
$Body = "";
$Body .= "Nom: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Sujet: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "message envoyé";
}else{
    if($errorMSG == ""){
        echo "Oups, quelque chose n'a pas fonctionné comme prévu";
    } else {
        echo $errorMSG;
    }
}

?>