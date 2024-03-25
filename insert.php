<?php 
    include('connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student</title>
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
            background-color: darkgreen;
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
        <label for="name">Name: </label><input type="text" name="name" required>
        <label for="age">Age: </label><input type="number" name="age" required>
        <input name="create_student" type="submit" value="Insert Student">
    </form>
    <?php 
        if(isset($_POST['create_student'])){
            $name = $_POST["name"];
            $age = $_POST["age"];
            $insert_query = "insert into student_details(name,age) values('$name',$age)";
            $result_query = mysqli_query($connect,$insert_query);
            if($result_query>0){
                echo "<script>
                    alert('Student Inserted Successfully');
                    window.location.href = 'index.php';
                </script>";
            }
        }
    ?>
</body>
</html>