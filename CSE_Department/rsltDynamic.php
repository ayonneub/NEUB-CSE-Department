<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_POST['submit_btn'])) {
  //  $Result_id = $_POST['Result_id'];
    $Student_id = $_POST['Student_id'];
  //  $Student_Name = $_POST['Student_Name'];
    $CGPA = $_POST['CGPA'];

    $insertQuery = "INSERT INTO `result`(`Student_id`,`CGPA`) VALUES ('$Student_id','$CGPA')";

    if ($conn->query($insertQuery) == true) {
        $result = "Data Inserted Successfully.";
    } else {
        die($conn->error);
    }
    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `result`";
    $result_data = $conn->query($selectQuery);

    if ($result_data == true) {
        header("Location: rslt.php");
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
 
            <label>Enter CGPA:</label><input type="text" name="CGPA" placeholder="CGPA" required><br><br>
            <input type="submit" name="submit_btn">

        </form>
    </body>
</html>