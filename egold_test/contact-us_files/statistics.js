var _debug;
var _nitcType;
var _nitcShow;
var _nitcShowStr='';
var _nitcIframe;
var _nitcWebUrl='@@@http://www.legootech.cn@@@';
var _nitcCount=_nitcWebUrl.replace(/@@@/g,"");
var _nitcCountPage = _nitcCount + '/statistics.php';
if( _nitcIframe == true ){
	var _nitcPageurl = escape(location.href);
	var _nitcReferer = escape(document.referrer);
}else{
	var _nitcPageurl = escape(top.location.href);
	var _nitcReferer = escape(top.document.referrer);
}

var _nitcLanguage = (navigator.systemLanguage?navigator.systemLanguage:navigator.language);
var _nitcColor = screen.colorDepth;
var _nitcScreenSize = screen.width + '*' + screen.height;
var _nitcCharset = document.charset
var _nitcFirstTime;
var _nitcLastTime;
_nitcFirstTime = _nitcReadCookie( '_nitcFirstTime' );

if( _nitcFirstTime == '' ){
	_nitcFirstTime = getTime();
	_nitcLastTime = _nitcFirstTime;
	_nitcWriteCookie( '_nitcFirstTime', _nitcFirstTime, 10000 );
}else{
	_nitcLastTime = getTime();
}

if( _nitcType == null ){
	_nitcType = 1;
}

_nitcReturnCount = _nitcReadCookie( '_nitcReturnCount' );
_nitcReturnCount = _nitcReturnCount == '' ? 0 : _nitcReturnCount;
_nitcReturnTime = _nitcReadCookie( '_nitcReturnTime' );

if( _nitcReturnTime == '' ){
	_nitcReturnTime = getTime();
	_nitcWriteCookie( '_nitcReturnTime', _nitcReturnTime, 10000 );
}

temp = _nitcReturnTime.split( '-' )
_nitcReturnTimeDate = new Date(temp[0], temp[1]-1, temp[2], temp[3], temp[4], temp[5] );
_nitcNowTimeDate = new Date();

if(_nitcNowTimeDate - _nitcReturnTimeDate >= 43200000 ){
	_nitcWriteCookie( '_nitcReturnCount', ++_nitcReturnCount, 10000 );
	_nitcWriteCookie( '_nitcReturnTime', getTime(), 10000 );
}else{
	_nitcReturnCount = null;
}

if( _nitcShow != null && _nitcShow.length > 0 ){
	var _nitcShowStr = '';
	for( i = 0; i < _nitcShow.length; i ++ ){
		_nitcShowStr += "&show[]=" + _nitcShow[i];
	}
}else{
	var _nitcShowStr = "";
}

var _nitcCountUrl = _nitcCountPage + '?'
+ '&referer=' + _nitcReferer
+ '&counturl=' + _nitcCount
+ '&pageurl=' + _nitcPageurl
+ '&language=' + _nitcLanguage
+ '&color=' + _nitcColor
+ '&screensize=' + _nitcScreenSize
+ '&debug=' + _debug
+ '&firsttime=' + _nitcFirstTime
+ '&lasttime=' + _nitcLastTime
+ '&type=' + _nitcType
+ '&charset=' + _nitcCharset
+ _nitcShowStr
+ '&timezone=' + (new Date()).getTimezoneOffset()/60;

if( _nitcReturnCount != null ){
	_nitcCountUrl += '&return1=' + _nitcReturnCount;
}

document.write("<script src='" + _nitcCountUrl + "'></script>");
function getTime(){ 
	now = new Date(); 
	year=now.getFullYear();
	Month=now.getMonth()+1;
	Day=now.getDate();
	Hour=now.getHours(); 
	Minute=now.getMinutes(); 
	Second=now.getSeconds(); 
	return year+"-"+Month+"-"+Day+" "+Hour+":"+Minute+":"+Second;
} 

function _nitcReadCookie(name){
  var cookieValue = "";
  var search = name + "=";
  if(document.cookie.length > 0)  { 
    offset = document.cookie.indexOf(search);
    if (offset != -1){ 
      offset += search.length;
      end = document.cookie.indexOf(";", offset);
      if (end == -1) end = document.cookie.length;
      cookieValue = unescape(document.cookie.substring(offset, end))
    }
  }
  return cookieValue;
}

function _nitcWriteCookie(name, value, hours){
  var expire = "";
  if(hours != null){
    expire = new Date((new Date()).getTime() + hours * 3600000);
    expire = "; expires=" + expire.toGMTString();
  }
  document.cookie = name + "=" + escape(value) + expire + "domain=;" + "path=/;";
}