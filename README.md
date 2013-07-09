jpaddress
=========

Address form of Japan


This is an extension for Novius OS form.

This allows to add a set of forms (zip1, zip2, prefecture, address1, and address2) with one click.


Usage
=====

Put metadata.config.php into local/config/apps/noviusos_form/controller folder.
Put form.config.php into local/config/apps/noviusos_form/controller/admin folder.
Put jaform.lang.php into local/lang/ja folder.
(If these folders do not exist, please create them.)

[Novius OS Form application Demonstration] (http://www.youtube.com/watch?v=aeJNPqvsJV8) Link to demonstartion video on YouTube.

Options
=======
In metadata.config.php, you can configure:

 'ajaxzip' ... whether you use ajaxzip3(inserts the prefecture and address when you enter the zipcode) or not.

 'ssl' ... whether your form(s) is SSL or not.

 'zip' ... the zipcode textbox is 'two' (two boxes, %3d-%4d style) or 'one' (one box, %7d style).

License
=======

AGPL ver.3.0 or later


External Library
================

[ajaxzip3 by 株式会社人気組](https://code.google.com/p/ajaxzip3/) Original version is distributed under MIT.
