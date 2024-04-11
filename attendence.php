<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style type="text/css">
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #1C1B40;
            background-color:#f1f1f1;
            height:100%;
            width:100%;
            overflow: hidden;
        }

        .display {
            height: 200px;
            width: 400px;
            margin: 0px auto;
            background-image: linear-gradient(violet);
        }

        input[type="text"] {
            outline: none;
            height: 40px;
            width: 40%;
        }

        button,
        input[type="submit"] {
            width: 120px;
            height: 40px;
            margin: 0px 20px 0px 10px;
            padding-left: 5px;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%;
        }

        .entry {
            padding: 30px 20px 10px 20px;
        }

        fieldset {
            margin: 5%;
            display: grid;
            place-items: center;
        }

        .formelement {
            padding-top: 20px;
        }

        a {
            text-decoration: none;
            color: initial;
        }

        .show {
            margin-left: 20px;
        }

        .dt {
            position: relative;
            top: -20;
            font-size: 20px;
        }

        .warn {
            background: gold;
            width: 100%;
            height: 40px;
            color: red;
            display: grid;
            place-items: center;
        }

        .ins {
            background: red;
            width: 100%;
        }
form{
    width:100%;
    height:auto;
}
        .form {
            height: auto;
            width:100%;
            background: #f1f1f1;
            padding: 30px 50px;
            color: #000;
        }

        .flex .banner {
            width: calc(100% - 500px);
            object-fit: cover;
        }

        table {
            width:100%;
            font-size: 20px;
            border-collapse: collapse;
        }

        .takeAttendnce {
            margin: 30px 0px !important;
        }

        .form2 {
            height: auto;
            width: 100%;
        }

        .logOut {
            position: relative;
            height: 40px;
            width: 120px;
            border: 1px solid;
            display: grid;
            place-items: center;
            left: 90%;
            top:-30px;
        }
        .back{
            display: inline-block;
            padding:7px 30px;
            background-color:#fff;
            color:#000;
        }
    </style>
</head>

<body>
        <div class="form">
        <a href="createTable.php"class='back'>Go Back</a>
            <button name="show" class="logOut"><a href="logOut.php">logOut</a></button>
            <form action="" method="post" class="entry">
                <div class="dt"><u><?php echo "date:20" . date('y:m:d'); ?></u></div>
                Student name<br>
                <input type="text" name="student" placeholder="Add new student" pattern="[a-zA-Z]{1,}" autocomplete="off" required><br><br>
                <input type="submit" name="submit" value="add student">
                <button name="show"><a href="show.php">Show Records</a></button>
                <button name="edit"><a href="showData.php">Edit Records</a></button>
            </form>
        </div>
        <?php
        include "connect.php";
        // echo $_SESSION["tableName"];
        // echo $_SESSION["statusName"];
        // $con = mysqli_connect("localhost", "root", "", $_SESSION["database"]);
        $check = "";
        $datee = date("Y-m-d");
        $distinct = "select distinct date from " . $_SESSION["statusName"];
        $dstqry = mysqli_query($con, $distinct);
        while ($disft = mysqli_fetch_array($dstqry)) {
            if ($disft['date'] === $datee) {
                $check = $datee;
            }
        }
        if (isset($_POST["submit"])) {
            $add = $_POST["student"];
            $addqry = "insert into " . $_SESSION["tableName"] . " (name) values ('$add')";
            $addresult = mysqli_query($con, $addqry);
            if ($addresult) {
                echo "<script>alert('Student successfully added')</script>";
            } else {
                echo "<script>alert('Student is not added')</script>";
            }
        }
        if ($check === $datee) {
            echo "<div class='warn'>Warning:Attendence already has been taken and it will be enabled after 24 hr.</div>";
        } else {
        ?>
            <form action="" method="POST" class="form2">
                <table border="1px">
                    <thead>
                        <tr>
                            <th>Roll no.</th>
                            <th class="padding">Name</th>
                            <th class="padding">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "connect.php";
                        $query = "select * from " . $_SESSION["tableName"];
                        $res = mysqli_query($con, $query);
                        while ($fetch = mysqli_fetch_array($res)) {
                            $id = $fetch["id"];
                        ?>
                            <tr>
                                <td><?php echo $fetch['id']; ?></td>
                                <td class="padding"><?php echo $fetch['name']; ?><input type="hidden" value="<?php echo $fetch['name']; ?>" name="<?php echo 'a' . $id; ?>"></td>
                                <td class="padding" name="date">
                                    P<input type="radio" name="<?php echo 'b' . $id; ?>" value="present" style="margin-right:60px;margin-left:10px;" required>
                                    A<input type="radio" name="<?php echo 'b' . $id; ?>" value="absent" style="margin-left:10px;" required>
                                    <?php
                                    if (isset($_POST["submitt"])) {
                                        $name = $_POST["a" . $id];
                                        $radio = $_POST["b" . $id];
                                        $datee = date("Y-m-d");
                                        $upd = "insert into " . $_SESSION["statusName"] . " values ('$id','$name','$radio','$datee')";
                                        $updq = mysqli_query($con, $upd);
                                        if ($updq) {
                                            echo "<script>alert('Attendance successfully taken')</script>";
                                            echo "<script>window.location.href='attendence.php'</script>";
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="submitt" value="Take Attendance" class="takeAttendnce">
            </form>
        <?php
        }
        ?>
</body>

</html>