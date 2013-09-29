# Connects to Untappgd via API
class UntappdController < ApplicationController
  def index
    @checkins = Untappd::User.feed(UNTAPPD_USER_NAME)
    @badges   = Untappd::User.badges(UNTAPPD_USER_NAME)
  end
end
