<?php
include("connect.php");
//get the q parameter from URL
$q=$_REQUEST["q"];
//find out which feed was selected
if($q=="0"){
?>
<div class="col-md-4">
			  <div class="form-group">
            

                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Name..</label>
                  </div>
                   <input type="text" class="form-control" name="name" >
				   
                </div>
				
        </div>
		
        </div>

<div class="col-md-6">
			  <div class="form-group">
            

                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Address</label>
                  </div>
           
<textarea name="address" class="textarea" placeholder="Address" style="width: 80%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
				
        </div>
		
        </div>


<div class="col-md-4">
			  <div class="form-group">
            

                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Contact NO</label>
                  </div>
                   <input type="text" class="form-control" name="contact"  data-inputmask='"mask": "(999)-9999999"' data-mask >
				   
                </div>
				
        </div>
		
        </div>	 
               
                  
                  
				  <?php }else{
                $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$q'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		
<div class="col-md-4">
			  <div class="form-group">
            

                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Name</label>
                  </div>
                   <input type="text" class="form-control" name="name" value="<?php echo $row['cus_name'] ; ?>" >
				   
                </div>
				
        </div>
		
        </div>

<div class="col-md-6">
			  <div class="form-group">
            

                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Address</label>
                  </div>
           
<textarea name="address" class="textarea" placeholder="<?php echo $row['address'] ; ?>" style="width: 80%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['address'] ; ?></textarea>
                </div>
				
        </div>
		
        </div>


<div class="col-md-4">
			  <div class="form-group">
            

                <div class="input-group date">
                  <div class="input-group-addon">
                    <label>Contact NO</label>
                  </div>
                   <input type="text" class="form-control" name="contact" value="<?php echo $row['contact_no'] ; ?>" data-inputmask='"mask": "(999)-9999999"' data-mask >
				   
                </div>
				
        </div>
		
        </div>
 
	<?php }
				}
			?>
                
			  
               
