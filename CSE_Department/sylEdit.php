<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_GET['esyl_id'])) {
    $cr_id = $_GET['esyl_id'];


    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM syllabus WHERE Syllabus_id='$cr_id'";
    $result_data = $conn->query($selectQuery);

    if (isset($_POST['updateinfo'])) {
        $course_code = $_POST['course_code'];
        $course_details = $_POST['course_details'];
        //$Credit = $_POST['Credit'];

        $updatQuery = "UPDATE `syllabus` SET `course_code`='$course_code',`course_details`='$course_details' WHERE Syllabus_id='$cr_id'";

        if ($conn->query($updatQuery) == TRUE) {
            header("Location: syl.php");
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Course  Information||admin</title>
        </head>
        <body>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
    while ($row = $result_data->fetch_assoc()) {
        ?>
                    <label>Enter Course Code:</label><input type="text" name="course_code" value="<?php echo $row['course_code']; ?>" placeholder="course_code" required><br><br>
                    <label>Enter course_details:</label><input type="text" name="course_details" value="<?php echo $row['course_details']; ?>" placeholder="course_details" required><br><br>
                    
                    <input type="submit" name="updateinfo">
    <?php } ?>
            </form>
        </body>
    </html>
<?php } ?>