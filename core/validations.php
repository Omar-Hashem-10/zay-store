<?php


function required_val($input) {
  if(empty($input))
  {
    return true;
  }else {
    return false;
  }
}

function min_val($input)
{
  if(strlen($input) < 3)
  {
    return true;
  }else{
    return false;
  }
}

function max_val($input)
{
  if(strlen($input) > 200)
  {
    return true;
  }else{
    return false;
  }
}

// Check if the input length is less than the specified length
function min_val_checkout($input, $length)
{
  if (strlen($input) < 3) {
    return true;
  }
  return false;
}


// Check if the input length is greater than the specified length
function max_val_checkout($input, $length)
{
  if (strlen($input) > 25) {
    return true;
  }
  return false;
}

// Check if the phone number length is not 11
function check_num_pass($num)
{
  $count_num = strlen($num);
  if ($count_num != 11) {
    return true;
  } else {
    return false;
  }
}
