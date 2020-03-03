# Phalcon Tutorial

Phalcon PHP is a web framework delivered as a C extension providing high performance and lower resource consumption.

This explains how to run the [Phalcon Basic Tutorial](https://docs.phalcon.io/4.0/en/tutorial-basic) on Cloud Foundry.

To get started, either complete the basic tutorial manually or [download the final product(https://github.com/phalcon/tutorial). In either case, when done you should have a directory that looks like this:

```bash
total 24
-rw-r--r--  1 piccolo  wheel  1244 Mar  3 16:10 README.md
drwxr-xr-x@ 5 piccolo  staff   160 Nov 22  2018 app
-rw-r--r--@ 1 piccolo  staff   614 Nov 22  2018 boxfile.yml
drwxr-xr-x@ 4 piccolo  staff   128 Nov 22  2018 docs
-rw-r--r--  1 piccolo  wheel   102 Mar  3 16:01 manifest.yml
drwxr-xr-x@ 4 piccolo  staff   128 Nov 22  2018 public
drwxr-xr-x@ 4 piccolo  staff   128 Nov 22  2018 storage
```

# Running on CloudFoundry

To run on Cloud Foundry, we need to make the following changes:

1. If you don't have one already, create a MySQL service.  With Pivotal Web Services, the following command will create a free MySQL database through [ClearDb].

   ```bash
   cf create-service cleardb spark mysql
   ```

1. If you downloaded the complete code, you need to create the `users` table as [described in the tutorial](https://docs.phalcon.io/4.0/en/tutorial-basic#creating-a-model). You may use [PHPMyAdmin](https://github.com/cloudfoundry-samples/cf-ex-phpmyadmin/tree/php-cnb-compatible).

1. Edit `public/index.php`, change the line `"dbname"   => "gonano"` to be `"dbname"   => getenv('DATA_MYSQL_NAME')`. This will load the DB name from the environment variables, like the other DB configuration.

1. Run `cf push` to deploy the application on Cloud Foundry.

The application should pull it's database configuration from environment variables, which are set in the `.profile` script. The values of these pull dynamically from `VCAP_SERVICES` which is populated by the platform with information from all bound services.

[php-buildpack]: https://github.com/cloudfoundry/php-buildpack
