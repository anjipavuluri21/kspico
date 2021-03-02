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
			$department_name = mysqli_real_escape_string($connection,$_POST['department_name']);
			$department_name_ar = mysqli_real_escape_string($connection,$_POST['department_name_ar']);
			
			if($id != 0) {
				
				$updatesql = mysqli_query($connection,"update sumc_departments set department_name='$department_name',department_name_ar='$department_name_ar' where id=".$id);
				
			}
			else {
				$updatesql = mysqli_query($connection,"insert into sumc_departments (department_name,department_name_ar,status,created_date) values ('$department_name','$department_name_ar',1,NOW())");
				
				
			}
			if($updatesql) {
				header("location:departmentslist.php?msg=success");
				exit;
			}
}

$department_name ="";
$department_name_ar ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_departments where id=".$id);
$booth_features_result = mysqli_fetch_array($features_sql);

$department_name = $booth_features_result['department_name'];
$department_name_ar	 = $booth_features_result['department_name_ar'];

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
            <h1 class="h3 mb-0 text-gray-800">Departments</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Departments</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
				
				 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hospital Name*</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="department_name" id="department_name" placeholder="Add Title" class="form-control" style="width: 580px;" value="<?php echo $department_name; ?>" required="required">
						</div>
                      </div>
				
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hospital Name Arabic*</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="department_name_ar" id="department_name_ar" class="form-control" style="width: 580px;" required="required" value="<?php echo $department_name_ar; ?>" >
						</div>
                      </div>
				
				
				
				<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <a href="departmentslist.php" class="btn btn-primary">Cancel</a>
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
