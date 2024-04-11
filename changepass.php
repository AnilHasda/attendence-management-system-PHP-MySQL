<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style type="text/css">
        body {
            background: #96577F;
        }

        form {
            padding: 20px 0px 0px 40px;
        }

        .sign {
            height: 50px;
            background: #DD8E58;
            padding: 20px 0px 0px 40px;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend>change password</legend>
        <form action="" method="POST">
            password<br>
            <input type="password" name="spass" placeholder="enter password" required autocomplete="of"><br>
            new password<br>
            <input type="password" name="upass" placeholder="enter new password" required><br>
            confirm password<br>
            <input type="password" name="confirmupass" placeholder="retype new password" required><br>
            <br>
            <input type="submit" name="submit" value="change password">
        </form>
    </fieldset>
    <?php
    if (isset($_POST["submit"])) {
        $con=mysqli_connect("localhost","root","","admin");
        if(!$con){
         echo"<script>alert('connection failed');</script>";
        }
        $password = $_POST["spass"];
        $upassword = $_POST["upass"];
        $confirmupassword = $_POST["confirmupass"];
        $querry = "select password from admin where id=2";
        $resultt = mysqli_query($con, $querry);
        while ($ftch = mysqli_fetch_array($resultt)) {
            if ($password === $ftch['password']) {
                if ($upassword == $confirmupassword) {
                    $updqry = "update admin set password='$upassword' where id=1";
                    $updres = mysqli_query($con, $updqry);
                    if ($updres) {
                        echo "<script>alert('Your password has been changed');window.location.href='index.php';</script>";
                        exit();
                    }
                } else {
                    echo "<script>alert('Your passwords are not match');</script>";
                    exit();
                }
            }
        else{
            echo "<script>alert('password does not matched');</script>";
        }
    }
    }
    ?>
</body>

</html>