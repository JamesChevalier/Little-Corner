class TumblrController < ApplicationController

  def index

    @tumblr_feed = Feedzirra::Feed.fetch_and_parse(TUMBLR_FEED_URL)

  end

end
