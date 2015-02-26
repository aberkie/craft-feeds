<?php
/*
*
* Feeds Twitter Service
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/feeds
*
*/
namespace Craft;

class Feeds_TwitterService extends BaseApplicationComponent
{
	public function feed($raw_params)
	{

		$params = array();

		foreach($raw_params as $key=>$val)
		{
			if(substr( $key, 0, 5 ) !== "data-")
			{
				$new_key = "data-".$key;
			} else {
				$new_key = $key;
			}
			$params[$new_key] = $val;
		}

		$href = "https://twitter.com";
		$text = "Tweets";
		$widget_id = "570774660619698176";

		if(array_key_exists ( 'data-screen-name' , $params ))
		{	
			$href = "https://twitter.com/".$params['data-screen-name'];
			$text = "Tweets by @".$params['data-screen-name'];
		} else if (array_key_exists('data-user-id', $params))
		{
			$href = "https://twitter.com/".$params['data-user-id'];
			$text = "Tweets by @".$params['data-user-id'];
		}

		if(! array_key_exists('data-widget-id', $params))
		{
			$params['data-widget-id'] = $widget_id;
		}

		$oldTemplatesPath = craft()->path->getTemplatesPath();
	    $newTemplatesPath = craft()->path->getPluginsPath().'feeds/templates/';
	    craft()->path->setTemplatesPath($newTemplatesPath);

	    $params['href'] = $href;
	    $params['text'] = $text;

	    $vars = array('params' => $params);

	    $html = craft()->templates->render('twitter/twitterFeed.html', $vars);
		craft()->path->setTemplatesPath($oldTemplatesPath);
		
		craft()->templates->includeJsFile('https://platform.twitter.com/widgets.js');
		echo $html;
	}
}