Phalcon Tutorial
================

Phalcon PHP is a web framework delivered as a C extension providing high
performance and lower resource consumption.

This is a very simple tutorial to understand the basis of work with Phalcon.

Check out a explanation article: http://phalconphp.com/documentation/tutorial

Running on CloudFoundry
=======================

Here are the changes for running the standrd Phalcon Tutorial app on CloudFoundry.

  - [Pull credentials from VCAP_SERVICES](https://github.com/cloudfoundry-samples/cf-ex-phalcon/blob/master/public/index.php#L19) (use json_decode), setup \Phalcon\Db\Adapter\Pdo\Mysql or other with them.
  - Remove `.htaccess` files.  These are not needed with the [php-buildpack].
  - Add a manifest.yml file.  Not strictly necessary, but makes pushing easier.
  - Add a `.bp-config/options.json` file.  This is necessary to enable the phalcon extension.
  - Add `.bp-config/httpd/extra/httpd-php.conf` to override the build pack's default HTTPD's PHP configuration with one that will provide us with pretty url's for Phalcon.  This is essentially the rules that were in the `.htaccess` files combined into this file (with some slight adjustments).


[php-buildpack]: https://github.com/cloudfoundry/php-buildpack
