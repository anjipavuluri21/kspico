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
			
		
		if($_FILES['contact_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['contact_banner']['name'], PATHINFO_FILENAME);
				$name2 = "contact";
				$extension2 = pathinfo($_FILES['contact_banner']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/banners/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/banners/" . $basename2;

				$target_file2 = "../uploads/banners/" . $basename2;
				if (move_uploaded_file($_FILES['contact_banner']['tmp_name'], $target_file2)) {					
					$contact_banner = $blocation2;										
				}
		}
		if($_FILES['side_banner']['name'] != "")
		{			
			
			$increment2 = '';
				
				//$name2 = pathinfo($_FILES['contact_banner']['name'], PATHINFO_FILENAME);
				$name2 = "sidecontact";
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
				if($contact_banner != "") {
					$hea_banner = "contact_banner= '$contact_banner'";
				}
				else {
					$hea_banner = "";
				}
				if($side_banner != "") {
					$aw_banner = "contactside_banner= '$side_banner'";
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
				$updatesql = mysqli_query($connection,"insert into sumc_banners (contact_banner,contactside_banner) values ('$contact_banner','$side_banner')");
			}
			if($updatesql) {
				header("location:edit_contactbanner.php?msg=success");
				exit;
			}
}
$contact_banner="";
$contactside_banner="";


if($id != 0) {
$booth_features_sql = mysqli_query($connection,"select * from sumc_banners where id=".$id);
$booth_features_result = mysqli_fetch_array($booth_features_sql);
$contactside_banner = $booth_features_result['contactside_banner'];
$contact_banner = $booth_features_result['contact_banner'];

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
            <h1 class="h3 mb-0 text-gray-800">Contact Banners</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Contact Banners</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Side Image</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="side_banner" id="side_banner" class="form-control" />
							<p id="note">Please upload image with size 455X500</p>
							<?php
							if(isset($contactside_banner) && $contactside_banner != "") {
								?>
								<img src='../<?php echo $contactside_banner; ?>' height='150px' width='150px;' />
								<?php
							}
							?>
							</div>
							</div>
				  
				  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact Image</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="contact_banner" id="contact_banner" class="form-control" />
							<p id="note">Please upload image with size 2000X500</p>
							<?php
							if(isset($contact_banner) && $contact_banner != "") {
								?>
								<img src='../<?php echo $contact_banner; ?>' height='150px' width='450px;' />
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
