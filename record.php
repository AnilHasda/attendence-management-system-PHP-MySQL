<html>
<head>
<meta name="viewport"content="width=device-width,initial-scale=1">
<style type="text/css">
*{
padding:0;
margin:0;
box-sizing:border-box;
}
body{
background:#1C1B40;
color:red;
}
th,td{
text-align:center;
padding:10px 0px 10px 0px;
}
thead,tbody{
}
tbody{
margin-top:103px;
}
table{
width:100%;
}
.date{
background:#FABE44;
width:100%;
height:60px;
display:flex;
align-items:center;
}
a{
text-decoration:none;
margin:20px 20px 0px 0px;

}
button{
height:25px;
width:70px;
background:cyan;
margin:0px 20px 0px 10px;
padding-left:5px;
}
.search{
margin-top:10px;
}
.sear{
height:25px;
}
.present{
background:green;
border-radius:1rem;
text-align:center;
border:none;
}
.absent{
background:red;
color:white;
border-radius:1rem;
text-align:center;
border:none;
}
</style>
</head>
<body>
<form action=""method="POST"class="search">
<input type="search"name="search"class="sear">
<input class="sear" type="submit"name="sub"value="search">
<button><a href="showAll.php">showAll</a></button>
</form><br>
<div class="date"><button><a href="show.php">BACK</a></button><button><a href="attendence.php">HOME</a></button><?php $dt=$_GET['data'];echo "date:".$dt?></div>
<table border="1px">
<u><thead><th>RollNo</th><th class="padding">name</th><th class="padding">status</th>
</thead>
<tbody>
<?php
include"connect.php";
$dt=$_GET['data'];
$query="select * from ".$_SESSION["statusName"]." where date='$dt'";
$res=mysqli_query($con,$query);
if(isset($_POST["sub"])){
    $search=$_POST["search"];
$sub=$_POST["sub"];
$qry="select * from ".$_SESSION["statusName"]." where date='$dt' && name like'%$search%'";
$sea=mysqli_query($con,$qry);
while($ftc=mysqli_fetch_array($sea)){
?>
<tr><td><?php echo $ftc['id']; ?></td><td class="padding"><?php  echo $ftc['name']; ?></td><td class="padding">
<?php
if($ftc['status']=='present'){
echo"<button class='present'>present</button>";
}
else{
echo"<button class='absent'>absent</button>";
}
?>
</td></tr>
<?php
}
}
else{
    $sn=0;
while($fetch=mysqli_fetch_array($res)){
$sn++;
?>
<tr><td><?php echo $sn; ?></td><td class="padding"><?php  echo $fetch['name'];?></td><td class="padding">
<?php
if($fetch['status']=='present'){
echo"<button class='present'>present</button>";
}
else{
echo"<button class='absent'>absent</button>";
}
?>
</td></tr>
<?php
}
}
?>
</tbody>
</table>
</body>
</html>