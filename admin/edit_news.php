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
	$news_start_date	=  date("Y-m-d",strtotime($_POST['news_start_date']));	
	$news_end_date	=  date("Y-m-d",strtotime($_POST['news_end_date']));	
	if($_FILES['news_image']['name'] != "")
			{			
			
			$increment_icon = '';
				
				$name_icon = pathinfo($_FILES['news_image']['name'], PATHINFO_FILENAME);
				$extension_icon = pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION);
				
				//start with no suffix
				while (file_exists("../uploads/news/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
					$increment_icon++;
				}
				
				$basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

				$blocation_icon = "uploads/news/" . $basename_icon;

				$target_file_icon = "../uploads/news/" . $basename_icon;
				if (move_uploaded_file($_FILES['news_image']['tmp_name'], $target_file_icon)) {					
					$news_image = $blocation_icon;										
				}
			}
			
	if($id == 0) {
		$login_query = mysqli_query($connection,"insert into sumc_news (title,news_image,description,news_start_date,news_end_date,status,created_date) values ('$title','$news_image','$description','$news_start_date','$news_end_date',1,NOW())");
	}
	else {	
		if($news_image != "") {
					$corse_img = ",news_image='$news_image'";
				}
				else {
					$corse_img = "";
				}
	
	
		$login_query = mysqli_query($connection,"UPDATE sumc_news SET  title='$title',description='$description',news_start_date='$news_start_date',news_end_date='$news_end_date' $corse_img  WHERE id ='$id'");		
	}
	if($login_query == 1){
		header("location:newslist.php?msg=success");		
	} else {		
		header("location:newslist.php?msg=fail");		
	}	
}

$title ="";
$description ="";
$news_start_date = "";
$news_end_date = "";
$news_image ="";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_news where id=".$id);
$news_result = mysqli_fetch_array($features_sql);

$title = $news_result['title'];
$description	 = $news_result['description'];
$news_image	 = $news_result['news_image'];
$news_start_date	 = $news_result['news_start_date'];
$news_end_date	 = $news_result['news_end_date'];

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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
       <script type="text/javascript">
               $(document).ready(function(){
                     $("#news_date").datepicker();
               });
       </script>
        <!-- page content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">News</h1>
              </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit News</h6>                    
                    </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					 
					<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title</label>
								<input type="text" name="title" id="title"  required="required" class="form-control" value="<?php echo $title; ?>" style="width: 480px;" >
						</div>						
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">News Start Date<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12" id="datetimepickerstart">							
							<input type="text" name="news_start_date" id="news_start_date" placeholder="mm/dd/yyyy" required="required" class="date form-control" style="width: 380px;" value="<?php echo date('m-d-Y',strtotime($news_start_date)); ?>" >
						</div>
                      </div>
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">News Start Date<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12" id="datetimepickerend">							
							<input type="text" name="news_end_date" id="news_end_date" placeholder="mm/dd/yyyy" required="required" class="date form-control" style="width: 380px;" value="<?php echo date('m-d-Y',strtotime($news_end_date)); ?>" >
						</div>
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
							<input type="file" name="news_image" accept="image/*" id="news_image" <?php if($news_image == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
							<?php
								if($news_image != "") {
									
								?>
								<img src="../<?php echo $news_image; ?>" width="100" height="100" />
								<?php
								
								}
							?>
						</div>
                      </div>
					 	
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<a href="newslist.php" class="btn btn-primary">Cancel</a>
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
