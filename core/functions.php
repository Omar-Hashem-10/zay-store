<?php 


function check_request_post($method) {
  if($_SERVER["REQUEST_METHOD"] == $method)
  {
    return true;
  }else{
    return false;
  }
}

function check_post_input($input) {
  if(isset($_POST[$input]))
  {
    return true;
  }else{
    return false;
  }
}

function sanitize_input($input) {
  return trim(htmlspecialchars(htmlentities($input)));
}

function redirect($path)
{
  return header("Location: $path");
  exit;
}

