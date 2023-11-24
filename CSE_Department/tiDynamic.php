<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_POST['submit_btn'])) {
    $Teacher_id = $_POST['Teacher_id'];
    $Teacher_Name = $_POST['Teacher_Name'];
    $Phone_number = $_POST['Phone_number'];
    $Email = $_POST['Email'];
    $Designation = $_POST['Designation'];

    $insertQuery = "INSERT INTO `teacher`(`Teacher_id`,`Teacher_Name`, `Phone_number`, `Email`, `Designation`) VALUES ('$Teacher_id','$Teacher_Name','$Phone_number','$Email','$Designation')";

    if ($conn->query($insertQuery) == true) {
        $result = "Data Inserted Successfully.";
    } else {
        die($conn->error);
    }
    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `teacher`";
    $result_data = $conn->query($selectQuery);

    if ($result_data == true) {
        header("Location: ti.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Teachers Information||admin</title>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

            <label>Enter Teacher Id:</label><input type="text" name="Teacher_id" placeholder="Teacher Id" required><br><br>
            <label>Enter Teacher Name:</label><input type="text" name="Teacher_Name" placeholder="Teacher Name" required><br><br>
            <label>Enter Mobile Number:</label><input type="text" name="Phone_number" placeholder="Mobile Number" required><br><br>
            <label>Enter Teacher Email:</label><input type="text" name="Email" placeholder="Teacher Email" required><br><br>
            <label>Enter Designation:</label><input type="text" name="Designation" placeholder="Designation" required><br><br>
            <input type="submit" name="submit_btn">

        </form>
    </body>
</html>