<div id="projects">
	<div class="ui segment">
		<h2 class="ui header box-header">Projects</h2>
	</div>
	<div class="ui segment">
		<div class="ui three stackable project cards">
			<?php
				foreach ($pageData['projects'] as $project) {
					
					$project['skills'] = explode(',', $project['skills']);
					
					?>
					<div class="card">
						<div class="blurring dimmable image">
							<div class="ui dimmer">
								<div class="content">
									<div class="center">
										<div class="ui inverted button project-details-button" data-project='<?= json_encode($project, JSON_HEX_APOS); ?>'>
											View Project Details
										</div>
									</div>
								</div>
							</div>
							<img src="/assets/img/projects/<?= $project['image']; ?>">
						</div>
						<div class="content">
							<a class="header" href="<?= $project['url']; ?>"><?= $project['projectname']; ?></a>
							<div class="meta">
								<span class="date">Completed <?= $project['completiondate']; ?></span>
							</div>
						</div>
						<div class="extra content">
							<i class="thumbs outline up icon"></i> <?= $project['yips']; ?> Yips
						</div>
					</div>
					<?PHP
					
				}
			?>
		</div>
	</div>
	<div class="ui long project modal">
		<i class="close icon"></i>
		<div class="header" id="modal-project-name"></div>
		<div class="image content">
			<div class="ui medium image">
				<img id="modal-project-image" />
			</div>
			<div class="description">
				<div class="ui header" id="modal-project-type"></div>
				<div id="modal-project-description"><div id="scroll-fix"></div></div>
				<div class="ui labels" id="modal-project-skills"></div>
			</div>
		</div>
		<div class="actions">
			<div class="ui gray cancel button">Close</div>
			<a id="modal-project-view-button" class="ui right labeled red icon button">View The Project <i class="globe icon"></i></a>
		</div>
		<div class="ui image">
			<img id="modal-project-full-image" />
		</div>
	</div>
</div>