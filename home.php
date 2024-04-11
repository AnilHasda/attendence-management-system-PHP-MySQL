<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/media.css">
    <div class="container">
        <nav>
        <div class="hamberger"><i class="fa-solid fa-bars"></i></div>
            <div class="logo"><img src="logo.png" alt="logo" width="80%" style="border-radius:50%;"></div>
            <div class="navigation">
                <ul>
                    <li><a href="#main">Home</a></li>
                    <li><a href="#secondSection">Features</a></li>
                    <li><a href="#guidance">Guidance</a></li>
                    <li><a href="#footerMain">AboutUs</a></li>
                    <li><a href="#">More</a></li>
                </ul>
                <a href="loginPage.php" class="log"><p>log in</p></a>
                <a href="createAccount.php" class="log"><p>sign up</p></a>
            </div>
        </nav>
   
    <div class="main"id="main">
        <div class="content">
            <div class="heading">Welcome to <span style="color:rgb(126, 34, 206);">Attendence Management System</span>
            </div>
            <p>"Say goodbye to cumbersome paper-based attendance systems! With our innovative attendance management
                system, crafted using HTML, CSS, JavaScript, PHP, and MySQL, manual attendance tracking becomes a thing
                of the past. Our solution digitizes the process, offering a seamless interface for recording attendance
                data. Instructors or administrators can effortlessly log attendance, generate detailed reports, and
                securely manage records—all at the click of a button. Experience the efficiency, accuracy, and
                convenience of modern attendance management, tailored to streamline educational or
                organizational needs."</p>
            <div class="buttons"><a href="#">Learn More</a>
                <a href="#">Explore</a>
            </div>
        </div>
        <div class="banner"></div>
    </div>

    <section class="secondSection"id='secondSection'>
        <div class="header">
            key features of attendence management system
        </div>
        <div class="first">
            <div>
                <h4 class="topic">Digital Attendance Tracking:</h4>

                <p>Eliminates the need for paper-based attendance sheets by allowing users to record attendance
                    digitally.

                </p>
                <a href="#">Learn More</a>
            </div>
            <div>
                <h4 class="topic">User-Friendly Interface:</h4>

                <p>Offers an intuitive interface for easy navigation and efficient attendance logging.



                </p>
                <a href="#">Learn More</a>
            </div>
            <div>
                <h4 class="topic">Automated Timestamps:</h4>

                <p>Eliminates the need for paper-based attendance sheets by allowing users to record attendance
                    digitally.

                </p>
                <a href="#">Learn More</a>
            </div>
            <div>
                <h4 class="topic">Comprehensive Reporting:</h4>

                <p>
                    Generates detailed attendance reports, providing insights into attendance trends over time and
                    facilitating data-driven decision-making.
                </p>
                <a href="#">Learn More</a>

            </div>
            <div>
                <h4 class="topic">Customizable Settings:</h4>

                <p> Allows administrators to customize settings such as class sections, user roles, and attendance
                    parameters to suit specific needs.

                </p>
                <a href="#">Learn More</a>
            </div>
            <div>
                <h4 class="topic">Integration with MySQL Database:</h4>

                <p>Ensures data security and privacy through secure user authentication and encryption
                    protocols.Utilizes MySQL database for efficient data storage, retrieval,and management.

                </p>
                <a href="#">Learn More</a>
            </div>
            <div>
                <h4 class="topic">Secure Data Management:</h4>

                <p>Ensures data security and privacy through secure user authentication and encryption protocols.

                </p>
                <a href="#">Learn More</a>
            </div>
            <div>
                <h4 class="topic">Responsive Design:</h4>

                <p>Adapts to different screen sizes and devices, providing seamless access to the system from desktops,
                    tablets, and smartphones.

                </p>
                <a href="#">Learn More</a>
            </div>
            <div>
                <h4 class="topic">Real-Time Updates:</h4>

                <p>Provides real-time updates on attendance status, enabling timely interventions and follow-ups as
                    needed.

                </p>
                <a href="#">Learn More</a>
            </div>
        </div>
    </section>
    <div class="guidance"id='guidance'>
        <div class="guidanceHeader">User Guidance</div>
        <div class="guidanceData">
           <p> Welcome to attendance management system. 
To access the features of our system you can login as a old user or if you are new user you can sign up. Our system provide multi user feature where every user have their own login id and password. After logging in  you will be able to access the subject/table page where you can add new subject/table according to your requirements. You can add new students to the table and can also search the records of the students according to date. Log out after attendance and you will be back in the login page.</p>
<div class="note"style="font-weight:600;margin-top:10px;margin-bottom:10px;"><p>Note: The attendance table will be disabled after completing attendance and will be enabled again after 24hr.</p></div>
<div class="warning"style="color:red;">Warning⚠: User login id and password can't be recovered if it is lost.</div>
        </div>
    </div>
    <footer>
        <div class="footerMain"id="footerMain">
            <div><u>contact us at:</u>9800000000<br>
           <u> Email:</u>attendencesystem@gmail.com
            </div>
            <div class="privacy">
                Copyright ©2024 attendence management system</div>
            <div class="social"><i class="fa-brands fa-facebook"></i><i class="fa-brands fa-twitter"></i><i class="fa-brands fa-instagram"></i><i class="fa-brands fa-skype"></i></div>
        </div>
    </footer>
</body>
</html>