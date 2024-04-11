<html>
<head>
<meta name="viewport"content="width=device-width,initial-scale=1">
<style type="text/css">
*{
margin:0;
padding:0;
box-sizing:border-box;
}
body{
background:#FABE44;
}
button{
height:30px;
width:80px;
margin:0px 20px 0px 10px;
padding-left:5px;
}
table{
    border-collapse: collapse;
}
th,td{
padding:10px;
text-align:center;
}
.dis{
margin:40px 0px 20px 0px;
height:60px;
width:100%;
background:#1791B1;
display:flex;
align-items:center;
box-shadow:3px 3px 3px #fff,
           -3px 3px 3px #fff,
           -3px -3px 3px #fff,
           3px -3px 3px #fff;
}
.back{
margin-right:20px;
margin-left:20px;
}
a,button{
text-decoration:none;
background:cyan;
}
</style>
</head>
<body>
<div class="dis"><button class="back"><a href="attendence.php">Back</a></button>student records</div>
<table border="1px"width="100%">
<thead><th>s.n</th><th class="padding">Date</th><th class="padding">Action</th>
</thead>
<tbody>
<?php
include"connect.php";
$query="select distinct date from ".$_SESSION["statusName"];
$res=mysqli_query($con,$query);
$a=0;
if(mysqli_num_rows($res)>0){
while($fetch=mysqli_fetch_array($res)){
$a++;
?>
<tr><td><?php echo $a; ?></td><td class="padding"><?php echo $fetch['date']; ?></td><td class="padding" name="data"><button><a href="record.php?data=<?php $dt=$fetch['date']; echo $dt; ?>">Show</a></button></td></tr>
<?php
}
}
else{
    echo"there is no data";
}
?>
</tbody>
</table>
</body>
</html>