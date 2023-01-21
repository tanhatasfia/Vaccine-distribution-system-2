<?php
    function CreateTable_av($query, $con, $action=1){
        $s = oci_parse($con, $query);
        if (!$s) {
            $m = oci_error($con);
            trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
        }
        $r = oci_execute($s);
        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
        }
        // creating table
        echo "<table class=\"bb table table-hover table-bordered\">";
        $ncols = oci_num_fields($s);
        echo "<thead>";
        echo "<tr>\n";
        for ($i = 1; $i <= $ncols; ++$i) {
            $colname = oci_field_name($s, $i);
            echo "  <th scope=\"col\"><h4>".htmlspecialchars($colname,ENT_QUOTES|ENT_SUBSTITUTE)."</h4></th>\n";
        }

        // if($action == 1){ // checking if we need Action column or not
        //     echo "<th scope=\"col\">Action</tr>";
        // }
        
        echo "</tr>\n";
        echo "</thead>";
        echo "<tbody>";
        while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo "<tr>\n";
            foreach ($row as $item) {
                echo "<td> <h4>";
                echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
                echo "</h4></td>\n";
            }
            // if($action == 1){ // adding button in action column
            //     echo "<td>";
            //     echo " <button type=\"button\" class=\"btn btn-outline-success btn-sm\">Edit</button> ";
            //     echo " <button type=\"button\" class=\"btn btn-outline-danger btn-sm\">Delete</button> ";

            //     echo "</td>\n";
            // }
            echo "</tr>\n";
        }

        echo "</tbody>";
        echo "</table>";
    }

    function create_product_chard_av($query, $con){
        

        $s = oci_parse($con, $query);
        if (!$s) {
            $m = oci_error($con);
            trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
        }
        $r = oci_execute($s);
        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
        }
        
        $ncols = oci_num_fields($s);
       
        
        echo "<div class=\"row\">";
        while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            
            foreach ($row as $item) {
                echo "<div class=\"col-sm-3\">";
                echo "<div class=\"card text-white bg-dark\" style=\"width: 18rem;\">";
                    echo "<div class=\"card-body\">";
                        echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
                    echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            
        }
        echo "</div>";
    }


    // echo '<section class="body3">
    //                     <div class="container3">
    //                         <form action="choose_dis.php" method="post">

    //                         <div class="hello">
    //                                 <label><h1>What You Want?</h1></label>
    //                                 <h3>
    //                                 <select name="option">
    //                                     <option value="" hidden>Select option</option>
    //                                     <option value="Vaccine">Take Vaccine</option>
    //                                     <option value="history">Show history</option>
    //                                 </select>
    //                                 </h3>
                                    
    //                             </div>
    //                             <h2><input type="submit" name="submit" value="submit" class="btn-login"/></h2>
    //                         </form>
    //                     </div>
    //                     </section>';

    function my_func($query, $con){
        $s = oci_parse($con, $query);
        if (!$s) {
            $m = oci_error($con);
            trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
        }
        $r = oci_execute($s);
        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
        }

        // echo '<section class="body3">
        //                 <div class="container3">
        //                     <form action="choose_dis.php" method="post">

        //                     <div class="hello">
        //                             <label><h1>Hospital</h1></label>
        //                             <h3>
        //                             <select name="option">
        //                             <option value="" hidden>Select option</option>';

        while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            foreach ($row as $item) {
                echo '<option>';
                echo $item!==null?htmlspecialchars($item, ENT_QUOTES|ENT_SUBSTITUTE):"&nbsp;";
                echo "</option>\n";
            }
        }
        // echo '</select>
        //             </h3>
                    
        //         </div>
        //         <h2><input type="submit" name="submit" value="submit" class="btn-login"/></h2>
        //     </form>
        //     </div>
        //     </section>';
    }

    function ache_kina($query, $con){
        $s = oci_parse($con, $query);
        if (!$s) {
            $m = oci_error($con);
            trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
        }
        $r = oci_execute($s);
        if (!$r) {
            $m = oci_error($s);
            trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
        }

        $row = (oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS));
        
        if($row != false) return 1;
        else return 0;
        
    }

?>