<div id="testimonials">
	<div class="ui segment">
		<h2 class="ui header box-header">Testimonials</h2>
	</div>
	<div class="ui segment">
		<div class="ui items">
			<?php
				foreach ($pageData['testimonials'] as $testimonial) {
					
					?>
					<div class="item">
						<div class="image">
							<img
								src="/assets/img/clients/<?= $testimonial['image']; ?>"
								alt="<?= $testimonial['giversname'] . ' - ' . $testimonial['business']; ?>"
								title="<?= $testimonial['giversname'] . ' - ' . $testimonial['business']; ?>"
							/>
						</div>
						<div class="content">
							<p class="header default-text"><?= $testimonial['giversname']; ?></p>
							<div class="meta">
								<?= $testimonial['meta']; ?>
							</div>
							<div class="description default-text">
								<?= $testimonial['description']; ?>
							</div>
							<div class="extra">
								<?= $testimonial['business']; ?>
							</div>
						</div>
					</div>
					<?php
					
				}
			?>
		</div>
	</div>
</div>