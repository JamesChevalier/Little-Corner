require 'spec_helper'

describe TwitterController do

  describe 'GET index' do
    it 'renders index' do
      get :index
      response.should be_success
    end
  end

end
