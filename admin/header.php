<?php
include_once("connection.php");
session_start();
if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $loginid = $_SESSION['SESS_MEMBER_ID'];
    $user_query = mysqli_query($connection, "SELECT * from sumc_adminuser where id=$loginid");
    $user_res = mysqli_fetch_array($user_query);
} else {
    header("Location:index.php");
}
//Convalescent Plasma Program
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.css" />

<script src="js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.timepicker.css" />
<script src="js/jquery.ptTimeSelect.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.ptTimeSelect.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />

<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/config.js"></script>
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">

        <div class="sidebar-brand-text" style="padding-top:30px;">
            <img src="../images/kspic-logo.svg" height="150%" width="100%" />

        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" style="padding-top:30px;">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-cog"></i>
            <span>Home Sliders</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="edit_homeslider.php">Add Sliders</a>

                <a class="collapse-item" href="homesliderslist.php">View All Sliders</a>
            </div>
        </div>
    </li>





    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Home Services</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="serviceslist.php">View All Services</a></div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Home Carousel</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- a class="collapse-item" href="edit_carousel.php">Add Carousel</a> -->
                <a class="collapse-item" href="carousellist.php">View All Carousel</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-cog"></i>
            <span>DIVERSE PHARMACEUTICAL</span>
        </a>
        <div id="collapseNine" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<a class="collapse-item" href="edit_diverse.php">Add Diverse</a>-->
                <a class="collapse-item" href="edit_diverstext.php">Add Diverse text</a>
                <a class="collapse-item" href="diverselist.php">View All Diverse</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseten">
            <i class="fas fa-fw fa-cog"></i>
            <span>MEZZAN HOLDING</span>
        </a>
        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<a class="collapse-item" href="edit_mezzan.php">Add Home Mezzan</a>-->
                <a class="collapse-item" href="edit_mezzantext.php">Add Mezzan Home title</a>
                <a class="collapse-item" href="edit_mezzangroup.php">Add Mezzan Home Group</a>
                <a class="collapse-item" href="mezzanlist.php">View All Mezzan</a>

            </div>
        </div>
    </li>
        
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-cog"></i>
            <span>News & Events</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="edit_news.php">Add New News</a>
                <a class="collapse-item" href="newslist.php">View All News</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-fw fa-cog"></i>
            <span>About us</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="edit_companyprofile.php">Edit Company Profile</a>
                <a class="collapse-item" href="corporatelist.php">View all Corporate History</a>
                <a class="collapse-item" href="laedershipslist.php">View all Leaderships</a>
                <a class="collapse-item" href="companyvalueslist.php">View Company Values</a>
                <a class="collapse-item" href="edit_corporate_responsibility.php">View all Corporate Responsibility</a>
                <a class="collapse-item" href="edit_international_presence.php">Edit international-presence</a>
                <a class="collapse-item" href="membershiplist.php">View All Membership</a>
            </div>
        </div>
    </li>
   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                
                <a class="collapse-item" href="prescription_categorylist.php">View all Prescription Category</a>
                <a class="collapse-item" href="prescription_productslist.php">View all Prescription Products</a>
                <a class="collapse-item" href="product_typelist.php">View all Product Type</a>
                <a class="collapse-item" href="consumer_productslist.php">View All Consumer Products</a>
                <a class="collapse-item" href="hospital_categorylist.php">View all Hospital solution Category</a>
                <a class="collapse-item" href="hospital_solutionslsit.php">View All Hospital Solutions</a>
                <a class="collapse-item" href="product_detailslist.php">View All Product Details</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen">
            <i class="fas fa-fw fa-cog"></i>
            <span>Growth & Development</span>
        </a>
        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="technology_categorylist.php">View all Technology Category</a>
                    <a class="collapse-item" href="technology_platformlist.php">View all Technology Platform</a>
                    <a class="collapse-item" href="quality_assurance.php">Quality Assurance</a>
                    <a class="collapse-item" href="quality_control.php">Quality Control</a>
                
                

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
            <i class="fas fa-fw fa-cog"></i>
            <span>Contact Us</span>
        </a>
        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="edit_contactbanner.php">Edit Contact Banner</a>
                <a class="collapse-item" href="edit_contact.php">Edit Contact Details</a>
                <a class="collapse-item" href="contactformlist.php">View All Feedback Forms</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            <i class="fas fa-fw fa-cog"></i>
            <span>Static Pages</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="edit_terms.php">Edit Terms & Conditions</a>
                <a class="collapse-item" href="edit_privacy.php">Edit Privacy Policy</a>
                <a class="collapse-item" href="edit_banners.php">Edit Banner Images</a>
                <a class="collapse-item" href="edit_socialnetworking.php">Edit Social Networking</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            <i class="fas fa-fw fa-cog"></i>
            <span>Careers Forms</span>
        </a>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="edit_careerbanner.php">Edit Career Banner</a>
                <a class="collapse-item" href="edit_careerfeedback.php">Edit Career Feedback Email</a>
                <a class="collapse-item" href="careerformslist.php">View All Careers Forms</a>
            </div>
        </div>
    </li>



    <!-- Heading -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>



            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">




                <!--<div class="topbar-divider d-none d-sm-block"></div>-->

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_res['username']; ?></span>
                        <img class="img-profile rounded-circle" src="img/user.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
