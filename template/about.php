<div id="about">
	<div class="ui segment">
		<h2 class="ui header box-header">Who is Rick Mac Gillis?</h2>
	</div>
	<div class="ui segment">
		<div class="ui vertical segment">
			<img class="ui small left floated image" src="/assets/img/rick-mac-gillis.jpg" alt="Rick Mac Gillis" title="Rick Mac Gillis" />
			<p>Rick is an American Software Engineer with over 13 years of experience. He began is career in 2003, and has satisfied the needs
			of many clients with unique needs. Rick is an <a href="http://dictionary.reference.com/browse/artisan">artisan</a> by definition, and
			he's the author of "<a href="#contact">The New Frontier
			in Web API Programming</a>," a book detailing how large scale projects may use web APIs while maintaining their high-availability.</p>
			
			<p>Rick has contributed to the Computer Science industry in many ways. He has devoted time to improving open source projects,
			such as the <a href="https://github.com/alecsammon/php-raml-parser">PHP RAML Parser project</a> and the
			<a href="http://fuelphp.com/">Fuel PHP Framework</a>. He created <a href="https://github.com/cozylife/hackfastalgos">Hack Fast Algos</a>,
			an open source algorithm library designed to aid aspiring Software Engineers in their quest for algorithmic knowledge. Rick also programs
			for charity at the <a href="http://clevelandgivecamp.org">Cleveland Give Camp</a> Hackathon.</p>
			
			<h2 class="ui header box-header">Core Business Values</h2>
			<div class="ui list">
				<div class="item">
					<div class="header">Make life easier for my clients</div>
					<p>Many of my clients come to me after they've had a bad experience with other freelancers, and I instantly seek
					to turn the situation around.</p>
				</div>
				<div class="item">
					<div class="header">Make sure that I fully understand my client's situation</div>
					<p>Every project is unique, and each project needs to be treated in it's own unique way. Once I've learned what
					matters to you, I can start building what you desire most.</p>
				</div>
				<div class="item">
					<div class="header">Put my <i>art</i> into it and seek a win-win situation or don't make the deal</div>
					<p>Every project I create is an artistic and scientific creation of the highest quality. I'm selective about the projects
					on which I choose to work, as I'm not just building software for the money. When I select your project, I genuinely care about
					it's quality. My favorite projects are ones that are both challenging and creative.</p>
					
					<p>Naturally, I'm unable to take on every project I'm offered, though once I've committed to a project, I like to work on that
					project exclusively until it's finished. I'm quite confident that you'll love what I build for you as we work together on your
					project.</p>
					
					<p>In fact, I'm so confident that I can offer you the highest-quality work, that I offer a <span class="text-red"><strong>30-Day
					Bug-Free Guarantee</strong></span>. If you find a bug in my code within 30 days of finishing the contract, I'll repair it at no
					additional charge.</p>
				</div>
			</div>
		</div>
		<div class="ui vertical segment">
			<a class="off-site" data-page-name="UpWork Profile" href="https://www.upwork.com/freelancers/~01cd50db5f4b697e9c">
				<img class="ui tiny left floated image" src="/assets/img/upwork.png" alt="UpWork" title="UpWork" width="106" height="30" />
			</a>
			<a class="off-site" data-page-name="Facebook" href="https://www.facebook.com/rick.macgillis"><i class="big dark-blue facebook square icon"></i></a>
			<a class="off-site" data-page-name="Linked In" href="https://www.linkedin.com/in/rickmacgillis"><i class="big medium-blue linkedin square icon"></i></a>
			<a class="off-site" data-page-name="Twitter" href="https://twitter.com/MyCozyLife"><i class="big light-blue twitter square icon"></i></a>
			<a class="off-site" data-page-name="Google Plus" href="https://plus.google.com/u/0/+RickMacGillis"><i class="big red google plus square icon"></i></a>
			<a class="off-site" data-page-name="WordPress" href="https://blog.rickmacgillis.com"><i class="big light-blie wordpress icon"></i></a>
		</div>
	</div>
	<div class="ui segment">
		<div class="ui vertical segment">
			<h2 class="ui header box-header">Mad Computer Skills</h1>
			<p>This is <u>not</u> an exhaustive list.</p>
		</div>
		<?php
			$skillTypes = $pageData['skillTable'];
			foreach ($skillTypes as $skillType) {
				
				$skillType = $skillType[0];
				$totalSkills = count($skillType['skills']);
				
				?>
				<h3><?= $skillType['skilltype']; ?></h3>
				<div class="ui vertical segment">
					<div class="ui labels">
						<?php
							for ($i = 0; $i < $totalSkills; $i++) {
								echo '<span class="ui ' . $skillType['skillcolor'] . ' label">' . $skillType['skills'][$i] . '</span>';
							}
						?>
					</div>
				</div>
				<?php
			}
		?>
	</div>
</div>