# Connects to LastFM via API
class LastfmController < ApplicationController
  def index
    @top_artists = Rails.cache.fetch('top_artists', expires_in: 12.hours, race_condition_ttl: 10) do
      lastfm = Lastfm.new(LAST_FM_API_KEY, LAST_FM_API_SECRET)
      lastfm.user.get_top_artists(user: LAST_FM_USER, api_key: LAST_FM_API_KEY)
    end
  end
end
