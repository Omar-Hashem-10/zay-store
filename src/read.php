<?php

$conn = mysqli_connect("localhost", "root", "", "zay-store");

function get_all($table_name)
{
  global $conn;

  $sql = "SELECT * FROM `$table_name`";

  return  mysqli_query($conn, $sql);
}