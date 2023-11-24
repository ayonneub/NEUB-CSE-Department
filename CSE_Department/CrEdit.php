<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_GET['eCr_id'])) {
    $cr_id = $_GET['eCr_id'];


    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `course` WHERE Course_id='$cr_id'";
    $result_data = $conn->query($selectQuery);

    if (isset($_POST['updateinfo'])) {
        $Course_id = $_POST['Course_id'];
        $Course_name = $_POST['Course_name'];
        $Credit = $_POST['Credit'];

        $updatQuery = "UPDATE `course` SET `Course_id`='$Course_id',`Course_name`='$Course_name',`Credit`='$Credit' WHERE Course_id='$cr_id'";

        if ($conn->query($updatQuery) == TRUE) {
            header("Location: Cr.php");
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
                    <label>Enter Course Code:</label><input type="text" name="Course_id" value="<?php echo $row['Course_id']; ?>" placeholder="Course_id" required><br><br>
                    <label>Enter Course Name:</label><input type="text" name="Course_name" value="<?php echo $row['Course_name']; ?>" placeholder="Course Name" required><br><br>
                    <label>Enter Credit:</label><input type="text" name="Credit" value="<?php echo $row['Credit']; ?>" placeholder="Credit" required><br><br>
                    <input type="submit" name="updateinfo">
    <?php } ?>
            </form>
        </body>
    </html>
<?php } ?>