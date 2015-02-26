<?php
/*
*
* Feeds Main Plugin File
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/feeds
*
*/

namespace Craft;

class FeedsPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Feeds');
	}

	function getVersion()
	{
		return '1.0';
	}

	function getDeveloper()
	{
		return 'Aaron Berkowitz';
	}

	function getDeveloperUrl()
	{
		return 'https://github.com/aberkie';
	}

	public function hasCpSection()
	{
		return false;
	}
}