$(document).ready(function () {
	gui.handleMenuResizeEvent();
	$('.ui.embed').embed();
	$('.ui.dropdown').dropdown();
	$('.ui.checkbox').checkbox();
	$('.project.cards .image').dimmer({
		on: 'hover'
	});
	
	$.extend($.scrollTo.defaults, {
		offset: -66,
		duration: 1000
	});
	
	gui.scrollToSection();
});

$(window).resize(function () {
	gui.handleMenuResizeEvent();
});

$('#toggle-menu').click(function () {
	$('.main-menu-item').toggleClass('hidden');
});

$('.scrollable').click(function (e) {
	e.preventDefault();
	if ($(this).attr('data-page-name')) {
		tracking.page($(this).attr('data-page-name'));
	}
	gui.scrollToSection($(this).attr('href'));
});

$('.off-site').click(function (e) {
	e.preventDefault();
	tracking.track($(this).attr('data-page-name'));
	window.location = $(this).attr('href');
});

$('.project-details-button').click(function () {
	var projectInfo = JSON.parse($(this).attr('data-project'));
	tracking.track("Viewed a Project");
	$('.long.project.modal').modal('show');
	gui.fillProjectModal(projectInfo);
});

$('#contact-submit').click(function (e)
{
	e.preventDefault();
	if ($('#username').val() === '') {
		gui.submitContact(function () {
			tracking.track('Sent Contact Form');
		});
	}
});

$('#footer-privacy').click(function (e) {
	e.preventDefault();
	$('.privacy.modal').modal('show');
});
