class FlickrController < ApplicationController

  def index
    FlickRaw.api_key = FLICKR_API_KEY
    FlickRaw.shared_secret = FLICKR_API_SECRET

    @flickr_photos = flickr.people.getPublicPhotos(:user_id => FLICKR_USER_ID, :per_page => 20)
  end

end
