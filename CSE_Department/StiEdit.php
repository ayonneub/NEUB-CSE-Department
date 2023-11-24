<?php
include 'connectdata.php';
$result = null;
$result_data = null;

if (isset($_GET['esti_id'])) {
    $st_id = $_GET['esti_id'];


    //$result=$news_title."<br/> ".$news_date."<br> ".$news_image." <br><br>".$news_content."<br>".$category_id;
    $selectQuery = "SELECT * FROM `student` WHERE Student_id=$st_id";
    $result_data = $conn->query($selectQuery);

    if (isset($_POST['updateinfo'])) {
        $Name = $_POST['Student_Name'];
        $Email = $_POST['Email'];
        $Session = $_POST['Session'];

        $updatQuery = "UPDATE `student` SET `Student_Name`='$Name',`Email`='$Email',`Session`='$Session' WHERE Student_id=$st_id";

        if ($conn->query($updatQuery) == TRUE) {
            header("Location: Sti.php");
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Student Information||admin</title>
        </head>
        <body>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
    while ($row = $result_data->fetch_assoc()) {
        ?>
                    <label>Enter Student Name:</label><input type="text" name="Student_Name" value="<?php echo $row['Student_Name']; ?>" placeholder="Student Name" required><br><br>
                    <label>Enter Student Email:</label><input type="text" name="Email" value="<?php echo $row['Email']; ?>" placeholder="Student Email" required><br><br>
                    <label>Enter Session:</label><input type="text" name="Session" value="<?php echo $row['Session']; ?>" placeholder="Session" required><br><br>
                    <input type="submit" name="updateinfo">
    <?php } ?>
            </form>
        </body>
    </html>
<?php } ?>