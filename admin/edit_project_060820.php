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
	$txt_start_date      =  date("Y-m-d",strtotime($_POST['start_date'])); 
	$txt_end_date      =  date("Y-m-d",strtotime($_POST['end_date'])); 	
	
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
						if($key != count($_FILES['videos']['name'])-1) {
										$videos .= $blocation_icon.",";
										}
										else {
											$videos .= $blocation_icon;
										}						
				}
			}
			}
			
	if($id == 0) {
		$login_query = mysqli_query($connection,"insert into sumc_projects (title,start_date,end_date,videos,description,status,created_date) values ('$title','$txt_start_date','$txt_end_date','$videos','$description',1,NOW())");
		$phase_videos = "";
		$project_id = mysqli_insert_id($connection);
		if(isset($_POST['phase_title']) && $project_id != 0) {
					$sql = mysqli_query($connection,"delete from sumc_project_phases where project_id=".$project_id);
					
					for($count = 0; $count < count($_POST["phase_title"]); $count++)
					{
						$phase_title = $_POST["phase_title"][$count];
						$pdescription = $_POST["pdescription"][$count];
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
									
									if($key != count($_FILES['phase_images']['name'])-1) {
											$phase_images .= $blocation_icon.",";
									}
									else {
										$phase_images .= $blocation_icon;
									}						
								}
							}
						}
						$updateins_sql = mysqli_query($connection,"insert into sumc_project_phases (project_id,phase_title,description,phase_images,created_date) values ('$project_id','$phase_title','$pdescription','$phase_images',NOW())");
					}
				}
	}
	else {	
		if($videos != "") {
					$corse_img = ",videos='$videos'";
				}
				else {
					$corse_img = "";
				}
	
	
		$login_query = mysqli_query($connection,"UPDATE sumc_projects SET  title='$title',description='$description' $corse_img  WHERE id ='$id'");	
			if(isset($_POST['phase_title']) && $id != 0) {
					$sql = mysqli_query($connection,"delete from sumc_project_phases where project_id=".$id);
					
					for($count = 0; $count < count($_POST["phase_title"]); $count++)
					{
						$phase_title = $_POST["phase_title"][$count];
						$pdescription = $_POST["pdescription"][$count];
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
									if($key != count($_FILES['phase_images']['name'])-1) {
										$phase_images .= $blocation_icon.",";
									}
									else {
										$phase_images .= $blocation_icon;
									}						
								}
							}
						}
						$updateins_sql = mysqli_query($connection,"insert into sumc_project_phases (project_id,phase_title,description,phase_images,created_date) values ('$id','$phase_title','$pdescription','$phase_images',NOW())");
					}
				}
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
$start_date ="";
$end_date ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_projects where id=".$id);
$projects_result = mysqli_fetch_array($features_sql);

$title = $projects_result['title'];
$description	 = $projects_result['description'];
$videos	 = $projects_result['videos'];
$start_date	 = $projects_result['start_date'];
$end_date	 = $projects_result['end_date'];
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Videos<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="videos[]" accept="video/*" onchange="checkFileDuration()" id="videos[]" <?php if($videos == "") { ?> required="required" <?php } ?> multiple class="form-control" style="width: 480px;">
							<?php
								if($videos != "") {
								$images = explode(",",$videos);
								foreach($images as $img) {	
								?>
								<a href="../<?php echo $img; ?>">View Video</a><br>
								<?php
								}
								}
							?>
						</div>
                      </div>
					  <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project Start Date</label>
								<div class="col-md-9 col-sm-9 col-xs-12" id='datetimepickerstart'>
								<input type="text" name="start_date" class="date start form-control" id="start_date" required="required" value= "<?php echo $start_date; ?>" autocomplete="off" data-date-start-date="0d" style="width: 280px;">
								</div>
						</div>						
					
					<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project End Date</label>
								<div class="col-md-9 col-sm-9 col-xs-12" id='datetimepickerend'>
								<input type="text" name="end_date" class="date end form-control" id="end_date" required="required" value= "<?php echo $end_date; ?>" style="width: 280px;" autocomplete="off" data-date-start-date="0d">
								</div>
						</div>						
					
					  
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
							   ?>
							   <table class="table table-bordered">
								  <tr><th>Phase Title</th><td><input type="text" name="phase_title[]" class="form-control text" value="<?php echo $areas['phase_title']; ?>" required /></td></tr>
								  <tr><th>Phase Description</th><td><textarea name="pdescription[]" id="pdescription[]" required="required" class="form-control"><?php echo $areas['description']; ?></textarea></td></tr>
								  <tr><th>Phase Images</th><td><input type="file" name="phase_images[]" multiple class="form-control text" 
								  <?php   if($areas['phase_images'] == "") {  ?>		  required <?php  }	?>
								  />
								  <?php
								  if($areas['phase_images'] != "") {
									  $imgs = explode(",",$areas['phase_images']);
									  foreach($imgs as $img) {
										  ?>
										  <img src ="../<?php echo $img; ?>" name="phimg" width="100" />
										  <?php
									  }
									  
								  }
									  ?>
								  </td></tr>
								  <tr><td colspan="2"><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus" aria-hidden="true"></i></button></td>
								  </tr>
								  </table>
							   <?php
							   }
						  }
						   ?>
						 </table>
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
	   html += '<tr><th>Phase Title</th><td><input type="text" name="phase_title[]" class="form-control text" value="" required /></td></tr><tr><th>Phase Description</th><td><textarea name="pdescription[]" id="pdescription[]" required="required" class="form-control"></textarea></td></tr>	  <tr><th>Phase Images</th><td><input type="file" name="phase_images[]" multiple class="form-control text" required /></td></tr>';
	   html += '<tr><td colspan="2"><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fa fa-minus" aria-hidden="true"></i></button></td></tr></table>';
	   $('#item_table').append(html);
	   
		
	 });
	  $(document).on('click', '.remove', function(){
		
	  $(this).closest('table').remove();
	 });
var videoMaxTime = "05:00"; //minutes:seconds   //video
var audioMaxTime = "05:00"; //minutes:seconds   //audio
var uploadMax = 3145728000; //bytes  

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
        var timer = setInterval(function() {
          if (file) {

            alert('invaild File')
            $('#videos[]').val("");
            
            clearInterval(timer);
          }
        }, 500)

      }

    };
    if (file) {
      reader.readAsDataURL(file);

    } else {
      alert('nofile');
    }

  }
}
	 
</script>