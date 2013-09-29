# Connects to Untappgd via API
class UntappdController < ApplicationController
  def index
    @checkins = Rails.cache.fetch('checkins', expires_in: 1.hour, race_condition_ttl: 10) do
      Untappd::User.feed(UNTAPPD_USER_NAME)
    end
    @badges   = Rails.cache.fetch('badges', expires_in: 1.hour, race_condition_ttl: 10) do
      Untappd::User.badges(UNTAPPD_USER_NAME)
    end
  end
end
