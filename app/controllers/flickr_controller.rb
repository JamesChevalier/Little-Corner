# Connects to Flickr via API
class FlickrController < ApplicationController
  def index
    @feed = Rails.cache.fetch('flickr_feed', expires_in: 12.hours, race_condition_ttl: 10) do
      FlickRaw.api_key       = FLICKR_API_KEY
      FlickRaw.shared_secret = FLICKR_API_SECRET
      flickr.people.getPublicPhotos(user_id: FLICKR_USER_ID, per_page: 20)
    end
  end
end
