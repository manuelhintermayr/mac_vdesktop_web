
<!--[if HTML5]><![endif]-->
<!doctype html>
<meta http-equiv="x-ua-compatible" content="IE=edge" />
<!--[if lt IE 7 ]> <html class="ie6 no-css3" lang="en-gb"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 no-css3" lang="en-gb"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 no-css3" lang="en-gb"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" lang="en-gb"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb"> <!--<![endif]-->
<head>
<!--[if !HTML5]>
  
<![endif]-->
  <meta charset="UTF-8">
  <title>Edit Calendar Entry</title>
  <link rel="icon" href="/i/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="/i/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/i/app_ui/css/Core.min.css?v=5.0.0.00.28" type="text/css" />
<link rel="stylesheet" href="/i/app_ui/css/Theme-Standard.min.css?v=5.0.0.00.28" type="text/css" />
<link rel="stylesheet" href="/i/libraries/jquery-ui/1.10.4/themes/base/jquery-ui.min.css?v=5.0.0.00.28" type="text/css" />

<link rel="stylesheet" href="/i/legacy_ui/css/5.0.min.css?v=5.0.0.00.28" type="text/css" />





<script type="text/javascript">
var htmldb_delete_message='Would you like to perform this delete action?';
</script>

<script type="text/javascript">
var apex_img_dir = "/i/", htmldb_Img_Dir = apex_img_dir;
</script>
<!--[if lt IE 9]><script type="text/javascript" src="/i/libraries/jquery/1.11.2/jquery-1.11.2.min.js?v=5.0.0.00.28"></script><![endif]-->
<!--[if gte IE 9]><!--><script type="text/javascript" src="/i/libraries/jquery/2.1.3/jquery-2.1.3.min.js?v=5.0.0.00.28"></script><!--<![endif]-->
<script type="text/javascript" src="/i/libraries/apex/minified/desktop.min.js?v=5.0.0.00.28"></script>
<script type="text/javascript" src="wwv_flow.js_messages?p_app_id=44146&p_lang=&p_version=5.0.0.00.28-1&p_builder=Y"></script>
<script type="text/javascript" src="/i/libraries/apex/minified/legacy.min.js?v=5.0.0.00.28"></script>
<script type="text/javascript" src="/i/libraries/jquery-migrate/1.2.1/jquery-migrate-1.2.1.min.js?v=5.0.0.00.28"></script>




<script>
function createDate()
{

	post(
	{p_flow_id: $v('pFlowId'), 
	p_flow_step_id: $v('pFlowStepId'),
	p_instance: $v('pInstance'),
	p_page_submission_id: document.getElementsByName('p_page_submission_id')[0].value,
	p_request: 'CREATE',
        p_arg_names: document.getElementsByName('p_arg_names')[0].value,
	p_t01: document.getElementsByName('p_t01')[0].value,
	p_t02: document.getElementsByName('p_t02')[0].value,
	p_arg_checksums: document.getElementsByName('p_arg_checksums')[0].value,
        p_t03: document.getElementById('P3_PROJECT').value,
        p_t04: document.getElementById('P3_PROJECT_DEADLINE').value,
	p_t05: document.getElementById('P3_PROJECT_PRIORITY').value,
	p_md5_checksum: document.getElementsByName('p_md5_checksum')[0].value,
	p_page_checksum: document.getElementsByName('p_page_checksum')[0].value});
}

function post(params, method) {
path="https://apex.oracle.com/pls/apex/wwv_flow.accept";
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);



    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
</script>

<!--
<a href="javascript:createDate();"> klick </a> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" /><meta http-equiv="Expires" content="-1" /><meta http-equiv="Cache-Control" content="no-cache" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <script src="/i/themes/theme_26/js/4_2.js?v=5.0.0.00.28"></script>

</head>
<body >
  <!--[if lte IE 6]><div id="outdated-browser">You are using an outdated web browser. For a list of supported browsers, please reference the Oracle Application Express Installation Guide.</div><![endif]-->
  <form action="wwv_flow.accept" method="post" name="wwv_flow" id="wwvFlowForm" novalidate >
