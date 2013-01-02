class DeliciousController < ApplicationController

  def index
    @feed = SimpleRSS.parse( open("#{DELICIOUS_FEED_URL}") )
  end

end
