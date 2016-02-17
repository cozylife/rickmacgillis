<div id="services">
	<div class="ui segment text-center">
		<div class="ui statistic">
			<div class="value"><?= count($pageData['testimonials']); ?></div>
			<div class="label">Testimonials</div>
		</div>
		<div class="ui statistic">
			<div class="value"><?= count($pageData['projects']); ?></div>
			<div class="label">Projects Listed</div>
		</div>
		<div class="ui statistic">
			<div class="value"><?php
				$startDate = 1041397200;
				$secsInAYear = 31536000;
				echo round((time() - $startDate) / $secsInAYear);
			?></div>
			<div class="label">Years of Experience</div>
		</div>
	</div>
	<div class="ui segment">
		<h2 class="ui header box-header">Time-Saving Services</h2>
	</div>
	<div class="ui segment" id="video-box">
		<noscript>
			<h2>Hey! Check out the <a href="https://www.youtube.com/embed/cEDurJbUEjw">demo video on YouTube</a> to save time.</h2>
		</noscript>
		<iframe class="use-script" width="560" height="315" src="https://www.youtube.com/embed/cEDurJbUEjw" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="ui segment">
		<img class="ui medium left floated image" src="/assets/img/happy-jiggles.gif" alt="Happy Jiggles" title="Happy Jiggles" />
		<h3>It's time to get excited!</h3>
		<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </p>
		<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </p>
		<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </p>
		<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </p>
		<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </p>
		<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum </p>
	</div>
</div>