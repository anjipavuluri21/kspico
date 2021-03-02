<?php 
include_once("connection.php");
if(isset($_REQUEST['id'])) {
$id = ($_REQUEST['id'])? $_REQUEST['id'] : 1;
}
else {
	$id = 1;
}

 
if(isset($_POST['submit']))
{		
	$facebook 	=  mysqli_real_escape_string($connection,$_POST['facebook']);
	$instagram	=  mysqli_real_escape_string($connection,$_POST['instagram']);	
	$twitter	=  mysqli_real_escape_string($connection,$_POST['twitter']);	
	$linkedin	=  mysqli_real_escape_string($connection,$_POST['linkedin']);		
			
	$login_query = mysqli_query($connection,"UPDATE sumc_socialnetworking SET  facebook='$facebook',instagram='$instagram', twitter='$twitter',linked_in='$linkedin' WHERE id ='$id'");		
	
	if($login_query == 1){
		header("location:edit_socialnetworking.php?msg=success");		
	} else {		
		header("location:edit_socialnetworking.php?msg=fail");		
	}	
}

$instagram ="";
$twitter = "";
$linkedin ="";

if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_socialnetworking where id=".$id);
$booth_features_result = mysqli_fetch_array($features_sql);


$instagram	 = $booth_features_result['instagram'];
$twitter = $booth_features_result['twitter'];
$linkedin	 = $booth_features_result['linked_in'];

}	
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
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
        <!-- page content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">Social Networking</h1>
              </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Social Networking</h6>                    
                    </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					 
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Instagram<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="instagram" id="instagram" required="required" class="form-control" style="width: 580px;" value="<?php echo $instagram; ?>">
						</div>
                    </div>                      
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Twitter<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="twitter" id="twitter" required="required" class="form-control" style="width: 580px;" value="<?php echo $twitter; ?>">
						</div>
                      </div>
					
					 	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Linked In<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="linkedin" id="linkedin" required="required" class="form-control" style="width: 580px;" value="<?php echo $linkedin; ?>">
						</div>
                      </div>
					 	
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
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

<?php include "footer.php" ?>
