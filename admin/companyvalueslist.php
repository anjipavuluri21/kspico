<?php
include_once("connection.php");
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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Company Values and Vision</h1>
            <a href="edit_companyvalues.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-check fa-sm text-white-50"></i> Add Company Values</a>
          </div>


          <div class="row">

            <div class="col-lg-12 mb-12">

              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Services</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>S.no</th>
                          <th>Title</th>
                          <th>Status</th>
                          <th>View Details</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $project_features_sql = mysqli_query($connection,"select * from  sumc_company_values order by id desc ");
					  if(mysqli_num_rows($project_features_sql) > 0) {
						  $i = 1;
						  while($project_features_result = mysqli_fetch_array($project_features_sql)) {
							  $id = $project_features_result['id'];
							  
							  if($project_features_result['status'] == '1'){
									$status = '0';
									} else {
										$status = '1';
									}
							  ?>
							  <tr>
							  <td><?php echo $i; ?></td>
							 
							  <td><?php echo $project_features_result['title']; ?></td>
							  <td><a class="btn btn-success btn-circle" href="#" id="status_<?php echo $project_features_result['id'] ?>&status=<?php echo $status ?>">
							  <?php if($project_features_result['status']=='0'){ ?>
											<i style="color:white !important" class="fas fa-times"></i>
										<?php } else { ?>
											<i class="fa fa-check"></i>
										<?php } ?>
										</a>
							  </td>
                                                          <td><a href="edit_companyvalues.php?id=<?php echo $id; ?>" class="btn-sm btn-primary">Edit</a>&nbsp;
							  <a href="#" id="delete_<?php echo $id; ?>" class="btn-sm btn-danger">Delete</a></td>
							</tr>
							  <?php
							  $i++;
						  }
					  }
					  ?>
                      </tbody>
                    </table>
                  </div>
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
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>	
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>	
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js" type="text/javascript"></script>	
 <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" media="all" />	
<link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet" type="text/css" media="all" />	

<script>
$(document).ready(function() {
    $('#example').DataTable( {
       
        //order: [[ 1, 'asc' ]]
    } );
} );
$("[id^='delete_']").click(function(){
     	var i=$(this).attr('id');		
   	 	var arr=i.split("_");
   	 	var i=arr[1];
   	 	var r=confirm("Are you sure you want to delete the Services?");
   	 	if(r==true)
   	 	{	
   	 	 $.ajax({
			      	type:"POST",
			      	data:"id="+i,
			      	url:"deletecollection.php?type=sumc_company_values",
			      	success:function(data)
			      	{
			      		if(data=="done")
			      		{
			      			alert("Category Deleted Successfully");
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
$("[id^='status_']").click(function(){
     	var i=$(this).attr('id');		
   	 	var arr=i.split("_");
   	 	var i=arr[1];
		var arr2=i.split("&");
		var j=arr2[1];
   	 	var r=confirm("Are you sure you want to Activate/Deactivate?");
   	 	if(r==true)
   	 	{   	 		
   	 	 $.ajax({
			      	type:"POST",
			      	data:"id="+i+"&"+j+"&tab=sumc_company_values",
			      	url:"changeprivilage.php",
			      	success:function(data)
			      	{
			      		if(data=="done")
			      		{
			      			alert("Status changed Successfully");
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