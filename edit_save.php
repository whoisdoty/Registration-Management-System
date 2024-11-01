<?php


include "connection.php";

$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$id = $_POST['id'];


$stmt = $conn->prepare("UPDATE tbl_users 
                SET name= ?, age= ?, address= ?, gender=? WHERE id=?");

$stmt->bind_param("sissi", $name, $age, $address, $gender, $id);
if ($stmt->execute()) {
    echo "<script type='text/javascript'>
            alert('Updated successfully!');
             window.location.href = 'registration_form.php';
          </script>";
} else {
    echo "<script type='text/javascript'>
            alert('Update failed!');
             window.location.href = 'registration_form.php';
          </script>";
}
$stmt->close();


?>