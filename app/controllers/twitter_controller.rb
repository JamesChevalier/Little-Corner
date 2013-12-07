# Connects to Twitter via API
class TwitterController < ApplicationController
  def index
    @timeline  = Rails.cache.fetch('timeline', expires_in: 1.hour, race_condition_ttl: 10) do
      client = Twitter::REST::Client.new do |config|
        config.consumer_key        = TWITTER_CONSUMER_KEY
        config.consumer_secret     = TWITTER_CONSUMER_SECRET
        config.access_token        = TWITTER_ACCESS_TOKEN
        config.access_token_secret = TWITTER_ACCESS_TOKEN_SECRET
      end

      client.user_timeline(TWITTER_USER_NAME)
    end
    @favorites = Rails.cache.fetch('favorites', expires_in: 1.hour, race_condition_ttl: 10) do
      client = Twitter::REST::Client.new do |config|
        config.consumer_key        = TWITTER_CONSUMER_KEY
        config.consumer_secret     = TWITTER_CONSUMER_SECRET
        config.access_token        = TWITTER_ACCESS_TOKEN
        config.access_token_secret = TWITTER_ACCESS_TOKEN_SECRET
      end

      client.favorites(TWITTER_USER_NAME)
    end
  end
end
