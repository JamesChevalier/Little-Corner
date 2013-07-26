class ContactController < ApplicationController
  def index
    if request.post?
      m = ContactForm.new(:email => params['contact_form']['email'], :name => params['contact_form']['name'], :message => params['contact_form']['message'])
      m.valid?
      m.deliver
      redirect_to contact_url
    else
      @message = ContactForm.new
    end
  end
end
