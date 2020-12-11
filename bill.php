<!DOCTYPE html>
<html>
<head>
	<?php
		  include("connect.php");
	
	$invo = $_GET['id'];
	$co = substr($invo,0,2) ;
			?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COLOR Biznaz | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print() " style=" font-size: 13px; font-family: arial;">
<?php
$sec = "1";
?><meta http-equiv="refresh" content="<?php echo $sec;?>;URL='index.php'">	
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
	  
	  
	  
	  
	  <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
           <h3>NEDX.</h3>
	 <h5>NO.349/12,Main Street, Negombo. <br>

	  	  
	<h4><b>Phone No: 0777 000000</b><br>	
		  Date:<?php date_default_timezone_set("Asia/Colombo"); 
    echo date("Y-m-d"); echo "  Time-";  echo date("h:ia")  ?>
			</h4></p>	  
        </div>
     </div>
  
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th>ID</th>
				<th>Customer</th>
                  <th>Kg.</th>
                  
                  <th>Amount</th>
                </tr>
                </thead>
                <tbody>
				<?php
			date_default_timezone_set("Asia/Colombo");
	
		$id=$_GET['id'];
					$tot_amount=0;
				$result = $db->prepare("SELECT * FROM pick_order  WHERE id='$id'");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
			?>
                <tr>
				<td><?php echo $row['id'];?></td>
                  <td><?php echo $row['cus_name'];?></td>
				  <td><?php echo $row['kg'];?></td>
                  
                  <td>Rs.<?php echo $row['amount'];?></td>
					<?php $tot_amount= $row['amount'];?>
                  <?php } ?>
                 </tr>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
  
	<div class="col-xs-6">
         
          <div class="table-responsive">
            <table class="table">
			<tr>
                <th>Amount</th>
                <td>Rs.<?php echo $tot_amount; ?>.00</td>
              </tr>
			 
            </table>
          </div>
        </div>
            </div>
        </div>
  </section>
</div>
</body>
</html>