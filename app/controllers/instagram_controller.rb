# Connects to Instagram via API
class InstagramController < ApplicationController

  def callback
    if INSTAGRAM_ACCESS_TOKEN.blank?
      response               = Instagram.get_access_token(params[:code], :redirect_uri => INSTAGRAM_CALLBACK_URL)
      session[:access_token] = response.access_token
    else
      redirect_to instagram_url
    end
  end

  def connect
    if INSTAGRAM_ACCESS_TOKEN.blank?
      redirect_to Instagram.authorize_url(:redirect_uri => INSTAGRAM_CALLBACK_URL)
    else
      redirect_to instagram_url
    end
  end

  def index
    @instagram_photos = Rails.cache.fetch('instagram_photos', expires_in: 12.hours, race_condition_ttl: 10) do
      Instagram.user_recent_media(user: INSTAGRAM_USER, access_token: INSTAGRAM_ACCESS_TOKEN)
    end
    @instagram_likes  = Rails.cache.fetch('instagram_likes', expires_in: 12.hours, race_condition_ttl: 10) do
      Instagram.user_liked_media(user: INSTAGRAM_USER, access_token: INSTAGRAM_ACCESS_TOKEN)
    end
  end

end
