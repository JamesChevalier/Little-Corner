# Connects to Twitter via API
class TwitterController < ApplicationController
  def index
    @timeline  = Twitter.user_timeline(TWITTER_USER_NAME)
    @favorites = Twitter.favorites(TWITTER_USER_NAME)
  end
end