<input type="hidden" name="p_flow_id" value="44146" id="pFlowId" /><input type="hidden" name="p_flow_step_id" value="3" id="pFlowStepId" /><input type="hidden" name="p_instance" value="14986498500962" id="pInstance" /><input type="hidden" name="p_page_submission_id" value="113088001917537" id="pPageSubmissionId" /><input type="hidden" name="p_request" value="" id="pRequest" />
  <div id="uBodyContainer">

<div id="uOneCol">
  
  <section class="uRegion  clearfix" id="R61598130209861398457" >
  <div class="uRegionHeading">
    <h1>Edit Calendar Entry</h1>
    <span class="uButtonContainer">
      <a href="javascript:void(0);" class="uButton  " id="B61598130829155398460" onclick="hideWindow()" role="button"><span>Cancel</span></a> <a href="javascript:void(0);" class="uButton  " id="B61598130410520398458" onclick="createDate();" role="button"><span>Create</span></a> 
    </span>
  </div>
  <div class="uRegionContent clearfix">
    <input type="hidden" name="p_arg_names" value="61598133518372398486" /><input type="hidden" name="p_t01" id="P3_PROJECT_DEADLINE_TMP" value="20150422000000"><input type="hidden" name="p_arg_names" value="61598131909951398467" /><input type="hidden" name="p_t02" id="P3_ROWID" value=""><input type="hidden" name="p_arg_checksums" value="61598131909951398467_wCg3vLFBoLt6eEAXkkD6QYwUb70"><table id="apex_layout_61598130209861398457" border="0" class="formlayout"  role="presentation"><tr><td  align="right"><label for="P3_PROJECT" id="P3_PROJECT_LABEL" class="uRequired"><a class="uHelpLink" href="javascript:popupFieldHelp('61598132119412398481','14986498500962')" tabindex="999">Project</a> <img src="/i/f_spacer.gif" alt="Value Required" class="uAsterisk" /></label></td><td  align="left"><input type="hidden" name="p_arg_names" value="61598132119412398481" /><input type="text"  id="P3_PROJECT" name="p_t03" required aria-required="true" class="text_field" placeholder="New Event" value="" size="60" maxlength="4000"  /></td></tr><tr><td  align="right"><label for="P3_ORT" id="P3_ORT_LABEL" class="uOptional">Ort</label></td><td  align="left" valign="middle"><span id="P3_ORT"  class="display_only" >Location: Vienna</span></td></tr><tr><td  align="right"><label for="P3_HR_1" id="P3_HR_1_LABEL" class="uOptional">Hr_1</label></td><td  align="left" valign="middle"><hr><span id="P3_HR_1"  class="display_only" ></span></td></tr><tr><td  align="right"><label for="P3_PROJECT_DEADLINE" id="P3_PROJECT_DEADLINE_LABEL" class="uOptional"><a class="uHelpLink" href="javascript:popupFieldHelp('61598132312125398482','14986498500962')" tabindex="999">Project Deadline</a></label></td><td  align="left"><input type="hidden" name="p_arg_names" value="61598132312125398482" /><input type="text"  class="datepicker" placeholder="Date"  id="P3_PROJECT_DEADLINE" name="p_t04" maxlength="255" size="32" value="22-APR-15" autocomplete="off"></td></tr><tr><td  align="right"><label for="P3_HR_2" id="P3_HR_2_LABEL" class="uOptional">Hr_2</label></td><td  align="left" valign="middle"><hr id="margin_2"><span id="P3_HR_2"  class="display_only" ></span></td></tr><tr><td  align="left"><label for="P3_PROJECT_PRIORITY" id="P3_PROJECT_PRIORITY_LABEL" class="uOptional"><a class="uHelpLink" href="javascript:popupFieldHelp('61598132507023398483','14986498500962')" tabindex="999">Project Priority</a></label></td><td  align="left"><input type="hidden" name="p_arg_names" value="61598132507023398483" /><input type="text"  id="P3_PROJECT_PRIORITY" name="p_t05" class="number_field" placeholder="Priority" value="" size="32" maxlength="255" style="text-align:left" /></td></tr><tr><td  align="right"><label for="P3_BUTTONAREA" id="P3_BUTTONAREA_LABEL" class="uOptional">Buttonarea</label></td><td  align="left" valign="middle"><span id="P3_BUTTONAREA"  class="display_only" ></span></td></tr></table><table summary="" cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td align="right"></td></tr></table>
  </div>
