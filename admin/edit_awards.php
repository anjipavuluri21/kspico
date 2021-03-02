<?php
include_once("connection.php");
if(isset($_REQUEST['id'])) {
$id = ($_REQUEST['id'])? $_REQUEST['id'] : 0;
}
else {
	$id = 0;
}

if(isset($_POST['submit']))
{			
			$title = mysqli_real_escape_string($connection,$_POST['title']);
			if($_FILES['award_image']['name'] != "")
			{			
			
			$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['award_image']['name'], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['award_image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/awards/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/awards/" . $basename_icon;

				$target_file_icon = "../uploads/awards/" . $basename_icon;
				if (move_uploaded_file($_FILES['award_image']['tmp_name'], $target_file_icon)) {					
					$award_image = $blocation_icon;										
				}
			}
			if($id != 0) {
				if($award_image != "") {
					$awd_img = ",award_image='$award_image'";
				}
				else {
					$awd_img = "";
				}
				$updatesql = mysqli_query($connection,"update sumc_company_awards set title='$title' $awd_img where id=".$id);
				
			}
			else {
				$updatesql = mysqli_query($connection,"insert into sumc_company_awards (title,award_image,status,created_date) values ('$title','$award_image',1,NOW())");
				
				
			}
			if($updatesql) {
				header("location:awardslist.php?msg=success");
				exit;
			}
}

$title ="";
$award_image ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_company_awards where id=".$id);
$booth_features_result = mysqli_fetch_array($features_sql);

$title = $booth_features_result['title'];
$award_image	 = $booth_features_result['award_image'];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="">
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
            <h1 class="h3 mb-0 text-gray-800">Awards</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Awards</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
				
				 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Title*</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="title" id="title" placeholder="Add Title" class="form-control" style="width: 580px;" value="<?php echo $title; ?>" required="required">
						</div>
                      </div>
				
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Award Image*</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="award_image" accept="image/*" id="award_image" <?php if($award_image == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
							<?php
								if($award_image != "") {
									
								?>
								<img src="../<?php echo $award_image; ?>" width="200" height="100" />
								<?php
								
								}
							?>
						</div>
                      </div>
				
				
				
				<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <a href="awardslist.php" class="btn btn-primary">Cancel</a>
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

     <?php
	 include_once('footer.php');
	 ?>
