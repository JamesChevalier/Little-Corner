require 'spec_helper'

describe FoursquareController do

  describe "GET index" do
    it "renders index" do
      get :index
      response.should be_success
    end
  end

  describe "GET callback" do
    it "renders callback" do
      get :callback
      response.should redirect_to(foursquare_url)
    end
  end

  describe "GET connect" do
    it "renders connect" do
      get :connect
      response.should redirect_to(foursquare_url)
    end
  end

end
