var randomsetting="7 days";var cookiename="moot";var cookiepath="/";var cookiesecure="";if(manual_or_random=="manual"){var selectedtitle=getCookie(cookiename);if(selectedtitle==null){setStylesheet(defaultstyle)}else{setStylesheet(selectedtitle)}}else{if(manual_or_random=="random"){if(randomsetting=="eachtime"){setStylesheet("","random")}else{if(randomsetting=="sessiononly"){if(getCookie("mysheet_s")==null){document.cookie="mysheet_s="+setStylesheet("","random")+"; path=/"}else{setStylesheet(getCookie("mysheet_s"))}}else{if(randomsetting.search(/^[1-9]+ days/i)!=-1){if(getCookie("mysheet_r")==null||parseInt(getCookie("mysheet_r_days"))!=parseInt(randomsetting)){setCookie("mysheet_r",setStylesheet("","random"),parseInt(randomsetting));setCookie("mysheet_r_days",randomsetting,parseInt(randomsetting))}}else{setStylesheet(getCookie("mysheet_r"))}}}}}function setStylesheet(f,b){var a,c,e=[""];for(a=0;(c=document.getElementsByTagName("link")[a]);a++){if(c.getAttribute("rel").toLowerCase()=="alternate stylesheet"&&c.getAttribute("title")){c.disabled=true;e.push(c);if(c.getAttribute("title")==f){c.disabled=false}}}if(typeof b!="undefined"){var d=Math.floor(Math.random()*e.length);e[d].disabled=false}return(typeof b!="undefined"&&e[d]!="")?e[d].getAttribute("title"):""}function getCookie(a){var b=new RegExp(a+"=[^;]+","i");if(document.cookie.match(b)){return document.cookie.match(b)[0].split("=")[1]}return null}function setCookie(b,d,h,g,c,f){var a=new Date();var e=(typeof h!="undefined")?a.setDate(a.getDate()+parseInt(h)):a.setDate(a.getDate()-5);document.cookie=b+"="+escape(d)+(h?"; expires="+a.toGMTString():"")+(g?"; path="+g:"")+(c?"; domain="+c:"")+(f?"; secure":"")}function chooseStyle(a,b){if(document.getElementById){setStylesheet(a);setCookie(cookiename,a,b,cookiepath,cookiesecure)}}function deleteCookie(a){if(getCookie(a)){document.cookie=a+"="+((cookiepath)?"; path="+cookiepath:"")+";expires = 01/01/2000 00:00:00";alert(a+" - Cookie Deleted")}}function init(){timeDisplay=document.createTextNode("");document.getElementById("clockhr").appendChild(timeDisplay);timeDisplay1=document.createTextNode("");document.getElementById("clockmin").appendChild(timeDisplay1);timeDisplay2=document.createTextNode("");document.getElementById("clockpart").appendChild(timeDisplay2)}function updateClock(){var c=new Date();var d=c.getHours();var a=c.getMinutes();a=(a<10?"0":"")+a;var b;if(timestyle==2){b=" "}else{b=(d<12)?"AM":"PM";d=(d>12)?d-12:d;d=(d===0)?12:d}document.getElementById("clockhr").firstChild.nodeValue=d;document.getElementById("clockmin").firstChild.nodeValue=a;document.getElementById("clockpart").firstChild.nodeValue=b}var $sbox;var OrbWasClicked=0;var MenuIsUp=0;var l=0;var w=0;var lt=0;var throb=0;var throbcount=0;var FlyOutOpen=0;var FlyOutSum=0;var FlyOutWasClicked=0;var mhovIsUp=0;var mhovLastUp=0;var mhovering=0;var lhovering=0;var timer="";var tid;var qlm=0;var MOWasClicked=0;var MOOpen=0;var osIsNix=0;var winsize=0;var smtimer;var rsanimConst=300;var rstimer;function SearchBoxFocus(a){if(a.value==$sboxtext){a.value="";a.style.fontStyle="normal"}}function SearchBoxBlur(a){if(a.value==""){a.style.fontStyle="italic";a.value=$sboxtext}}function FadeOutMenu(){SMReset();jQuery(document).ready(function(a){a(document.getElementById("StartMenu")).fadeOut(125,function(){document.getElementById("StartMenu").style.left="-1000px"})});if(document.getElementById("smif")){document.getElementById("smif").style.display="none";document.getElementById("avif").style.display="none";document.getElementById("smif").style.visibility="hidden";document.getElementById("avif").style.visibility="hidden"}}function FadeInMenu(){document.getElementById("StartMenu").style.left="0px";jQuery(document).ready(function(a){a(document.getElementById("StartMenu")).fadeIn(125)});if(osIsNix==1){document.getElementById("smif").style.display="block";document.getElementById("avif").style.display="block";document.getElementById("smif").style.visibility="visible";document.getElementById("avif").style.visibility="visible"}}function SMReset(){jQuery(document).ready(function(a){a(".SMsh, .SMfo").each(function(){SMLower(this)})})}function OClkd(){OrbWasClicked=1;if(MenuIsUp==0){FadeInMenu();MenuIsUp=1}else{FadeOutMenu();MenuIsUp=0}}function SMClkd(){MenuIsUp=1;OrbWasClicked=1;if(FlyOutSum>0){FlyOutSum=FlyOutSum-FlyOutOpen;FlyOutSum="SMSub"+FlyOutSum;FlyOutSum=document.getElementById(FlyOutSum);SMLower(FlyOutSum);FlyOutSum=0}}function BodyClicked(){if(OrbWasClicked!=1){FadeOutMenu();MenuIsUp=0}if(FlyOutWasClicked!=1&&FlyOutOpen>0){SMLower(document.getElementById("SMSub5"));SMLower(document.getElementById("SMSub4"));FlyOutOpen=0;if(document.getElementById("flif")){document.getElementById("flif").style.display="none";document.getElementById("flif").style.visibility="hidden";document.getElementById("flif").style.width="1px";document.getElementById("flif").style.height="1px";document.getElementById("flif").style.left="-200px";document.getElementById("flif").style.bottom="0px"}}if(MOOpen>0&&MOWasClicked!=1){molist(MOOpen);MOOpen=0}OrbWasClicked=0;FlyOutWasClicked=0;MOWasClicked=0;lowermhov()}function StartThrob(){var a=getCookie("throb");if(opthrob==1){if(a!="yes"){DoThrob()}}else{if(opthrob==2){DoThrob()}else{}}}function DoThrob(){OClkd();BodyClicked();document.cookie="throb=yes";smtimer=setTimeout(BodyClicked,6000)}function SMHov(){if(smtimer){clearTimeout(smtimer)}}function SMRaise(a){jQuery(document).ready(function(b){b(a).fadeIn(125)})}function SMLower(a){if(a){jQuery(document).ready(function(b){b(a).fadeOut(125)})}}function SMFlot(a){element="SMSub"+a;element=document.getElementById(element);jQuery(document).ready(function(b){if(b(element).is(":visible")){b(element).fadeOut(125);if(document.getElementById("flif")){document.getElementById("flif").style.display="none";document.getElementById("flif").style.visibility="hidden";document.getElementById("flif").style.width="1px";document.getElementById("flif").style.height="1px";document.getElementById("flif").style.left="-200px";document.getElementById("flif").style.bottom="0px"}}else{if(osIsNix==1){if(a==4){document.getElementById("flif").style.width="146px";document.getElementById("flif").style.height="72px";document.getElementById("flif").style.left="395px";document.getElementById("flif").style.bottom="37px";document.getElementById("flif").style.display="block";document.getElementById("flif").style.visibility="visible"}if(a==5){document.getElementById("flif").style.width="129px";document.getElementById("flif").style.height="181px";document.getElementById("flif").style.left="395px";document.getElementById("flif").style.bottom="70px";document.getElementById("flif").style.display="block";document.getElementById("flif").style.visibility="visible"}}b(element).fadeIn(125);FlyOutWasClicked=1;FlyOutSum=FlyOutOpen+a;FlyOutOpen=a}})}function molist(a){element="SMSub"+a;MOWasClicked=1;if(MOOpen!=0){jQuery(document).ready(function(b){b(document.getElementById(element)).fadeOut(75,function(){document.getElementById(element).style.left="-200px"})});if(osIsNix==1){document.getElementById("moif").style.display="none";document.getElementById("moif").style.visibility="hidden";document.getElementById("moif").style.left="-200px"}MOOpen=0}else{jQuery(document).ready(function(b){b(document.getElementById(element)).fadeIn(75)});document.getElementById(element).style.left="705px";if(osIsNix==1){document.getElementById("moif").style.display="block";document.getElementById("moif").style.visibility="visible";document.getElementById("moif").style.left="705px"}MOOpen=a}}function sizeSidebar(){sh=document.getElementById("sidebar").scrollHeight;dh=document.getElementById("colwrap").scrollHeight;if(sh<dh){document.getElementById("sidebar").style.height=dh+"px"}}function positionSidebar(){jQuery(document).ready(function(a){docwidth=a(document).width();var b=a("#sidebar").css("left");if(docwidth<=900){a("#sidebar").css({right:null});a("#sidebar").css({left:660})}else{a("#sidebar").css({left:null});a("#sidebar").css({right:0})}})}function mhov(b,a){a=(a*73)+10+qlm;tid="hov"+b;lhovering=1;clearTimeout(timer);if(MenuIsUp==0){if(mhovIsUp==0){mhtimer=setTimeout("raisemhov('"+a+"')",500)}else{if(mhovLastUp!=tid){temptid=tid;tid=mhovLastUp;lowermhov();tid=temptid;raisemhov(a)}}}}function munhov(){lhovering=0;if(typeof mhtimer!=="undefined"){clearTimeout(mhtimer)}timer=setTimeout("mhovkill()",250)}function mhovkill(){if(mhovering==0&&lhovering==0){lowermhov()}}function raisemhov(a){if(lhovering==1){document.getElementById(tid).style.left=a+"px";jQuery(document).ready(function(b){b(document.getElementById(tid)).fadeIn(75)});mhovLastUp=tid;mhovIsUp=1;if(MOOpen>0&&MOWasClicked!=1){molist(MOOpen);MOOpen=0}if(osIsNix==1){document.getElementById("hovif").style.display="block";document.getElementById("hovif").style.visibility="visible";document.getElementById("hovif").style.left=a+"px"}}}function lowermhov(){var a=tid;if(tid){jQuery(document).ready(function(b){b(document.getElementById(a)).fadeOut(75,function(){document.getElementById(a).style.left="-200px"})});if(osIsNix==1){document.getElementById("hovif").style.display="none";document.getElementById("hovif").style.visibility="hidden";document.getElementById("hovif").style.left="-200px"}}mhovLastUp=0;mhovIsUp=0}function hovmhov(){mhovering=1}function unhovmhov(){mhovering=0;munhov()}function InitIFrame(){if(osIsNix==1){document.getElementById("tbif").style.display="block";document.getElementById("tbif").style.visibility="visible"}}function getOS(){if(navigator.appVersion.indexOf("Win")!=-1){osIsNix=0}if(navigator.appVersion.indexOf("Mac")!=-1){osIsNix=0}if(navigator.appVersion.indexOf("X11")!=-1){osIsNix=1}if(navigator.appVersion.indexOf("Linux")!=-1){osIsNix=1}}function getWinSize(){if(getCookie("winsize")){winsize=getCookie("winsize")}else{winsize=2}rsanim=1;setWinSize();rsanim=rsanimConst}function resizeColumn(){winsize++;if(winsize>2){winsize=0}setWinSize();document.cookie="winsize="+winsize}function winResized(){positionSidebar();if(winsize==1){if(rstimer){clearTimeout(rstimer)}rstimer=setTimeout(getWinSize,100)}}function setWinSize(){if(winsize==0){jQuery(document).ready(function(a){a("#colwrap").animate({width:"660px"},rsanim)});document.getElementById("sizer").innerHTML='<img style="padding:4px 0 0 4px;" src="'+templatedir+'/images/s_max.png" alt=" " />'}else{if(winsize==1){sidebarwidth=document.getElementById("sidebar").offsetWidth;jQuery(document).ready(function(a){docwidth=a(document).width()});columnwidth=docwidth-sidebarwidth;newwidth=((columnwidth-660)/2)+650;jQuery(document).ready(function(a){a("#colwrap").animate({width:newwidth},rsanim)});document.getElementById("sizer").innerHTML='<img style="padding:4px 0 0 4px;" src="'+templatedir+'/images/s_resize.png" alt=" " />'}else{jQuery(document).ready(function(a){a("#colwrap").animate({width:"99%"},rsanim)});document.getElementById("sizer").innerHTML='<img style="padding:4px 0 0 4px;" src="'+templatedir+'/images/s_min.png" alt=" " />'}}}function InitPageEvents(){if(window.addEventListener){window.addEventListener("click",BodyClicked,false)}else{if(window.attachEvent){document.getElementById("bdy").attachEvent("onclick",BodyClicked)}}jQuery(document).ready(function(a){a(window).bind("resize",function(){winResized()});a("#StartMenu").bind("click",function(){SMClkd()});a("#StartMenu").bind("mouseover",function(){SMHov()});a("#orb").bind("click",function(){OClkd()});a("#SMCatsB,#SMTagsB,#SMLpostsB").bind("click",function(){element=a(this).attr("id");element=element.slice(0,-1);element=document.getElementById(element);SMRaise(element)});a("#SMCatsK,#SMTagsK,#SMLpostsK").bind("click",function(){element=a(this).attr("id");element=element.slice(0,-1);element=document.getElementById(element);SMLower(element)});a("#SMThemeB").bind("click",function(){SMFlot(5)});a("#SMInfoB").bind("click",function(){SMFlot(4)});a("#SMSub4,#SMSub5").bind("click",function(){FlyOutWasClicked=1});a("#SMSub6").bind("click",function(){MOWasClicked=1});a("#voidb").bind("click",function(){chooseStyle("none",30)});a("#lifeb").bind("click",function(){chooseStyle("life-theme",30)});a("#earthb").bind("click",function(){chooseStyle("earth-theme",30)});a("#windb").bind("click",function(){chooseStyle("wind-theme",30)});a("#waterb").bind("click",function(){chooseStyle("water-theme",30)});a("#fireb").bind("click",function(){chooseStyle("fire-theme",30)});a("#liteb").bind("click",function(){chooseStyle("lite-theme",30)});a("#mobutton").bind("click",function(){molist(6)});a(".hovmhov").each(function(){a(this).bind("mouseover",function(){hovmhov()});a(this).bind("mouseout",function(){unhovmhov()})});a(".search").each(function(){a(this).val("Start Search");a(this).bind("focus",function(){SearchBoxFocus(this)});a(this).bind("blur",function(){SearchBoxBlur(this)})});a(".mh").each(function(b){a(this).bind("mouseover",function(){numinloop=b+1;mhid=this.id;mhid=mhid.replace("mh","");mhov(mhid,numinloop)});a(this).bind("mouseout",function(){munhov()})});a(".fadeThis").append('<span class="hover"></span>').each(function(){var b=a("> span.hover",this).css("opacity",0);a(this).hover(function(){if(a.browser.msie){this.style.background="url("+templatedir+"/images/s_rshov.png)"}else{b.stop().fadeTo(120,1)}},function(){if(a.browser.msie){this.style.background="url("+templatedir+"/images/s_rsb.png)"}else{b.stop().fadeTo(200,0)}});a(this).click(function(){b.stop().fadeTo(1,0);resizeColumn()});a(this).mousedown(function(){b.stop().fadeTo(1,0)})});a(".fadeThis").append('<span class="mousedown"></span>').each(function(){var b=a("> span.mousedown",this).css("opacity",0);a(this).mousedown(function(){if(a.browser.msie){this.style.background="url("+templatedir+"/images/s_rsmdn.png)"}else{b.stop().fadeTo(1,1)}},function(){if(a.browser.msie){this.style.background="url("+templatedir+"/images/s_rsb.png)"}else{b.stop().fadeTo(1,0)}});a(this).mouseout(function(){b.stop().fadeTo(1,0)});a(this).click(function(){if(a.browser.msie){this.style.background="url("+templatedir+"/images/s_rsb.png)"}else{b.stop().fadeTo(1,0)}})})})}function InitPage(){InitPageEvents();SMReset();getWinSize();getOS();InitIFrame();updateClock();setInterval("updateClock()",5000);sizeSidebar();positionSidebar();jQuery(document).ready(function(a){a(document.getElementById("StartMenu")).fadeOut(1)});StartThrob()}function AddOnload(a){if(window.addEventListener){window.addEventListener("load",a,false)}else{if(window.attachEvent){window.attachEvent("onload",a)}}}AddOnload(InitPage);