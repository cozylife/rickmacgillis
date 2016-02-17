<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
	<?php include('html-head.php'); ?>
	<body id="top">
		<div id="jumbotron">
			<div id="jumbo-container">
				<div id="jumbo-spacer"></div>
				<div id="jumbo-text-box">
					<div id="jumbo-text">
						<h1 id="jumbo-header">30-Day Bug-Free Guarantee!</h3>
						<p id="jumbo-sub-text">If you find a bug in my work within 30 days of the <br>project's completion, I'll repair it at no additional charge.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="ui container">
			<?php
				include('section/menu.php');
				include('services.php');
				include('about.php');
				include('projects.php');
				include('testimonials.php');
				include('contact.php');
			?>
		</div>
		<?php include('footer.php'); ?>
		<script type="text/javascript">
			var ricksSkillset = JSON.parse('<?php echo json_encode($pageData['skillColors'], JSON_HEX_APOS); ?>');
		</script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
		<script type="text/javascript" src="/assets/js/gui.js"></script>
		<script type="text/javascript" src="/assets/js/tracking.js"></script>
		<script type="text/javascript" src="/assets/js/rick.js"></script>
	</body>
</html>