# Connects to Soundcloud via API
class SoundcloudController < ApplicationController
  def index
    client      = Soundcloud.new(:client_id => SOUNDCLOUD_CLIENT_ID)
    tracks      = client.get("/users/#{SOUNDCLOUD_USER_NAME}/tracks", :limit => 10)
    @soundcloud = []

    tracks.each do |t|
      embed_info = client.get('/oembed', :url => t.permalink_url)
      @soundcloud << embed_info['html']
    end
  end
end
