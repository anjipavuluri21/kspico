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
					<li class="breadcrumb-item"><a href="#">Contact Us</a></li>
					<li class="breadcrumb-item"><a href="#">Pharmacovigilance</a></li>
					<li class="breadcrumb-item active" aria-current="page"><a href="#">ADR Form</a></li>
				</ol>
			</nav>
			
			
			<h4>Adverse Drug Reaction Reporting</h4>
			
			<div class="step-app" id="demo">
				<ul class="step-steps">
					<li data-step-target="step1">1</li>
					<li data-step-target="step2">2</li>
					<li data-step-target="step3">3</li>
					<li data-step-target="step4">4</li>
					<li data-step-target="step5">5</li>
					<li data-step-target="step6">6</li>
				</ul>
				
				<div class="step-content">
					<div class="step-tab-panel" data-step="step1">
						<h4>Date of Event</h4>
						
						<div class="form-group">
							<label for="edr-event-date" class="sr-only">Event Date</label>
							<input type="text" class="form-control" name="date" id="date" data-select="datepicker" placeholder="Event Date *">
						</div>
					</div>
					
					
					<div class="step-tab-panel" data-step="step2">
						<h4>Reporter Details</h4>
						
						<div class="form-group">
							<label for="edr-full-name" class="sr-only">Full Name *</label>
							<input type="text" class="form-control" id="edr-full-name" placeholder="Full Name *">
						</div>
						
						<div class="form-group">
							<label for="edr-email" class="sr-only">E-Mail id *</label>
							<input type="email" class="form-control" id="edr-email" placeholder="E-Mail id *">
						</div>
						
						<div class="form-group">
							<label for="edr-telephone" class="sr-only">Telephone *</label>
							<input type="tel" class="form-control" id="edr-telephone" placeholder="Telephone *">
						</div>
						
						<div class="form-group">
							<label for="edr-organization" class="sr-only">Organization</label>
							<input type="text" class="form-control" id="edr-organization" placeholder="Organization">
						</div>
						
						<div class="form-group">
							<label for="edr-occupation" class="sr-only">Occupation *</label>
							<input type="text" class="form-control" id="edr-occupation" placeholder="Occupation *">
						</div>
						
						<div class="form-group">
							<label for="edr-address" class="sr-only">Address</label>
							<textarea class="form-control" id="edr-address" placeholder="Address" rows="2"></textarea>
						</div>
					</div>
					
					
					<div class="step-tab-panel" data-step="step3">
						<h4>Patient Information</h4>
						
						<div class="form-group">
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="Male" name="Gender" class="custom-control-input">
								<label class="custom-control-label" for="Male">Male</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="Female" name="Gender" class="custom-control-input">
								<label class="custom-control-label" for="Female">Female</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="edr-patient-initials" class="sr-only">Patient Initials *</label>
							<input type="text" class="form-control" id="edr-patient-initials" placeholder="Patient Initials *">
						</div>
						
						<div class="form-group">
							<label for="edr-weight" class="sr-only">Weight *</label>
							<input type="text" class="form-control" id="edr-weight" placeholder="Weight (KG) *">
						</div>
						
						<div class="form-group">
							<label for="edr-height" class="sr-only">Height *</label>
							<input type="text" class="form-control" id="edr-height" placeholder="Height (CM) *">
						</div>
						
						<div class="form-group">
							<label for="edr-dob" class="sr-only">Date of Birth *</label>
							<input type="text" class="form-control" name="date" id="edr-dob" data-select="datepicker" placeholder="Date of Birth *">
						</div>
						
						<div class="form-group">
							<label for="edr-condition" class="sr-only">Condition</label>
							<input type="text" class="form-control" id="edr-condition" placeholder="Condition">
						</div>
						
						<div class="form-group">
							<label for="edr-Country" class="sr-only">Country *</label>
							<select class="form-control" id="edr-Country">
								<option>Country *</option>
							</select>
						</div>
					</div>
					
					
					<div class="step-tab-panel" data-step="step4">
						<h4>Adverse Drug Reaction</h4>
						
						<div class="form-group">
							<label for="edr-description">Description of Event (according to the reaction site and date the reaction started and ended) *</label>
							<textarea class="form-control" id="edr-description" rows="2"></textarea>
						</div>
						
						<div class="form-group">
							<p class="mb-2">Is the ADR serious? *</p>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="edr-yes" name="adr-serious" class="custom-control-input">
								<label class="custom-control-label" for="edr-yes">Yes</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="edr-no" name="adr-serious" class="custom-control-input">
								<label class="custom-control-label" for="edr-no">No</label>
							</div>
						</div>
						
						<div class="form-group"><input type="date" class="form-control" id="death-date" placeholder="Death Date"></div>
						
						<div class="form-group">
							<p class="mb-2">If Yes, Reason for Seriousness</p>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Death">
								<label class="custom-control-label" for="Death">Death</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Life-threatening">
								<label class="custom-control-label" for="Life-threatening">Life - Threatening</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Disability">
								<label class="custom-control-label" for="Disability">Disability</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Hospitalization-initial">
								<label class="custom-control-label" for="Hospitalization-initial">Hospitalization - Initial</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Congenital-abnormality">
								<label class="custom-control-label" for="Congenital-abnormality">Congenital Abnormality</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Hospitalization-prolonged">
								<label class="custom-control-label" for="Hospitalization-prolonged">Hospitalization - Prolonged</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Others">
								<label class="custom-control-label" for="Others">Others</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="edr-others">If Others, please specify</label>
							<textarea class="form-control" id="edr-others" rows="2"></textarea>
						</div>
						
						<div class="form-group">
							<p class="mb-2">Outcome Of The ADR</p>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Resolved">
								<label class="custom-control-label" for="Resolved">Resolved</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Lost-to-follow-up">
								<label class="custom-control-label" for="Lost-to-follow-up">Lost to follow-up</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Unknown">
								<label class="custom-control-label" for="Unknown">Unknown</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline">
								<input type="checkbox" class="custom-control-input" id="Death-2">
								<label class="custom-control-label" for="Death-2">Death</label>
							</div>
						</div>
						
						<div class="form-group">
							<label for="edr-dob-2" class="sr-only">Date of Birth *</label>
							<input type="text" class="form-control" name="date" id="edr-dob-2" data-select="datepicker" placeholder="Date of Birth *">
						</div>
						
						<div class="form-group">
							<p class="mb-2">Autopsy Planned / Done</p>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="edr-yes-2" name="adr-Autopsy" class="custom-control-input">
								<label class="custom-control-label" for="edr-yes-2">Yes</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="edr-no-2" name="adr-Autopsy" class="custom-control-input">
								<label class="custom-control-label" for="edr-no-2">No</label>
							</div>
						</div>
						
						<div class="form-group">
							<p class="mb-2">Autopsy Report Available</p>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="edr-yes-3" name="adr-Autopsy-Report" class="custom-control-input">
								<label class="custom-control-label" for="edr-yes-3">Yes</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="edr-no-3" name="adr-Autopsy-Report" class="custom-control-input">
								<label class="custom-control-label" for="edr-no-3">No</label>
							</div>
						</div>
						
					</div>
					
					<div class="step-tab-panel" data-step="step5">
						<h4>Suspected Medication</h4>
						
						<div class="form-group">
							<label for="edr-drug-name" class="sr-only">Drug name *</label>
							<input type="text" class="form-control" id="edr-drug-name" placeholder="Drug name *">
						</div>
						<div class="form-group">
							<label for="edr-Generic-name" class="sr-only">Generic name *</label>
							<input type="text" class="form-control" id="edr-Generic-name" placeholder="Generic name *">
						</div>
						<div class="form-group">
							<label for="edr-daily-dose" class="sr-only">Daily dose and route *</label>
							<input type="text" class="form-control" id="edr-daily-dose" placeholder="Daily dose and route *">
						</div>
					</div>
					
					<div class="step-tab-panel" data-step="step6">
						<h4>Concomitant Medication(S)</h4>
						<div class="form-group">
							<label for="edr-drug-name-2" class="sr-only">Drug name *</label>
							<input type="text" class="form-control" id="edr-drug-name-2" placeholder="Drug name *">
						</div>
						<div class="form-group">
							<label for="edr-Generic-name-2" class="sr-only">Generic name *</label>
							<input type="text" class="form-control" id="edr-Generic-name-2" placeholder="Generic name *">
						</div>
						<div class="form-group">
							<label for="edr-daily-dose-2" class="sr-only">Daily dose and route *</label>
							<input type="text" class="form-control" id="edr-daily-dose-2" placeholder="Daily dose and route *">
						</div>
					</div>
					
				</div>
				
				<div class="step-footer">
					<button data-step-action="prev" class="step-btn">PREVIOUS</button>
					<button data-step-action="next" class="step-btn">NEXT</button>
					<button data-step-action="finish" class="step-btn">SUBMIT</button>
				</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			

			
			
			
			
			
			
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	<?php 
	include 'footer.php';
	?>