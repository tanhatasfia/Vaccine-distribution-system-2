<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="bootstrap\css\font-awesome-5.8.1.css">
    <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="bootstrap\css\mdb.css">
    <link rel="stylesheet" href="bootstrap\css\style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Vaccine Distribution</title>
</head>

<body>
   <!-- Nav bar-->

   <nav class="navbar navbar-expand-sm navbar-dark bg-teal fixed-top">
        <div class="container">
            <a href="index.html" class="navbar-brand">
                <i class="fa fa-plane-departure"></i> Vaccine Distribution</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#travel-navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="travel-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item px-3">
                        <a href="#" class="nav-link">
                            <h4>Home</h4>
                        </a>
                    </li>

                    <li class="nav-item px-3">
                        <a href="registration.html" class="nav-link">
                            <h4>Registration</h4>
                        </a>

                        <li class="nav-item px-3">
                        <a href="login.html" class="nav-link">
                            <h4>login</h4>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

 <!-- Main Footer -->
 <footer class="p-3 mt-3 bg-teal text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                <?php 
                    include_once 'database.php';
                    $conn = oci_connect("project1","project1", "localhost/XE");
                    if (!$conn) {
                    	$e = oci_error();
                    	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                    }

                    if(isset($_POST['submit'])){
                      $user = $_POST['usernid'];
                      $pass = $_POST['password'];
                      $s = oci_parse($conn, "select user_NID,user_password from people where user_NID='$user' and user_password='$pass'");       
                      oci_execute($s);
                      $row = oci_fetch_array($s, OCI_ASSOC);
                    
                      if($row){   
                        echo "successfully logged in";

                        

                        echo '<section class="body3">
                        <div class="container3">
                            <form action="choose_hospital.php" method="post">

                            <div class="hello">
                                    <label><h1>What do You Want?</h1></label>
                                    <h3>
                                    <select name="option">
                                        <option value="" hidden>Select option</option>
                                        <option value="Take Vaccine">Take Vaccine</option>
                                        <option value="Show history">Show history</option>
                                    </select>
                                    </h3>
                                    
                                </div>
                                <input type="hidden" name="text" value="';
                                echo $user;
                                echo '">
                                <h2><input type="submit" name="submit" value="submit" class="btn-login"/></h2>
                            </form>
                        </div>
                        </section>';

                      }else{
                          echo "wrong password or username";
                      }
                    }
                ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- Contact Section -->
    <section id="contact" class="p-3">
        <div class="container" data-aos="zoom-out-right">
            <div class="card mt-3">
                <div class="card-body bg-teal text-center text-white">
                    <i class="fa fa-envelope fa-4x"></i>
                    <h2>Contact address</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque excepturi itaque praesentium. Accusamus beatae distinctio dolore eum iure magnam maiores maxime, natus quam repellendus saepe sint suscipit temporibus
                        vitae voluptates?</p>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>Location</h3>
                </li>
                <li class="list-group-item">
                    Rangpur Cantonment, Rangpur Sadar, Rangpur, Bangladesh.
                </li>
                <li class="list-group-item">
                    Contact No: 01xxxxxxxxx
                </li>
                <li class="list-group-item">
                    Email: rakibmistcse19@gmail.com
                </li>
            </ul>
        </div>
    </section>

    <!-- Main Footer -->
    <footer class="p-3 mt-3 bg-teal text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Copyright &copy; 2021 ,Bangladesh Goverment</h3>
                    <h6>All Rights Reserved</h6>
                    <h6>Developed & Maintained by Rakib,Aliya,Tanha</h6>
                </div>
            </div>
        </div>
    </footer>


    <!-- bootstrap Js file -->
    <script src="bootstrap\js\jquery.js"></script>
    <script src="bootstrap\js\popper.min.js"></script>
    <script src="bootstrap\js\bootstrap.js"></script>
    <script src="bootstrap\js\mdb.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 3200,
            pause: 'hover'
        });
    </script>
    <script type="text/javascript">
        AOS.init({
            duration: 1500,
        })
    </script>
</body>

</html>