# Accepts emails via form on site
class ContactController < ApplicationController
  def index
    if request.post?
      submission = params['contact_form']
      @message   = ContactForm.new(email: submission['email'], name: submission['name'], message: submission['message'])
      if @message.valid?
        @message.deliver
        redirect_to root_url, notice: 'Thank you for your message!'
      else
        flash[:alert] = 'Something about your message was bad. Did you forget a piece of it?'
        render :contact
      end
    else
      @message = ContactForm.new
    end
  end
end
