<?php 

session_start();

require_once("../core/functions.php");
require_once("../core/validations.php");
$errors = [];

$conn = mysqli_connect("localhost", "root", "", "zay-store");

if(check_request_post("POST") && check_post_input("name") && check_post_input("email") && check_post_input("subject") && check_post_input("message"))
{

  $name = sanitize_input($_POST["name"]);

  $email = trim($_POST["email"]);;

  $subject = sanitize_input($_POST["subject"]);

  $message = sanitize_input($_POST["message"]);

  if(required_val($name))
  {
    $errors[] = "Name Is Required";
  }elseif(min_val($name))
  {
    $errors[] = "Name Must Be Greater Than 3 Chars";
  }elseif(max_val($name))
  {
    $errors[] = "Name Must Be Smaller Than 2000 Chars";
  }

  if(required_val($email))
  {
    $errors[] = "Email Is Required";
  } 

  if(required_val($subject))
  {
    $errors[] = "Subject Is Required";
  } 

  if(required_val($message))
  {
    $errors[] = "Message Is Required";
  } 

  if(!empty($errors))
  {
    $_SESSION["errors"] = $errors;
    redirect("../contact.php");
    die;
  }else{
    $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`)
  VALUES
    (
      '$name',
      '$email',
      '$subject',
      '$message'
    )
  ";
  mysqli_query($conn, $sql);
  if(mysqli_affected_rows($conn))
  {
    $_SESSION["success"] = "data send successfully";
  } 
  redirect("../contact.php");
  die;
  }
}

