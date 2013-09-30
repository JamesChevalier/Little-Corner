# brakeman

[Brakeman](http://brakemanscanner.org/) is an open source vulnerability scanner specifically designed for Ruby on Rails applications. It statically analyzes Rails application code to find security issues at any stage of development.

To run it, run `brakeman -o coverage/brakeman-report.html` in the Rails project directory, then open the `coverage/brakeman-report.html` file in your browser.


# bundler-audit

[bundler-audit](https://github.com/postmodern/bundler-audit) provides patch-level verification for Bundled apps. It checks for vulnerable versions of gems in `Gemfile.lock`, and prints advisory information based on what it finds.

To run it, run `bundle-audit` in the Rails project directory.


# mailcatcher

The project is configured to use [mailcatcher](http://mailcatcher.me) by default. This lets you view mail being sent by the app in the browser. To use mailcatcher...

#### One time setup:

* `rvm default@mailcatcher --create`
* `gem install mailcatcher`
* `rvm wrapper default@mailcatcher --no-prefix mailcatcher catchmail`

#### Each use:

* `mailcatcher`
* Go to [http://localhost:1080](http://localhost:1080)
* Perform actions that produce emails
* [http://localhost:1080](http://localhost:1080) will automatically display the incoming email & provide notifications if you have Growl installed

#### To use Gmail instead:

* Pause for a moment to question all of your life decisions
* Swap the 'config.action_mailer.smtp_settings' line commenting in `config/environments/development.rb`
* Restart Rails
* Live in constant fear, at the grimy seam of panic & worry, that your mail tests are being sent to everyone everywhere ever


# metric_fu

[metric_fu](http://metric-fu.rubyforge.org/) is a gem that checks your Rails app against a while pile of best practices.

To run it, run `metric_fu` in the Rails project directory. It will automatically open its results in a browser.


# rubocop

[rubocop](https://github.com/bbatsov/rubocop) is a gem that checks your Rails app against the [Ruby Style Guide](https://github.com/bbatsov/ruby-style-guide).

To run it, run `rubocop` in the Rails project directory.


# simplecov

[SimpleCov](https://github.com/colszowka/simplecov) is a code coverage analysis tool for Ruby.

To run it, run `rspec` in the Rails project directory, then open the `coverage/index.html` file in your browser.
