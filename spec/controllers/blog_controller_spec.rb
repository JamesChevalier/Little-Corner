require 'spec_helper'

describe BlogController do

  describe "GET index" do
    context "with valid configuration" do
      it "renders index" do
        get :index
        response.should be_success
      end

      it "has a valid @feed" do
        @feed = Feedzirra::Feed.fetch_and_parse(BLOG_FEED_URL)
        get :index, {}
        assigns(:feed).should eq(@feed) # It can't because each Feedzirra call is hashed differently
      end
    end

    context "without valid configuration" do
      it "renders index" do
        get :index
        response.should be_success
      end

      it "does not have a valid @feed" do
        get :index, {}
        assigns(:feed).should eq(0)
      end
    end
  end

end
