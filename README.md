<h1 align="center">
	<br>
	<a href="https://wordpress.org/plugins/filter-wp-api/" target="_blank"><img src="https://raw.githubusercontent.com/ogulcan/filter-wp-api/master/img/icon.png" alt="Filter WP API" width="300"></a>
  	<br>
  	Filter Wordpress REST API
  	<br>
</h1>


<h4 align="center">A wordpress plugin that clears huge fields of <a href="https://developer.wordpress.org/rest-api/" target="_blank">WP Rest API</a>.</h4>

## Overview

If you ever used WP Rest API, you should have noticed that there are lots of fields that even your client does not need. It makes no sense to load all fields for simple list or even single post view.

This plugin aims to remove redundant fields on Rest API. For now, it's only available for posts.

## Features

There are two endpoints: `compact` and `detailed`. 

Compact is useful for listing posts and Detailed is better for single post view.

Here is what `compact` looks like:

```json
[
	{
		"id": 1178,
		"title": "Markup: HTML Tags and Formatting",
		"link": "http://localhost/wordpress/2013/01/11/markup-html-tags-and-formatting/",
		"date": "2013-01-11T20:22:19",
		"image": null
	},
	{
		"id": 1177,
		"title": "Markup: Image Alignment",
		"link": "http://localhost/wordpress/2013/01/10/markup-image-alignment/",
		"date": "2013-01-11T20:22:19",
		"image": "http://localhost/wordpress/wp-content/uploads/2013/03/soworthloving-wallpaper.jpg"
	},
	{
		"id": 1176,
		"title": "Markup: Text Alignment",
		"link": "http://localhost/wordpress/2013/01/09/markup-text-alignment/",
		"date": "2013-01-11T20:22:19",
		"image": null
	}
]
``` 

And here is `detailed`:

```json
[
	{
		"id": 1178,
		"title": "Markup: HTML Tags and Formatting",
		"link": "http://localhost/wordpress/2013/01/11/markup-html-tags-and-formatting/",
		"author": 2,
		"image": null,
		"content": "<h2>Headings</h2>\n<h1>Header one</h1>\n<h2>Header two</h2>\n<h3>Header three</h3>\n<h4>Header four</h4>\n<h5>Header five</h5>\n<h6>Header six</h6>\n<h2>Blockquotes</h2>\n<p>Single line blockquote:</p>\n<blockquote><p>Stay hungry. Stay foolish.</p></blockquote>\n<p>Multi line blockquote with a cite reference:</p>\n<blockquote><p>People think focus means saying yes to the thing you&#8217;ve got to focus on. But that&#8217;s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I&#8217;m actually as proud of the things we haven&#8217;t done as the things I have done. Innovation is saying no to 1,000 things. </p></blockquote>\n<p><cite>Steve Jobs</cite> &#8211; Apple Worldwide Developers&#8217; Conference, 1997</p>\n<h2>Tables</h2>\n<table>\n<thead>\n<tr>\n<th>Employee</th>\n<th>Salary</th>\n<th></th>\n</tr>\n</thead>\n<tbody>\n<tr>\n<th><a href=\"http://example.org/\">John Doe</a></th>\n<td>$1</td>\n<td>Because that&#8217;s all Steve Jobs needed for a salary.</td>\n</tr>\n<tr>\n<th><a href=\"http://example.org/\">Jane Doe</a></th>\n<td>$100K</td>\n<td>For all the blogging she does.</td>\n</tr>\n<tr>\n<th><a href=\"http://example.org/\">Fred Bloggs</a></th>\n<td>$100M</td>\n<td>Pictures are worth a thousand words, right? So Jane x 1,000.</td>\n</tr>\n<tr>\n<th><a href=\"http://example.org/\">Jane Bloggs</a></th>\n<td>$100B</td>\n<td>With hair like that?!",
		"date": "2013-01-11T20:22:19",
		"categories": [
			29
		]
	},
	{
		"id": 1177,
		"title": "Markup: Image Alignment",
		"link": "http://localhost/wordpress/2013/01/10/markup-image-alignment/",
		"author": 2,
		"image": "http://localhost/wordpress/wp-content/uploads/2013/03/soworthloving-wallpaper.jpg",
		"content": "<p>Welcome to image alignment! The best way to demonstrate the ebb and flow of the various image positioning options is to nestle them snuggly among an ocean of words. Grab a paddle and let&#8217;s get started.</p>\n<p>On the topic of alignment, it should be noted that users can choose from the options of <em>None</em>, <em>Left</em>, <em>Right, </em>and <em>Center</em>. In addition, they also get the options of <em>Thumbnail</em>, <em>Medium</em>, <em>Large</em> &amp; <em>Fullsize</em>.</p>\n<p style=\"text-align:center;\"><img class=\"size-full wp-image-906 aligncenter\" title=\"Image Alignment 580x300\" alt=\"Image Alignment 580x300\" src=\"http://localhost:8888/wordpress/wp-content/uploads/2013/03/image-alignment-580x300.jpg\" width=\"580\" height=\"300\" /></p>\n<p>The image above happens to be <em><strong>centered</strong></em>.</p>\n<p><strong><img class=\"size-full wp-image-904 alignleft\" title=\"Image Alignment 150x150\" alt=\"Image Alignment 150x150\" src=\"http://localhost:8888/wordpress/wp-content/uploads/2013/03/image-alignment-150x150.jpg\" width=\"150\" height=\"150\" /></strong>The rest of this paragraph is filler for the sake of seeing the text wrap around the 150&#215;150 image, which is <em><strong>left aligned</strong></em>.",
		"date": "2013-01-10T20:15:40",
		"categories": [
			29
		]
	}
]
``` 

## Installition

Plugin is ready on wordpress [plugins][https://wordpress.org/plugins/filter-wp-api/]. You can find via search on plugins. Or just download this project and upload `filter-wp-api/` directory into your `wp-content/plugins`. 

After installition, just add `?_compact` or `?_detailed` as GET parameter at the end of the URL.

## Notes

* First image of featured media will be added as 'image' on detailed.
* Modified was used as default date.
* Wordpress version should be higher than 4.7

### Links

* [WP Rest API](https://developer.wordpress.org/rest-api/)
* [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate)
* [Awesome Readme](https://github.com/matiassingers/awesome-readme)
* [Issues](https://github.com/ogulcan/filter-wp-api/issues)
* [Changelog](https://github.com/ogulcan/filter-wp-api/blob/master/CHANGELOG.md)

#### License

All code found in this repository is licensed under GPL v3
[source]
----
    Copyright (C) 2017 Ogulcan Orhan

    Filter WP Api is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Filter WP Api is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
----
