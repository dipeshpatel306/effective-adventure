HIPAA Secure Now! & PII Protect
=======

This repository contains the code base for the HIPAA Secure Now! and PII Protect CakePHP web apps, the production versions of which can be found here:

[HSN](https://compliance.hipaasecurenow.com) - HIPAA Secure Now!
[PII Protect](https://www.pii-protect.com) - PII Protect (aka Breach Secure Now (BSN))

Organization
------------

There are two branches in this repository: `master` and `bsn`. `master` is the original HSN codebase and the code currently running in production for HIPAA Secure Now! `bsn` was branched off of master when PII Protect was created. The `bsn` branch is capable of running both the hsn and bsn apps which share mostly common code. Right now only the PII Protect production site is built off the bsn branch...the intent was to eventually build HSN from this codebase as well but that hasn't been carried out yet. 

Development Environment Setup
-----------------------------

### Prerequisites

You'll need to install a web server (Apache is preferred), MySQL, and PHP. [XAMPP](https://www.apachefriends.org) is an easy to setup bundle of these things. For an IDE, I prefer [Aptana Studio](http://www.aptana.com).

### Local Setup

All of the commands below assume a Unix-like shell (although everything can also be done from the Windows command line) and a working base directory of `~/dev`.

Do the below to run HSN on the `master` branch:

1. First clone the git repository:

    $ cd ~/dev
    $ git clone https://github.com/HIPAASecureNow/hsn-core.git

2. Setup to local HSN database:

    $ cd ~/dev/hsn-core/app
    $ mysql -u root -e "create database hipaadev;"
    $ sudo Console/cake schema create
    $ mysql -u root -p hipaadev < Config/Schema/seed.sql

3. Start apache with `DocumentRoot` set to `~/dev/hsn-core/app/webroot` (edit it in apache's `httpd.conf`).

4. Access `localhost` in your web browser and you should see the app come up. If you get an error about `_cake_core_ cache` not being able to write a directory, try chaning permissions on `app/tmp` to full rw for all users, e.g.

   $ chmod -R 777 ~/dev/hsn-core/app/tmp

The local app initializes with just one admin account `admin@hipaa.com/trustno1` and some necessary seed data. From there you can create other clients and add data from inside the app.

For running BSN or HSN against the `bsn` branch, do the following:

1. From your already cloned git repository, switch to the bsn branch:

    $ git checkout -b bsn origin/bsn
    
2. Setup the local PII Protect database:

    $ cd ~/dev/hsn-core/bsn/app
    $ mysql -u root -e "create database piiprotect;"
    $ sudo Console/cake schema create
    $ mysql -u root -p piiprotect < Config/Schema/seed.sql

3. Start apache with `DocumentRoot` set to `~/dev/hsn-core/webroot` (edit it in apache's `httpd.conf`). Note the difference from the path for running against `master` (no `app` directory).

4. Access `localhost` in your web browser and you should see the app come up. Again if you get the error about `_cake_core_ cache`, modify permissions:

    $ chmod -R 777 ~/dev/hsn-core/hsn/app/tmp
    $ chmod -R 777 ~/dev/hsn-core/bsn/app/tmp

Admin account login is again `admin@hipaa.com/trustno1`. To toggle between running BSN and HSN replace `~/dev/hsn-core/webroot/index.php` with either `index.php.hsn` or `index.php.bsn` in the same directory.

Some Handy Links
----------------

[CakePHP](http://www.cakephp.org) - The rapid development PHP framework

[Cookbook](http://book.cakephp.org) - THE Cake user documentation; start learning here!

[Plugins](http://plugins.cakephp.org/) - A repository of extensions to the framework

[The Bakery](http://bakery.cakephp.org) - Tips, tutorials and articles

[API](http://api.cakephp.org) - A reference to Cake's classes

[CakePHP TV](http://tv.cakephp.org) - Screen casts from events and video tutorials

[The Cake Software Foundation](http://cakefoundation.org/) - promoting development related to CakePHP

Get Support!
------------

[Our Google Group](http://groups.google.com/group/cake-php) - community mailing list and forum

[#cakephp](http://webchat.freenode.net/?channels=#cakephp) on irc.freenode.net - Come chat with us, we have cake.

[Q & A](http://ask.cakephp.org/) - Ask questions here, all questions welcome

[Lighthouse](http://cakephp.lighthouseapp.com/) - Got issues? Please tell us!

[![Bake Status](https://secure.travis-ci.org/cakephp/cakephp.png?branch=master)](http://travis-ci.org/cakephp/cakephp)

![Cake Power](https://raw.github.com/cakephp/cakephp/master/lib/Cake/Console/Templates/skel/webroot/img/cake.power.gif)
