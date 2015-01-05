A Naive MVC Blog
================

It is live on https://naiveblog.herokuapp.com 
Thank Sean for recommending this hosting service!

This is a php mvc blog for the 2014 CVWO assignment 1. 

* Name: Liu Xinan 
* Matric No.: A0130195M

### Dependencies 
Requires *AMP stack with PHP 5.5+

### Installation
1. Import the dbdump to the database
2. Rename config/config.php.dist to config/config.php
3. Enter the db credentials in config/config.php

If you are NOT placing everything in the document root, you might need to modify the .htaccess files, as well as the ROOT path constant defined in /public/index.php to make it work. 

Note that the two .htaccess files are important as I use it to enable mod_rewrite. 
For more info, please read manual.pdf

### Database Dump
A database dump [dbdump.sql](dbdump.sql) is provided. 

### Short Write Up
See [manual.pdf](manual.pdf)