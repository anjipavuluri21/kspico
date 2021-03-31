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
			$title = mysqli_real_escape_string($connection,$_POST['title']);
                        $description = mysqli_real_escape_string($connection,$_POST['description']);
                        $mision = mysqli_real_escape_string($connection,$_POST['mision']);
                        $policy = mysqli_real_escape_string($connection,$_POST['policy']);
                        
			$content = mysqli_real_escape_string($connection,$_POST['content']);
			if($_FILES['image']['name'] != "")
			{			
			
			$increment_icon = '';
				
				//$name_icon = pathinfo($_FILES['banner_image']['name'], PATHINFO_FILENAME);
				$name_icon = "quality_control";
				$extension_icon = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/quality_control/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/quality_control/" . $basename_icon;

				$target_file_icon = "../uploads/quality_control/" . $basename_icon;
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file_icon)) {					
					$image = $blocation_icon;										
				}
			}
			
			
			
			
			if($id != 0) {
				
				if($image != "") {
					$corse_img = ",image='$image'";
				}
				else {
					$corse_img = "";
				}
				
                                $updatesql = mysqli_query($connection,"update sumc_quality_control set title='$title',description='$description',mision='$mision',policy='$policy' $corse_img where id=".$id);
				
			}
			else {
				
				$updatesql = mysqli_query($connection,"insert into sumc_quality_control (title,description,mision,policy,image,status,created_date) values ('$title',$description','$mision','$image','$policy',1,NOW())");
				
				
			}
			if($updatesql) {
				header("location:quality_control.php?msg=success");
				exit;
			}
}


$description ="";
$banner_image ="";
$side_image ="";
$pdf_file ="";
$pdf_text ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_quality_control where id=".$id);
$booth_features_result = mysqli_fetch_array($features_sql);

$title              = $booth_features_result['title'];
$description        = $booth_features_result['description'];
$image              = $booth_features_result['image'];
$mision             = $booth_features_result['mision'];
$policy             = $booth_features_result['policy'];

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

  <title>Dashboard - Kuwait Saudi Pharmaceutical Industries Company</title>

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
            <h1 class="h3 mb-0 text-gray-800">Quality Control</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Quality Control</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
				
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Image<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="image" accept="image/*" id="banner_image" <?php if($image == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
							<?php
								if($image != "") {
									
								?>
								<img src="../<?php echo $image; ?>" width="200" height="100" />
								<?php
								
								}
							?>
						</div>
                      </div>
                                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="title" id="pdf_text" required="required" value="<?php echo $title; ?>" class="form-control" style="width: 480px;">
							
						</div>
                      </div>
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Content</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea name="description" id="description" class="form-control" style="width: 580px;" required="required"><?php echo $description; ?></textarea>
						</div>
                      </div>
				
				
				
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mision<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="mision" id="pdf_text" required="required" value="<?php echo $mision; ?>" class="form-control" style="width: 480px;">
							
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Policy<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea name="policy" id="description" class="form-control" style="width: 580px;" required="required"><?php echo $policy; ?></textarea>
							
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
