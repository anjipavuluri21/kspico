<?php
include_once("connection.php");
if(isset($_REQUEST['id'])) {
$id = $_REQUEST['id'];
}
else {
	$id = 0;
}


if(isset($_POST['submit']))
{			
			$category_name = mysqli_real_escape_string($connection,$_POST['category_name']);
			$description = mysqli_real_escape_string($connection,$_POST['description']);
			
			
			
			/*
			if($_FILES['category_image']['name'] != "")
		{			
			
			$increment2 = '';
				
				$name2 = pathinfo($_FILES['category_image']['name'], PATHINFO_FILENAME);
				$extension2 = pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/healthcategory/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/healthcategory/" . $basename2;

				$target_file2 = "../uploads/healthcategory/" . $basename2;
				if (move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file2)) {					
					$category_image = $blocation2;										
				}
		}
		*/
			/*if($_FILES['profile_image']['name'] != "")
		{			
			
			$increment2 = '';
				
				$name2 = pathinfo($_FILES['profile_image']['name'], PATHINFO_FILENAME);
				$extension2 = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/healthcategory/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/healthcategory/" . $basename2;

				$target_file2 = "../uploads/healthcategory/" . $basename2;
				if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file2)) {					
					$profile_image = $blocation2;										
				}
		}
		*/
			
			if($id != 0) {
				if($_FILES['category_image']['name'][0] != "")
			{			
			
				foreach ($_FILES['category_image']['name'] as $key => $val) {
				$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['category_image']['name'][$key], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['category_image']['name'][$key], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/healthcategory/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/healthcategory/" . $basename_icon;

				$target_file_icon = "../uploads/healthcategory/" . $basename_icon;
				if (move_uploaded_file($_FILES['category_image']['tmp_name'][$key], $target_file_icon)) {	

				$login_query = mysqli_query($connection,"INSERT INTO sumc_healthcategory_images (`category_id`,`image`,created_date) VALUES ('$id','$blocation_icon',NOW())");					
										
				}
			}
			}
				$updatesql = mysqli_query($connection,"update sumc_healthcategory set category_name='$category_name',description='$description' $cat_image  where id=".$id);
			}
			else {
				$updatesql = mysqli_query($connection,"insert into sumc_healthcategory (category_name,description,category_image,status,created_date) values ('$category_name','$description','$category_image',1,NOW())");
				$catid = mysqli_insert_id($connection);
				
				if($_FILES['category_image']['name'][0] != "")
				{			
			
				foreach ($_FILES['category_image']['name'] as $key => $val) {
				$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['category_image']['name'][$key], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['category_image']['name'][$key], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/healthcategory/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/healthcategory/" . $basename_icon;

				$target_file_icon = "../uploads/healthcategory/" . $basename_icon;
					if (move_uploaded_file($_FILES['category_image']['tmp_name'][$key], $target_file_icon)) {	

						$login_query = mysqli_query($connection,"INSERT INTO sumc_healthcategory_images (`category_id`,`image`,created_date) VALUES ('$catid','$blocation_icon',NOW())");					
											
					}
			}
			}
			}
			if($updatesql) {
				header("location:healthcategorylist.php?msg=success");
				exit;
			}
}
$category_name="";
$description="";
$category_image="";
$profile_image="";


if($id != 0) {
	$booth_sql = mysqli_query($connection,"select * from sumc_healthcategory where id=".$id);
	$booth_result = mysqli_fetch_array($booth_sql);
	$category_name = $booth_result['category_name'];
	$description = $booth_result['description'];
	//$category_image = $booth_result['category_image'];
	$profile_image = $booth_result['profile_image'];
	
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
<style>
.img-wrap {
    position: relative;
    display: inline-block;
    border: 1px red solid;
    font-size: 0;
}
.img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    background-color: #FFF;
    padding: 5px 2px 2px;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    opacity: .2;
    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
}
.img-wrap:hover .close {
    opacity: 1;
}
</style>
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
            <h1 class="h3 mb-0 text-gray-800">Event Category</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Event Category</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input class="form-control" name="category_name" id="category_name" value="<?php echo $category_name; ?>" required="required" rows="4" style="width:400px">
                        </div>
				</div>
				 <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Category Image</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<p id="note">Please upload image with size 575X400</p>
							<?php
							$hcatimgs_sql = mysqli_query($connection,"select * from sumc_healthcategory_images where category_id=".$id);
							$cnt = mysqli_num_rows($hcatimgs_sql);
							?>
							<input type="file" name="category_image[]" accept="image/*" id="category_image" <?php if($cnt == 0) { ?> required="required" <?php } ?> multiple class="form-control" style="width: 480px;">
							<?php
							
							
							if(mysqli_num_rows($hcatimgs_sql) > 0) {
							   while($imgss = mysqli_fetch_array($hcatimgs_sql))  {
								   $pimage = $imgss['image'];
								if($pimage != "") {
								?>
								<div class="img-wrap">
								<span class="close">&times;</span>
								<img src="../<?php echo $pimage; ?>" width="150"  data-id="<?php echo $imgss['id'] ?>" />
										  </div>
										  <input type="hidden" name="hiddenimgid[]" value="<?php echo $imgss['id']; ?>">
								<?php
								}
								}
							}
							?>
							</div>
							</div>
							<!-- <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Profile Image</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="profile_image" id="profile_image" class="form-control" />
							<p id="note">Please upload image with size 575X400</p>
							<?php
							if(isset($profile_image) && $profile_image != "") {
								?>
								<img src='../<?php echo $profile_image; ?>' height='100px' width='450px;' />
								<?php
							}
							?>
							</div>
							</div>
							-->
				<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description*</label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea name="description" id="description" class="form-control" style="width: 580px;" required="required"><?php echo $description; ?></textarea>
						</div>
                      </div>
				
				
				<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <a href="healthcategorylist.php" class="btn btn-primary">Cancel</a>
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

$('.img-wrap .close').on('click', function() {		
	var id = $(this).closest('.img-wrap').find('img').data('id');  	
	var r=confirm("Are you sure?");
	if(r==true)
	{   	 		
	 $.ajax({
		type:"POST",
		data:"id="+id,
		url:"deletecollection.php?type=sumc_healthcategory_images",
		success:function(data)
		{
			if(data=="done")
			{
				alert("Image Deleted Successfully");
				location.reload();
			}
		}
	  });
	 }
	 else
	 {
		return false;
	 }
});
          
</script>
     <?php
	 include_once('footer.php');
	 ?>