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
		
		if($_FILES['terms_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['partners_banner']['name'], PATHINFO_FILENAME);
				$name2 = "terms";
				$extension2 = pathinfo($_FILES['terms_banner']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/banners/" . $basename2;

				$target_file2 = "../uploads/banners/" . $basename2;
				if (move_uploaded_file($_FILES['terms_banner']['tmp_name'], $target_file2)) {					
					$terms_banner = $blocation2;										
				}
		}
		if($_FILES['privacy_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['partners_banner']['name'], PATHINFO_FILENAME);
				$name2 = "privacy";
				$extension2 = pathinfo($_FILES['privacy_banner']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/banners/" . $basename2;

				$target_file2 = "../uploads/banners/" . $basename2;
				if (move_uploaded_file($_FILES['privacy_banner']['tmp_name'], $target_file2)) {					
					$privacy_banner = $blocation2;										
				}
		}
if($_FILES['news_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['partners_banner']['name'], PATHINFO_FILENAME);
				$name2 = "news";
				$extension2 = pathinfo($_FILES['news_banner']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/banners/" . $basename2;

				$target_file2 = "../uploads/banners/" . $basename2;
				if (move_uploaded_file($_FILES['news_banner']['tmp_name'], $target_file2)) {					
					$news_banner = $blocation2;										
				}
		}
		if($_FILES['project_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['partners_banner']['name'], PATHINFO_FILENAME);
				$name2 = "project";
				$extension2 = pathinfo($_FILES['project_banner']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/banners/" . $basename2;

				$target_file2 = "../uploads/banners/" . $basename2;
				if (move_uploaded_file($_FILES['project_banner']['tmp_name'], $target_file2)) {					
					$projects_banner = $blocation2;										
				}
		}		
			if($id != 0) {
				
			
				
				
				if($terms_banner != "") {
					$term_banner = "terms_banner= '$terms_banner'";
					$updatesql = mysqli_query($connection,"update sumc_banners set $term_banner  where id=".$id);
				}
				else {
					$term_banner = "";
				}
				if($privacy_banner != "") {
					$priv_banner = "privacy_banner= '$privacy_banner'";
					$updatesql = mysqli_query($connection,"update sumc_banners set $priv_banner where id=".$id);
				}
				else {
					$priv_banner = "";
				}
				if($news_banner != "") {
					$new_banner = "news_banner= '$news_banner'";
					$updatesql = mysqli_query($connection,"update sumc_banners set $new_banner  where id=".$id);
				}
				else {
					$new_banner = "";
				}
				if($projects_banner != "") {
					$proj_banner = "project_banner= '$projects_banner'";
					$updatesql = mysqli_query($connection,"update sumc_banners set $proj_banner  where id=".$id);
				}
				else {
					$proj_banner = "";
				}
				
				
				
			}
			else {
				$updatesql = mysqli_query($connection,"insert into sumc_banners (terms_banner,privacy_banner,news_banner,project_banner) values ('$terms_banner','$privacy_banner','$news_banner','$proj_banner')");
			}
			if($updatesql) {
				header("location:edit_banners.php?msg=success");
				exit;
			}
}

$terms_banner = "";
$privacy_banner = "";
$news_banner = "";
$project_banner = "";

if($id != 0) {
$booth_features_sql = mysqli_query($connection,"select * from sumc_banners where id=".$id);
$booth_features_result = mysqli_fetch_array($booth_features_sql);

$terms_banner = $booth_features_result['terms_banner'];
$privacy_banner = $booth_features_result['privacy_banner'];
$news_banner = $booth_features_result['news_banner'];
$project_banner = $booth_features_result['project_banner'];
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

  <title>Dashboard - A & T Respiratory Lectures</title>

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
            <h1 class="h3 mb-0 text-gray-800">Home Banners</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Home Banners</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    
							
				
				<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Terms Banner</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="terms_banner" id="terms_banner" class="form-control" />
							<p id="note">Please upload image with size 2000X500</p>
							<?php
							if(isset($terms_banner) && $terms_banner != "") {
								?>
								<img src='../<?php echo $terms_banner; ?>' height='150px' width='450px;' />
								<?php
							}
							?>
							</div>
							</div>
				<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Privacy Banner</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="privacy_banner" id="privacy_banner" class="form-control" />
							<p id="note">Please upload image with size 2000X500</p>
							<?php
							if(isset($privacy_banner) && $privacy_banner != "") {
								?>
								<img src='../<?php echo $privacy_banner; ?>' height='150px' width='450px;' />
								<?php
							}
							?>
							</div>
							</div>
				<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">News Banner</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="news_banner" id="news_banner" class="form-control" />
							<p id="note">Please upload image with size 2000X500</p>
							<?php
							if(isset($news_banner) && $news_banner != "") {
								?>
								<img src='../<?php echo $news_banner; ?>' height='150px' width='450px;' />
								<?php
							}
							?>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Projects Banner</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="project_banner" id="project_banner" class="form-control" />
							<p id="note">Please upload image with size 2000X500</p>
							<?php
							if(isset($project_banner) && $project_banner != "") {
								?>
								<img src='../<?php echo $project_banner; ?>' height='150px' width='450px;' />
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

     <?php
	 include_once('footer.php');
	 ?>
