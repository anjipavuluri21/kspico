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
	$title 	=  mysqli_real_escape_string($connection,$_POST['title']);
	$description	=  mysqli_real_escape_string($connection,$_POST['description']);	
	if($_FILES['projects_image']['name'][0] != "")
			{			
			
				foreach ($_FILES['projects_image']['name'] as $key => $val) {
				$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['projects_image']['name'][$key], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['projects_image']['name'][$key], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/projects/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/projects/" . $basename_icon;

				$target_file_icon = "../uploads/projects/" . $basename_icon;
				if (move_uploaded_file($_FILES['projects_image']['tmp_name'][$key], $target_file_icon)) {					
					//$projects_image = $blocation_icon;
						if($key != count($_FILES['projects_image']['name'])-1) {
										$projects_image .= $blocation_icon.",";
										}
										else {
											$projects_image .= $blocation_icon;
										}						
				}
			}
			}
			
	if($id == 0) {
		$login_query = mysqli_query($connection,"insert into sumc_projects (title,images,description,status,created_date) values ('$title','$projects_image','$description',1,NOW())");
	}
	else {	
		if($projects_image != "") {
					$corse_img = ",images='$projects_image'";
				}
				else {
					$corse_img = "";
				}
	
	
		$login_query = mysqli_query($connection,"UPDATE sumc_projects SET  title='$title',description='$description' $corse_img  WHERE id ='$id'");		
	}
	if($login_query == 1){
		header("location:projectlist.php?msg=success");		
	} else {		
		header("location:projectlist.php?msg=fail");		
	}	
}

$title ="";
$description ="";
$projects_image ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_projects where id=".$id);
$projects_result = mysqli_fetch_array($features_sql);

$title = $projects_result['title'];
$description	 = $projects_result['description'];
$projects_image	 = $projects_result['images'];
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
	
        <!-- page content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">Projects</h1>
              </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Project</h6>                    
                    </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					 
					<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title</label>
								<input type="text" name="title" id="title"  required="required" class="form-control" value="<?php echo $title; ?>" style="width: 480px;" >
						</div>						
						
					
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea name="description" id="description" required="required" class="form-control"><?php echo $description; ?></textarea>
						</div>
                    </div>                      
						
                      
					 	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Image<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="projects_image[]" accept="image/*" id="projects_image[]" <?php if($projects_image == "") { ?> required="required" <?php } ?> multiple class="form-control" style="width: 480px;">
							<?php
								if($projects_image != "") {
								$images = explode(",",$projects_image);
								foreach($images as $img) {	
								?>
								<img src="../<?php echo $img; ?>" width="100" height="100" />
								<?php
								}
								}
							?>
						</div>
                      </div>
					 	
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<a href="projectlist.php" class="btn btn-primary">Cancel</a>
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
<script>
CKEDITOR.replace('description');
</script>
<?php include "footer.php" ?>
