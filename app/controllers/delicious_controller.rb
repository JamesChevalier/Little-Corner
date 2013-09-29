# Connects to Delicious via RSS
class DeliciousController < ApplicationController
  def index
    @feed = Feedzirra::Feed.fetch_and_parse(DELICIOUS_FEED_URL)
  end
end
