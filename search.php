<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" a href="bootstrap/css/css3.css">
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
                    </li>
                    <li class="nav-item px-3">
                        <ul><button class="menu-btn"><h3 style="display:ruby-base-container;">Login</h3></button>
                            <li style="text-align: left;" ><a href="login.html"> <h5 >User</h5></a></li>
                            <li style="text-align: left;"><a  href="admin.html"><h5>Admin</h5></a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Area -->
    <?php
                    include_once 'database.php';
                    include_once 'function.php';
                    
                    

                    if(isset($_POST['submit'])){
                      $gender=$_POST['option'];
                      
                      if($gender=='add')
                      {
                        $query = "select User_NID from people";

                                echo '<section class="body">
                                <div class="container3">
                                <form action="search_NID.php" method="post">
                                <label><h1>Give NID</h1></label>
                                    <div>
                                            <h3>
                                            <select name="id">
                                            <option value="" hidden>Select NID</option>';
                                my_func($query,$conn);
                                echo '</select>
                            </h3>
                        </div>

                            
                    <h1><input type="submit" name="save" value="submit" class="btn-login"/></h1>
                        </div>
                    </form>
                    </div>
                    </section>';
                      }
                      if($gender=='sendHospital'){

                        $query = "select vaccine_name from vaccine";

                                echo '<section class="body">
                                <div class="container3">
                                    <form action="vaccine_by_name.php" method="post">
                                   <div>
                                            <label><h1>Vaccine Name</h1></label>
                                            <h3>
                                            <select name="name">
                                            <option value="" hidden>Select option</option>';
                                my_func($query,$conn);
                                echo '</select>
                            </h3>
                        </div>

                            
                    <h1><input type="submit" name="save" value="submit" class="btn-login"/></h1>
                        </div>
                    </form>
                    </div>
                    </section>';
                        
                      
                      }
                      
                }
                ?>


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