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
         <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Careers</h1>
			
          </div>


          <div class="row">

            <div class="col-lg-12 mb-12">

              <div class="card shadow mb-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View Careers</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
				  <form name="submenuform" method="post" action="banner_ordering.php">
					 <table id="datatable" class="table table-striped jambo_table bulk_action" >
                        <thead>
                          <tr class="headings">                          
                            <th width="" class="column-title">Sl. No </th>
							<th width="" class="column-title">Contact Name</th>
							<th width="" class="column-title">Email Id</th>
							<th width="" class="column-title">Posted Date </th>
                            <th style="text-align:center" class="column-title no-link last"><span class="nobr">Action</span>
                            </th>                           
                          </tr>
                        </thead>
                        <tbody>
						<?php
						$i = 1;
						$banner_que = mysqli_query($connection,"SELECT * from sumc_careers ORDER By id DESC");
						if(mysqli_num_rows($banner_que) > 0) {
						while($banner_result = mysqli_fetch_array($banner_que))
						{	
						?>
                          <tr class="even pointer">                            
                            <td class=" "><?php echo $i ?></td>
							<td class=" "><?php echo $banner_result['fullname']; ?></td>      
							<td class=" "><?php echo $banner_result['position_for']; ?></td>   	
                            <td class=" "><?php echo $banner_result['created_date'] ?></td>
                            <td style="text-align:center" class=" last"><a class="btn btn-warning" href="view_careerform.php?id=<?php echo $banner_result[id] ?>">View</a>&nbsp;<a class="btn btn-danger" href="#" id="delete_<?php echo $banner_result[id] ?>">Delete</a>
                            </td>
                          </tr>
                        <?php 
						$i++;
						}
						}
						else {
							?>
							<tr>
							<td colspan="5" align="center">No Rows Found</td>
							</tr>
							<?php
						}
						?>                            
                        </tbody>
                      </table>									
                 </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
	<?php include_once("footer.php"); ?>	
<script>
$(function(){
	$("[id^='delete_']").click(function(){
     	var i=$(this).attr('id');		
   	 	var arr=i.split("_");
   	 	var i=arr[1];
   	 	var r=confirm("Are you sure you want to delete the Form?");
   	 	if(r==true)
   	 	{	
   	 	 $.ajax({
			      	type:"POST",
			      	data:"id="+i,
			      	url:"deletecollection.php?type=sumc_careers",
			      	success:function(data)
			      	{
			      		if(data=="done")
			      		{
			      			alert("Career Form Deleted Successfully");
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
</script>
