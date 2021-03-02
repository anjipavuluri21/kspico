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
			$career_receiver_email = mysqli_real_escape_string($connection,$_POST['career_receiver_email']);	
			
		if($id != 0) {
			$query2 = mysqli_query($connection,"UPDATE sumc_contact_us SET career_receiver_email='$career_receiver_email' WHERE id= ".$id);			
		}
		else {		
		$query2 = mysqli_query($connection,"INSERT sumc_contact_us (career_receiver_email,status,created_date) values ('$career_receiver_email',1,NOW())");			
		}		

	 if($query2 == 1){
		header("location:edit_careerfeedback.php?msg=success");
		
	} else {		
		header("location:edit_careerfeedback.php?msg=fail");
		
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

  <title>Dashboard - SUMC</title>

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
            <h1 class="h3 mb-0 text-gray-800">Career Settings</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Career Settings</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					<?php
					if($id != 0) {
						
						$contact_sql = mysqli_query($connection,"SELECT * from sumc_contact_us where id=".$id);
						$contact_list = mysqli_fetch_array($contact_sql);
						$career_receiver_email = $contact_list['career_receiver_email'];
					}
					
					?>
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Career Feedback Email</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="career_receiver_email" id="career_receiver_email" class="form-control" value="<?php echo $career_receiver_email; ?>"/>
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

