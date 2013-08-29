function select_all(chkName,frmName){
	var frm=document.forms[frmName];
	for(var i=0;i<frm.elements.length;i++){
		var e =frm.elements[i];
		if ((e.name != 'check_all') && (e.type=='checkbox')){
			e.checked =frm.check_all.checked;
		}
	}
}

function trim(str){
	str = str.replace(/^\s*|\s*$/g,"");
	return str;
}

function setImgSizeWH(theURL,sImage,imgW,imgH){
	var imgObj;
	imgObj = new Image();
	imgObj.src = theURL;
	if ((imgObj.width != 0) && (imgObj.height != 0)) {
		if(imgObj.width>imgW || imgObj.height>imgH){
			var iHeight = imgObj.height*imgW/imgObj.width;
			if(iHeight<=imgH){
				sImage.width=imgW;
				sImage.height=iHeight;
			}else{
				var iWidth=imgObj.width*imgH/imgObj.height;
				sImage.width=iWidth;
				sImage.height=imgH;
			}
		}else{
			sImage.width=imgObj.width;
			sImage.height=imgObj.height;
		}
	}else{
		sImage.width = imgW;
		sImage.height= imgH;
	}
}

function get_cookie(Name){
	var Name = Name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++){
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(Name) == 0) return unescape(c.substring(Name.length,c.length));
	}
	return "";
}

function set_cookie( name, value, expires, path, domain, secure ){
	var today = new Date();
	today.setTime( today.getTime() );
	if ( expires ){
		expires = expires * 1000 * 60 * 60 * 24;
	}
	var expires_date = new Date( today.getTime() + (expires) );
	document.cookie = name + "=" +escape( value ) +
	( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) + 
	( ( path ) ? ";path=" + path : ";path=/" ) + 
	( ( domain ) ? ";domain=" + domain : "" ) +
	( ( secure ) ? ";secure" : "" );
}



function AddFavorite(sURL,sTitle){
    try{
        window.external.addFavorite(sURL,sTitle);
    }catch (e){
        try{
            window.sidebar.addPanel(sTitle,sURL,"");
        }catch (e){
           
        }
    }
}

function SetHome(obj,vrl){
	try{
		obj.style.behavior="url(#default#homepage)";
		obj.setHomePage(vrl);
	}catch(e){
		if(window.netscape){
			try {
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			}catch(e){
				
			}
		}
	}
}



 function getX(elem){
    var x = 0;
    while(elem){
        x = x + elem.offsetLeft;
        elem = elem.offsetParent;
    }
    return x;
}
function getY(elem){
    var y = 0;
    while(elem){
        y = y + elem.offsetTop;
        elem = elem.offsetParent;
    }
    return y;
}