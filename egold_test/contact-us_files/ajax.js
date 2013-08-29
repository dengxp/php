/**
 * @author zxub 2006-06-01
 * 状态信息显示类，用var Status=new function()定义，可以静态引用其中的方法
 * 一般情况下为function Status()，这样不能静态引用其中的方法，需要通过对象来引用
 */

var Status=new function()
{
    this.statusDiv=null;
    
    /**
     * 初始化状态显示层
     */
    this.init=function()
    {
        if (this.statusDiv!=null)
        {
            return;
        }
        var body = document.getElementsByTagName("body")[0];
        var div = document.createElement("div");
        div.style.position = "absolute";
        div.style.top = "50%";
        div.style.left = "50%";
        div.style.width = "280px";
        div.style.margin = "-50px 0 0 -100px";        
        div.style.padding = "15px";
        div.style.backgroundColor = "#353555";
        div.style.border = "1px solid #CFCFFF";
        div.style.color = "#CFCFFF";
        div.style.fontSize = "14px";
        div.style.textAlign = "center";
        div.id = "status";
        body.appendChild(div);
        div.style.display="none";
        this.statusDiv=document.getElementById("status");
    }
    
    /**
     * 设置状态信息
     * @param _message:要显示的信息
     */    
    this.showInfo=function(_message)
    { 
		 
        if (this.statusDiv==null)
        {
            this.init();
        }  
        this.setStatusShow(true);
        this.statusDiv.innerHTML = _message;        
    }
     
    /**
     * 设置状态层是否显示
     * @param _show:boolean值，true为显示，false为不显示
     */ 
    this.setStatusShow=function(_show)
    {      
        if (this.statusDiv==null)
        {
            this.init();
        } 
        if (_show)
        {
            this.statusDiv.style.display="";
        }
        else
        {
            this.statusDiv.innerHTML="";
            this.statusDiv.style.display="none";
        }
    }
}

/**
 * @author zxub
 * 用于存放通道名称及通信对象的类，这样可以通过不同通道名称来区分不同的通信对象
 */
function HttpRequestObject()
{
    this.chunnel=null;
    this.instance=null;
}

/**
 * @author zxub
 * 通信处理类，可以静态引用其中的方法
 */
