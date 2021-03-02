<?php
include_once("connection.php");
$id = $_REQUEST['id'];
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
            <h1 class="h3 mb-0 text-gray-800">Careers</h1>
			
          </div>
			<?php
			$banner_que = mysqli_query($connection,"SELECT * from sumc_careers where id=".$id);
			$banner_res = mysqli_fetch_array($banner_que);
			?>

          <div class="row">

            <div class="col-lg-12 mb-12">

              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Careers</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">					
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact Name</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<?php echo $banner_res['fullname']; ?>
						</div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Position For
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<?php echo $banner_res['position_for']; ?>
						</div>
                      </div>
					 	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <a href="<?php echo $banner_res['cv_file']; ?>" target="_blank">View</a>
                        </div>
                      </div>						
					  	
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <a href="careerformslist.php" class="btn btn-primary">Cancel</a>						 
                        </div>
                      </div>
                   </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
	<?php include_once("footer.php"); ?>	
