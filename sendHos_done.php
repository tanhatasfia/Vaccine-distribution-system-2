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
                    include_once 'function.php';
                    

                    if(isset($_POST['submit'])){
                      $hospital= $_POST['hospital'];
                      $vaccine=$_POST['vaccine'];
                      $amount = $_POST['amount'];

                    //new check
                      $s1 = oci_parse($conn, "select * from Hospital_Vaccine hv inner join vaccine v on 
                      hv.vaccine_id = v.vaccine_id where vaccine_name = '".$vaccine."'");       
                      oci_execute($s1);
                      $row1 = oci_fetch_array($s1, OCI_ASSOC);

                      $s2 = oci_parse($conn, "select vaccine_id from vaccine where vaccine_name = '".$vaccine."'");       
                      oci_execute($s2);
                      $row2 = oci_fetch_array($s2, OCI_BOTH);
                        
                      //vaccine id
                      $vaccineID = $row2[0];

                      $s7 = oci_parse($conn, "select hospital_id from hospital where
                       hospital_name = '".$hospital."'");       
                      oci_execute($s7);
                      $row7 = oci_fetch_array($s7, OCI_BOTH);
                        
                      //hospital
                      $hospitalID = $row7[0];

                      //echo $vaccineID;


                    //   $s3 = oci_parse($conn, "select F_Total_Dosages from Foreign_Hospital_Vaccine 
                    //   where vaccine_id = '".$vaccineID."'");       
                    //   oci_execute($s3);
                    //   $row3 = oci_fetch_array($s3, OCI_BOTH);

                    //   $f_tot = $row3[0];
                    //   $s4 = oci_parse($conn, "select L_Total_Dosages from Local_Hospital_Vaccine 
                    //   where vaccine_id = '".$vaccineID."'");       
                    //   oci_execute($s4);
                    //   $row4 = oci_fetch_array($s4, OCI_BOTH);

                    //   $L_tot = $row4[0];



                      $s5 = oci_parse($conn, "select sum(FT-ST)
                      from (select F_Total_Dosages FT from Foreign_Hospital_Vaccine FHV inner join Vaccine V on FHV.Vaccine_id=V.Vaccine_id 
                      where vaccine_name='".$vaccine."' and v.vaccine_id in('".$vaccineID."')) NATURAL JOIN
                      (select sum(Total_Received) ST
                      from Hospital H inner join Hospital_Vaccine HV on H.Hospital_ID=HV.Hospital_ID inner join Vaccine V on HV.Vaccine_id=V.Vaccine_id
                      where vaccine_name='".$vaccine."' and v.vaccine_id in('".$vaccineID."'))");       
                      oci_execute($s5);
                      $row5 = oci_fetch_array($s5, OCI_BOTH);




                      $s6 = oci_parse($conn, "select sum(FT-ST)
                      from (select L_Total_Dosages FT from Local_Hospital_Vaccine FHV inner join Vaccine V on FHV.Vaccine_id=V.Vaccine_id 
                      where vaccine_name='".$vaccine."' and v.vaccine_id in('".$vaccineID."')) NATURAL JOIN
                      (select sum(Total_Received) ST
                      from Hospital H inner join Hospital_Vaccine HV on H.Hospital_ID=HV.Hospital_ID inner join Vaccine V on HV.Vaccine_id=V.Vaccine_id
                      where vaccine_name='".$vaccine."' and v.vaccine_id in('".$vaccineID."'))");       
                      oci_execute($s6);
                      $row6 = oci_fetch_array($s6, OCI_BOTH);

                      $s10 = oci_parse($conn, "select L_Total_Dosages from Local_Hospital_Vaccine
                      where vaccine_id = '".$vaccineID."'");       
                      oci_execute($s10);
                      $row10 = oci_fetch_array($s10, OCI_BOTH);




                      $s11 = oci_parse($conn, "select F_Total_Dosages from Foreign_Hospital_Vaccine
                       where vaccine_id = '".$vaccineID."'");       
                      oci_execute($s11);
                      $row11 = oci_fetch_array($s11, OCI_BOTH);
                      
                        if($row5!=null)
                        {
                            $f_now = $row5[0];
                            if($amount>$f_now)
                            {
                                echo '<h1>Amount limit excceded</h1> <br>';
                                echo '<h1>You can send '.$vaccine.' highest '.$l_now.'</h1><br>';
                            }
                            else
                            {
                                echo 'Successfully Send !!!!';

                                    $ss = "update Hospital_Vaccine 
                                    set Total_Received = Total_Received +".$amount."
                                    where vaccine_id='".$vaccineID."' and hospital_id='".$hospitalID."'";
                                    $query = oci_parse($conn, $ss);
                                    $result = oci_execute($query);
                            }
                        }
                        else  if($row6!=null)
                        {
                            $l_now = $row6[0];
                            if($amount>$l_now)
                            {
                                echo '<h1>Amount limit excceded</h1> <br>';
                                echo '<h1>You can send '.$vaccine.' highest '.$l_now.'</h1><br>';
                            }
                            else
                            {
                                echo 'Successfully Send !!!!';

                                    $ss = "update Hospital_Vaccine 
                                    set Total_Received = Total_Received+".$amount."
                                    where vaccine_id='".$vaccineID."' and hospital_id='".$hospitalID."'";
                                    $query = oci_parse($conn, $ss);
                                    $result = oci_execute($query);
                            }
                        }
                        else
                        {

                            if($row10)
                            {
                                $l_now = $row10[0];
                                if($amount>$l_now)
                                {
                                    echo '<h1>Amount limit excceded</h1> <br>';
                                    echo '<h1>You can send '.$vaccine.' highest '.$l_now.'</h1><br>';
                                }
                                else
                                {
                                    $ss = "insert into Hospital_Vaccine 
                                    values('".$vaccineID."','".$hospitalID."',0,".$amount.")";
                                    $query = oci_parse($conn, $ss);
                                    $result = oci_execute($query);
                                }
                            }
                            else
                            {
                                $l_now = $row11[0];
                                if($amount>$l_now)
                                {
                                    echo '<h1>Amount limit excceded</h1> <br>';
                                    echo '<h1>You can send '.$vaccine.' highest '.$l_now.'</h1><br>';
                                }
                                else
                                {
                                    $ss = "insert into Hospital_Vaccine 
                                    values('".$vaccineID."','".$hospitalID."',0,".$amount.")";
                                    $query = oci_parse($conn, $ss);
                                    $result = oci_execute($query);
                                }
                            }
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