class BlogController < ApplicationController

  def index
    @feed = Feedzirra::Feed.fetch_and_parse(BLOG_FEED_URL)
  end

end
