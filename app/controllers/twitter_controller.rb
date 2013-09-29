# Connects to Twitter via API
class TwitterController < ApplicationController
  def index
    @timeline  = Rails.cache.fetch('timeline', expires_in: 1.hour, race_condition_ttl: 10) do
      Twitter.user_timeline(TWITTER_USER_NAME)
    end
    @favorites = Rails.cache.fetch('favorites', expires_in: 1.hour, race_condition_ttl: 10) do
      Twitter.favorites(TWITTER_USER_NAME)
    end
  end
end
