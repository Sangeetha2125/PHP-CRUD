<?php 
    include('connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <style>
        .students{
            padding: 2em;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2em;
            max-width: 1100px;
            margin:auto;
        }
        .students .student{
            padding: 10px;
            border: 2px solid black;
            border-radius: 8px;
            padding: 14px;
            font-size: 1.2em;
        }
        .student a{
            display: block;
            padding: 8px;
            border-radius: 4px;
            text-align: center;
            margin-top:1em;
        }
        .student button{
            border: none;
            background-color: transparent;
            color: white;
            text-align: center;
            font-size: 0.9em;
            width: 100%;
            cursor: pointer;
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
        .flex-btns{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8em;
            width: 100%;
        }
        .delete-student{
            background-color: #720303;
        }
        .edit-student{
            background-color: purple;
        }
    </style>
</head>
<body>
    <div class="flex-container">
        <a href="index.php"><button>View All Students</button></a>
        <a href="insert.php"><button>Insert Student</button></a>
    </div>
    <div class="students">
    <?php 
        if($connect){
            $select_query = "select * from student_details";
            $result_query = mysqli_query($connect,$select_query);
            if(mysqli_num_rows($result_query)>0){
                while($row = mysqli_fetch_assoc($result_query)){
                    $rollno = $row['roll_no'];
                    $name = $row['name'];
                    $age = $row['age'];
                    echo "<div class='student'>";
                    echo "<div>$rollno - $name - $age</div>";
                    echo "<div class='flex-btns'><a class='edit-student' href='edit.php?student=$rollno'><button>Edit Student</button></a><a class='delete-student' href='delete.php?student=$rollno'><button>Delete Student</button></a></div>";
                    echo "</div>";
                }
            }
        }
    ?>
    </div>
</body>
</html>