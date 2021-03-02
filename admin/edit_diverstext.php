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
	$text1 	=  mysqli_real_escape_string($connection,$_POST['text1']);
	$text2	=  mysqli_real_escape_string($connection,$_POST['text2']);	
			
	$login_query = mysqli_query($connection,"UPDATE sumc_diverse_text SET  text1='$text1',text2='$text2' WHERE id ='$id'");		
	
	if($login_query == 1){
		header("location:edit_diverstext.php?msg=success");		
	} else {		
		header("location:edit_diverstext.php?msg=fail");		
	}	
}

$text1 ="";
$text2 = "";


if($id != 0) {
$features_sql = mysqli_query($connection,"select * from sumc_diverse_text where id=".$id);
$booth_features_result = mysqli_fetch_array($features_sql);


$text1 = $booth_features_result['text1'];
$text2	 = $booth_features_result['text2'];

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
  
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
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
               <h1 class="h3 mb-0 text-gray-800">Diverse Text</h1>
              </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Divers Text</h6>                    
                    </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
					 
					  
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Text 1<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="text1" value="<?php echo $text1;?>" id="text1" required="required" class="form-control" style="width: 580px;" value="<?php echo $text1; ?>">
						</div>
                    </div>                      
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Text 2<span class="required">*</span>
                        </label>                        
						<div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" name="text2" value="<?php echo $text2;?>" id="text2" required="required" class="form-control" style="width: 580px;" value="<?php echo $text2; ?>">
						</div>
                      </div>
					
					 	
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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

<?php include "footer.php" ?>
