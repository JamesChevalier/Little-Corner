class TumblrController < ApplicationController

  def index
    @feed = SimpleRSS.parse( open("#{TUMBLR_FEED_URL}") )
  end

end
