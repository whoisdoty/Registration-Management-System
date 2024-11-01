<?php

include("connection.php");

$name = $_POST["name"];
$age = $_POST["age"];
$address = $_POST["address"];
$gender = $_POST["gender"];

$stmt = $conn ->prepare("INSERT INTO tbl_users (name, age, address, gender) values (?,?,?,?)");
$stmt ->bind_param("siss", $name, $age, $address, $gender);

if ($stmt -> execute())
{echo 
    "<script type='text/javascript'>
    alert('Updated successfully!');
    window.location.href = 'registration_form.php';
    </script>";
} else 
{echo 
    "<script type='text/javascript'>
    alert('Update failed!');
    window.location.href = 'registration_form.php';
    </script>";
}
$stmt -> close();