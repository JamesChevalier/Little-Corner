# Connects to Blog via RSS
class BlogController < ApplicationController
  def index
    @feed = Rails.cache.fetch('blog_feed', expires_in: 12.hours, race_condition_ttl: 10) do
      Feedjira::Feed.fetch_and_parse(BLOG_FEED_URL)
    end
  end
end
