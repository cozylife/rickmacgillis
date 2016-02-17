var tracking = (function ()
{
	function page(pageName)
	{
		if (typeof analytics === 'object') {
			analytics.page(pageName);
		}
	}
	
	function track(trackName)
	{
		if (typeof analytics === 'object') {
			analytics.track(trackName);
		}
	}
	
	return {
		page:page,
		track:track
	};
})();
