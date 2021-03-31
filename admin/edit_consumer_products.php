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
			$title = mysqli_real_escape_string($connection,$_POST['title']);
			$product_type_id = implode(',',$_POST['product_type_id']);
                        //print_r($product_type_id);exit;
			
			if($_FILES['image']['name'] != "")
		{			
			
			$increment2 = '';
				
				$name2 = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
				$extension2 = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			
				//start with no suffix
				while (file_exists("../uploads/consumer_products/" . $name2 . $increment2 . '.' . $extension2)) {
					$increment2++;
				}
				
				$basename2 = $name2 . $increment2 . '.' . $extension2;

				$blocation2 = "uploads/consumer_products/" . $basename2;
                               
				$target_file2 = "../uploads/consumer_products/" . $basename2;
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file2)) {					
					$img_location = $blocation2;										
				}
		}
			
		
			
			if($id == 0) {
                            
                               
                                    $updatesql = mysqli_query($connection,"insert into sumc_consumer_range_product (title,product_type_id,image,ordering,status,created_date) values ('$title','$product_type_id','$img_location','$reorder',1,NOW())");
                                
				
				
			}
			else {
				if($img_location != "") {
					$img_file = ",image= '$img_location'";
                                        
				}
				else {
					$img_file = "";
				}
                               $updatesql = mysqli_query($connection,"update sumc_consumer_range_product set title='$title', product_type_id='$product_type_id' $img_file where id=".$id);
                                
                        }
			if($updatesql) {
				header("location:consumer_productslist.php?msg=success");
				exit;
			}
}
$category_name="";
$description="";
$category_image="";
$profile_image="";


if($id != 0) {
	$booth_sql = mysqli_query($connection,"select * from sumc_consumer_range_product where id=".$id);
	$booth_result = mysqli_fetch_array($booth_sql);
        
	$title = $booth_result['title'];
	$product_type_id = $booth_result['product_type_id'];
	$image = $booth_result['image'];
	
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

  <title>Dashboard: Kuwait Saudi Pharmaceutical Industries Company</title>

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
            <h1 class="h3 mb-0 text-gray-800">Consumer Products</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Consumer Products</h6>
                </div>
                <div class="card-body">
				<form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input class="form-control" name="title" id="category_name" value="<?php echo $title; ?>" required="required" rows="4" style="width:400px">
                        </div>
				</div>
				 
							 <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Profile Image</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" name="image" id="profile_image" class="form-control" />
							<p id="note">Please upload image with size 575X400</p>
							<?php
							if(isset($image) && $image != "") {
								?>
								<img src='../<?php echo $image; ?>' height='100px' width='450px;' />
								<?php
							}
							?>
							</div>
							</div>
							<?php
                $features = mysqli_query($connection, " SELECT * FROM `sumc_products_type`");
                $partners = mysqli_fetch_assoc($features);
                   // $title = $partners['title'];
                    ?>
           
				 <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            
                                            <select name="product_type_id[]" id="cars" class="form-control" multiple="multiple">
                                              
                                            <?php     
                                            
                                                $selected='';
                                                while($row= mysqli_fetch_assoc($features) ){ 
                                                    if($row['id']==$product_type_id){
                                                      $selected='selected'; 
                                                    } else{
                                                        $selected='';
                                                    }
                                                    ?>
                                                <option value="<?php echo $row['id']; ?>" <?php echo $selected?>><?php echo $row['title']; ?></option>     
                                                <?php }
                                                ?>  
                                                   
                                                </select>
                                        </div>
                                    </div>
				
				
				<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="consumer_productslist.php" class="btn btn-primary">Cancel</a>
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