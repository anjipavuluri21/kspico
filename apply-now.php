<?php 
	include 'header.php';
	?>
	
	<!--<div class="banner-area">
		<div class="container-fluid">
			<div class="banner innerpage-banner"><img src="images/banner/about-us.jpg" class="img-fluid"></div>
		</div>
	</div>-->
	
	<div class="main-content-area">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Job & Careers</a></li>
					<li class="breadcrumb-item active" aria-current="page">Apply now</li>
				</ol>
			</nav>
			
			<h3 class="mb-4">Apply now</h3>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6">
						<label for="Job-Applied-For">Job Applied for</label>
						<select class="form-control" id="Job-Applied-For">
							<option>Job Applied for</option>
							<option>Quality Assurance</option>
							<option>Business Development</option>
							<option>Commercial</option>
							<option>Commercial Support</option>
							<option>Regulatory Affair</option>
							<option>H.R / Administration</option>
							<option>Finance</option>
							<option>Information Technology</option>
							<option>Purchase</option>
							<option>Production</option>
							<option>Quality Control</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 mb-3 mb-sm-3 mb-md-0">
						<label for="Name">Name</label>
						<input type="text" class="form-control" id="Name" placeholder="Name">
					</div>
					<div class="col-12 col-sm-12 col-md-6">
						<label for="Nationality">Nationality</label>
						<select class="form-control" id="Nationality">
							<option>Nationality</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 mb-3 mb-sm-3 mb-md-0">
						<label for="Civil-ID">Civil ID. No.</label>
						<input type="text" class="form-control" id="Civil-ID" placeholder="Civil ID. No.">
					</div>
					<div class="col-12 col-sm-12 col-md-6">
						<label for="Passport">Passport No.</label>
						<input type="text" class="form-control" id="Passport" placeholder="Passport No.">
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6">
						<p class="label">Gender</p>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Gender" id="Male" value="option1">
							<label class="form-check-label" for="Male">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Gender" id="Female" value="option2">
							<label class="form-check-label" for="Female">Female</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 mb-3 mb-sm-3 mb-md-0">
						<label for="pob">Place of Birth</label>
						<input type="text" class="form-control" id="pob" placeholder="Place of Birth">
					</div>
					<div class="col-12 col-sm-12 col-md-6">
						<label for="dob">Date of Birth</label>
						<input type="date" class="form-control" id="dob" placeholder="Date of Birth">
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 mb-3 mb-sm-3 mb-md-0">
						<label for="Religion">Religion</label>
						<input type="text" class="form-control" id="Religion" placeholder="Religion">
					</div>
					<div class="col-12 col-sm-12 col-md-6">
						<label for="Marital-Status">Marital Status</label>
						<input type="text" class="form-control" id="Marital-Status" placeholder="Marital Status">
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 mb-3 mb-sm-3 mb-md-0">
						<label for="Home-country-Address">Home country Address</label>
						<textarea class="form-control" id="Home-country-Address" rows="2"></textarea>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<h5>Present Address</h5>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 mb-3 mb-sm-3 mb-md-0">
						<label for="Mobile">Mobile</label>
						<input type="text" class="form-control" id="Mobile" placeholder="Mobile">
					</div>
					<div class="col-12 col-sm-12 col-md-6">
						<label for="Email">Email</label>
						<input type="email" class="form-control" id="Email" placeholder="Email">
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 mb-3 mb-sm-3 mb-md-0">
						<label for="Present-Address">Present Address</label>
						<textarea class="form-control" id="Present-Address" rows="2"></textarea>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6">
						<p class="label">Are you Employed now?</p>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="are-you-employed" id="Yes">
							<label class="form-check-label" for="Yes">Yes</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="are-you-employed" id="No">
							<label class="form-check-label" for="No">No</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6">
						<p class="label">Can we contact previous & present employers?</p>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="contact-employers" id="Yes-2">
							<label class="form-check-label" for="Yes-2">Yes</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="contact-employers" id="No-2">
							<label class="form-check-label" for="No-2">No</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<h5>Educational Qualification</h5>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Qualification" id="Intermediate">
							<label class="form-check-label" for="Intermediate">Intermediate</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Qualification" id="Second">
							<label class="form-check-label" for="Second">Second</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Qualification" id="Diploma">
							<label class="form-check-label" for="Diploma">Diploma</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Qualification" id="University">
							<label class="form-check-label" for="University">University</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="Qualification" id="Higher-Study">
							<label class="form-check-label" for="Higher-Study">Higher Study</label>
						</div>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-6 mb-3 mb-sm-3 mb-md-0">
						<label for="Year">Year</label>
						<select class="form-control" id="Year">
							<option>Year</option>
						</select>
					</div>
					
					<div class="col-12 col-sm-12 col-md-6">
						<label for="Major">Major</label>
						<select class="form-control" id="Major">
							<option>Major</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<h5>Languages</h5>
				<p class="label"><strong>Arabic</strong></p>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-4 mb-3 mb-sm-3 mb-md-0">
						<label for="Speaking" class="mb-1">Speaking</label>
						<select class="form-control" id="Speaking">
							<option>Excellent</option>
							<option>Good</option>
							<option>Fair</option>
						</select>
					</div>
					<div class="col-12 col-sm-12 col-md-4 mb-3 mb-sm-3 mb-md-0">
						<label for="Writing" class="mb-1">Writing</label>
						<select class="form-control" id="Writing">
							<option>Excellent</option>
							<option>Good</option>
							<option>Fair</option>
						</select>
					</div>
					<div class="col-12 col-sm-12 col-md-4">
						<label for="Reading" class="mb-1">Reading</label>
						<select class="form-control" id="Reading">
							<option>Excellent</option>
							<option>Good</option>
							<option>Fair</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<p class="label"><strong>English</strong></p>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-4 mb-3 mb-sm-3 mb-md-0">
						<label for="EnSpeaking" class="mb-1">Speaking</label>
						<select class="form-control" id="EnSpeaking">
							<option>Excellent</option>
							<option>Good</option>
							<option>Fair</option>
						</select>
					</div>
					<div class="col-12 col-sm-12 col-md-4 mb-3 mb-sm-3 mb-md-0">
						<label for="EnWriting" class="mb-1">Writing</label>
						<select class="form-control" id="EnWriting">
							<option>Excellent</option>
							<option>Good</option>
							<option>Fair</option>
						</select>
					</div>
					<div class="col-12 col-sm-12 col-md-4">
						<label for="EnReading" class="mb-1">Reading</label>
						<select class="form-control" id="EnReading">
							<option>Excellent</option>
							<option>Good</option>
							<option>Fair</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<h5>Training Courses</h5>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12">
						<label for="Subject-of-Training">Subject of Training</label>
						<input type="text" class="form-control" id="Subject-of-Training" placeholder="Subject of Training">
					</div>
				</div>
			</div>
			
			<div class="apply-now-row">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12">
						<label for="notes-information">Write any notes or information you wish to add</label>
						<textarea class="form-control" id="notes-information" rows="2"></textarea>
					</div>
				</div>
			</div>
			
			
			<div class="apply-now-row">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="Declaration">
					<label class="form-check-label" for="Declaration"><strong>Declaration</strong><br>I declare that all information in this application is correct; otherwise, I bear the responsibility and accept any legal action taken under company. Regulation and Kuwait labor law article No (41) which allows the employer to terminate the employee services without notice or indemnity. If it was found that the worker obtained employment through cheating or fraud.</label>
				</div>
			</div>
			
			
			<div class="apply-now-row"><a class="btn btn-primary btn-block" href="#" role="button">Submit</a></div>
			
			
			
			
			
			
			
			
			
			
			
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<?php 
	include 'footer.php';
	?>