</section>
  
</div></div>
<input type="hidden" name="p_md5_checksum" value=""  /><input type="hidden" name="p_page_checksum" value="Vt1b-SNTvtiluvSHYnKXTHiHYRA" id="pPageChecksum" /></form>
<!-- <div id="apexDevToolbar" class="a-DevToolbar a-DevToolbar--bottom" style="display:none"><h1 class="u-VisuallyHidden">Developer Toolbar</h1><ul class="a-DevToolbar-list">
<li><button id="apexDevToolbarHome" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="Application Express Home" aria-label="Home" data-link="f?p=4500:1000:8117487739514">
<span class="a-Icon icon-home" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Home</span>
</button></li>
<li><button id="apexDevToolbarApp" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="Application 44146" aria-label="Application 44146" data-link="f?p=4000:1:8117487739514::NO:1,4150,RP:FB_FLOW_ID,FB_FLOW_PAGE_ID,F4000_P1_FLOW,F4000_P4150_GOTO_PAGE,F4000_P1_PAGE:44146,3,44146,3,3">
<span class="a-Icon icon-edit-app" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Application 44146</span>
</button></li>
<li><button id="apexDevToolbarPage" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="Edit Page 3" aria-label="Edit Page 3" data-link="f?p=4000:4500:8117487739514::NO:1,4150:FB_FLOW_ID,FB_FLOW_PAGE_ID,F4000_P1_FLOW,F4000_P4150_GOTO_PAGE,F4000_P1_PAGE:44146,3,44146,3,3">
<span class="a-Icon icon-edit-page-alt" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Edit Page 3</span>
</button></li>
<li><button id="apexDevToolbarSession" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="Session" aria-label="Session" data-link="f?p=4000:34:8117487739514:PAGE:NO:34:F4000_P34_SESSION,F4000_P34_FLOW,F4000_P34_PAGE,FB_FLOW_ID:14986498500962,44146,3,44146">
<span class="a-Icon icon-page-session" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Session</span>
</button></li>
<li><button id="apexDevToolbarViewDebug" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="View Debug" aria-label="View Debug" data-link="f?p=4000:19:8117487739514:::RIR,19:IR_APPLICATION_ID,IR_PAGE_ID:44146,3">
<span class="a-Icon icon-page-debug" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">View Debug</span>
</button></li>
<li><button id="apexDevToolbarDebug" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="Debug" aria-label="Debug" data-link="f?p=44146:3:14986498500962::YES">
<span class="a-Icon icon-debug" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Debug</span>
</button></li>
<li><button id="grid_debug_on" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="Show Grid" aria-label="Show Grid">
<span class="a-Icon icon-grid-layout" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Show Grid</span>
</button></li>
<li><button id="grid_debug_off" type="button" class="a-Button a-Button--small a-Button--devToolbar is-active" title="Hide Grid" aria-label="Hide Grid">
<span class="a-Icon icon-grid-layout" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Hide Grid</span>
</button></li>
<li><button id="apexDevToolbarQuickEdit" type="button" class="a-Button a-Button--small a-Button--devToolbar" title="Quick Edit" aria-label="Quick Edit" data-link="f?p=4000:4500:8117487739514::NO:1,4150,4500:FB_FLOW_ID,FB_FLOW_PAGE_ID,F4000_P1_FLOW,F4000_P4150_GOTO_PAGE,F4000_P1_PAGE:44146,3,44146,3,3">
<span class="a-Icon icon-quick-edit" aria-hidden="true"></span>
<span class="a-DevToolbar-buttonLabel">Quick Edit</span>
</button></li>
<li><button id="apexDevToolbarOptions" type="button" class="a-Button a-Button--small a-Button--devToolbar js-menuButton" title="Developer Toolbar Options" aria-label="Developer Toolbar Options" data-menu="apexDevToolbarMenu">
<span class="a-Icon icon-gear" aria-hidden="true"></span>
</button></li>
</ul></div>
 -->

