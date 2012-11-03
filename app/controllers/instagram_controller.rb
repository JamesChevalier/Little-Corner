class InstagramController < ApplicationController

  def callback
    unless INSTAGRAM_ACCESS_TOKEN.blank?
      redirect_to "/instagram"
    else
      response = Instagram.get_access_token(params[:code], :redirect_uri => INSTAGRAM_CALLBACK_URL)
      session[:access_token] = response.access_token
    end
  end

  def connect
    unless INSTAGRAM_ACCESS_TOKEN.blank?
      redirect_to "/instagram"
    else
      redirect_to Instagram.authorize_url(:redirect_uri => INSTAGRAM_CALLBACK_URL)
    end
  end

  def index
    @instagram_photos = Instagram.user_recent_media(:user => INSTAGRAM_USER, :access_token => INSTAGRAM_ACCESS_TOKEN)
    @instagram_likes = Instagram.user_liked_media(:user => INSTAGRAM_USER, :access_token => INSTAGRAM_ACCESS_TOKEN)
  end

end
