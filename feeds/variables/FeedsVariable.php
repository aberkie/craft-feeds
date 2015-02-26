<?php
/*
*
* Feeds Variable
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/feeds
*
*/
namespace Craft;

class FeedsVariable
{
	public function twitterFeed($params)
	{
		return craft()->feeds_twitter->feed($params);
	}
}