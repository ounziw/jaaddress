<?php

/* ================================================================ *
ajaxzip3.js ---- AjaxZip3 郵便番号→住所変換ライブラリ

    Copyright (c) 2008 Ninkigumi Co.,Ltd.
http://code.google.com/p/ajaxzip3/

    Copyright (c) 2006-2007 Kawasaki Yusuke <u-suke [at] kawa.net>
http://www.kawa.net/works/ajax/AjaxZip2/AjaxZip2.html

    Permission is hereby granted, free of charge, to any person
    obtaining a copy of this software and associated documentation
    files (the "Software"), to deal in the Software without
    restriction, including without limitation the rights to use,
    copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following
    conditions:

    The above copyright notice and this permission notice shall be
    included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
    EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
    OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
    HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
                          WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
    OTHER DEALINGS IN THE SOFTWARE.
* ================================================================ */

$config = \Config::load('noviusos_form::metadata', true);

if ($config['ajaxzip']) {
    \Nos\Nos::main_controller()->addJavascript('static/apps/noviusos_templates_basic/js/jquery.js');

    // different js for SSL/not SSL
    if ($config['ssl']) {
        \Nos\Nos::main_controller()->addJavascript('https://ajaxzip3.googlecode.com/    svn/trunk/ajaxzip3/ajaxzip3-https.js');
    } else {
        \Nos\Nos::main_controller()->addJavascript('http://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3.js');
    }

    // different js for two boxes(3-4) format / one box 7 format
    if ($config['zip'] === 'two') {
        $js = <<<EOS
jQuery(document).ready(function($){
    $("#zip22").keyup(function(){
        var zip1 = $("#zip21").attr('name');
        var zip2 = $("#zip22").attr('name');
        var pref = $("#pref21").attr('name');
        var address = $("#addr21").attr('name');
        var street = $("#strt21").attr('name');
        AjaxZip3.zip2addr(zip1, zip2, pref, address, street);
    });
});
EOS;
    } else {
        $js = <<<EOS
jQuery(document).ready(function($){
    $("#zip22").keyup(function(){
        var zip = $("#zip22").attr('name');
        var pref = $("#pref21").attr('name');
        var address = $("#addr21").attr('name');
        var street = $("#strt21").attr('name');
        AjaxZip3.zip2addr(zip, '', pref, address, street);
    });
});
EOS;
    }
    \Nos\Nos::main_controller()->addJavascriptInline($js);

} // if ($config['ajaxzip'])
include APPPATH . 'applications/noviusos_form/views/foundation.view.php';

