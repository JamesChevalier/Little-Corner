class BlogController < ApplicationController

  def index
    @feed = SimpleRSS.parse( open("#{BLOG_FEED_URL}") )
  end

end
