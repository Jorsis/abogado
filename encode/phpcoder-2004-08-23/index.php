<?php
/**
This code distributed under the BSD License below, for more information about the BSD License see http://www.opensource.org/licenses/bsd-license.php.

Copyright (c) 2003, Jason Sheets <jsheets@shadonet.com>, Idaho Image Works LLC
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

    * Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

    * Neither the name of Idaho Image Works LLC nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.


THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/

   // get coder class
   require_once('./coder-class.php');
   $coder = new coder;

   // set directory recursion, default to true
   $coder->recursive = (isset($_REQUEST['recursive'])) ? $_REQUEST['recursive'] : true;

   // determine if we should copy files that don't get encoded, on by default, turning this off will break applications
   $coder->copy_skipped_files = (isset($_REQUEST['copy_skipped_files'])) ? $_REQUEST['copy_skipped_files'] : true;

   // set source and destination directories
   $coder->src_dir = (!empty($_REQUEST['source_dir'])) ? $coder->StripSlashes($_REQUEST['source_dir']) : getcwd() . '/files';
   $coder->dest_dir = (!empty($_REQUEST['destination_dir'])) ? $coder->StripSlashes($_REQUEST['destination_dir']) : getcwd() . '/encoded';

   // set file extensions
   if (!empty($_REQUEST['extentions'])) {
      // construct array from $_REQUEST['extensions'], deal with extension, space by removing spaces.
      $possible_extensions = explode(',', str_replace(' ', '', $_REQUEST['extentions']));

      if (is_array($possible_extensions)) {
         $coder->extensions = $possible_extensions;
      }

      unset($possible_extensions);
   }

   // set file extensions to skip
   if (!empty($_REQUEST['ignore_extentions'])) {
      $possible_extensions = explode(',', str_replace(' ', '', $_REQUEST['ignore_extentions']));

      if (is_array($possible_extensions)) {
         $coder->ignore_extensions = $possible_extensions;
      }

      unset($possible_extensions);
   }


   // set php pre and post content variables
   $coder->php_pre_content = (!empty($_REQUEST['php_pre_content'])) ? $coder->StripSlashes($_REQUEST['php_pre_content']) : '';
   $coder->php_post_content = (!empty($_REQUEST['php_post_content'])) ? $coder->StripSlashes($_REQUEST['php_post_content']) : '';
   
   // set restrictions up
   $coder->restrictions =
     (!empty($_REQUEST['restrictions']) && is_array($_REQUEST['restrictions'])) ?
     $_REQUEST['restrictions'] : array(
       'visitor_ip'       => NULL,
       'server_ip'        => NULL,
       'server_name'      => NULL,
       'expire_value'     => NULL,
       'expire_unit'      => NULL,
       'expire_english'   => NULL
     );

   // enable output buffering if we need to
   if (function_exists("ob_get_level")) {
     if (0 == ob_get_level()) {
        ob_start();
     }
    }


   // if form hasn't been submitted display it
   $coder->HtmlHeader();

   if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
      // if we have a user-entered timestamp make sure we are able to parse it using strtotime
      if (!empty($_REQUEST['restrictions']['expire_english']) && strtotime($_REQUEST['restrictions']['expire_english']) == '-1') {
        print '<span class="failfont"><blockquote><b>Unable to convert the user-entered expiration time into a timestamp, please check the format.</b></blockquote></span>';
      } else {
        // start encoding process
        print '<p><font size="+1"><b>Results:</b></font></p>';
        print '<p><blockquote>';
        $coder->Encode();
        print '</blockquote></p>';
      }
   }

   $coder->DisplayForm();
   print '<center><p><a href="http://turck-mmcache.sourceforge.net/">
   <img border="0" src="http://turck-mmcache.sourceforge.net/mmcache02.gif" alt="mmcache button graphic">
   </a></p></center>';
   $coder->HtmlFooter();
?>
