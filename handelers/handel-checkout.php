<?php
session_start();
include_once ("../core/functions.php");
include_once ("../core/validations.php");
$errors = [];



include_once ("../core/functions.php");
include_once ("../core/validations.php");

$errors = [];

if (check_request_post("POST")) {
    foreach ($_POST as $key => $value) {
        $$key = sanitize_input($value);
    }

    // Validations 
    // Governorate => required
    if (required_val($governorate)) {
        $errors[] = "Governorate Is Required";
    }

    // Validations 
    // name => required, min:3, max:25
    if (required_val($name)) {
        $errors[] = "Name Is Required";
    } elseif (min_val_checkout($name, 3)) {
        $errors[] = "Name Must Be Greater Than 3 Chars";
    } elseif (min_val_checkout($name, 25)) {
        $errors[] = "Name Must Be Smaller Than 25 Chars";
    }

    // Validations 
    // mobile number => required, min:11, max:11
    if (required_val($mobile)) {
        $errors[] = "Mobile Number Is Required";
    } elseif (check_num_pass($mobile)) {
        $errors[] = "Mobile Number Must Equal 11 Chars";
    }

    // Validations 
    // street name => required
    if (required_val($street_name)) {
        $errors[] = "Street Name Is Required";
    }

    if (empty($errors)) {
        $_SESSION['customer'] = [
            'name' => $name,
            'phone' => $mobile,
            'address' => $street_name,
            'governorate' => $governorate
        ];
        $_SESSION["success"] = "Data sent successfully";
        redirect("../checkout.php");
    } else {
        $_SESSION["errors"] = $errors;
        redirect("../checkout.php");
        die;
    }
} else {
    echo "Not Supported Method: " . $_SERVER["REQUEST_METHOD"];
}
?>


<?php require_once("stor-order.php") ?>




