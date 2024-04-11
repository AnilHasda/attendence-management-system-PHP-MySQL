<?php
session_start();
?>
<html>
<head>
<meta name="viewport"content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
*{
margin:0;
padding:0;
box-sizing:border-box;
}
body{
display:grid;
place-items:center;
background: #a0bacc;
}
form{
color:#fff;
background:#08546c;
height:550px;
width:500px;
border-radius:1rem;
padding:70px 0px 0px 130px;
position:relative;
}
input[type="file"],input[type="text"],input[type="password"],input[type="email"]{
margin:10px 0px 10px 0px;
width:250px;
height:30px;
outline:none;
}
h4{
position:absolute;
top:15;
left:150;
background:red;
height:30px;
width:150px;
text-align:center;
border-radius:10px;
padding-top:5px;
}
.submit{
height:30px;
width:100px;
border-radius:.5rem;
border:none;
margin:10px 0px 20px 80px;
}
.hide{
    position:absolute;
    top:81%;
    left:68%;
    height:auto;
    width:auto;
    color:#000;
    cursor:pointer;
}
.hide1{
    top:69%;
}
@media(max-width:600px){
    form{
width:100%;
padding-left:50px;
    }
    h4{
        left:100px;
    }
}
</style>
</head>
<body>
<form action=""method="post"enctype="multipart/form-data">
    <div class="hide hide1"><i class="fa-solid fa-eye"></i></div>
    <div class="hide hide2"><i class="fa-solid fa-eye"></i></div>
<h4>create an account</h4>
<label for="fname">First Name</label><br>
<input type="text"id="fname"name="fname"placeholder="enter first name"pattern="[a-zA-Z]{1,}"required><br>

<label for="lname">Last Name</label><br>
<input type="text"id="lname"name="lname"placeholder="eneter last name"pattern="[a-zA-Z]{1,}"required><br>

<label for="user">User Name</label><br>
<input type="text"id="user"name="user"placeholder="enter user name[abc||abc123]"pattern="[a-zA-Z0-9]+"required><br>

<label for="email">Email</label><br>
<input type="email"id="email"name="email"placeholder="enter email"required><br>

<label for="password">Password</label><br>
<input type="password"id="password"name="password"placeholder="enter password"required><br>

<label for="cpassword">confirm-Password</label><br>
<input type="password"id="cpassword"name="cpassword"placeholder="retype password"required><br>

<input type="submit"name="submit"value="create account"class="submit">
</form>
<?php
include"connection.php";

if(isset($_POST["submit"])){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $user=$_POST["user"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    
$userChk;
$emailChk;
if($password===$cpassword){
$pass=password_hash($password,PASSWORD_DEFAULT);
$chkquery="select * from createaccount";
$chkresult=mysqli_query($con,$chkquery);
$d=mysqli_num_rows($chkresult);

if($d==0){
$qry="insert into createaccount (Fname,Lname,Username,Email,Password) values('$fname','$lname','$user','$email','$pass')";
$result=mysqli_query($con,$qry);
if($result){
echo"<script>alert('Your account has been created');window.location.href='loginPage.php';</script>";
}
else{
echo"<script>alert('account creation failed')</script>";
}
}

if($d>0){

while($data=mysqli_fetch_array($chkresult)){
if($user==$data["Username"] || $email==$data["Email"]){
global $userChk;
global $emailChk;

$userChk=$data["Username"];
$emailChk=$data["Email"];
}
}

if($userChk==$user || $emailChk==$email){
if($userChk==$user){echo "<script>alert('Username already exist,please try another');</script>";}
if($emailChk==$email){echo "<script>alert('email already exist,please enter valid email');</script>";}
}

else{
$qry="insert into createaccount (Fname,Lname,Username,Email,Password) values('$fname','$lname','$user','$email','$pass')";
$result=mysqli_query($con,$qry);
if($result){
    $_SESSION["database"]=$user;
echo"<script>alert('Your account has been created');window.location.href='createDatabase.php';</script>";
}
else{
echo"<script>alert('account creation failed')</script>";
}
}
}

}
else{
echo "<script>alert('password does not match')</script>";
}
}
?>
    <script>
        const hide1=document.querySelector(".hide1");
        const hide2=document.querySelector(".hide2");
        const password=document.querySelector("#password");
        const cpassword=document.querySelector("#cpassword");
        let x=0;
        let y=0;
        hide1.addEventListener("click",()=>{
            x++;
            if(x%2===1){
           password.type="text";
           hide1.innerHTML='<i class="fa-solid fa-eye-slash"></i>';
            }
            else{
                password.type="password";
                hide1.innerHTML='<i class="fa-solid fa-eye"></i>';
            }
        })
        hide2.addEventListener("click",()=>{
            y++;
            if(y%2===1){
           cpassword.type="text";
           hide2.innerHTML='<i class="fa-solid fa-eye-slash"></i>';
            }
            else{
                cpassword.type="password";
                hide2.innerHTML='<i class="fa-solid fa-eye"></i>';
            }
        })
        </script>
</body>
</html>