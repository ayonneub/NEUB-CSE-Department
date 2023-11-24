<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_GET['erslt_id'])) {
    $rslt_id = $_GET['erslt_id'];


    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `result` WHERE Result_id=$rslt_id";
    $result_data = $conn->query($selectQuery);

    if (isset($_POST['updateinfo'])) {
       // $Result_id = $_POST['Result_id'];
        $Student_id = $_POST['Student_id'];
       // $Student_Name = $_POST['Student_Name'];
        $CGPA = $_POST['CGPA'];

        $updatQuery = "UPDATE `result` SET `Student_id`='$Student_id',`CGPA`='$CGPA' WHERE Result_id=$rslt_id";

        if ($conn->query($updatQuery) == TRUE) {
            header("Location: rslt.php");
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Student Result||admin</title>
        </head>
        <body>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
    while ($row = $result_data->fetch_assoc()) {
        ?>
                   
                    <label>Enter Student ID:</label><input type="text" name="Student_id" value="<?php echo $row['Student_id']; ?>" placeholder="Student ID" required><br><br>
                   
                    <label>Enter CGPA:</label><input type="text" name="CGPA" value="<?php echo $row['CGPA']; ?>" placeholder="CGPA" required><br><br>
                    <input type="submit" name="updateinfo">
    <?php } ?>
            </form>
        </body>
    </html>
<?php } ?>