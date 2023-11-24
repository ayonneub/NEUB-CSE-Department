<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_POST['submit_btn'])) {
    $course_code = $_POST['course_code'];
    $course_details = $_POST['course_details'];
   // $course_details = $_POST['course_details'];

    $insertQuery = "INSERT INTO `syllabus`(`course_code`,`course_details`) VALUES ('$course_code','$course_details')";

    if ($conn->query($insertQuery) == true) {
        $result = "Data Inserted Successfully.";
    } else {
        die($conn->error);
    }
    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM course,syllabus where syllabus.course_code=course.Course_id";
    $result_data = $conn->query($selectQuery);

    if ($result_data == true) {
        header("Location: syl.php");
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

            <label>Enter Course Code:</label><input type="text" name="course_code" placeholder="course_code" required><br><br>
          
           <label>Enter course_details:</label><input type="text" name="course_details" placeholder="course_details" required><br><br>
            <input type="submit" name="submit_btn">

        </form>
    </body>
</html>