<?php

include "connection.php";

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE from tbl_users WHERE id = ?");
$stmt->bind_param("i", $id);


if ($stmt->execute()) {
    echo "<script type='text/javascript'>
            alert('Delete completed successfully!');
             window.location.href = 'registration_form.php';
          </script>";
} else {
    echo "<script type='text/javascript'>
            alert('Delete completed failed!');
             window.location.href = 'registration_form.php';
          </script>";
}

$stmt->close();

?>