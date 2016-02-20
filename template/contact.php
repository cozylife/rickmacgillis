<div id="contact">
	<div class="ui segment">
		<h2 class="ui header box-header">Contact Rick Mac Gillis</h2>
	</div>
	<div class="ui segment">
		<div>
			<img class="ui small left floated image"
				src="/assets/img/the-new-frontier-in-web-api-programming.png"
				alt="The New Frontier In Web API Programming"
				title="The New Frontier In Web API Programming"
			/>
			<h2>Take the first step to claiming more spare time!</h2>
			<p>Contact me to find out how an API can help you to lower your sales and marketing costs by having multiple stores sell your products.
			Remember: The more profit your company makes, the larger the budget for your technology division, and that's when you hire more people
			to do what you do not enjoy doing, so you can enjoy more vacations with the wife and kids. <strong class="text-green">In just 2 months,
			the sand will be gently carressing your feet.</strong></p>
			
			<p>As a bonus, I'll send you a <u>free copy of my book</u> entitled <i><small><strong>The New Frontier in Web API Programming</strong></small></i>,
			to help you keep your cloud running at a bleeding fast speed. Go on! Be the hero who knows how to work it.</p>
			
			<p><strong>Important: </strong> Please know that I do not have time to service every potential client. Only contact me if you're
			interested in having your inventory listed with multiple other stores. (You select the stores.)</p>
		</div>
		<h2>Schedule a Consultation</h2>
		<noscript>
			JavaScript is disabled on your browser. Please get in touch with me on <a href="https://www.upwork.com/freelancers/~01cd50db5f4b697e9c">UpWork</a>.
			Remember to request your free book!
		</noscript>
		<form class="ui form use-script" id="contact-form">
			<h4 class="ui dividing header">Required Information</h4>
			<div class="required field">
				<label>Name</label>
				<div class="two fields">
					<div class="field">
						<input type="text" name="first-name" placeholder="First Name">
					</div>
					<div class="field">
						<input type="text" name="last-name" placeholder="Last Name">
					</div>
				</div>
			</div>
			<div class="required field">
				<label>Email</label>
				<div class="field">
					<input type="text" name="email" placeholder="johnny@boy.com">
				</div>
			</div>
			<div class="field">
				<div class="three fields">
					<div class="required field">
						<label>Corporate Title</label>
						<input type="text" name="job-title" placeholder="Chief Technology Officer">
					</div>
					<div class="required field">
						<label>Business</label>
						<input type="text" name="business" placeholder="Amazon">
					</div>
					<div class="required field">
						<label>Business Website</label>
						<div class="ui labeled input">
							<div class="ui black label">http://</div>
							<input type="text" name="business-website" placeholder="amazon.com">
						</div>
					</div>
				</div>
			</div>
			<h4 class="ui dividing header">Helpful Information</h4>
			<div class="field">
				<label>Phone</label>
				<input type="text" name="phone" placeholder="555-555-5555 - Ask for Jim Bob">
			</div>
			<div class="field">
				<label>Address</label>
				<div class="fields">
					<div class="eight wide field">
						<input type="text" name="address" placeholder="Street Address">
					</div>
					<div class="eight wide field">
						<input type="text" name="address2" placeholder="Office Number">
					</div>
				</div>
			</div>
			<div class="field">
				<div class="fields">
					<div class="eight wide field">
						<input type="text" name="city" placeholder="City">
					</div>
					<div class="eight wide field">
						<input type="text" name="zip" placeholder="Postal Code">
					</div>
				</div>
			</div>
			<div class="two fields">
				<div class="field">
					<label>State</label>
					<select name="state" class="ui fluid search dropdown">
						<option value="">State</option>
						<?php include('section/states.php') ?>
					</select>
				</div>
				<div class="field">
					<label>Country</label>
					<div class="ui fluid search selection dropdown">
						<input type="hidden" name="country">
						<i class="dropdown icon"></i>
						<div class="default text">Select Country</div>
						<div class="menu">
							<?php include('section/countries.php'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="field">
				<label>Comments</label>
				<textarea name="comments"></textarea>
			</div>
			<div class="ui segment">
				<div class="field">
					<div class="ui checkbox">
						<input type="checkbox" name="send-book" class="hidden" checked />
						<label>Would you like a free copy of <i>The New Frontier in Web API Programming</i>?</label>
					</div>
				</div>
			</div>
			<input type="text" name="username" id="username" class="move-left" />
			<div id="responseMessage"></div>
			<button class="ui olive button" id="contact-submit">Request a Consultation</button>
		</form>
	</div>
</div>