# Connects to Soundcloud via API
class SoundcloudController < ApplicationController
  def index
    @soundcloud = Rails.cache.fetch('soundcloud', expires_in: 12.hours, race_condition_ttl: 10) do
      client     = Soundcloud.new(client_id: SOUNDCLOUD_CLIENT_ID)
      tracks     = client.get("/users/#{SOUNDCLOUD_USER_NAME}/tracks", limit: 10)
      soundcloud = []

      tracks.each do |track|
        embed_info = client.get('/oembed', url: track.permalink_url)
        soundcloud << embed_info['html']
      end
      soundcloud
    end
  end
end
