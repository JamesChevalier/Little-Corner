class TwitterController < ApplicationController

  def index

    Twitter.configure do |config|
      config.consumer_key = TWITTER_CONSUMER_KEY
      config.consumer_secret = TWITTER_CONSUMER_SECRET
      config.oauth_token = TWITTER_ACCESS_TOKEN
      config.oauth_token_secret = TWITTER_ACCESS_TOKEN_SECRET
    end

    @timeline = Twitter.user_timeline(TWITTER_USER_NAME)
    @favorites = Twitter.favorites(TWITTER_USER_NAME)

  end

end
