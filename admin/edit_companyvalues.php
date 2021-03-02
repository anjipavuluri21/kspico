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
			$description = mysqli_real_escape_string($connection,$_POST['description']);
			if($_FILES['banner_image']['name'] != "")
			{			
			
			$increment_icon = '';
				
				//$name_icon = pathinfo($_FILES['banner_image']['name'], PATHINFO_FILENAME);
				$name_icon = "companyvalues";
				$extension_icon = pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/banners/" . $basename_icon;

				$target_file_icon = "../uploads/banners/" . $basename_icon;
				if (move_uploaded_file($_FILES['banner_image']['tmp_name'], $target_file_icon)) {					
					$banner_image = $blocation_icon;										
				}
			}
			if($_FILES['side_image']['name'] != "")
			{			
			
			$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['side_image']['name'], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['side_image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/companyvalues/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/companyvalues/" . $basename_icon;

				$target_file_icon = "../uploads/companyvalues/" . $basename_icon;
				if (move_uploaded_file($_FILES['side_image']['tmp_name'], $target_file_icon)) {					
					$side_image = $blocation_icon;										
				}
			}
			
			if($id != 0) {
				
				if($banner_image != "") {
					$corse_img = ",banner_image='$banner_image'";
				}
				else {
					$corse_img = "";
				}
				if($side_image != "") {
					$side_img = ",side_image='$side_image'";
				}
				else {
					$side_img = "";
				}
	
				
				$updatesql = mysqli_query($connection,"update sumc_company_values set description='$description' $corse_img $side_img where id=".$id);
				
			}
			else {
				
				$updatesql = mysqli_query($connection,"insert into sumc_company_values (description,status,created_date) values ('$description',1,NOW())");
				
				
			}
			if($updatesql) {
				header("location:edit_companyvalues.php?msg=success");
				exit;
			}
}


$description ="";
$banner_image ="";
$side_image ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_company_values where id=".$id);
$booth_features_result = mysqli_fetch_array($features_sql);

$description	 = $booth_features_result['description'];
$banner_image	 = $booth_features_result['banner_image'];
$side_image	 = $booth_features_result['side_image'];

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

  <title>Dashboard - Sumc - Al Sultan United Medical co</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/admin.css" rel="stylesheet">
  

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
            <h1 class="h3 mb-0 text-gray-800">Company Values</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Company Values</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
				<!--
				 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Title*</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<p><?php //echo $title; ?></p>
						</div>
                      </div>
				-->
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Banner Image<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="banner_image" accept="image/*" id="banner_image" <?php if($banner_image == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
							<?php
								if($banner_image != "") {
									
								?>
								<img src="../<?php echo $banner_image; ?>" width="200" height="100" />
								<?php
								
								}
							?>
						</div>
                      </div>
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description*</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea name="description" id="description" class="form-control" style="width: 580px;" required="required"><?php echo $description; ?></textarea>
						</div>
                      </div>
				
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Side Image<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="side_image" accept="image/*" id="side_image" <?php if($side_image == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
							<?php
								if($side_image != "") {
									
								?>
								<img src="../<?php echo $side_image; ?>" width="100" height="100" />
								<?php
								
								}
							?>
						</div>
                      </div>
				
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script>
CKEDITOR.replace('description');
          
</script>
     <?php
	 include_once('footer.php');
	 ?>
