require 'spec_helper'

describe InstagramController do

  describe 'GET index' do
    it 'renders index' do
      get :index
      response.should be_success
    end
  end

  describe 'GET callback' do
    it 'renders callback' do
      get :callback
      response.should redirect_to(instagram_url)
    end
  end

  describe 'GET connect' do
    it 'renders connect' do
      get :connect
      response.should redirect_to(instagram_url)
    end
  end

end
