<?php
include_once("connection.php");
if (isset($_REQUEST['id'])) {
    $id = ($_REQUEST['id']) ? $_REQUEST['id'] : 0;
} else {
    $id = 0;
}

if(isset($_POST['submit']))
{
    $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
    $category_id = mysqli_real_escape_string($connection, $_POST['category_id']);
    $pack_size = mysqli_real_escape_string($connection, $_POST['pack_size']);
    $pack_type = mysqli_real_escape_string($connection, $_POST['pack_type']);
   
   if($id == 0) {
		$login_query = mysqli_query($connection,"insert into sumc_hospital_product (product_name,category_id,pack_size,pack_type,status,created_date) values ('$product_name','$category_id','$pack_size','$pack_type',1,NOW())");
	}
	else {	
		$login_query = mysqli_query($connection,"UPDATE sumc_hospital_product SET  product_name='$product_name',category_id='$category_id',pack_size='$pack_size',pack_type='$pack_type' WHERE id ='$id'");		
	}
	if($login_query == 1){
		header("location:hospital_solutionslsit.php?msg=success");		
	} else {		
		header("location:hospital_solutionslsit.php?msg=fail");		
	}
}





if ($id != 0) {
    $features_sql = mysqli_query($connection, "select * from sumc_hospital_product where id=" . $id);
    $partners_result = mysqli_fetch_array($features_sql);

    $product_name = $partners_result['product_name'];
    $pack_size = $partners_result['pack_size'];
    $pack_type = $partners_result['pack_type'];
    $category_id = $partners_result['category_id'];
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
            <!-- page content -->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Hospital Solutions</h1>
                </div>
                <?php
                $features = mysqli_query($connection, " SELECT * FROM `sumc_hospital_category`");
                $partners = mysqli_fetch_assoc($features);
                   // $title = $partners['title'];
                    
                ?>
                <div class="row">
                    <div class="col-lg-12 mb-12">
                        <div class="card shadow mb-8">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Prescription Category</h6>                    
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            
                                            <select name="category_id" id="cars" class="form-control" selected="selected">
                                              
                                            <?php     
                                                $selected='';
                                                while($row= mysqli_fetch_assoc($features) ){ 
                                                    if($row['id']==$category_id){
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Product Name<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="product_name" id="partner_name" class="form-control" required="required" value= "<?php echo $product_name; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pack Size<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="pack_size" id="partner_name" class="form-control" required="required" value= "<?php echo $pack_size; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pack Type<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="pack_type" id="partner_name" class="form-control" required="required" value= "<?php echo $pack_type; ?>">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <a href="hospital_solutionslsit.php" class="btn btn-primary">Cancel</a>
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
