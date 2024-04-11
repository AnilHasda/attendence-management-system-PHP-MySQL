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

        .container {
            min-height: 80%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            padding: 50px 0px;
        }

        .form1 {
            height: 300px;
            width: 500px;
            background: #AD88C6;
            padding: 50px 50px;
            margin-bottom:30px;
        }

        .tables:nth-child(odd) {
            display:none;
        }

        input[type="text"] {
            padding-left: 20px;
        }

        input {
            height: 40px;
            width: 80%;
            margin: auto;
            outline: none;
        }

        .tableName {
            width: 300px;
            margin-bottom: 20px;
            border-radius: 1rem;
        }

        .submit {
            border-radius: 1rem;
        }

        @media(max-width:400px) {
            .form1 {
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post" class="form1">
            <div class="main1">
                <h4>create new table<br>note:here new table will be cretated</h4>
            </div>
            <input type="hidden" name="user1" id="user1" value='<?php echo $_SESSION["user"]; ?>'><br>
            <label for="table">Table Name</label><br>
            <input type="text" name="table" id="table" placeholder="Enter table name" pattern="[a-zA-Z]{1,}" required><br><br>
            <input type="submit" class="submit" name="submit" value="create table" class="submit">
        </form>
        <?php
        $con = mysqli_connect("localhost", "root", "", $_SESSION["database"]);
        $check = "";
        $i = 1;
        $a = 0;
        $display = "show tables";
        $qry = mysqli_query($con, $display);
        if (mysqli_num_rows($qry) > 0) {
            while ($dat = mysqli_fetch_array($qry)) {
                $a++;
        ?>
                <form action="" method="POST" class="tables">
                    <input type="submit" class="tableName" name="<?php echo 'detector' . $a; ?>" value="<?php echo $dat[0]; ?>">
                </form>
        <?php
                if (isset($_POST["detector" . $a])) {
                    $_SESSION["tableName"] = $dat[0];
                    $_SESSION["statusName"] = $_SESSION["tableName"] . $i;
                    echo "<script>window.location.href='attendence.php'</script>";
                }
            }
        } else {
            echo "there is no any tables present in your database.You can simply create table from above form";
        }
        if (isset($_POST["submit"])) {
            $store1 = $_POST["user1"];
            $table = $_POST["table"];

            //form1 closed
            $show = "show tables";
            $query = mysqli_query($con, $show);
            if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_array($query)) {

                    // echo "<div class='tables'>".$data[0]."</div>";
                    if ($data[0] === $table) {
                        $check = $data[0];
                    }
                }
                if ($check === $table) {
                    echo "<script>alert('table already exist');</script>";
                } else {
                    $mainTable = 'create table ' . $table . '(
id int not null auto_increment,
name varchar(255),
primary key(id)
                )';
                    $result = mysqli_query($con, $mainTable);
                    $_SESSION["statusName"] = $table . $i;
                    if ($result) {
                        $status = 'create table ' . $_SESSION["statusName"] . '(
                                id int not null,
                                name varchar(255),
                                status varchar(255),
                                date date default current_timestamp
                                )';
                        $res = mysqli_query($con, $status);
                        if ($res) {
                            echo "<script>alert('table successfully created');window.location.href='createTable.php';</script>";
                        } else {
                            echo '<script>alert("oops!something went wrong!try again later");</script>';
                        }
                    } else {
                        echo "<script>alert('failed to create table')</script>";
                    }
                }
            }
            //table creation when there is no tables present(this is the section when user visit site for the first time)
            else {
                $mainTable = 'create table ' . $table . '(
                id int not null auto_increment,
                name varchar(255),
                primary key(id)
                                )';
                $result = mysqli_query($con, $mainTable);
                $_SESSION["statusName"] = $table . $i;
                if ($result) {
                    $status = 'create table ' . $_SESSION["statusName"] . '(
                                                id int not null,
                                                name varchar(255),
                                                status varchar(255),
                                                date date default current_timestamp
                                                )';
                    $res = mysqli_query($con, $status);
                    if ($res) {
                        echo "<script>alert('table successfully created');window.location.href='createTable.php';</script>";
                    } else {
                        echo '<script>alert("oops!something went wrong!try again later");</script>';
                    }
                } else {
                    echo "<script>alert('failed to create table')</script>";
                }
            }
        }
        ?>


</body>

</html>