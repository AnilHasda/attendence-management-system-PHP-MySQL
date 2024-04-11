<?php
session_start();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #a0bacc;
            display: grid;
            place-items: center;
        }

        input[type="text"] {
            margin: 10px 0px 10px 0px;
            height: 30px;
            outline:none;
        }

        input[type="password"] {
            margin: 10px 0px 10px 0px;
            height: 30px;
            outline:none;
        }

        form {
            color: #fff;
            background: #08546c;
            height: 400px;
            width: 290px;
            padding: 80px 0px 0px 50px;
            border-radius: 1rem;
            position: relative;
        }

        .submit {
            height: 30px;
            width: 100px;
            border-radius: 5px;
            border: none;
            background: cyan;
            margin: 20px 0px 20px 30px;
            transition:all .3s linear;
        }
        .submit:hover{
            color:#fff;
            background-color: blueviolet;
        }

        h4 {
            position: absolute;
            top: 30;
            left: 80;
            background: red;
            height: 30px;
            width: 100px;
            text-align: center;
            border-radius: 10px;
            padding-top: 5px;
        }

        a {
            color: #fff;
            font-size: 14px;
        }
        .form1{
            position:relative;
        }
        .hide{
            position:absolute;
            top:46%;
            left:65%;
            height:auto;
            width:auto;
            cursor:pointer;
            color:#000;
        }
    </style>
</head>

<body>
    <form action="" method="post"class="form1">
        <h4>Login-Form</h4>
        <label for="user">userName</label><br>
        <input type="text" name="user" id="user" placeholder="enter user" required><br>
        <label for="pass">password</label><br>
        <input type="password" name="pass" id="pass"class="password" placeholder="enter password" required>
        <div class="hide"><i class="fa-solid fa-eye"></i></div><br>
        <input type="submit" name="submit" value="log in" class="submit"><br>
        haven't account??<a href="createAccount.php">create account</a><br>
        <?php
        include "connection.php";
       
        if (isset($_POST["submit"])) {
            $user;
            $pass;
            $user = $_POST["user"];
            $pass = $_POST["pass"];
          
           
            $qry = "select * from createaccount";
            $result = mysqli_query($con, $qry);
            while ($data = mysqli_fetch_assoc($result)) {
                if ($user == $data['Username'] && password_verify($pass, $data["Password"])) {
                    $_SESSION["database"] = $user;
                    $_SESSION["pass"] = $pass;
                }
            }
           global $user;
           if(isset( $_SESSION["database"])){
            if ($_SESSION["database"]===$user &&  $_SESSION["pass"]===$pass) {
                echo "<script>window.location.href='createTable.php';</script>";
            } 
        }
        else {
            echo "<script>alert('please enter valid username or password');</script>";
        }
        }
        ?>
         <script>
        const hide=document.querySelector(".hide");
        const password=document.querySelector(".password");
        let x=0;
        hide.addEventListener("click",()=>{
            x++;
            if(x%2===1){
           password.type="text";
           hide.innerHTML='<i class="fa-solid fa-eye-slash"></i>';
            }
            else{
                password.type="password";
                hide.innerHTML='<i class="fa-solid fa-eye"></i>';
            }
        })
        </script>
</body>

</html>