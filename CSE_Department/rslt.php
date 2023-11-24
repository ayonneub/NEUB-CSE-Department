<!DOCTYPE html>

<?php
include "connectdata.php";
//Insert Data
$result = NULL;
//Data Fatching code
$fetchQuery = "SELECT * FROM result,student where student.student_id=result.student_id";
$result_data = $conn->query($fetchQuery);
?>



<html class="no-js" lang="">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Meta for Search Engine -->
        <meta name="keywords" content="Website,Web Design,Web Development">
        <meta name="description" content="">

        <!-- Title --->
        <title>Admin Panel -CSE </title>

        <!-- Favicons -->
        <link rel="icon" type="image/x-icon" href="img/">

        <!-- Font Awesome Icon CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

        <!-- BootStrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <!-- Google Font -->

        <!-- HTML5 Boilerplate CSS -->
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/main.css">

        <!-- Customize CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/media.css"/>

        <!--HTML5shiv Js-->
        <script src="assets/js/modernizr-3.5.0.min.js"></script>
    </head>
    <body>

        <div class="container">

            <div class="col-sm-12">
                <div class="table-responsive">
                    <?php
                    if ($result_data->num_rows > 0) {
                        ?>
                        <table class="table table-bordered table-striped table-hover ">
                            <caption class="h1"> Student Result</caption>
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Result Id</th>
                                    <th>student's Id</th>
                                    <th>Student's name</th>
                                    <th>CGPA</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = $result_data->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['Result_id']; ?></td>
                                        <td><?php echo $row['Student_id']; ?></td>
                                        <td><?php echo $row['Student_Name']; ?></td>
                                        <td><?php echo $row['CGPA']; ?></td>
                                        <td>
                                            <a href="rsltEdit.php?erslt_id=<?php echo $row['Result_id']; ?>"><button type="button" class="btn-success">Edit</button></a>
                                            <a href="delete.php?rslt_id=<?php echo $row['Result_id']; ?>"><button type="button" name="delete" class="btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
                <a href="rsltDynamic.php" class="btn btn-primary">Add</a>
                <a href="InterFace.php" class="btn btn-primary">Home Page</a>
            </div>


        </div>















        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-3.2.1.min.js"><\/script>')</script>

        <!-- Bootstrap Js -->
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Custom JS --->
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga = function () {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