var Request=new function()
{

    this.showStatus=true;
    
    //通信类的缓存
    this.httpRequestCache=new Array();
    
    /**
     * 创建新的通信对象
     * @return 一个新的通信对象
     */
    this.createInstance=function()
    {
        var instance=null;
        if (window.XMLHttpRequest)
        {
            //mozilla
            instance=new XMLHttpRequest();
		
            //有些版本的Mozilla浏览器处理服务器返回的未包含XML mime-type头部信息的内容时会出错。因此，要确保返回的内容包含text/xml信息
            if (instance.overrideMimeType)
            {
                instance.overrideMimeType="text/xml";
            }
        }
        else if (window.ActiveXObject)
        {

			
            //IE
            var MSXML = ['MSXML2.XMLHTTP.5.0', 'Microsoft.XMLHTTP', 'MSXML2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP'];
            for(var i = 0; i < MSXML.length; i++)
            {
                try
                {
                    instance = new ActiveXObject(MSXML[i]);
                    break;
                }
                catch(e)
                {                    
                }
            }
        }

        return instance;
    }

    
    /**
     * 获取一个通信对象
     * 若没指定通道名称，则默认通道名为"default"
     * 若缓存中不存在需要的通信类，则创建一个，同时放入通信类缓存中
     * @param _chunnel：通道名称，若不存在此参数，则默认为"default"
     * @return 一个通信对象，其存放于通信类缓存中
     */
    this.getInstance=function(_chunnel)
    {
        var instance=null;
        var object=null;
        if (_chunnel==undefined)//没指定通道名称
        {
            _chunnel="default";
        }
        var getOne=false;
        for(var i=0; i<this.httpRequestCache; i++)
        {
            object=HttpRequestObject(this.httpRequestCache[i]);
            if (object.chunnel==_chunnel)
            {
                if (object.instance.readyState==0 || object.instance.readyState==4)
                {
                    instance=object.instance;
                }
                getOne=true;
                break;                    
            }
        }
        if (!getOne) //对象不在缓存中，则创建
        {
            object=new HttpRequestObject();
            object.chunnel=_chunnel;
            object.instance=this.createInstance();
            this.httpRequestCache.push(object);
            instance=object.instance;
        }         
        return instance;
    }
    
    /**
     * 客户端向服务端发送请求
     * @param _url:请求目的
     * @param _data:要发送的数据
     * @param _processRequest:用于处理返回结果的函数，其定义可以在别的地方，需要有一个参数，即要处理的通信对象
     * @param _chunnel:通道名称，默认为"default"
     * @param _asynchronous:是否异步处理，默认为true,即异步处理
     */
    this.send=function(_url,_data,_processRequest,_chunnel,_asynchronous)
    {

        if (_url.length==0 || _url.indexOf("?")==0)
        {
            Status.showInfo("your search is being process, please be patient!");
            window.setTimeout("Status.setStatusShow(false)",3000);
            return;
        }

		/*
        if (this.showStatus)
        {
            Status.showInfo("请求处理中，请稍候");  
        }  
         */
	
        if (_chunnel==undefined || _chunnel=="")
        {
            _chunnel="default";
        }
        if (_asynchronous==undefined)
        {
            _asynchronous=true;
        }
        try{
        var instance=this.getInstance(_chunnel);}catch(e){alert(e.message);}
        if (instance==null)
        {
            Status.showInfo("your search is being process, please be patient!")
            window.setTimeout("Status.setStatusShow(false)",3000);
            return;
        }        


        if (typeof(_processRequest)=="function")
        {
            instance.onreadystatechange=function()
            {
                if (instance.readyState == 4) // 判断对象状态
                {
                    if (instance.status == 200) // 信息已经成功返回，开始处理信息
                    {                        
                        _processRequest(instance);
                        Status.setStatusShow(false);
                        Request.showStatus=true;                                    
                    }
                    else
                    {
                        Status.showInfo("your search is being process, please be patient!");
                        window.setTimeout("Status.setStatusShow(false)",3000);
                    }                    
                }                                
            }            
        }


        //_url加一个时刻改变的参数，防止由于被浏览器缓存后同样的请求不向服务器发送请求
        if (_url.indexOf("?")!=-1)
        {
            _url+="&requestTime="+(new Date()).getTime();
        }
        else
        {
            _url+="?requestTime="+(new Date()).getTime();
        }


        if (_data.length==0)
        {
            instance.open("GET",_url,_asynchronous);
            instance.send(null);
        }

        else
        {
            instance.open("POST",_url,_asynchronous);
            instance.setRequestHeader("Content-Length",_data.length);
            instance.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            instance.send(_data);
        }

    }
    
    /**
     * 间隔一段时间持续发送请求，只用于异步处理，只用于GET方式
     * @param _interval:请求间隔，以毫秒计
     * @param _url:请求地址
     * @param _processRequest:用于处理返回结果的函数，其定义可以在别的地方，需要有一个参数，即要处理的通信对象
     * @param _chunnel:通道名称，默认为"defaultInterval"，非必添
     */
    this.intervalSend=function(_interval,_url,_processRequest,_chunnel)
    {
        var action=function()
        {
            if (_chunnel==undefined)
            {
                _chunnel="defaultInterval";
            }
            var instance=Request.getInstance(_chunnel);
            if (instance==null)
            {
                Status.showInfo("your search is being process, please be patient!")
                window.setTimeout("Status.setStatusShow(false)",3000);
                return;
            }
            if (typeof(_processRequest)=="function")
            {
                instance.onreadystatechange=function()
                {
                    if (instance.readyState == 4) // 判断对象状态
                    {
                        if (instance.status == 200) // 信息已经成功返回，开始处理信息
                        {
                            _processRequest(instance);
                        }
                        else
                        {
                            Status.showInfo("your search is being process, please be patient!");
                            window.setTimeout("Status.setStatusShow(false)",3000);
                        }
                    }
                }
            }
            //_url加一个时刻改变的参数，防止由于被浏览器缓存后同样的请求不向服务器发送请求
            if (_url.indexOf("?")!=-1)
            {
                _url+="&requestTime="+(new Date()).getTime();
            }
            else
            {
                _url+="?requestTime="+(new Date()).getTime();
            }
            instance.open("GET",_url,true);
            instance.send(null);
        }
        window.setInterval(action,_interval);        
    }
}




// 让 Firefox 也支持 insertAdjacentElement

if(typeof HTMLElement!="undefined" && !HTMLElement.prototype.insertAdjacentElement)
{


    HTMLElement.prototype.insertAdjacentElement = function(where,parsedNode)
        {
            switch (where)
        {
            case 'beforeBegin':
                this.parentNode.insertBefore(parsedNode,this)
                break;
            case 'afterBegin':
                this.insertBefore(parsedNode,this.firstChild);
                break;
            case 'beforeEnd':
                this.appendChild(parsedNode);
                break;
            case 'afterEnd':
                if (this.nextSibling) this.parentNode.insertBefore(parsedNode,this.nextSibling);
                else this.parentNode.appendChild(parsedNode);
                break;
        }
    }

    HTMLElement.prototype.insertAdjacentHTML = function (where,htmlStr)
    {
        var r = this.ownerDocument.createRange();
        r.setStartBefore(this);
        var parsedHTML = r.createContextualFragment(htmlStr);
        this.insertAdjacentElement(where,parsedHTML)
    }


    HTMLElement.prototype.insertAdjacentText = function (where,txtStr)
    {
        var parsedText = document.createTextNode(txtStr)
        this.insertAdjacentElement(where,parsedText)
    }
}
