# Site-wide Config
YOUR_NAME                    = ''
DOMAIN_NAME                  = '' # This must be the FQDN, for example google.com (with the "www." if required)
META_KEYWORDS                = ''
META_DESCRIPTION             = ''
SITE_DESCRIPTION             = ''
ENABLE_GOOGLE_ANALYTICS      = false
GOOGLE_ANALYTICS_PROPERTY_ID = ''
GRAVATAR_EMAIL_ADDRESS       = ''
ENABLE_WOOPRA                = false

# Blog Config
ENABLE_BLOG                  = false
BLOG_FEED_URL                = ''
BLOG_URL                     = ''

# Contact Config
ENABLE_CONTACT               = false
CONTACT_SUBJECT              = "[#{DOMAIN_NAME}] Contact Form" # This is the subject of the messages you will receive
CONTACT_TO                   = ''                              # This is where you will receive your messages
CONTACT_SMTP_ADDRESS         = ''                              # Set to "smtp.gmail.com" for Google Apps
CONTACT_SMTP_PORT            = 587                             # Set to 587 for Google Apps
CONTACT_DOMAIN               = DOMAIN_NAME                     # Set to "domain.tld" for Google Apps
CONTACT_USER_NAME            = ''                              # Set to "user@domain.tld" for Google Apps
CONTACT_PASSWORD             = ''
CONTACT_AUTHENTICATION_TYPE  = ''                              # Set to "plain" for Google Apps
CONTACT_ENABLE_STARTTLS_AUTO = true                            # Set to true for Google Apps

# Delicious Config
ENABLE_DELICIOUS             = false
DELICIOUS_USER_NAME          = ''

# Flickr Config
ENABLE_FLICKR                = false
FLICKR_API_KEY               = ''
FLICKR_API_SECRET            = ''
FLICKR_USER_ID               = ''
FLICKR_USER_NAME             = ''

# Foursquare Config
ENABLE_FOURSQUARE            = false
FOURSQUARE_CLIENT_ID         = ''
FOURSQUARE_CLIENT_SECRET     = ''
FOURSQUARE_OAUTH_TOKEN       = ''
FOURSQUARE_USER_NAME         = ''

# GitHub Config
ENABLE_GITHUB                = false
GITHUB_USER_NAME             = ''

# Instagram Config
ENABLE_INSTAGRAM             = false
INSTAGRAM_USER               = ''
INSTAGRAM_ACCESS_TOKEN       = ''
INSTAGRAM_CLIENT_ID          = ''
INSTAGRAM_CLIENT_SECRET      = ''

# Last.FM Config
ENABLE_LAST_FM               = false
LAST_FM_USER                 = ''
LAST_FM_API_KEY              = ''
LAST_FM_API_SECRET           = ''

# Projects Config
ENABLE_PROJECTS              = false

# Soundcloud Config
ENABLE_SOUNDCLOUD            = false
SOUNDCLOUD_CLIENT_ID         = ''
SOUNDCLOUD_USER_NAME         = ''

# Tumblr Config
ENABLE_TUMBLR                = false
TUMBLR_USER_NAME             = ''

# Twitter Config
ENABLE_TWITTER               = false
TWITTER_CONSUMER_KEY         = ''
TWITTER_CONSUMER_SECRET      = ''
TWITTER_ACCESS_TOKEN         = ''
TWITTER_ACCESS_TOKEN_SECRET  = ''
TWITTER_USER_NAME            = ''

# Untappd Config
ENABLE_UNTAPPD               = false
UNTAPPD_CLIENT_ID            = ''
UNTAPPD_CLIENT_SECRET        = ''
UNTAPPD_GMT_OFFSET           = ''
UNTAPPD_USER_NAME            = ''

#############################
# Do not edit below this line
require 'digest/md5'
require 'net/http'
DELICIOUS_FEED_URL           = "http://feeds.delicious.com/v2/rss/#{DELICIOUS_USER_NAME}?count=15"
FOURSQUARE_CALLBACK_URL      = "http://#{DOMAIN_NAME}/foursquare/callback"
GITHUB_URL                   = "https://api.github.com/users/#{GITHUB_USER_NAME}/repos"
GRAVATAR_URL                 = "http://www.gravatar.com/avatar/#{Digest::MD5.hexdigest(GRAVATAR_EMAIL_ADDRESS.downcase)}?d=http://robohash.org/#{URI.escape(YOUR_NAME)}.png?size=80x80&set=set3"
INSTAGRAM_CALLBACK_URL       = "http://#{DOMAIN_NAME}/instagram/callback"
TUMBLR_FEED_URL              = "http://#{TUMBLR_USER_NAME}.tumblr.com/rss"
UNTAPPD_OAUTH_REDIRECT_URL   = "http://#{DOMAIN_NAME}/untappd/callback"

# Load the rails application
require File.expand_path('../application', __FILE__)

# Initialize the rails application
LittleCorner::Application.initialize!
