<?php 
    include('connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        form{
            max-width: 500px;
            margin: 4em auto;
            margin-top: 2.5em;
        }
        input{
            display: block;
            width: 100%;
            font-size: 1.1em;
            padding: 8px;
            margin: 1em 0;
        }
        input[type="submit"]{
            width: 104%;
            background-color: #010168;
            color: white;
            cursor: pointer;
        }
        label{
            font-size: 1.1em;
        }
        .flex-container{
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
            gap:2em;
        }
        .flex-container button{
            font-size: 1em;
            background-color: black;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="flex-container">
        <a href="index.php"><button>View All Students</button></a>
        <a href="insert.php"><button>Insert Student</button></a>
    </div>
    <form action="" method="post">
<?php 
    if(isset($_GET['student'])){
        $edit_query = "select * from student_details where roll_no={$_GET['student']}";
        $result_query = mysqli_query($connect,$edit_query);
        if(mysqli_num_rows($result_query)>0){
            while($row = mysqli_fetch_assoc($result_query)){
                $name = $row['name'];
                $age = $row['age'];
                echo "<label for='name'>Name: </label><input type='text' name='name' value=$name required>";
                echo "<label for='age'>Age: </label><input type='number' name='age' value=$age required>";
                echo "<input name=\"update_student\" type=\"submit\" value=\"Update Student\">";
            }
        }
    }
    ?>
    </form>
    <?php 
        if(isset($_POST['update_student'])){
            $name = $_POST["name"];
            $age = $_POST["age"];
            $update_query = "update student_details set name='$name',age=$age where roll_no={$_GET['student']}";
            $result_query = mysqli_query($connect,$update_query);
            if($result_query>0){
                echo "<script>
                    alert('Student Updated Successfully');
                    window.location.href = 'index.php';
                </script>";
            }
        }
    ?>
</body>
</html>