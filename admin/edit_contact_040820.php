<?php 
include_once("connection.php");

$type = "";
if(isset($_REQUEST['id'])) {
	$type = "Edit";	
	$id = $_REQUEST['id'];
	
}
else {
	$type = "Add";
	$id = 1;
}


if(isset($_POST['submit']))
{			
			$address = mysqli_real_escape_string($connection,$_POST['address']);
			$company_name = mysqli_real_escape_string($connection,$_POST['company_name']);
			$mobile_no = mysqli_real_escape_string($connection,$_POST['mobile_no']);
			$telephone_no = mysqli_real_escape_string($connection,$_POST['telephone_no']);
			$lats = mysqli_real_escape_string($connection,$_POST['lats']);
			$email = mysqli_real_escape_string($connection,$_POST['email']);	
			$longs = mysqli_real_escape_string($connection,$_POST['longs']);	
			$working_hrs = mysqli_real_escape_string($connection,$_POST['working_hrs']);	
			
		if($id != 0) {
			$query2 = mysqli_query($connection,"UPDATE sumc_contact_us SET company_name='$company_name',address = '$address',mobile_no='$mobile_no',working_hrs='$working_hrs',lats='$lats',email='$email',longs='$longs' WHERE id= ".$id);			
		}
		else {		
		$query2 = mysqli_query($connection,"INSERT sumc_contact_us (company_name,address,mobile_no,working_hrs,fax_no,email,lats,longs,status,created_date) values ('$company_name','$address','$mobile_no','$working_hrs','$fax_no','$email','$lats','$longs',NOW())");			
		}		

	 if($query2 == 1){
		header("location:edit_contact.php?msg=success");
		
	} else {		
		header("location:edit_contact.php?msg=fail");
		
	}	
		
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="department_name_ar" content="">
  <meta name="author" content="">

  <title>Dashboard - Convalescent Plasma Program</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/admin.css" rel="stylesheet">
  
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>

<body id="page-top">

  <div id="wrapper">

    <?php
	include_once('header.php');
	?>
	
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contact Us</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Contact Us</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					<?php
					if($id != 0) {
						$contact_sql = mysqli_query($connection,"SELECT * from sumc_contact_us where id=".$id);
						$contact_list = mysqli_fetch_array($contact_sql);
						$banner_image = $contact_list['banner_image'];
						$company_name = $contact_list['company_name'];
						$address = $contact_list['address'];
						$mobile_no = $contact_list['mobile_no'];
						$email = $contact_list['email'];
						$lats = $contact_list['lats'];
						$longs = $contact_list['longs'];
						$working_hrs = $contact_list['working_hrs'];
					}
					
					?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Company Name</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $company_name; ?>"/>
							</div>
							</div>
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea class="form-control" name="address" id="address" required="required" rows="4" style="width:600px"><?php echo $address; ?></textarea>
                        </div>
						</div>				
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mobile</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo $mobile_no; ?>"/>
							</div>
							</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lats.</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="lats" id="lats" class="form-control" value="<?php echo $lats; ?>" />
							</div>
							</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Longs.</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="longs" id="longs" class="form-control" value="<?php echo $longs; ?>" />
							</div>
							</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>"/>
							</div>
						</div>
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Working Hours<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea class="form-control" name="working_hrs" id="working_hrs" required="required" rows="4" style="width:600px"><?php echo $working_hrs; ?></textarea>
                        </div>
						</div>				 
					  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
        <!-- /page content -->

<?php include_once("footer.php"); ?>
<script>
CKEDITOR.replace('address');
CKEDITOR.replace('working_hrs');
</script>
