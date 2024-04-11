<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        body{
            background-color:#000;
        }
        .main{
            color:#fff;
        }
        .form1{
            position:relative;
        }
        .main div img{
            border-radius: 50%;
        }
        .login{
            height:40px;
            width:100%;
            margin-top:30px;
            text-align: center;
            position: relative;
            font-size: 25px;
            color:blueviolet;
        }
        .login::before{
            content:"";
            height:90%;
            width:100%;
            position:absolute;
            background-color:#000;
            left:0%;
            border-left: 3px solid #fff;
            animation:slider 2s steps(18) infinite;
        }
        @keyframes slider{
            0%{
               left:0%; 
            }
           /* 10%{
               left:10%; 
            }
            20%{
               left:20%; 
            }
            30%{
               left:30%; 
            }
           40%{
               left:40%; 
            }
            50%{
               left:50%; 
            }
            60%{
               left:60%; 
            }
            70%{
               left:70%; 
            }
            80%{
               left:80%; 
            }
           90%{
               left:90%; 
            } */
            100%{
               left:110%; 
            }
        }
        .hidden{
        height:400px;
        width:30%;
        margin:100px auto;
        background-color:#000;
        top:0;
        z-index:11;
        display:grid;
            place-items:center;
        }
        .hidden form{
            width:100%;
            padding-left:50px;
        }
        .hidden form input{
    height:40px;
    width:80%;
    outline:none;
    margin-bottom: 30px;
    padding-left:30px;
        }
        .hidden form input[type="submit"]{
border-radius:1rem;
border:1px solid blueviolet;
background-color:blueviolet;
color:#fff;
padding-left:0px;
        }
        .hidden form input[type="text"]{
padding-left: 30px;
        }
        .hidden form span a{
            font-family: sans-serif;
            font-size: 14px;
            text-decoration: underline;
        }
        .hide{
            position:absolute;
            top:7%;
            left:70%;
            height:auto;
            width:auto;
            cursor:pointer;
        }
        a{
            color:#fff;
        }
        @media(max-width:992px){
.hidden{
    width:100%;
}
        }
    </style>
</head>

<body>
    <div class="hidden">
        <div class="main">
            <div><img src="hacker.jpeg"alt="homeImage"width="100%"></div>
            <div class="login">login to access the site</div>
        </div>
        <form action=""method="post"class="form1">
            <input type="password"class="password"placeholder="enter code"name="code"required>
            <div class="hide"><i class="fa-solid fa-eye"></i></div><br>
<input type="submit"value="submit"name="submit"><br>
<span><a href="changePass.php">change password</a></span>
        </form>
        <?php
    $con=mysqli_connect("localhost","root","","admin");
    if(!$con){
     echo"<script>alert('connection failed');</script>";
    }
if(isset($_POST['submit'])){
    $pass=$_POST["code"];
    $query="select password from admin where id=1";
    $result=mysqli_query($con,$query);
    if($result){
        while($data=mysqli_fetch_array($result)){
            if($data["password"]===$pass){
                echo"<script>window.location.href='home.php';</script>";
            }
            else{
                echo"<script>alert('password does not matched');</script>";
            }
        }
    }
    else{
        echo"something went wrong";
    }
}
        ?>
    </div>
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