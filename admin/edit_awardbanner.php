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
			
		
		if($_FILES['award_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['partners_banner']['name'], PATHINFO_FILENAME);
				$name2 = "award";
				$extension2 = pathinfo($_FILES['award_banner']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/banners/" . $basename2;

				$target_file2 = "../uploads/banners/" . $basename2;
				if (move_uploaded_file($_FILES['award_banner']['tmp_name'], $target_file2)) {					
					$award_banner = $blocation2;										
				}
		}
		if($_FILES['side_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['partners_banner']['name'], PATHINFO_FILENAME);
				$name2 = "sidehealth";
				$extension2 = pathinfo($_FILES['side_banner']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/banners/" . $basename2;

				$target_file2 = "../uploads/banners/" . $basename2;
				if (move_uploaded_file($_FILES['side_banner']['tmp_name'], $target_file2)) {					
					$side_banner = $blocation2;										
				}
		}
				
			if($id != 0) {
				if($award_banner != "") {
					$hea_banner = "award_banner= '$award_banner'";
				}
				else {
					$hea_banner = "";
				}
				if($side_banner != "") {
					$aw_banner = "awardside_banner= '$side_banner'";
				}
				else {
					$aw_banner = "";
				}
				
				
				if($hea_banner != "" && $aw_banner != "") {
				$updatesql = mysqli_query($connection,"update sumc_banners set $hea_banner, $aw_banner where id=".$id);
				}
				else if($hea_banner != "" && $aw_banner == "") {
					$updatesql = mysqli_query($connection,"update sumc_banners set $hea_banner where id=".$id);
				}
				else if($hea_banner == "" && $aw_banner != "") {
					$updatesql = mysqli_query($connection,"update sumc_banners set $aw_banner where id=".$id);
				}
			}
			else {
				$updatesql = mysqli_query($connection,"insert into sumc_banners (award_banner,awardside_banner) values ('$award_banner','$side_banner')");
			}
			if($updatesql) {
				header("location:edit_awardbanner.php?msg=success");
				exit;
			}
}
$award_banner="";
$awardside_banner="";


if($id != 0) {
$booth_features_sql = mysqli_query($connection,"select * from sumc_banners where id=".$id);
$booth_features_result = mysqli_fetch_array($booth_features_sql);
$awardside_banner = $booth_features_result['awardside_banner'];
$award_banner = $booth_features_result['award_banner'];

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
            <h1 class="h3 mb-0 text-gray-800">Award Banners</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Award Banners</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Side Image</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="side_banner" id="side_banner" class="form-control" />
							<p id="note">Please upload image with size 455X500</p>
							<?php
							if(isset($awardside_banner) && $awardside_banner != "") {
								?>
								<img src='../<?php echo $awardside_banner; ?>' height='150px' width='150px;' />
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
