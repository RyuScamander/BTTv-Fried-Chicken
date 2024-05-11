
<div class="container p-5">

<h4>Edit Customers Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
?>
<form id="update-Items" onsubmit="updateCustomers()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="user_id" value="<?=$row1['user_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="fname">User's First Name:</label>
      <input type="text" class="form-control" id="first-name" value="<?=$row1['first_name']?>">
    </div>
    <div class="form-group">
      <label for="lname">User's Last Name:</label>
      <input type="text" class="form-control" id="last_name" value="<?=$row1['last_name']?>">
    </div>
    <div class="form-group">
      <label for="email">User's Email:</label>
      <input type="email" class="form-control" id="email" value="<?=$row1['email']?>">
    </div>
    <div class="form-group">
      <label for="contact_no">User's Contact Numbers:</label>
      <input type="number" class="form-control" id="contact_no" value="<?=$row1['contact_no']?>">
    </div>
    <div class="form-group">
      <label for="address">User's Address:</label>
      <input type="text" class="form-control" id="user_address" value="<?=$row1['user_address']?>">
    </div>
    <div class="form-group">
      <label for="district">User's District:</label>
      <input type="text" class="form-control" id="district" value="<?=$row1['district']?>">
    </div>
    <div class="form-group">
      <label for="city">User's Address:</label>
      <input type="text" class="form-control" id="city" value="<?=$row1['city']?>">
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Customers</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>