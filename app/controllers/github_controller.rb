# Connects to Github via API
class GithubController < ApplicationController
  def index
    @github_repositories = Rails.cache.fetch('github_repositories', expires_in: 12.hours, race_condition_ttl: 10) do
      uri          = uri = URI.parse(GITHUB_URL)
      http         = Net::HTTP.new(uri.host, uri.port)
      http.use_ssl = true
      request      = Net::HTTP::Get.new(uri.request_uri, { 'Authentication' => 'token' })
      response     = http.request(request)
      JSON.parse(response.body)
    end
  end
end
