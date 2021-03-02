<?php
include_once("connection.php");
ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

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
	$executive_summary	=  mysqli_real_escape_string($connection,$_POST['executive_summary']);
	$txt_start_date      =  date("Y-m-d",strtotime($_POST['start_date'])); 
 $txt_end_date      =  date("Y-m-d",strtotime($_POST['end_date'])); 	
		$showdates      =  $_POST['showdates']; 	
	if(isset($_POST['showdates'])) {
				$showdates = 1;
				
				
			}
			else {
				$showdates = 0;
				
			}
			
	
	
		/*
			
			if($_FILES['image']['name'][0] != "")
			{			
			
				$increment_icon1 = '';
				
				$name_icon1 = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
				$extension_icon1 = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/projects/" . $name_icon1 . $increment_icon1 . '.' . $extension_icon1)) {
					$increment_icon1++;
				}
				
				$basename_icon1 = $name_icon1 . $increment_icon1 . '.' . $extension_icon1;

				$blocation_icon1 = "uploads/projects/" . $basename_icon1;

				$target_file_icon1 = "../uploads/projects/" . $basename_icon1;
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file_icon1)) {					
					$img = $blocation_icon1;
										
				}
			}
			*/
			
	if($id == 0) {
		$login_query = mysqli_query($connection,"insert into sumc_projects (title,start_date,end_date,image,description,executive_summary,show_dates,status,created_date) values ('$title','$txt_start_date','$txt_end_date','','$description','$executive_summary','$showdates',1,NOW())");
		$projectid = mysqli_insert_id($connection);
		if($_FILES['image']['name'][0] != "")
			{			
			
				foreach ($_FILES['image']['name'] as $key => $val) {
				$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['image']['name'][$key], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['image']['name'][$key], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/projects/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/projects/" . $basename_icon;

				$target_file_icon = "../uploads/projects/" . $basename_icon;
				if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $target_file_icon)) {	

				$login_query = mysqli_query($connection,"INSERT INTO sumc_project_images (`project_id`,`image`,created_date) VALUES ('$projectid','$blocation_icon',NOW())");					
					//$projects_image = $blocation_icon;
						//if($key != count($_FILES['image']['name'])-1) {
						//				$img .= $blocation_icon.",";
						//				}
						//				else {
						//					$img .= $blocation_icon;
						//				}						
				}
			}
			}
		/*
		$phase_videos = "";
		$project_id = mysqli_insert_id($connection);
		if(isset($_POST['phase_title']) && $project_id != 0) {
					$sql = mysqli_query($connection,"delete from sumc_project_phases where project_id=".$project_id);
					
					for($count = 0; $count < count($_POST["phase_title"]); $count++)
					{
						$phase_title = $_POST["phase_title"][$count];
						$pdescription = $_POST["pdescription"][$count];
						
						$updateins_sql = mysqli_query($connection,"insert into sumc_project_phases (project_id,phase_title,description,created_date) values ('$project_id','$phase_title','$pdescription',NOW())");
						$phaseid = mysqli_insert_id($connection);
						if($phaseid != 0) {
							if($_FILES['phase_images']['name'][0] != "")
						{			
			
							foreach ($_FILES['phase_images']['name'] as $key => $val) {
				
								$increment_icon = '';
								$name_icon = pathinfo($_FILES['phase_images']['name'][$key], PATHINFO_FILENAME);
								$extension_icon = pathinfo($_FILES['phase_images']['name'][$key], PATHINFO_EXTENSION);
								
								//start with no suffix
								while (file_exists("../uploads/projects/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
									$increment_icon++;
								}
								$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

								$blocation_icon = "uploads/projects/" . $basename_icon;

								$target_file_icon = "../uploads/projects/" . $basename_icon;
								if (move_uploaded_file($_FILES['phase_images']['tmp_name'][$key], $target_file_icon)) {	

								$login_query = mysqli_query($connection,"INSERT INTO sumc_project_phaseimages (`phase_id`,`image`,created_date) VALUES ('$phaseid','$blocation_icon',NOW())");								
									
								}
							}
						}
						if($_FILES['videos']['name'][0] != "")
			{			
			
				foreach ($_FILES['videos']['name'] as $key => $val) {
				$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['videos']['name'][$key], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['videos']['name'][$key], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/projects/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_iconv = "uploads/projects/" . $basename_icon;

				$target_file_icon = "../uploads/projects/" . $basename_icon;
				if (move_uploaded_file($_FILES['videos']['tmp_name'][$key], $target_file_icon)) {					
					//$videos = $blocation_icon;
						$login_query = mysqli_query($connection,"INSERT INTO sumc_project_phasevideos (`phase_id`,`video`,created_date) VALUES ('$phaseid','$blocation_iconv',NOW())");										
				}
			}
			}
						}
					}
				}
				*/
	}
	else {	
	//echo "<pre>";print_r($_POST);
	//exit;
	/*	
	if($img != "") {
					$image = ",image='$img'";
				}
				else {
					$image = "";
				}
	*/
		//echo "UPDATE sumc_projects SET title='$title',description='$description',start_date='$txt_start_date',end_date='$txt_end_date'  $image  WHERE id ='$id'";
		
		$login_query = mysqli_query($connection,"UPDATE sumc_projects SET title='$title',description='$description',executive_summary='$executive_summary',start_date='$txt_start_date',end_date='$txt_end_date',show_dates='$showdates' WHERE id ='$id'");	
		
		if($_FILES['image']['name'][0] != "")
			{			
			
				foreach ($_FILES['image']['name'] as $key => $val) {
				$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['image']['name'][$key], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['image']['name'][$key], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/projects/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/projects/" . $basename_icon;

				$target_file_icon = "../uploads/projects/" . $basename_icon;
				if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $target_file_icon)) {	

				$login_query = mysqli_query($connection,"INSERT INTO sumc_project_images (`project_id`,`image`,created_date) VALUES ('$id','$blocation_icon',NOW())");					
					//$projects_image = $blocation_icon;
						//if($key != count($_FILES['image']['name'])-1) {
						//				$img .= $blocation_icon.",";
						//				}
						//				else {
						//					$img .= $blocation_icon;
						//				}						
				}
			}
			}
		
		/*
		$hiddenphase = $_POST['hiddenphase'];
		$phase_titles = $_POST['phase_titles'];
		$pdescriptions = $_POST['pdescriptions'];
		
		for($i=0;$i<=count($_POST['phase_titles']);$i++){
		if($_POST['phase_titles'][$i]!=""){
			
			if($hiddenphase[$i]!=""){
				
				//echo "UPDATE sumc_project_phases SET phase_title='$phase_titles[$i]', description='$pdescriptions[$i]' WHERE id=$hiddenphase[$i]";
				//exit;
				$adminmenu_query = mysqli_query($connection,"UPDATE sumc_project_phases SET phase_title='$phase_titles[$i]', description='$pdescriptions[$i]' WHERE id=$hiddenphase[$i]");
				$hidid = $hiddenphase[$i];
				if($_FILES['phase_imagess'.$hidid]['name'][0] != "")
		{			
				foreach ($_FILES['phase_imagess'.$hidid]['name'] as $key => $val) {
				
								$increment_icon11 = '';
								$name_icon11 = pathinfo($_FILES['phase_imagess'.$hidid]['name'][$key], PATHINFO_FILENAME);
								$extension_icon11 = pathinfo($_FILES['phase_imagess'.$hidid]['name'][$key], PATHINFO_EXTENSION);
								
								//start with no suffix
								while (file_exists("../uploads/projects/" . $name_icon11 . $increment_icon11 . '.' . $extension_icon11)) {
									$increment_icon11++;
								}
								$basename_icon11 = $name_icon11 . $increment_icon11 . '.' . $extension_icon11;

								$blocation_icon11 = "uploads/projects/" . $basename_icon11;

								$target_file_icon11 = "../uploads/projects/" . $basename_icon11;
								if (move_uploaded_file($_FILES['phase_imagess'.$hidid]['tmp_name'][$key], $target_file_icon11)) {					
									
									$login_query = mysqli_query($connection,"INSERT INTO sumc_project_phaseimages (`phase_id`,`image`,created_date) VALUES ('$hiddenphase[$i]','$blocation_icon11',NOW())");									
								}
							}
						}
						if($_FILES['videoss'.$hidid]['name'][0] != "")
		{			
				foreach ($_FILES['videoss'.$hidid]['name'] as $key => $val) {
				
								$increment_icon11 = '';
								$name_icon11 = pathinfo($_FILES['videoss'.$hidid]['name'][$key], PATHINFO_FILENAME);
								$extension_icon11 = pathinfo($_FILES['videoss'.$hidid]['name'][$key], PATHINFO_EXTENSION);
								
								//start with no suffix
								while (file_exists("../uploads/projects/" . $name_icon11 . $increment_icon11 . '.' . $extension_icon11)) {
									$increment_icon11++;
								}
								$basename_icon11 = $name_icon11 . $increment_icon11 . '.' . $extension_icon11;

								$blocation_icon11 = "uploads/projects/" . $basename_icon11;

								$target_file_icon11 = "../uploads/projects/" . $basename_icon11;
								if (move_uploaded_file($_FILES['videoss'.$hidid]['tmp_name'][$key], $target_file_icon11)) {					
									
									$login_query = mysqli_query($connection,"INSERT INTO sumc_project_phasevideos (`phase_id`,`video`,created_date) VALUES ('$hiddenphase[$i]','$blocation_icon11',NOW())");
								
								}
							}
						}
								
			} 	
		} 	
	}
			if(isset($_POST['phase_title']) && $id != 0) {
				
				
					//$sql = mysqli_query($connection,"delete from sumc_project_phases where project_id=".$id);
					
					for($count = 0; $count < count($_POST["phase_title"]); $count++)
					{
						$phase_title = $_POST["phase_title"][$count];
						$pdescription = $_POST["pdescription"][$count];
						
							
						$updateins_sql = mysqli_query($connection,"insert into sumc_project_phases (project_id,phase_title,description,created_date) values ('$id','$phase_title','$pdescription',NOW())");
						$newphid = mysqli_insert_id($connection);
						
						if($_FILES['phase_images']['name'][0] != "")
						{			
			
							foreach ($_FILES['phase_images']['name'] as $key => $val) {
				
								$increment_icon = '';
								
								$name_icon = pathinfo($_FILES['phase_images']['name'][$key], PATHINFO_FILENAME);
								
								$extension_icon = pathinfo($_FILES['phase_images']['name'][$key], PATHINFO_EXTENSION);
								
								//start with no suffix
								while (file_exists("../uploads/projects/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
									$increment_icon++;
								}
								
								$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

								$blocation_icon = "uploads/projects/" . $basename_icon;

								$target_file_icon = "../uploads/projects/" . $basename_icon;
								
								if (move_uploaded_file($_FILES['phase_images']['tmp_name'][$key], $target_file_icon)) {					
									$login1_query = mysqli_query($connection,"INSERT INTO sumc_project_phaseimages (`phase_id`,`image`,created_date) VALUES ('$newphid','$blocation_icon',NOW())");					
								}
							}
						}
						
						if($_FILES['videos']['name'][0] != "")
						{			
						
							foreach ($_FILES['videos']['name'] as $key => $val) {
							$increment_icon = '';
							
							$name_icon = pathinfo($_FILES['videos']['name'][$key], PATHINFO_FILENAME);
							$extension_icon = pathinfo($_FILES['videos']['name'][$key], PATHINFO_EXTENSION);
							
							//start with no suffix
							while (file_exists("../uploads/projects/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
								$increment_icon++;
							}
							
							$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

							$blocation_icon = "uploads/projects/" . $basename_icon;

							$target_file_icon = "../uploads/projects/" . $basename_icon;
							if (move_uploaded_file($_FILES['videos']['tmp_name'][$key], $target_file_icon)) {					
								//$videos = $blocation_icon;
									$login_query = mysqli_query($connection,"INSERT INTO sumc_project_phasevideos (`phase_id`,`video`,created_date) VALUES ('$newphid','$blocation_icon',NOW())");				
							}
						}
						}
					}
				}
				
				*/
	}
	if($login_query == 1){
		header("location:projectlist.php?msg=success");		
	} else {		
		header("location:projectlist.php?msg=fail");		
	}	
}

