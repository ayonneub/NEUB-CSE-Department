<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_POST['submit_btn'])) {
    $Member_id = $_POST['Member_id'];
    $common_id = $_POST['common_id'];
    $cse_Designation = $_POST['cse_Designation'];
    $Session = $_POST['Session'];

    $insertQuery = "INSERT INTO `cse_society`(`Member_id`,`common_id`,`cse_Designation`,`Session`) VALUES ('$Member_id','$common_id','$cse_Designation','$Session')";

    if ($conn->query($insertQuery) == true) {
        $result = "Data Inserted Successfully.";
    } else {
        die($conn->error);
    }
    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM cse_society,student where cse_society.common_id=student.Student_id";
    $result_data = $conn->query($selectQuery);

    if ($result_data == true) {
        header("Location: csesoc.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CSE Society||admin</title>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

            <label>Enter Member id:</label><input type="text" name="Member_id" placeholder="Member_id" required><br><br>
            <label>Enter common id:</label><input type="text" name="common_id" placeholder="common_id" required><br><br>
          
            <label>Enter Degination:</label><input type="text" name="cse_Designation" placeholder="cse_Designation" required><br><br>
            <label>Enter Session:</label><input type="text" name="Session" placeholder="Session" required><br><br>
            <input type="submit" name="submit_btn">

        </form>
    </body>
</html>