<?php

include "connection.php";

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="style.css">
    <title>EDIT</title>
</head>

<body>
    <br>
    <form class="w3-container w3-teal" method="POST" action="edit_save.php">
        <?php
        $row = $result->fetch_assoc()
            ?>
        <input type="hidden" class="w3-input" name="id" value="<?php echo $_GET['id']; ?>">

        <label for="">Name</label>
        <input type="text" class="w3-input" name="name" value="<?php echo $row['name']; ?>"
            placeholder="<?php echo $row['name']; ?>">
        <br>
        <label for="">Age</label>
        <input type=" number" class="w3-input" name="age" value="<?php echo $row['age']; ?>"
            placeholder="<?php echo $row['age']; ?>" min="0">
        <br>
        <label for="">
            Addresss
        </label>
        <input type="text" class="w3-input" name="address" value="<?php echo $row['address']; ?>"
            placeholder="<?php echo $row['address']; ?>">
        <br>
        <label for="">Gender</label> <br>
        <?php
        if ($row['gender'] == 'Male') { ?>
            <input type="radio" value="Male" name="gender" id="" checked> Male <br>
            <input type="radio" value="Female" name="gender" id=""> Female <br>

            <?php
        } else { ?>
            <input type="radio" value="Male" name="gender" id=""> Male <br>
            <input type="radio" value="Female" name="gender" id="" checked> Female <br>
            <?php
        }
        ?>

        <br>
        <button class="w3-btn w3-blue w3-input" type="submit" name="btn-update">Update Data</button>
    </form>

</body>

</html>