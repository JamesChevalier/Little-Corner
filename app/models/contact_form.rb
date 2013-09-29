# Provides email contact functionality
class ContactForm < MailForm::Base
  attribute :name,    validate: true
  attribute :email,   validate: /\A([\w\.%\+\-]+)@([\w\-]+\.)+([\w]{2,})\z/i
  attribute :message, validate: true

  def headers
    { subject: CONTACT_SUBJECT,
      to: CONTACT_TO,
      from: %("#{name}" <#{email}>) }
  end
end
