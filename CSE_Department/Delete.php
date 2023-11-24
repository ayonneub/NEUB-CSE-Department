<?php
    include_once 'Connectdata.php';
    if(isset($_GET['ti_id'])){
        $Product_id=$_GET['ti_id'];
        $delete_id="DELETE FROM `teacher` WHERE Teacher_id=$Product_id";
        $delete_row=$conn->query($delete_id);
        if($delete_row==TRUE){
            header("Location: ti.php");
        }else{
            die($conn->error);
        }
    }else if(isset($_GET['Sti_id'])){
            $Product_id=$_GET['Sti_id'];
            $delete_id="DELETE FROM `student` WHERE Student_id=$Product_id";
            $delete_row=$conn->query($delete_id);
            if($delete_row==TRUE){
                header("Location: Sti.php");
            }else{
                die($conn->error);
            }
        }else if(isset($_GET['Cr_id'])){
            $Product_id=$_GET['Cr_id'];
            $delete_id="DELETE FROM `course` WHERE Course_id='$Product_id'";
            $delete_row=$conn->query($delete_id);
            if($delete_row==TRUE){
                header("Location: Cr.php");
            }else{
                die($conn->error);
            }
        }else if(isset($_GET['rslt_id'])){
            $Product_id=$_GET['rslt_id'];
            $delete_id="DELETE FROM `result` WHERE Result_id=$Product_id";
            $delete_row=$conn->query($delete_id);
            if($delete_row==TRUE){
                header("Location: rslt.php");
            }else{
                die($conn->error);
            }
        }
        else if(isset($_GET['csesoc_id'])){
            $Product_id=$_GET['csesoc_id'];
            $delete_id="DELETE FROM `cse_society` WHERE Member_id=$Product_id";
            $delete_row=$conn->query($delete_id);
            if($delete_row==TRUE){
                header("Location: csesoc.php");
            }else{
                die($conn->error);
            }
        }
        else if(isset($_GET['syl_id'])){
            $Product_id=$_GET['syl_id'];
            $delete_id="DELETE FROM `syllabus` WHERE Syllabus_id=$Product_id";
            $delete_row=$conn->query($delete_id);
            if($delete_row==TRUE){
                header("Location: syl.php");
            }else{
                die($conn->error);
            }
        }
?>