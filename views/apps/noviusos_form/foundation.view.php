<?php
\Nos\Nos::main_controller()->addJavascript('static/apps/noviusos_templates_basic/js/jquery.js');

// for HTTP
\Nos\Nos::main_controller()->addJavascript('http://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3.js');
// for HTTPS
// \Nos\Nos::main_controller()->addJavascript('https://ajaxzip3.googlecode.com/svn/trunk/ajaxzip3/ajaxzip3-https.js');


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
\Nos\Nos::main_controller()->addJavascriptInline($js);

include APPPATH . 'applications/noviusos_form/views/foundation.view.php';
