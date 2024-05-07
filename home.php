<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <style>
        body{
            background-color:whitesmoke;
            font-family: "Tajawal", sans-serif;
        }
        #mother{
            width:100%;
            font-size:20px;
        
        }
        main{
            float:left;
            border:1px solid gray;
            padding:5px;

        }
        input{
            padding:4px;
            border:2px solid black;
            text-align:center;
            font-size:17px;
            font-family: "Tajawal", sans-serif;
        }
        aside{
            text-align:center;
            width:480px;
            Height:700px;
            float:right;
            border:1px solid black;
            padding:10px;
            font-size:20px;
            background-color:silver;
            color:white;
        }
        #tbl{
            width:890px;
            font-size:20px;
        }
        #tbl th{
            background-color:silver;
            color:black;
            font-size:20px;
            padding:10px;
            text-align:center;
        }
        #tbl td{
            padding:10px;
            text-align:center;
        }
        aside button{
            width: 190px;
            padding: 8px;
            margin-top: 20px;
            font-size: 17px;
            font-family: "Tajawal", sans-serif;
            font-weight: bold;
        }

    </style>
</head>
<body dir='rtl'>
    <?php
    #الاتصال مع قاعده البيانات
    $host= "localhost";
    $user= "root";
    $pass= "";
    $db= "student";
    $conn= mysqli_connect($host,$user,$pass,$db);
    $id='';
    $name='';
    $address='';
    $res= mysqli_query($conn,"SELECT * FROM student");
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    
    
    $sqls='';
    if(isset($_POST['add'])){
        $sqls = "insert into student values ($id,'$name','$address')";
        mysqli_query($conn, $sqls);
        header("location:home.php");
    }
    if(isset($_POST['delete'])){
        $sqls = "delete from student where id='$id'";
        mysqli_query($conn, $sqls);
        header("location:home.php");
    }
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $sqls = "UPDATE student SET name='$name', address='$address' WHERE id='$id'";
        if(mysqli_query($conn, $sqls)) {
            echo "تم تحديث بيانات الطالب بنجاح";
        } else {
            echo "خطأ في تحديث بيانات الطالب: " . mysqli_error($conn);
        }
    }   
    
    ?>
    <div id='mother'>
        <form method='POST'>
            <!--لوحه التحكم-->
            <aside>
                <div id='div'>
                    <img src='student.jpeg'alt='لوجو الموقع' width="200">
                    <h3>لوحه المدير</h3>
                    <label>رقم الطالب:</label><br>
                    <input type='text' name='id' id='id'><br>
                    <label>اسم الطالب:</label><br>
                    <input type='text' name='name' id='name'><br>
                    <label>عنوان الطالب:</label><br>
                    <input type='text' name='address' id='address'><br><br>
                    <button name='add'>اضافه طالب</button>
                    <button name='delete'>حذف طالب</button>
                    <button name='update'>تعديل طالب</button>
                    </form>
                </div>
                <button name='show'>عرض الطلاب</button><br>

            </aside>
            
            </table>
            </main>
            <!--عرض بيانات الطالب-->
<main>
    <table id='tbl'>
        <tr>
            <th>الرقم التسلسلي</th>
            <th>اسم الطالب </th>
            <th>عنوان الطالب</th>
        </tr>
        <?php
        $host= "localhost";
        $user= "root";
        $pass= "";
        $db= "student";
        $conn= mysqli_connect($host,$user,$pass,$db);
        $id='';
        $name='';
        $address='';
        $res= mysqli_query($conn,"SELECT * FROM student");
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['address'])){
            $address=$_POST['address'];
        }
        
        
        $sqls='';
        if(isset($_POST['show'])) {
            
            $res = mysqli_query($conn, "SELECT * FROM student");
            while($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['address']."</td>";
                
                echo "</tr>";
            }
            echo '</table>';
        }
        ?>
    </table>
</main>

        
</body>
</html>