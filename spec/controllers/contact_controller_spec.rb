require 'spec_helper'

describe ContactController do

  describe "GET index" do
    it "renders index" do
      get :index
      response.should be_success
    end
  end

  describe "POST index" do
    it "redirects to contact page" do
      post :index, {:contact_form => {:email => '', :name => '', :message => ''}}
      response.should redirect_to(contact_url)
    end
  end

end
