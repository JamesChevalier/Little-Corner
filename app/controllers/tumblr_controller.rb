# Connects to Tumblr via RSS
class TumblrController < ApplicationController
  def index
    @feed = Rails.cache.fetch('tumblr_feed', expires_in: 12.hours, race_condition_ttl: 10) do
      Feedzirra::Feed.fetch_and_parse(TUMBLR_FEED_URL)
    end
  end
end
