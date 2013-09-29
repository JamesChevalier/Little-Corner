# Connects to LastFM via API
class LastfmController < ApplicationController
  def index
    lastfm       = Lastfm.new(LAST_FM_API_KEY, LAST_FM_API_SECRET)
    @top_artists = lastfm.user.get_top_artists(:user => LAST_FM_USER, :api_key => LAST_FM_API_KEY)
  end
end
