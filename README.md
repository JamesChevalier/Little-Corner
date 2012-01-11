Little Corner
=============

Little Corner is an open source drop-in website that is used to pull your entire web presence into one place.

The site is built on CodeIgniter (2.1.0), which is included in the project.

You can see it in action at http://jameschevalier.us


Compatible Services
-------------------

* Apture
* Blog (via RSS)
* Delicious
* Foursquare
* GitHub
* Gravatar
* Google Analytics
* Google Voice
* Instagram
* Last.FM
* Olark
* Twitter
* Wikipedia


Configuration
-------------

* Copy the site files into the root directory
* Verify that the .htaccess file was copied into the root directory
* Add your own favicon.ico to the root directory
* Add your own "bg.jpg" image to the /resources/images directory (a larger-sized image is best; something like 1920x1200 or so)
* Add your own 'projects' images (150w x 80h) to the /resources/images directory
* In the `/application/config/config.php` file - You will need to fill out the entire "Custom Site Configuration" section (unless a setting is noted as optional or not-to-be-touched)
* In the `/application/config/config.php` file - Each of the services that you want to enable will need to be set to 1
* In the `/application/config/config.php` file - Edit the $config['base_url'] line
* Edit the /application/views/projects.php file accordingly


How To Enable Foursquare
------------------------

* Add your domain name to the 'foursquare_redirect_url' value in the `/application/config/config.php` file
* Create a new Foursquare app at https://foursquare.com/oauth
* In the `/application/config/config.php` file - Enable Foursquare by setting the value for 'foursquare_enabled' to 1
* In the `/application/config/config.php` file - Set the value for 'foursquare_client_id'
* In the `/application/config/config.php` file - Set the value for 'foursquare_client_secret'
* In the `/application/controllers/site.php` file - Comment out the existing "Foursquare Page" function
* In the `/application/controllers/site.php` file - Uncomment the two functions below that (marked as "For Initial Auth")
* Go to http://SITEADDRESS/foursquare in your browser & click the link
* In the `/application/config/config.php` file - Set the value for 'foursquare_access_token' to the Access Token provided after clicking the link
* In the `/application/controllers/site.php` file - Uncomment out the main "Foursquare Page" function
* In the `/application/controllers/site.php` file - Comment the two functions below that (marked as "For Initial Auth")


How To Enable Instagram
-----------------------

* Register for Developer access at http://instagr.am/developer/register/
* Register your application at http://instagr.am/developer/manage/
- Set Application Name to "Little Corner"
- Set Description to "Little Corner is an open source drop-in website that is used to pull your entire web presence into one place."
- Set Website to your website's location
- Set OAuth redirect_uri to "http://YourWebSiteLocation/instagramcallback"
* In the `/application/config/config.php` file - Enable Instagram by setting the value for 'instagram_enabled' to 1
* In the `/application/config/config.php` file - Set the value for 'instagram_client_name' to "Little Corner"
* In the `/application/config/config.php` file - Set the value for 'instagram_client_id'
* In the `/application/config/config.php` file - Set the value for 'instagram_client_secret'
* In the `/application/config/config.php` file - Set the value for 'instagram_redirect_uri' to the same location you provided Instagram
* In the `/application/config/config.php` file - Set the value for 'instagram_website' to the same website location you provided Instagram
* In the `/application/config/config.php` file - Set the value for 'instagram_description' to the same description you provided Instagram
* In the `/application/controllers/site.php` file - Comment out the existing "Instagram Page" function
* In the `/application/controllers/site.php` file - Uncomment the two functions below that (marked as "For Initial Auth")
* Go to http://SITEADDRESS/instagram in your browser & click the link
* In the `/application/config/config.php` file - Set the value for 'instagram_access_token' to the Access Token provided after clicking the link
* In the `/application/controllers/site.php` file - Uncomment out the main "Instagram Page" function
* In the `/application/controllers/site.php` file - Comment the two functions below that (marked as "For Initial Auth")


Notes
-----

* Foursquare support provided by [FoursquareCodigniter library](https://github.com/dxia/FoursquareCodeigniter)
* RSS parsing support provided by [RSSParser class](http://codeigniter.com/wiki/RSSParser/revision/5670/)
* Twitter support provided by [CodeIgniter Twitter API Library](https://github.com/elliothaughin/codeigniter-twitter)
* Instagram support provided by [CodeIgniter-Instagram-Library](https://github.com/JamesChevalier/CodeIgniter-Instagram-Library)
* Your image in the navigation area is provided by [Gravatar](http://gravatar.com)
* If your site's email address does not have an associated Gravatar, the default image is a robot head provided by [RobotHash](http://robohash.org)
* Clicked image display is provided by [Lightbox2](http://www.huddletogether.com/projects/lightbox2/)
* cURL support provided by [CodeIgniter-cURL](https://github.com/philsturgeon/codeigniter-curl)
* Some aspects of this site use [Jamie Rumbelow's](http://www.jamierumbelow.net) MY_input.php class to allow ? in CodeIgniter URLs