$title ="";
$description ="";
$videos ="";
$pimage ="";
$start_date ="";
$end_date ="";
$executive_summary ="";
$showdates ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_projects where id=".$id);
$projects_result = mysqli_fetch_array($features_sql);

$title = $projects_result['title'];
$description	 = $projects_result['description'];
$executive_summary	 = $projects_result['executive_summary'];
$videos	 = $projects_result['videos'];
//$pimage	 = $projects_result['image'];
$start_date	 = $projects_result['start_date'];
$end_date	 = $projects_result['end_date'];
$showdates	 = $projects_result['show_dates'];

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Executive Summary<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea name="executive_summary" id="executive_summary" required="required" class="form-control"><?php echo $executive_summary; ?></textarea>
						</div>
                    </div> 
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Profile Image<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<!--<input type="file" name="image" id="image" <?php if($pimage == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
							<?php
							if($pimage != "") {
								?>
								<img src ="../<?php echo $pimage; ?>" width="100" />
								<?php
							}
							?>
							-->
							<?php
							$projimgs_sql = mysqli_query($connection,"select * from sumc_project_images where project_id=".$id);
							$cnt = mysqli_num_rows($projimgs_sql);
							?>
							<input type="file" name="image[]" accept="image/*" id="image[]" <?php if($cnt == 0) { ?> required="required" <?php } ?> multiple class="form-control" style="width: 480px;">
							<?php
							
							
							if(mysqli_num_rows($projimgs_sql) > 0) {
							   while($imgss = mysqli_fetch_array($projimgs_sql))  {
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
						
                      
					 	
					  <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project Start Date</label>
								<div class="col-md-9 col-sm-9 col-xs-12" id='datetimepickerstart'>
								<input type="text" name="start_date" class="date start form-control" id="start_date" required="required" value= "<?php if($start_date != "") {echo date("d-m-Y",strtotime($start_date)); } ?>" autocomplete="off"  style="width: 280px;">
								</div>
						</div>						
					
					<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project End Date</label>
								<div class="col-md-9 col-sm-9 col-xs-12" id='datetimepickerend'>
								<input type="text" name="end_date" class="date form-control" id="end_date" required="required" value= "<?php if($end_date != "") { echo date("d-m-Y",strtotime($end_date)); } ?>" style="width: 280px;" autocomplete="off" >
								</div>
						</div>						
					
					<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Display Date? </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
								 <input type="checkbox" name="showdates" id="showdates" value="1" <?php if($showdates == 1) { echo "checked";} ?> />&nbsp;Display Project Dates &nbsp;
							
								</div>
						</div>						
					
					  <!--
					  <div class="form-group">
						 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Add Project Phases</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						<table class="table table-bordered" id="item_table">
						  <tr>						   
						   <th colspan="2"><button type="button" name="add" class="btn btn-success btn-sm add"><i class="fa fa-plus" aria-hidden="true"></i></button></th>
						  </tr>
						   <?php
						   
							    $area_sql = mysqli_query($connection,"select * from sumc_project_phases where project_id=".$id);
						  if(mysqli_num_rows($area_sql) > 0) {
							   while($areas = mysqli_fetch_array($area_sql))  {
								  
								   $phimg = mysqli_query($connection,"select * from sumc_project_phaseimages where phase_id=".$areas['id']);
								   $imgcnt = mysqli_num_rows($phimg);
							   ?>
							   <input type="hidden" name="hiddenphase[]" value="<?php echo $areas['id']; ?>">
							   <table class="table table-bordered">
								  <tr><th>Phase Title</th><td><input type="text" name="phase_titles[]" id="phase_titles" class="form-control text" value="<?php echo $areas['phase_title']; ?>" required /></td></tr>
								  <tr><th>Phase Description</th><td><textarea name="pdescriptions[]" id="pdescriptions" required="required" class="form-control"><?php echo $areas['description']; ?></textarea></td></tr>
								  <tr><th>Phase Images</th><td><input type="file" name="phase_imagess<?php echo $areas['id']; ?>[]" id="phase_imagess" multiple class="form-control text" 
								  <?php   if($imgcnt == 0) {  ?>  required <?php  }	?>
								  />
								  <?php
								  
								  if(mysqli_num_rows($phimg) > 0) {
								  while($arimg = mysqli_fetch_array($phimg)) {
									  $img = $arimg['image'];
										  ?>
										  <div class="img-wrap">
								<span class="close">&times;</span>
										  <img src ="../<?php echo $img; ?>" name="phimg" width="100" data-id="<?php echo $arimg['id'] ?>" />
										  </div>
										  <?php
									  }
									  
								  }
								  
								  
								  $phvds = mysqli_query($connection,"select * from sumc_project_phasevideos where phase_id=".$areas['id']);
								   $vdscnt = mysqli_num_rows($phvds);
									  ?>
								  </td></tr>
								  <tr><th>Phase Video</th><td><div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Videos<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="videoss<?php echo $areas['id']; ?>[]" accept="video/*" onchange="checkFileDuration()" id="videoss" <?php if($vdscnt == 0) { ?> required="required" <?php } ?> multiple class="form-control" style="width: 480px;">
							<?php
							if($vdscnt != 0) {
							while($vdres = mysqli_fetch_array($phvds)) {
								?>
								<a target="_blank" href="../<?php echo $vdres['video']; ?>">View Video</a>&nbsp;&nbsp;<a href="#" style="color:red;" id="deletevideo_<?php echo $vdres['id']; ?>">Delete</a><br>
								<?php
								}
								}
							?>
						</div>
                      </div>
								  </td></tr>
								  <tr><td colspan="2"><button type="button" name="remove" class="btn btn-danger btn-sm remove" id="delete_<?php echo $areas['id']; ?>"><i class="fa fa-minus" aria-hidden="true"></i></button></td>
								  </tr>
								  </table>
							   <?php
							   }
						  }
						   ?>
						 </table>
						 </div>
						 </div>
					 	-->
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
CKEDITOR.replace('executive_summary');
$('#datetimepickerstart .date').datepicker({
     'format': 'mm/dd/yyyy',
    'autoclose': true
});
$('#datetimepickerend .date').datepicker({
     'format': 'mm/dd/yyyy',
    'autoclose': true
});
</script>
<?php include "footer.php" ?>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

$(document).on('click', '.add', function(){
	  var html = '';
	   html += '<table class="table table-bordered">';
	   html += '<tr><th>Phase Title</th><td><input type="text" name="phase_title[]" class="form-control text" value="" required /></td></tr><tr><th>Phase Description</th><td><textarea name="pdescription[]" id="pdescription[]" required="required" class="form-control"></textarea></td></tr>	  <tr><th>Phase Images</th><td><input type="file" name="phase_images[]" multiple class="form-control text" required /></td></tr><tr><th>Phase Videos</th><td><input type="file" name="phase_videos[]" accept="video/*" onchange="checkFileDuration()" multiple class="form-control text" /></td></tr>';
	   html += '<tr><td colspan="2"><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus" aria-hidden="true"></i></button></td></tr></table>';
	   $('#item_table').append(html);
	   
		
	 });
	  $(document).on('click', '.remove', function(){
		
	  $(this).closest('table').remove();
	 });
var videoMaxTime = "05:00"; //minutes:seconds   //video
var audioMaxTime = "05:00"; //minutes:seconds   //audio
var uploadMax = 3145728000; //bytes  


$('#image').on('change', function() {
 var numb = $(this)[0].files[0].size/1024/1024;
numb = numb.toFixed(2);
if(numb > 2){
alert('to big, maximum is 2MB. You file size is: ' + numb +' MB');
} else {
//alert('it okey, your file has ' + numb + 'MB')
}
        }); 
		
//for seconds to time
function secondsToTime(in_seconds) {

  var time = '';
  in_seconds = parseFloat(in_seconds.toFixed(2));

  var hours = Math.floor(in_seconds / 3600);
  var minutes = Math.floor((in_seconds - (hours * 3600)) / 60);
  var seconds = in_seconds - (hours * 3600) - (minutes * 60);
  //seconds = Math.floor( seconds );
  seconds = seconds.toFixed(0);

  if (hours < 10) {
    hours = "0" + hours;
  }
  if (minutes < 10) {
    minutes = "0" + minutes;
  }
  if (seconds < 10) {
    seconds = "0" + seconds;
  }
  var time = minutes + ':' + seconds;

  return time;

}

function checkFileDuration() {

  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();
  var fileSize = file.size;

  if (fileSize > uploadMax) {
    alert('file too large');
    $('#videos[]').val("");
  } else {
    
    reader.onload = function(e) {

      if (file.type == "video/mp4" || file.type == "video/ogg" || file.type == "video/webm") {
        var videoElement = document.createElement('video');
        videoElement.src = e.target.result;
        var timer = setInterval(function() {
          if (videoElement.readyState === 4) {
            getTime = secondsToTime(videoElement.duration);
            if (getTime > videoMaxTime) {
              alert('5 minutes video only')
              $('#videos[]').val("");
            }
            
            clearInterval(timer);
          }
        }, 500)
      } else if (file.type == "audio/mpeg" || file.type == "audio/wav" || file.type == "audio/ogg") {

        var audioElement = document.createElement('audio');
        audioElement.src = e.target.result;
        var timer = setInterval(function() {
          if (audioElement.readyState === 4) {
            getTime = secondsToTime(audioElement.duration);
            if (getTime > audioMaxTime) {
              alert('1 minutes audio only')
              $('#videos[]').val("");
            }
            
            clearInterval(timer);
          }
        }, 500)
      } else {
        //var timer = setInterval(function() {
          if (file) {

            alert('invaild File')
            $('#videos[]').val("");
            
           // clearInterval(timer);
          }
//        }, 500)

      }

    };
    if (file) {
      reader.readAsDataURL(file);

    } else {
      alert('nofile');
    }

  }
}
	$(function(){
	$("[id^='delete_']").click(function(){
     	var i=$(this).attr('id');		
   	 	var arr=i.split("_");
   	 	var i=arr[1];
		var phaseid = i;
   	 	var r=confirm("Are you sure?");
   	 	if(r==true)
   	 	{   	 		
   	 	 $.ajax({
			type:"POST",
			data:"id="+i,
			url:"deletecollection.php?type=sumc_project_phases",
			success:function(data)
			{
				if(data=="done")
				{
					//alert("Data deleted Successfully");
					//location.reload();
					$.ajax({
					type:"POST",
					data:"id="+phaseid,
					url:"deletecollection.php?type=sumc_project_phaseimages",
					success:function(data)
					{
						if(data=="done")
						{
							alert("Data deleted Successfully");
							location.reload();
						}
					}
				  });
				}
			}
		  });
		 }
		 else
		 {
			return false;
		 }
     });
	 
	 $("[id^='deletevideo_']").click(function(){
     	var i=$(this).attr('id');		
   	 	var arr=i.split("_");
   	 	var i=arr[1];
		
   	 	var r=confirm("Are you sure?");
   	 	if(r==true)
   	 	{   	 		
   	 	 $.ajax({
			type:"POST",
			data:"id="+i,
			url:"deletecollection.php?type=sumc_project_phasevideos",
			success:function(data)
			{
				if(data=="done")
				{
					alert("video deleted Successfully");
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
	 
}); 
$('.img-wrap .close').on('click', function() {		
	var id = $(this).closest('.img-wrap').find('img').data('id');  	
	var r=confirm("Are you sure?");
	if(r==true)
	{   	 		
	 $.ajax({
		type:"POST",
		data:"id="+id,
		url:"deletecollection.php?type=sumc_project_images",
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