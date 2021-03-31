<?php
include_once("connection.php");
if (isset($_REQUEST['id'])) {
    $id = ($_REQUEST['id']) ? $_REQUEST['id'] : 1;
} else {
    $id = 0;
}

if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $content = $_POST['content'];
    $count = $_POST['count'];

    if ($_FILES['image']['name'] != "") {

        $increment_icon = '';

        $name_icon = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $extension_icon = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        //start with no suffix
        while (file_exists("../uploads/technology_platform/" . $name_icon . $increment_icon . '.' . $extension_icon)) {
            $increment_icon++;
        }

        $basename_icon = $name_icon . $increment_icon . '.' . $extension_icon;

        $blocation_icon = "uploads/technology_platform/" . $basename_icon;

        $target_file_icon = "../uploads/technology_platform/" . $basename_icon;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file_icon)) {
            $image = $blocation_icon;
            
        }
    }


    if ($id == 0) {
        
        $login_query = mysqli_query($connection, "insert into sumc_technology_platform (type,title,content,image,count,status,created_date) values ('$type','$title','$content','$image','$count',1,NOW())");
        
        
    } else {

        if ($image != "") {
            $corse_img = ",image='$image'";
        } else {
            $corse_img = "";
        }


        $login_query = mysqli_query($connection, "update sumc_technology_platform set type='$type',title='$title',content='$content',count='$count' $corse_img where id=" . $id);
    }
    if ($login_query == 1) {
        header("location:technology_platformlist.php?msg=success");
    } else {
        header("location:technology_platformlist.php?msg=fail");
    }
}


$description = "";
$banner_image = "";
$side_image = "";


if ($id != 0) {
    $features_sql = mysqli_query($connection, "select * from sumc_technology_platform where id=" . $id);
    $booth_features_result = mysqli_fetch_array($features_sql);

    $type = $booth_features_result['type'];
    $title = $booth_features_result['title'];
    $image = $booth_features_result['image'];
    $content = $booth_features_result['content'];
    $count = $booth_features_result['count'];
    
   
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

        <title>Dashboard - Sumc - Al Sultan United Medical co</title>

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
                    <h1 class="h3 mb-0 text-gray-800">Technology Platform</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-12">
                        <div class="card shadow mb-8">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">View Technology Platform</h6>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" name="adv_form" id="adv_form" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Type<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="type" id="cars" class="form-control" selected="selected">
                                                <option value="LVP LINE">LVP LINE</option>
                                                <option value="ORAL SOLIDS">ORAL SOLIDS</option>
                                                <option value="SEMI-SOLIDS">SEMI-SOLIDS</option>
                                                <option value="ORAL LIQUIDS">ORAL LIQUIDS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="title" id="partner_name" class="form-control" required="required" value= "<?php echo $title;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Image<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="file" name="image" accept="image/*" id="banner_image" <?php if ($image == "") { ?> required="required" <?php } ?> class="form-control" style="width: 480px;">
                                            <?php
                                            if ($image != "") {
                                                ?>
                                                <img src="../<?php echo $image; ?>" width="200" height="100" />
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Content*</label>                        
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea name="content" id="description" class="form-control" style="width: 580px;" required="required"><?php echo $content; ?></textarea>
                                        </div>
                                    </div>
<div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Count<span class="required">*</span>
                                        </label>                        
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="count" id="partner_name" class="form-control" required="required" value= "<?php echo $count;?>">
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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

        </script>
        <?php
        include_once('footer.php');
        ?>
