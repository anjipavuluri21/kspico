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
	$title          =  mysqli_real_escape_string($connection,$_POST['title']);
	$membership_link	=  mysqli_real_escape_string($connection,$_POST['membership_link']);	
	if($_FILES['image']['name'] != "")
			{			
			
			$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/membership/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/membership/" . $basename_icon;

				$target_file_icon = "../uploads/membership/" . $basename_icon;
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file_icon)) {					
					$image = $blocation_icon;										
				}
			}
			
	if($id == 0) {
		$login_query = mysqli_query($connection,"insert into sumc_memberships (title,image,membership_link,status,created_date) values ('$title','$image','$membership_link',1,NOW())");
	}
	else {	
		if($image != "") {
					$corse_img = ",image='$image'";
				}
				else {
					$corse_img = "";
				}
	
	
		$login_query = mysqli_query($connection,"UPDATE sumc_memberships SET  title='$title',membership_link='$membership_link' $corse_img  WHERE id ='$id'");		
	}
	if($login_query == 1){
		header("location:membershiplist.php?msg=success");		
	} else {		
		header("location:membershiplist.php?msg=fail");		
	}	
}

$partner_name ="";
$description ="";
$partners_pdf = "";
$partner_image ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_memberships where id=".$id);
$partners_result = mysqli_fetch_array($features_sql);

$title = $partners_result['title'];
$membership_link	 = $partners_result['membership_link'];
$image	 = $partners_result['image'];

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
               <h1 class="h3 mb-0 text-gray-800">Membership</h1>
              </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Memberships</h6>                    
                    </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					 
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="title" id="partner_name" class="form-control" required="required" value= "<?php echo $title; ?>">
						</div>
                      </div>
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Membership Link<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="membership_link" id="partner_name" class="form-control" required="required" value= "<?php echo $membership_link; ?>">
						</div>
                    </div>                      
						
                      
					 	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Image<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="image" accept="image/*" id="partner_image" <?php if($image == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
							<?php
								if($image != "") {
									
								?>
								<img src="../<?php echo $image; ?>" width="100" height="100" />
								<?php
								
								}
							?>
						</div>
                      </div>
					 	
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="membershiplist.php" class="btn btn-primary">Cancel</a>
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
