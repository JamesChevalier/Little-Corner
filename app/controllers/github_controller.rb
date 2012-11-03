class GithubController < ApplicationController

  def index
    uri = uri = URI.parse(GITHUB_URL)
    http = Net::HTTP.new(uri.host, uri.port)
    http.use_ssl = true
    headers = { "Authentication" => "token" }
    request = Net::HTTP::Get.new(uri.request_uri, headers)
    response = http.request(request)
    @github_repositories = JSON.parse(response.body)
  end

end
