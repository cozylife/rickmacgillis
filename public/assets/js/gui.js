var gui = (function () {
	
	function handleMenuResizeEvent()
	{
		if ($(window).width() >= 768 - 15) {
			$('.main-menu-item').removeClass('hidden');
		}
	}
	
	function scrollToSection(section)
	{
		if (section === undefined) {
			
			if (location.hash !== '') {
				$(window).scrollTo($(location.hash));
			}
			
		} else {
			$(window).scrollTo($(section));
		}
	}
	
	function fillProjectModal(projectJsonObject)
	{
		$('#modal-project-name').html(projectJsonObject.projectname);
		$('#modal-project-image').attr('src', '/assets/img/projects/' + projectJsonObject.image);
		$('#modal-project-type').html(projectJsonObject.projecttype);
		$('#modal-project-description').html(projectJsonObject.description);
		$('#modal-project-skills').html(getSkillsHtml(projectJsonObject.skills));
		$('#modal-project-full-image').attr('src', '/assets/img/projects/full-' + projectJsonObject.image);
		$('#modal-project-view-button').attr('href', projectJsonObject.url);
	}
	
	function submitContact(successCallback)
	{
		$('#contact-form').addClass('loading');
		$.post('/contact', $('#contact-form').serialize())
		.done(function (e) {
			var response = JSON.parse(e);
			$('#responseMessage').html(getContactMessageBoxHtml(response.header, response.message, response.responseType));
			if (typeof successCallback === 'function' && response.responseType === 'positive') {
				successCallback();
			}
			$('#contact-form').removeClass('loading');
		})
		.fail(function (e) {
			$('#responseMessage').html(getContactMessageBoxHtml(
				'An Error Occurred',
				'Please try resending the message or use this form to contact support. ;) Oh, alright, get in touch with me on UpWork to report the bug.',
				'negative'));
			$('#contact-form').removeClass('loading');
		});
	}
	
	/* PRIVATE PARTS */
	
	function getSkillsHtml(skillList)
	{
		var listHtml = '';
		for (var skill in skillList) {
		
			var skillId = skillList[skill];
			listHtml += '<span class="ui ' + ricksSkillset[skillId]['color'] + ' label">' + ricksSkillset[skillId]['skill'] + '</span>';
			
		}
		return listHtml;
	}
	
	function getContactMessageBoxHtml(header, message, color)
	{
		return '<div class="ui ' + color + ' message">' +
					'<div class="header">' + header + '</div>' +
					'<p>' + message + '</p>' +
				'</div>';
	}
	
	return {
		handleMenuResizeEvent:handleMenuResizeEvent,
		scrollToSection:scrollToSection,
		fillProjectModal:fillProjectModal,
		submitContact:submitContact
	};
	
})();