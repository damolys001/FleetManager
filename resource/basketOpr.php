<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";


$datenow = date("Y/m/d");
$customer_email= "";
$customer_id ="";

if (isset ($_SESSION["chartCount"] )){} else
{
	$_SESSION["chartCount"] =0;
//echo "Your session has expired";
//exit;
}

$a = session_id();
if(empty($a)) session_start();

if (isset ($_SESSION["userid"])){$customer_id = $_SESSION["userid"]; }
if (isset ($_SESSION["customer_email"])){$customer_email= $_SESSION["customer_email"];  }
//echo "session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
//$useridforUpdate = $_SESSION["useridforUpdate"];
 
 if (isset ($_POST["opr"])) 
 
 {
	  $prodid = "";
	  $quant = "";
	  $variant ="";
	  $price ="";
$opr = $_POST["opr"];
 if (isset($_POST["prodid"]) ) $prodid = $_POST["prodid"];
if (isset($_POST["quant"])) $quant = $_POST["quant"];
if (isset($_POST["variant"])) $variant = $_POST["variant"];

//get product price
$queryP = "SELECT price from product where id = '".$prodid."' ";;
	$resultP = mysqli_query($link,$queryP) or die('Errant query:  '.$queryP);
	if(mysqli_num_rows($resultP)) 
	{while($rowP = mysqli_fetch_assoc($resultP)) 
		{$price = $rowP["price"];
			}}






if ($opr == "update"){
	//update
			$query = "update basket set 
			quant = '$quant',
			variant = '$variant'
			 where session_id = '".$a."' and prodid = '".$prodid."'  and variant ='".$variant."'";
	        $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	}
else if ($opr == "delete"){
	$basketid = $_POST["basketid"];
	$quantity = 0;
	//get Count 
	$queryC = "SELECT quant from basket where id = '".$basketid."' ";;
	$resultC = mysqli_query($link,$queryC) or die('Errant query:  '.$queryC);
	if(mysqli_num_rows($resultC)) 
	{while($rowC = mysqli_fetch_assoc($resultC)) 
		{$quantity = $rowC["quant"];
			}}
	
	//delete
	
			$query = "delete from basket
			 where id = '".$basketid."' ";
	        $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
			$_SESSION["chartCount"] = $_SESSION["chartCount"] - $quantity;
			if ($_SESSION["chartCount"] >= 0){
			echo $_SESSION["chartCount"];}
			else 
			{
				echo "Your session has expired";
				//Delete every related session to  this cart 
				$queryDEL = "delete from basket where session_id = '".$a."' ";;
				$resultDEL = mysqli_query($link,$queryDEL) or die('Errant query:  '.$queryDEL);
				$_SESSION["chartCount"] =0;
				/*if(mysqli_num_rows($resultDEL)) 
				{while($rowC = mysqli_fetch_assoc($resultDEL)) 
					{
						}}*/
			}
	}
else if ($opr == "add")
	{
	$querydd = "SELECT * from basket where session_id = '".$a."' and prodid = '".$prodid."' and variant ='".$variant."'";
	$resultdd = mysqli_query($link,$querydd) or die('Errant query:  '.$querydd);
		/*if(mysqli_num_rows($result) > 0) 
		{*/
	if(mysqli_num_rows($resultdd)) 
	{
			//echo $result;
		while($rowdd = mysqli_fetch_assoc($resultdd)) 
		{
			
			if ($quant == 1){$quant =$quant + $rowdd["quant"];$_SESSION["chartCount"] = $_SESSION["chartCount"] +1;}
			else {$_SESSION["chartCount"] = $_SESSION["chartCount"] + $quant - $rowdd["quant"];}
			
			//update
			$query = "update basket set 
			quant = '$quant',
			variant = '$variant'
			 where session_id = '".$a."' and prodid = '".$prodid."'  and variant ='".$variant."'";
	        $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
			
			echo $_SESSION["chartCount"];
		}
		}
		else {
			//insert
			$query = "insert into basket (prodid,price,quant,variant,customer_id,customer_email,session_id, created,createdby) values
			('$prodid','$price','$quant','$variant','$customer_id','$customer_email','$a','$datenow','$customer_id')";
	        $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
			$_SESSION["chartCount"] = $_SESSION["chartCount"] +1;
			echo $_SESSION["chartCount"];
			}
	}
else if ($opr == "list")
	{
		$query = "SELECT *,basket.id basketid, (select url from upload where uploadtype = 'product' and referenceid = prod.id limit 0,1 ) url, (Select basket.quant * basket.price) totalCost from basket, product prod  where session_id = '".$a."' and prodid =  prod.id"; //and prodid =  prod.id
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
		if(mysqli_num_rows($result)) 
		{ $totalAllPrice= 0;
			echo '<thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody >';
			//echo "<tbody>";
		while($row = mysqli_fetch_assoc($result)) 
		{
			?>
		
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="<?php echo str_replace("../","../bkd/",$row["url"]);?>" alt="<?php echo $row["product"];?>">
                                                </a>
                                            </td>
                                            <td><a href="detail.php?id=<?php echo $row["prodid"];?>"><?php echo $row["product"];?></a>
                                            </td>
                                            <td>
                                                <input type="number" style="width:70px" value="<?php echo $row["quant"];?>" prodid = "<?php echo $row["prodid"];?>" variant= "<?php echo $row["variant"];?>" class=" quant form-control">
                                            </td>
                                            <td><?php if ($row["price"] > 0 )  echo " &#8358;".number_format($row["price"])?></td>
                                            <td>&#8358 0.00</td>
                                            <td><?php if ($row["totalCost"] > 0 )  echo " &#8358;".number_format($row["totalCost"]); $totalAllPrice += $row["totalCost"] ?></td>
                                            <td><a basketid="<?php echo $row["basketid"];?>" class="delcartProd" ><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
	<?php 
	
	}
	//<tbody>";
	echo "</tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan='5'>Total</th>
                                            <th colspan='2'> &#8358;<span id= 'totalAllCost' class='totalAllCost'>".number_format($totalAllPrice)."</span></th>
                                        </tr>
                                    </tfoot>";
	}
	}
	 
	 
	else if ($opr == "checkout")
	{
		$myorderid = "0";
		//check if order has been saved before
		if (isset ($_SESSION['orderid'])) {$myorderid =$_SESSION['orderid']; }else {$myorderid='';}
		$query = "SELECT * from order_line where orderid = '".$myorderid."'"; //and prodid =  prod.id
	$resultg = mysqli_query($link,$query) or die('Errant query:  '.$query);
		if(mysqli_num_rows($resultg)) 
		{ 		
			//echo '1';	
			echo $_SESSION['orderid'] ;	
		}
		else 
		{
		
		
		
		
		
		
		$adrs= $_REQUEST['adrs'];
		$pytOpt = $_REQUEST['pytOpt'];
		// get total cost
		//$totalAllPrice= 0;
		$vat = 0;
		$totalAllPrice= 0;
		$query = "SELECT *,basket.id basketid,  (Select basket.quant * basket.price) totalCost from basket  where session_id = '".$a."'  "; //and prodid =  prod.id  , product prod and prodid =  prod.id
	$resultSD = mysqli_query($link,$query) or die('Errant query:  '.$query);
		if(mysqli_num_rows($resultSD)) 
		{ 
			
			while($row = mysqli_fetch_assoc($resultSD)) 
			{
				//echo 'inside basket loop';
				$totalAllPrice += $row["totalCost"];
				
			}
		} else 
		{
		 echo "Please add an item to your basket"; exit;	
		}
		
		//get vat from setup table
		$query = "SELECT * from vat_rate where id = 1"; //and prodid =  prod.id
	$resultvat = mysqli_query($link,$query) or die('Errant query:  '.$query);
		if(mysqli_num_rows($resultvat)) 
		{ 
		while($row = mysqli_fetch_assoc($resultvat)) 
		{$vat += $row["myrate"];}
		}
		 
		 
		 //get valueAndVat
		 $valueAndVat = $totalAllPrice * $vat/100;
		
		//detect browser source
		$browser = isMobileDevice();
		
		//insert into order
		$query = "insert into orders (
		value,
		orderstatus,
		orderSource,
		valueAndVat,
		created,
		createdby,
		pytOpt,
		adrs,
		CUST_Id,
		referenceid
		
		)
		 values 
		(
		'$totalAllPrice',
		'Pending',
		'$browser',
		'$valueAndVat',
		'$datenow',
		'$customer_email',
		'$pytOpt',
		'$adrs',
		'$customer_id',
		'$a'
		)";


if ($conn->query($query) === TRUE) 
 {
				$orderid = $conn->insert_id;
			$_SESSION['orderid'] = $orderid;
				///insert into order line table
				//insert into order
				$query = "insert into order_line (
				orderid,
				prodid,
				quant,
				price,
				created, 
				createdby) 
		SELECT '$orderid', prodid, quant, price, '$datenow','$customer_id' from basket where session_id = '".$a."'";
				if ($conn->query($query) === TRUE) 
					{
						$query = "delete from basket where session_id = '".$a."'";
						if ($conn->query($query) === TRUE) {$_SESSION["chartCount"] = 0;}else die('Errant query:  '.$query);
						//echo '1';
						echo $_SESSION['orderid'] ;
						$_SESSION['orderid'] = 0;
					}
					else die('Errant query:  '.$query);
} 
else die('Errant query:  '.$query);
 
		}
		
	} 
	 
	 
	 
	 
	 
	 
	 }
 function isMobileDevice(){
    $aMobileUA = array(
        '/iphone/i' => 'iPhone', 
        '/ipod/i' => 'iPod', 
        '/ipad/i' => 'iPad', 
        '/android/i' => 'Android', 
        '/blackberry/i' => 'BlackBerry', 
        '/webos/i' => 'Mobile'
    );

    //Return true if Mobile User Agent is detected
    foreach($aMobileUA as $sMobileKey => $sMobileOS){
        if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
            return 'Mobile';
        }
    }
    //Otherwise return false..  
    return 'Desktop';}
?>