# Feeds for Craft CMS
Simple Craft plugin to display social media feeds.

##Install
1. Upload entire feeds directory to craft/plugins on your server.
2. Navigate to your site's Plugin settings from teh Control Panel.
3. Click Install

##Usage
###Twitter Embedded Timeline
To display a Twitter Embedded Timeline, simply add the following code in your template: 
`{{craft.feeds.twitterFeed()}}`

You can add as many configuraiton options as you want, outlined in [Twitter's documentation](https://dev.twitter.com/web/embedded-timelines). You do not need to include the "data-" infront of every option, but it wont break if you do!

####Example: Show a user's timeline with a blue border
	{% set params = {
		'screen-name' : 'asberk',
		'border-color' : '#50c0ed'
	} %}

	{{craft.feeds.twitterFeed(params)}}

####Example: Show a user's favorites with custom chrome options
	{% set params = {
		'favorites-screen-name' : 'asberk',
		'chrome' : 'noheader nofooter transparent',

	} %}

	{{craft.feeds.twitterFeed(params)}}
	
###Theming [options](https://dev.twitter.com/web/embedded-timelines):
* Theme: Set by adding a data-theme="dark" attribute to the embed code.
* Link color: Theme: Set by adding a data-link-color="#cc0000" attribute. Note that some icons in the widget will also appear this color.
* Chrome: Control the widget layout and chrome by using the data-chrome="nofooter transparent" attribute on the embed code. Use a space-separated set of the following options:
 * noheader: Hides the timeline header. Please refer to the timeline display requirements when implementing your own header.
 * nofooter: Hides the timeline footer and Tweet box, if included.
noborders: Removes all borders within the widget (between Tweets, cards, around the widget.) See also: border-color.
 * noscrollbar: Crops and hides the main timeline scrollbar, if visible. Please consider that hiding standard user interface components can affect the accessibility of your website.
 * transparent: Removes the background color.
* Border color: Change the border color used by the widget. Takes an #abc123 hex format color e.g. data-border-color="#cc0000"
* Language: The widget language is detected from the page, based on the HTML lang attribute of your content. You can also set the HTML lang attribute on the embed code itself.
* Tweet limit: To fix the size of a timeline to a preset number of Tweets, use the data-tweet-limit="5" attribute with any value between 1 and 20 Tweets. The timeline will render the specified number of Tweets from the timeline, expanding the height of the widget to display all Tweets without scrolling. Since the widget is of a fixed size, it will not poll for updates when using this option.
* Web Intent Related Users: As per the Tweet and follow buttons, you may provide a comma-separated list of user screen names as suggested followers to a user after they reply, Retweet, or favorite a Tweet in the timeline. Use a data-related="benward,endform" attribute on the embed code.
* ARIA politeness. ARIA is an accessibility system that aids people using assistive technology interacting with dynamic web content. Read more about ARIA on W3C’s website. By default, the embedded timeline uses the least obtrusive setting: aria-polite="polite". If you’re using an embedded timeline as a primary source of content on your page, you may wish to override this to the assertive setting, using data-aria-polite="assertive".

###Timline Selection [options](https://dev.twitter.com/web/embedded-timelines):
* Users: Add the data-screen-name or data-user-id attribute for the user whose timeline you want to display. You can also specify data-show-replies="true" to toggle the ‘Show Replies’ option on a per-timeline basis.
* Collections: Add a data-custom-timeline-id attribute for the custom collection timeline you want to render. Use only the integer portion of the timeline ID.
* Favorites: Similarly to user timelines, add a data-favorites-screen-name or data-favorites-user-id attribute for the favorites timeline you want to render.
* Lists: To render a list, you must specify the list owner—data-list-owner-screen-name or data-list-owner-id—and a list identifier, data-list-id or data-list-slug.

##Roadmap
I hope to add several more feeds in the near future, as well as a custom field type to allow content creators to add thier own options without the need for a developer to create a bunch of custom fields.
