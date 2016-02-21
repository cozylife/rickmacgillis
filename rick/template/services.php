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
		<iframe class="use-script" id="vsl-video" src="https://www.youtube.com/embed/cEDurJbUEjw" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="ui segment">
		<div class="ui grid">
			<div class="twelve wide column">
				<p id="small-bam-text">It's time to get excited!</p>
				<p id="bam-text">Have more time for <strong><i id="blue-you-bam" class="animated infinite bounce">You!</i></strong></p>
			</div>
			<div class="four wide column">
				<img class="ui medium image" src="/assets/img/happy-jiggles.gif" alt="Happy Jiggles" title="Happy Jiggles" />
			</div>
		</div>
		<p id="tell-me-a-story">Let me tell you a short story.</p>
		<div class="ui list">
			<div class="item">
				<i class="big cocktail icon"></i>
				<div class="content">
					<div class="header">Vacation</div>
					<div class="description">You need a vacation, yet you don't have one. Why? It's simply because you have too much work.</div>
				</div>
			</div>
			<div class="item">
				<i class="big fax icon"></i>
				<div class="content">
					<div class="header">Too Much Work</div>
					<div class="description">You have too much work because you are understaffed. (I have news for you. Most companies are grossly
					understaffed because of <a href="https://en.wikipedia.org/wiki/Moore%27s_law">Moore's Law</a>. Technology is growing too fast
					for most businesses to keep up.)</div>
				</div>
			</div>
			<div class="item">
				<i class="big male icon"></i>
				<div class="content">
					<div class="header">Understaffed</div>
					<div class="description">You're understaffed, and why are you understaffed? It's simply because you don't have enough money to
					afford more employees. Where is the money going? How come you can't afford your business' basic needs - your employees - even
					though you're a large profitable company?</div>
				</div>
			</div>
			<div class="item">
				<i class="big money icon"></i>
				<div class="content">
					<div class="header">You Need More Cash</div>
					<div class="description">
						<p>The reason you can't afford more workers is because your marketing eats up a large chunk of your company's budget.</p>
						<div class="ui stacked segment">
							<p class="quote">... The survey found that marketing budgets remained healthy in 2014, with, on average, companies spending 10.2
							percent of their annual 2014 revenue on overall marketing activities, with 50 percent of companies planning an increase in 2015.
							Digital marketing spending averaged one-quarter of the marketing budget in 2014. The survey found that of the 51 percent of
							companies who plan to increase their digital marketing budget in 2015, the average increase will be 17 percent.</p>
							<p class="quote-source">&mdash; Source: <a href="http://www.gartner.com/newsroom/id/2895817">Gartner</a></p>
						</div>
						<p>50% of the companies they surveyed increased their up marketing budget from 10.2% to almost 12% in 2015 [10.2 + 17%], that's over
						1/10th of the entire company budget! Gartner sourced that information from companies with at least $500M in annual revenue. To
						put it bluntly, they increased their marketing budget up from $51M to $59.67M for an increase of $8.67M! I don't know about you, but
						I'd love to pocket that kind of cash.</p>
					</div>
				</div>
			</div>
			<div class="item">
				<i class="big bomb icon"></i>
				<div class="content">
					<div class="header text-red">Solution: Have thousands of retailers market your products for you</div>
					<div class="description">
						<p>Don't throw an extra $8.67 <i>Million</i> dollars down the toilet for another year of maybes. Invest in an MLS
						system. What? Why? What's an MLS? What does it even stand for? Yep. I'm pretty sure that you've never even heard of a
						Multiple Listing Service unless you have experience in the real-estate market.</p>
						<p>The retail market has been using <a href="https://en.wikipedia.org/wiki/Multiple_listing_service">Multiple Listing Service
						systems</a> to explode their profits since the late 1800s by letting other companies sell their properties for them.
						<span class="text-light-blue">Now it's time for the retail market to start using that same power.</span> That's where
						I come in. I'll build you the tools you need for this new superpower for your company.</p>
					</div>
				</div>
			</div>
			<div class="item">
				<i class="big travel icon"></i>
				<div class="content">
					<div class="header text-green">Now you can go on vacation</div>
					<div class="description">
						<p>Don't spend another day driving to work without your umbrella as it starts to rain and you spend the day soaked in water
						and employee-deficiency. Become the corporate hero you're meant to be. Once you have your new superpower, the Multiple Listing
						Service tool that your competition isn't using, you'll be well on your way to hiring more workers to handle the tasks that
						currently bog you down. Splurge on a personal secretary, or perhaps you need two. You simply can't deal with all of the work
						and expect to make it to your kid's soccer game... or your romantic dinner with your wife... or... you know... your wedding.</p>
						<p class="text-green">So, what are you waiting for?
						<a href="#contact" id="blue-bam-superpowers" class="scrollable animated infinite pulse">Get your superpowers now, and go
						play hero!</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>