require 'test_helper'

class LastfmControllerTest < ActionController::TestCase
  test "should get index" do
    get :index
    assert_response :success
  end

end