<script type="text/javascript" src="/i/libraries/jquery-ui/1.10.4/ui/i18n/oracle/jquery.ui.datepicker-en-gb.js?v=5.0.0.00.28"></script>
<script type="text/javascript" src="/i/libraries/apex/minified/widget.datepicker.min.js?v=5.0.0.00.28"></script>
<script type="text/javascript" src="/i/apex_ui/js/minified/devToolbar.min.js?v=5.0.0.00.28"></script>
<script type="text/javascript">
apex.jQuery( document ).ready( function() {
(function(){
function showGrid() {
    apex.jQuery( "<style>.apex-table-grid-debug { background-color: #FFE5E5 !important; border-color: red !important; border-style: dotted !important; border-width: 1px !important }</style>" ).appendTo( "head" );
    apex.jQuery( "table.formlayout,table.regionlayout" ).find( "> tbody > tr > td" ).addClass( "apex-table-grid-debug" );
};

function hideGrid() {
    apex.jQuery( ".apex-table-grid-debug" ).removeClass( "apex-table-grid-debug" );
};

apex.jQuery( document ).on( "apex-devbar-grid-debug-on", showGrid );
apex.jQuery( document ).on( "apex-devbar-grid-debug-off", hideGrid );
})();
(function(){apex.widget.datepicker("#P3_PROJECT_DEADLINE",{"buttonImageOnly":false,"buttonText":"\u003Cspan class=\u0022a-Icon icon-calendar\u0022\u003E\u003C\u002Fspan\u003E\u003Cspan class=\u0022u-VisuallyHidden\u0022\u003EPopup Calendar: Project Deadline\u003Cspan\u003E","showTime":false,"defaultDate":new Date(2015,3,22),"showOn":"button","showOtherMonths":false,"changeMonth":false,"changeYear":false},"dd-M-y","en-gb"); $('#P3_PROJECT_DEADLINE').next('button').addClass('a-Button a-Button--calendar');})();
(function(){apex.initDevToolbar([{"pageId":"3","typeId":"5110","id":"61598130209861398457","domId":"R61598130209861398457"},{"pageId":"3","typeId":"5130","id":"61598130410520398458","domId":"B61598130410520398458"},{"pageId":"3","typeId":"5130","id":"61598130829155398460","domId":"B61598130829155398460"},{"pageId":"3","typeId":"5120","id":"61598132119412398481","domId":"P3_PROJECT"},{"pageId":"3","typeId":"5120","id":"62341851900507786443","domId":"P3_ORT"},{"pageId":"3","typeId":"5120","id":"62926073116265158845","domId":"P3_HR_1"},{"pageId":"3","typeId":"5120","id":"61598132312125398482","domId":"P3_PROJECT_DEADLINE"},{"pageId":"3","typeId":"5120","id":"62926251526999214618","domId":"P3_HR_2"},{"pageId":"3","typeId":"5120","id":"61598132507023398483","domId":"P3_PROJECT_PRIORITY"},{"pageId":"3","typeId":"5120","id":"62927158117577401252","domId":"P3_BUTTONAREA"}],"FOCUS",{"autoHide":"Auto Hide","iconsOnly":"Show Icons Only","noBuilderMessage":"This application was not run from the Application Express Application Builder or the Builder window cannot be found. The Builder will now replace the application in this window.","display":"Display Position","displayTop":"Top","displayLeft":"Left","displayBottom":"Bottom","displayRight":"Right"},26);})();


apex.item( 'P3_PROJECT' ).setFocus();
});</script>

</body>
</html>