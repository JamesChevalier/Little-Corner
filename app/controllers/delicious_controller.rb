# Connects to Delicious via RSS
class DeliciousController < ApplicationController
  def index
    @feed = Rails.cache.fetch('delicious_feed', expires_in: 12.hours, race_condition_ttl: 10) do
      Feedjira::Feed.fetch_and_parse(DELICIOUS_FEED_URL)
    end
  end
end
