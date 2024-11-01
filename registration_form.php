<?php
include "connection.php";
$stmt = $conn->prepare("SELECT * FROM tbl_users");
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
    
    <title>Registration</title>
</head>
<body>
    <div class="w3-container w3-teal">
        <form action="form_save.php" method="post" class="w3-container">
            <h1>REGISTRATION FORM</h1>
            
            <label>Name:</label><br>
            <input type="text" name="name" class="w3-input w3-white"><br>
            
            <label>Age:</label><br>
            <input type="text" name="age" class="w3-input w3-white"><br>
            
            <label>Address:</label><br>
            <input type="text" name="address" class="w3-input w3-white"><br>
            
            <label>Gender:</label><br>
            <input type="radio" value="Male" name="gender"> Male
            <input type="radio" value="Female" name="gender"> Female<br><br>
            
            <button type="submit" name="btn_submit" class="w3-button w3-green">Submit Data Form</button>
        </form>
    </div>

    <div class="w3-container w3-teal ">
        <h2>Registered Users</h2>
        <table class="w3-table w3-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td>
                            <a class="w3-btn w3-red" href="registration_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            <a class="w3-btn w3-green" href="registration_edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
