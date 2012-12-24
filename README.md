Little Corner
=============

Little Corner is a website that is used to pull your entire web presence into one place. It runs on Ruby on Rails, doesn't use a database, and is Heroku-ready. You can see it in action at http://jameschevalier.us

Compatible Services
-------------------

* Blog (via RSS)
* Delicious
* Foursquare
* GitHub
* Google Analytics
* Gravatar
* Instagram
* Last.FM
* Soundcloud
* Tumblr
* Twitter

How To Get It Going
-------------

### Get the code
1. Open Terminal
2. Copy Little-Corner locally with `git clone git@github.com:JamesChevalier/Little-Corner.git`
3. Change directory into Little-Corner with `cd Little-Corner`

### Complete initial configuration
1. Edit `config/environment.rb` as completely as possible
2. Replace `public/favicon.ico` with your own favicon
3. Replace `/app/assets/images/bg.jpg` with your own background image
    * Make sure your background image has the same filename
    * A larger-sized image is best; something like 1920x1200, or 1280x800
4. Add your own `projects` images (150w x 80h) to the `/app/assets/images` directory
5. Edit `app/views/projects/index.html.erb` to add your projects

### Deploy initial version
1. Commit your configuration changes with `git add .; git commit -m "Update Config"`
2. Create your Heroku app with `heroku create`
3. Deploy Little-Corner to Heroku with `git push heroku master`

### Configure individual services

The sections below describe how to enable each individual service. Some of the steps in each section might duplicate steps you completed in the `Complete initial configuration`, above. If you aren't enabling one of them, just skip that section.


#### Foursquare

* Register your application at https://foursquare.com/developers/apps
    * Set the Name of your app to "Little-Corner" (or something similar, if they require unique names)
    * Set Download / welcome page url to your website's location
    * Set Callback URL to "http://YOURDOMAIN/foursquare/callback"
    * Check the box for Web Connect Support
* Edit the `/config/environment.rb` file:
    * Set the value for `ENABLE_FOURSQUARE` to true
    * Set the value for `FOURSQUARE_CLIENT_ID`
    * Set the value for `FOURSQUARE_CLIENT_SECRET`
    * Set the value for `FOURSQUARE_USER_NAME` to your user name
* Commit your changes with `git add .; git commit -m "Configure Foursquare"`
* Deploy Little-Corner to Heroku with `git push heroku master`
* Go to http://YOURDOMAIN/foursquare/connect in your browser
* Edit the `/config/environment.rb` file:
    * Set the value for `FOURSQUARE_OAUTH_TOKEN`
* Commit your changes with `git add .; git commit -m "Configure Foursquare"`
* Deploy Little-Corner to Heroku with `git push heroku master`


#### Instagram

* Register for Developer access at http://instagr.am/developer/register/
* Register your application at http://instagr.am/developer/manage/
    * Set Application Name to "Little Corner"
    * Set Description to "Little Corner pulls your entire web presence into one place."
    * Set Website to your website's location
    * Set OAuth redirect_uri to "http://YOURDOMAIN/instagram/callback"
* Edit the `/config/environment.rb` file:
    * Enable Instagram by setting the value for `ENABLE_INSTAGRAM` to 1
    * Set the value for `INSTAGRAM_CLIENT_ID`
    * Set the value for `INSTAGRAM_CLIENT_SECRET`
* Commit your changes with `git add .; git commit -m "Configure Instagram"`
* Deploy Little-Corner to Heroku with `git push heroku master`
* Open http://YOURDOMAIN/instagram/connect in your browser
* Edit the `/config/environment.rb` file:
    * Set the value for `INSTAGRAM_ACCESS_TOKEN` to the Access Token provided
* Commit your changes with `git add .; git commit -m "Configure Instagram"`
* Deploy Little-Corner to Heroku with `git push heroku master`


#### Last.FM

* Register your application at http://www.last.fm/api/accounts
    * Set the Application/Device Name to "Little-Corner" (or something similar, if they require unique names)
    * Set the Application Description to "My instance of Little-Corner"
    * Set the Application Homepage to your website's location
    * You don't need to fill out the rest of the form
* Edit the `/config/environment.rb` file:
    * Set the value for `ENABLE_LAST_FM` to true
    * Set the value for `LAST_FM_USER` to your user name
    * Set the value for `LAST_FM_API_KEY`
    * Set the value for `LAST_FM_API_SECRET`
* Commit your changes with `git add .; git commit -m "Configure Last.FM"`
* Deploy Little-Corner to Heroku with `git push heroku master`


#### Soundcloud

* Register your application at http://soundcloud.com/you/apps
    * Set the Title of your app to "Little-Corner" (or something similar, if they require unique names)
* Edit the `/config/environment.rb` file:
    * Set the value for `ENABLE_SOUNDCLOUD` to true
    * Set the value for `SOUNDCLOUD_CLIENT_ID`
    * Set the value for `SOUNDCLOUD_USER_NAME` to your user name
* Commit your changes with `git add .; git commit -m "Configure Soundcloud"`
* Deploy Little-Corner to Heroku with `git push heroku master`


#### Tumblr

* Edit the `/config/environment.rb` file:
    * Set the value for `ENABLE_TUMBLR` to true
    * Set the value for `TUMBLR_USER_NAME` to your user name
* Commit your changes with `git add .; git commit -m "Configure Tumblr"`
* Deploy Little-Corner to Heroku with `git push heroku master`

#### Twitter

* Register your application at https://dev.twitter.com/apps
    * Set the Name of your app to "Little-Corner" (or something similar, if they require unique names)
    * Set the Description of your app to "Little Corner pulls your entire web presence into one place."
    * Set Website to your website's location
    * Set Callback URL to "http://YOURDOMAIN/twitter/callback"
* Edit the `/config/environment.rb` file:
    * Set the value for `ENABLE_TWITTER` to true
    * Set the value for `TWITTER_CONSUMER_KEY`
    * Set the value for `TWITTER_CONSUMER_SECRET`
    * Set the value for `TWITTER_ACCESS_TOKEN`
    * Set the value for `TWITTER_ACCESS_TOKEN_SECRET`
    * Set the value for `TWITTER_USER_NAME` to your user name
* Commit your changes with `git add .; git commit -m "Configure Twitter"`
* Deploy Little-Corner to Heroku with `git push heroku master`
