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
                        echo '<section>
                        <div class="container" >
                            <div class="row justify-content-center" data-aos="zoom-out-left">
                                <div class="col-md-08" data-aos="zoom-out-right">
                                    <div class="login-box">
                                        <div class="title">
                                            <h3>Add New Hospital or Vaccine Distributor</h3>
                                        </div>
                                        <form action="insertHosDis_done.php" method="POST" class="form-1">
                                            <div class="row mt-4 form-group">
                                                <div class="col-12">
                                                    <label>Hospital or Distributor :</label>
                                                    <select name="gender">
                                                        <option value="" hidden>Select Option</option>
                                                       <option value="hospital">Hospital</option>
                                                        <option value="local">Local_Vaccine_Producer</option>
                                                        <option value="foreign">Foreign_Vaccine_Distributor</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="row mt-4 form-group">
                                                <div class="col-12">
                                                    <label>Name :</label>
                                                    <input type="text" placeholder="Name" name="name">
                                                </div>
                                            </div>
                                            <div class="row mt-4 form-group">
                                                <div class="col-12">
                                                    <label>Phone Number :</label>
                                                    <input type="tel" placeholder="Phone Number" name="phone">
                                                </div>
                                            </div>
                
                                            <div class="row mt-4 form-group">
                                                <div class="col-12">
                                                    <label>Email :</label>
                                                    <input type="email" placeholder="Email" name="email">
                                                </div>
                                            </div>
                                            
                                            <div class="row mt-4 form-group">
                                                <div class="col-12">
                                                    <label>Location :</label>
                                                    <textarea name="location" rows="3" placeholder="Location"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-4 form-group">
                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn-2" input type="submit" name="save" value="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>';
                      }
                      if($gender=='sendHospital'){
                        $query1 = "select Hospital_Name from hospital";
                        echo '<section>
                        <div class="container3">
                            <form action="sendHos_done.php" method="post">

                            <div>
                                    <label><h1>Hospital</h1></label>
                                    <h3>
                                    <select name="hospital">
                                    <option value="" hidden>Select option</option>';
                        my_func($query1,$conn);
                        echo '</select>
                    </h3>
                </div>

                        <div >
                        <label><h1>Vaccine Name</h1></label>
                        <h3>
                        <select name="vaccine">
                        <option value="" hidden>Select option</option>';
                        $query1 = "select Vaccine_Name from Vaccine";
                        my_func($query1,$conn);
                        echo '</select>
                         </h3>
                    </div>
                    
                    <div class="row mt-4 form-group">
                                <h2><div class="col-12">
                                    <label>Dosages Amount :</label>
                                    <input type="number" placeholder="amount" name="amount">
                                </div></h2>
                            </div>
                    

                    <div >
                    
            <h1><input type="submit" name="submit" value="SEND" class="btn-login"/></h1>
                </div>
            </form>
            </div>
            </section>';
                      }
                      if($gender=='search vaccine'){ 
                           
                        echo '<section class="body">
                        <div class="container3">
                            <form action="search.php" method="post">

                            <div class="hello">
                                    <label><h1>What do You Want?</h1></label>
                                    <h3>
                                    <select name="option">
                                        <option value="" hidden>Select option</option>
                                        <option value="add">search users</option>
                                        <option value="sendHospital">search by vaccine</option>
                                       
                                    </select>
                                    </h3>
                                    
                                </div>
                                
                                <h2><input type="submit" name="submit" value="submit" class="btn-login"/></h2>
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