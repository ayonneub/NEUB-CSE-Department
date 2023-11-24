<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_POST['submit_btn'])) {
    $Student_id = $_POST['Student_id'];
    $Student_Name = $_POST['Student_Name'];
    $Email = $_POST['Email'];
    $Session = $_POST['Session'];

    $insertQuery = "INSERT INTO `student`(`Student_id`,`Student_Name`,`Email`, `Session`) VALUES ('$Student_id','$Student_Name','$Email','$Session')";

    if ($conn->query($insertQuery) == true) {
        $result = "Data Inserted Successfully.";
    } else {
        die($conn->error);
    }
    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `student`";
    $result_data = $conn->query($selectQuery);

    if ($result_data == true) {
        header("Location: Sti.php");
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

            <label>Enter Student Id:</label><input type="text" name="Student_id" placeholder="Student Id" required><br><br>
            <label>Enter Student Name:</label><input type="text" name="Student_Name" placeholder="Student Name" required><br><br>
            <label>Enter Student Email:</label><input type="text" name="Email" placeholder="Student Email" required><br><br>
            <label>Enter Session:</label><input type="text" name="Session" placeholder="Session" required><br><br>
            <input type="submit" name="submit_btn">

        </form>
    </body>
</html>