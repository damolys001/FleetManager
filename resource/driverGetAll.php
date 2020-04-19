
<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$id = "";
$f = "";
$opr="";
$selectdriver="";
$name ="";
$datenow = date("Y/m/d");

if(isset ($_REQUEST["id"]) ){ $id = $_REQUEST["id"]; }
if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
if(isset ($_SESSION["userid"]) ){ $name = $_SESSION["userid"]; }
if(isset ($_SESSION["productdriver"])){$selectdriver = $_SESSION["productdriver"]; }
$id = str_replace(' ', '', $id);
/*
$selectdriver = "";
$f ="";
if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}
$name = $_SESSION["role"];
*/


$query = "SELECT * FROM driver  ";
if ($id != ""){ $query = "SELECT * FROM driver where id = '".$id."'  "; $_SESSION["driverIDupdate"] = $id;  }


	$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
	
	if(mysqli_num_rows($result)) 
	{
        if (($f=="j")||($f=="json")) 
        {
            header('Content-type: application/json');
            $rows = array(); 
            while($r = mysqli_fetch_assoc($result)) 
            {
                $rows[] = $r;
            }
            print json_encode($rows);
            
        }
        elseif($opr=="table")
        {
            
            
             {
        
        /////////////Do table Generation with status////////////////////////////
        
        $queryS = "select * from driverStatus;"; //where `page_name` = '$pagename'
	$resultS = mysqli_query($link,$queryS) or die('Errant query:  '.$queryS);

	
	if(mysqli_num_rows($resultS)) 
	{
		
		
	
		while($rowS = mysqli_fetch_assoc($resultS)) 
		{
    
    ?>
                
         <!--star Rating JS -->
     <script src="../vendor/star-rating/js/star-rating.min.js"></script>
   <link href="../vendor/star-rating/css/star-rating.min.css" rel="stylesheet" media="all" rel="stylesheet" type="text/css"/>
   <!-- .............-->
           
                
                
            <div class="col-lg-12">
    <h3><?php echo $rowS["driverStatus"]?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="<?php echo $rowS["driverStatus"]?>-table">
                    
         <?php 
				
							
$query = "select *,CONCAT_WS(', ',PhoneNo,PhoneNo2,PhoneNo3)   phone,
(select url from upload where uploadtype = 'driver' and referenceid = driver.id limit 0,1 ) url 
, (select count(driverId) from myRating where driverId = driver.id)/(select sum(driver) from myRating where driverId = driver.id) rating,
(select count(driverId) from myRating where driverId = driver.id) ratingCount,
(select sum(driver) from myRating where driverId = driver.id) ratingSum
from driver where status ='".$rowS["id"]."'"; //where `page_name` = '$pagename'
            
      
            
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{	
        
         if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
         {
             echo "<thead>
                                    <tr>
                                                   
                                      <th></th>
										<th></th>
                                        <th>First Name</th>
										<th>last Name</th>
                                        <th>Phone</th>
									       <th>License No</th>
										<th>License Expiry Date</th>
                                        <th>Rating</th>
										
                                    </tr>
                                </thead>
								<tbody>";
         }
        else 
        {
		 echo "<thead>
                                    <tr>
                                                   
                                    
										<th></th>
                                        <th>First Name</th>
										<th>last Name</th>
                                        <th>Phone</th>
										 <th>License No</th>
									
										<th>Rating</th>
                                    </tr>
                                </thead>
								<tbody>";}
	
		while($row = mysqli_fetch_assoc($result)) 
		{
            if ($row["ratingCount"] > 0 ){
			$theRating =  round($row["ratingSum"]/$row["ratingCount"],2);}
            else 
            {$theRating = 0;}
			
             if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
         {
             echo '<tr class="odd gradeX">';
                               echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
							   ' <td><a class="btn btn-success  " style="float:right" href="driverEdit.php?id='.$row["id"].'">Edit</a>
                               <br/><br/><button class="btn btn-danger btn-sm" style="float:right" onclick="delDriver('.$row["id"].')">Delete</button>
                               </td>'.
                                   ' <td><img src="'.$row["url"].'" width="75px"/></td>'.
							   ' <td>'.$row["fName"].'</td>'.
							    '<td>'.$row["lName"].'</td>'.
                                '<td>'.$row["phone"].'</td>'.
								'<td>'.$row["driversLicenseNo"].'</td>'.
                                '<td>'.$row["expiryDate"].'</td>
                                <td>'.
                                '<label  class="control-label">'.$theRating.' from '.$row["ratingCount"].' Rating(s)</label>
<input class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-size="xs" disabled value="'.$theRating.'" /></td>

                                      
                   </tr>';
             //<a class="btn btn-success btn-xs " style="float:right" href="bookingDetails?id='.$row["id"].'">Details</a>
         } 
            else {
            
			echo '<tr class="odd gradeX">';
                               echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
							   ' <td><img src="'.$row["url"].'" width="75px"/></td>'.
							   ' <td>'.$row["fName"].'</td>'.
							    '<td>'.$row["lName"].'</td>'.
                                '<td>'.$row["phone"].'</td>'.
								'<td>'.$row["driversLicenseNo"].'</td>
                                <td>'.
                                '<label  class="control-label">'.$theRating.' from '.$row["ratingCount"].' Rating(s)</label>
<input class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-size="xs" disabled value="'.$theRating.'" /></td>

                             
                                      
                   </tr>';
            }
			
		}
		
		echo "	</tbody>";
	}
							
	?>
                </table></div>
                <?php
        }
    
    }
        
        
        /////////////////////////////////// driver table generation Ends///////////////////////////
    }
            
            
            
            
            
            
            
            
            
	
		
	   }
        else 
        {
            while($row = mysqli_fetch_assoc($result)) 
		{ 
			if ($selectdriver == $row["id"]) 
			{
			echo '<option selected="selected" value="'.$row["id"].'" >'.$row["fName"]." ".$row["lName"]." ".$row["Oname"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["id"].'" >'.$row["fName"]." ".$row["lName"]." ".$row["Oname"].'</option>';
			}
		}
            
        }
    }
?>
