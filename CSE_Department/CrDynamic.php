<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_POST['submit_btn'])) {
    $Course_id = $_POST['Course_id'];
    $Course_name = $_POST['Course_name'];
    $Credit = $_POST['Credit'];

    $insertQuery = "INSERT INTO `course`(`Course_id`,`Course_name`,`Credit`) VALUES ('$Course_id','$Course_name','$Credit')";

    if ($conn->query($insertQuery) == true) {
        $result = "Data Inserted Successfully.";
    } else {
        die($conn->error);
    }
    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `course`";
    $result_data = $conn->query($selectQuery);

    if ($result_data == true) {
        header("Location: Cr.php");
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

            <label>Enter Course Code:</label><input type="text" name="Course_id" placeholder="Course_id" required><br><br>
            <label>Enter Course Name:</label><input type="text" name="Course_name" placeholder="Course Name" required><br><br>
           <label>Enter Credit:</label><input type="text" name="Credit" placeholder="Credit" required><br><br>
            <input type="submit" name="submit_btn">

        </form>
    </body>
</html>