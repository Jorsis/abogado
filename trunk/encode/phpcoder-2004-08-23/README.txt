What is PHPCoder?

PHPCoder is a web based front-end to the Turck MMCache
<http://www.turcksoft.com/en/e_mmc.htm> encoding functions, which are
similar to the Zend Encoder product.

*Turck MMCache* is a free open source PHP accelerator, optimizer,
encoder and dynamic content cache for PHP. It increases performance of
PHP scripts by caching them in compiled state, so that the overhead of
compiling is almost completely eliminated. Also it uses some
optimizations to speed up execution of PHP scripts. *Turck MMCache*
typically reduces server load and increases the speed of your PHP code
by 1-10 times.

PHPCoder enables you to encode your PHP scripts and applications into
non reversible byte-code, thus preventing users of your programs from
viewing or alterting the source code while having full functionality.
Another excellent use for PHPCoder is to encode your applications PHP
configuration files, that way someone viewing your source code does not
see your databae login and password information.

In addition to encoding PHP scripts PHPCoder allows you to set
restrictions on the encoded scripts, you can lock a script to a
particular server IP address, server host name, visitor IP, or even
place a time limit on the script so it will expire after x amount of
time.  PHP Coder also allows you to specify Text, HTML or PHP code that
should be prepended and appended to each file before it is encoded,
allowing you to easily and securely implement your own licensing scheme.

To use your encoded scripts your clients simply install the free Turck
MMCache <http://www.turcksoft.com/en/e_mmc.htm> (available on Windows
and Unix/Linux) or the Turck Loader
<http://www.turcksoft.com/en/e_mmc.htm>.

Downloading PHPCoder

The latest version of PHP coder can be downloaded at
http://phpcoder.shadonet.com/downloads


Installing PHPCoder

Requirements:

Turck MMCache <http://www.turcksoft.com/en/e_mmc.htm> be installed
(available on Windows and Unix/Linux)
PHP >= 4.1 (4.3.x highly recommended, 4.1 required)
Apache 1.3/2 or other PHP compatable web-server

Installation Steps:

These installation steps should be executed on the command line, you can
accomplish them through FTP clients but this document does not cover the
steps to do that.
Commands you should type are in italics.

1. Download the latest version of PHPCoder from
http://phpcoder.shadonet.com/downloads
2. Extract the phpcoder-x.tgz file by issuing the command: tar zxf
phpcoder-x.tgz (replace phpcoder-x.tgz with the file you downloaded)
3. Enter the phpcoder directory by issuing the: cd phpcoder command
4. Create the files directory and make it writable: mkdir files; chmod
777 files
5. Create the encoded directory and make it writable: mkdir encoded;
chmod 777 encoded

PHP Coder should now be installed, to encode programs/scripts simply
place them in the files directory and then go to http://yoururl/phpcoder
and run the encoder, your encoded scripts will be in the encoded
directory.  For more inforamtion see Using PHPCoder.


Using PHPCoder

Once you have installed PHPCoder following the installation steps above
it is easy to begin encoding scripts.

First place the script that you want to be encoded in the files
directory (you can do this via FTP but all directories must be chmod 777).
Next telnet into your hosting providor and execute the command chmod -R
777 /path/to/phpcoder/files
Then visit http://yourdomain/phpcoder, set your options and press the
submit button.

Note that you must chmod -R 777 your files directory because PHPCoder
will cd into each directory and write a temporary file while the
directory is being encoded, this is so relative paths in your
application are not broken by the encoding process.

Options:

The PHPCoder web page has several options you can set before you encode
your files, here is a brief run down on some of them:

Recursive Encoding: When this is set to Yes PHPCoder will encode files
in all the subdirectories of the files directory, this is enabled by
default and should be set to Yes unless you have a good reason to set it
to no.
Copy Skipped Files: When this is set to Yes PHPCoder will copy non PHP
source files to the encoded directory, this avoids breaking apps and
makes it so it is not necessary to merge encoded/unencoded files manually.

Pre Content Code: This is Text, HTML, or PHP code (must be enclosed in
<?php ?> ) content that will be prepended to each PHP source file before
it is encoded, this is an excellent place to put licensing code, etc.
Post Content Code: This is Text, HTML, or PHP code (must be encloded in
<?php ?>) content that will be appended to each PHP source file before
it is encoded, this is a good place for copyright, etc.


Restrictions:

PHPCoder allows you to set several options that restrict the execution
of the encoded PHP scripts.  These options range from locking to an IP
or to a particular amount of time or all of the above.

Restrict Visitor's IP: This can be a single IP or a comma seperated list
of IP addresse; if it is set only these ip addresses can view the
script, this is a nice feature for a demo that is not feature restricted
but is limited to one visitor IP.  In a pinch it could be used for a
security measure though this is not recommended.

Restrict Server IP: This can be a single IP or a comma seperated list of
IP addresesses; if it is set scripts can only be served from these IPs,
this enables you to lock the script to a particular server(s) by
restricting the IP.  This is similar to lock server name but this will
prevent the user from moving the script where Restrict Server Name will
allow them to move the script should their server or hosting change, for
this reason Restrict Server Name is encouraged.

Restrict Server Name: This can be a single server name or a comma
seperated list of server names; If this is set the script can only be
served from one of these server names, example shadonet.com,yahoo.com.
This enables you to lock a script to a particular domain name(s) but
allow the user to move the script to a new web host or server as long as
it is being served from the same domain.

Expiring Scripts: When a selection is made for Script Expires In: the
script will expire after the specified amount of time has passed, for
example 5 seconds, 1 week, 2 months, etc.  This can be used in
conjunction with any of the other restrictions.  Alternatively you can
type in the time when the script should expire, for example 01/01/2004
will make the script expire January 1st, 2004.  This field uses PHP's
strtotime format for the time, see http://www.php.net/strtotime for more
information.


PHPCoder License

PHPCoder is distributed under the BSD License, a copy of the BSD License
is included with the PHPCoder download and also at the top of all source
files.  In cases where this document is not updated the license in
LICENSE and then source files shall apply.

PHP Coder is distributed under the BSD License below, for more
information about the BSD License see
http://www.opensource.org/licenses/bsd-license.php.

Copyright (c) 2003, Jason Sheets <jsheets@shadonet.com>, Idaho Image
Works LLC
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright
notice, this list of conditions and the following disclaimer.

    * Redistributions in binary form must reproduce the above copyright
notice, this list of conditions and the following disclaimer in the
documentation and/or other materials provided with the distribution.

    * Neither the name of the Idaho Image Works LLC nor the names of its
contributors may be used to endorse or promote products derived from
this software without specific prior written permission.


THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED
TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER
OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

Contacting the Author (Bug Reports, Feature Requests, etc.)

I can be contacted via e-mail via jsheets@shadonet.com, please put
PHPCoder in the subject for efficient mail identification.  Feel free to
send bug reports, feature requests, patches, etc to me.  This software
was developed on Windows and FreeBSD and tested on Windows, Linux and
FreeBSD.  I will make reasonable efforts to support and develop PHPCoder
but it is developed in my free time for free (it already accomplishes
what I want it to do).




