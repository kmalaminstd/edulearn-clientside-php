

    

    <body>
    <nav class='navbar'>
        <div class='logo'><a href='./index.php'>EduLearn</a></div>
        <div class='hamburger'>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class='nav-menu'>
            <a href='./index.php'>Home</a>
            <?php
                if(session_status() === PHP_SESSION_NONE){
                    session_name("eduwebclientui_session");
                    session_start();
                }

                

                // echo $_SESSION['token'];

                if(isset($_SESSION['token'])){
                    echo "<a href='./profile.php'>Profile</a>";
                }

                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'teacher'){
                        echo "<a href='./publish-course.php'>Publish Your Course</a>";
                    }
                }
                $setTrue = false;

                if(!isset($_SESSION['token'])){
                    $setTrue = true;
                };

                

                // echo $_SESSION['token'];
                if($setTrue){
                    echo "
                    
                    <div class='auth-group'>
                    <div class='register-dropdown'>
                        <button class='register-btn'>Register</button>
                        <div class='dropdown-content'>
                            <a href='./register-student.php'>As Learner</a>
                            <a href='./register-teacher.php'>As Instructor</a>
                        </div>
                    </div>
                    <a href='./login.php' class='login-btn'>Login</a>
                    "; 
                }else{
                    
                        echo "<a href='./logout.php' class='logout-btn'>Logout</a>";
                    }
                
                
            ?>
        </div>
    </nav>
    