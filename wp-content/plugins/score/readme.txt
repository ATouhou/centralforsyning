==== scORE! ====
Contributors: carles, yogihw
Donate link: http://y.wiputra.com/score/
Tags: score,scoring,score keeping,current,current value,motd,rate,rating,publish rating
Requires at least: 2.5.x
Tested up to: 2.6
Stable tag: 1

=== Plugin Name ===

scORE! Score-keeping plugin.

== Description ==

scORE! is a Wordpress plug-in you can use to publish scores easily for each post entry.

This plugin is based on Carles Company Soler's "punts" plugin, with changes and additions to make the plugin elements more usable and less intimidating for new Wordpress users, as well as to better separate the presentation layer (the CSS stuff) from the data processing parts.

== Installation ==

Installation instructions:
--------------------------
* Copy the scORE directory to wp-content/plugins.
* Activate the plugin in the admin interface.
* Implement the class "scORE_display" on your Wordpress template's CSS file (optional)

Here's a sample CSS entry:
/* scORE class */
.scORE_display
{
	border:2px black solid;
	color:#FF0000;
	font-size:x-large;
	font-weight:bold;
	margin-top:3px;
	margin-bottom:15px;
	text-align:center;
	padding:5px;
	width:150px;
}

Just copy and paste this to the end of the template's CSS file. You can, of course, experiment with the CSS attributes and see what happens.

For instructions on how to use the plugin, see README (Linux) or readme.txt (Windows)

== Frequently Asked Questions ==

= How do I start posting scores? =

You can start by going to the "Write" section as you would normally do. If you installed scORE! properly, you should see a section called "Score" below "Tags" and "Categories".

= What is the scoring system implemented? =

Currently, the only scoring system implemented is the A+ to F scoring system, spanning 13 discrete score possibilities. In the future, there will be other systems to choose from, such as stars (the original "punts" plugin used this system), and many other systems to choose from!

= Where is the data stored? =

Just like "punts" plugin, scORE! stores the score data in each post's custom field table. This allows for minimal programming, maintenance and later expansion efforts, and will in turn make your Wordpress able to do more without having to become burdened by excessive resource usage (such as extra database tables required by some other plugins).

= Where can I get support and/or suggest new features? =

Simply email yogi.wiputra at gmail.com and mention "scORE!" in the title, without the double quotes.

By all means, please let me know if you use my plug-in. It is of course not required, but it will encourage me to invest more time to it.

== Thank You ==

To Melline Jaini, who perked and invested on the idea of publishing movie reviews. This plugin would not exist without her.

To Carles Company Soler, who developed the first "punts". His plug-in was the only one on the wordpress.org website to allow posting of scores. Others were developed so that posts can be rated, instead of the post writer to publish his/her opinions.

To my girlfriend, who has endured so much of me being mentally absent at times, even though I spend a lot of time close to her.

To the Wordpress core team. Thank you for developing such a great blogging platform!