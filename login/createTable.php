<?php
session_start();
?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            color:#000;
            background-color: #fefefe !important;
        }
        .container {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
            padding: 100px 0px;
        }

        .form1,
        .form2 {
            height: 250px;
            width: 250px;
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post" class="form1">
            <div class="main1">
                <h4>create chat code<br>note:here new code will be cretated</h4>
            </div>
            <input type="hidden" name="user1" id="user1" value="<?php echo $_SESSION["user"]; ?>" required><br>
            <label for="table">chat-code</label><br>
            <input type="text" name="table" id="table" placeholder="create chat-code"><br><br>
            <input type="submit" name="submit" value="start chat" class="submit">
        </form>
        <?php
        echo  $_SESSION["database"];
        $con = mysqli_connect("localhost", "root", "", $_SESSION["database"]);
        //for form1
        if (isset($_POST["submit"])) {
            $store1 = $_POST["user1"];
            $table = $_POST["table"];
            $_SESSION["code"] = $table;
            $qry = "create table $table(
id int not null auto_increment,
name varchar(30),
primary key(id)
)";
            $result = mysqli_query($con, $qry);
            if ($result) {
             echo "<script>window.location.href='attendence.php'</script>";
            }
        }
        else{
            echo"<script>alert('something went wrong');</script>";
        }

        //form1 closed
        $show="show tables";
        $query=mysqli_query($con,$show);
        $i=0;
        if(mysqli_num_rows($query)>0){
            while($data=mysqli_fetch_array($query)){
                $i++;
                echo $i.$data[0];
            }
        }
            else{
                echo"<script>alert('there is no tables in your database!!');</script>";
            }
        
        ?>


</body>

</html>