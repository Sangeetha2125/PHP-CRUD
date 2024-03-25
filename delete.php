<?php 
    include('connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
</head>
<body>
    <?php 
        if(isset($_GET['student'])){
            $delete_query = "delete from student_details where roll_no={$_GET['student']}";
            $result_query = mysqli_query($connect,$delete_query);
            if($result_query>0){
                echo "<script>
                    alert('Student Deleted Successfully');
                    window.location.href = 'index.php';
                </script>";
            }
        }
    ?>
</body>
</html>