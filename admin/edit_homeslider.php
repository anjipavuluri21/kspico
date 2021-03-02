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
			$img_location = "";
			$title = mysqli_real_escape_string($connection,$_POST['title']);
                        $text_title = mysqli_real_escape_string($connection,$_POST['text_title']);
                        $content = mysqli_real_escape_string($connection,$_POST['content']);
			if($_FILES['banner_image']['name'] != "")
		{			
			
			$increment2 = '';
				
				$name2 = pathinfo($_FILES['banner_image']['name'], PATHINFO_FILENAME);
				$extension2 = pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/homesliders/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/homesliders/" . $basename2;

				$target_file2 = "../uploads/homesliders/" . $basename2;
				if (move_uploaded_file($_FILES['banner_image']['tmp_name'], $target_file2)) {					
					$img_location = $blocation2;										
				}
		}
		
		$preorder_sql = mysqli_query($connection,"select max(ordering) as re_order from sumc_homeslides");
		$preorder_q  = mysqli_fetch_array($preorder_sql);
			$reorder = intval($preorder_q['re_order']);
			$reorder = $reorder + 1;
			
			if($id != 0) {
				if($img_location != "") {
					$img_file = ",slide_image= '$img_location'";
				}
				else {
					$img_file = "";
				}
				
				$updatesql = mysqli_query($connection,"update sumc_homeslides set title='$title', text_title='$text_title',content='$content' $img_file where id=".$id);
			}
			else {
				$updatesql = mysqli_query($connection,"insert into sumc_homeslides (title,text_title,content,slide_image,ordering,status,created_date) values ('$title','$text_title','$content','$img_location','$reorder',1,NOW())");
			}
			if($updatesql) {
				header("location:homesliderslist.php?msg=success");
				exit;
			}
}
$title="";
$caption = "";

if($id != 0) {
$booth_features_sql = mysqli_query($connection,"select * from sumc_homeslides where id=".$id);
$booth_features_result = mysqli_fetch_array($booth_features_sql);
$banner_image = $booth_features_result['slide_image'];
$title = $booth_features_result['title'];
$text_title = $booth_features_result['text_title'];
$content = $booth_features_result['content'];
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

  <title>Kuwait Saudi Pharmaceutical Industries Company</title>

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
            <h1 class="h3 mb-0 text-gray-800">Home Sliderss</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Home Sliders</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image Title<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input class="form-control" name="title" id="title" value="<?php echo $title; ?>" required="required" rows="4" style="width:400px">
                        </div>
				</div>
                                    
                                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input class="form-control" name="text_title" id="title" value="<?php echo $text_title; ?>" required="required" rows="4" style="width:400px">
                        </div>
				</div>
                                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Content<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input class="form-control" name="content" id="title" value="<?php echo $content; ?>" required="required" rows="4" style="width:400px">
                        </div>
				</div>
				
				  
				  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Banner Image</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="banner_image" id="banner_image" class="form-control" />
							<p id="note">Please upload image with size 1920X900</p>
							<?php
							if(isset($banner_image) && $banner_image != "") {
								?>
                                                        <img src='../<?php echo $banner_image; ?>' height='150px' width='450px;' />
								<?php
							}
							?>
							</div>
							</div>
				
				<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <a href="homesliderslist.php" class="btn btn-primary">Cancel</a>
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
