	(function(a){a.fn.lavaLamp=function(b){b=a.extend({fx:"swing",speed:500,click:function(){return true},startItem:"no",autoReturn:true,returnDelay:0,setOnClick:true,homeTop:0,homeLeft:0,homeWidth:0,homeHeight:0,returnHome:false},b||{});return this.each(function(){var h=location.pathname+location.search+location.hash;var e=new Object;var d;var i;var f;var g;if(b.homeTop||b.homeLeft){f=a('<li class="homeLava selectedLava"></li>').css({left:b.homeLeft,top:b.homeTop,width:b.homeWidth,height:b.homeHeight,position:"absolute"});a(this).prepend(f)}var j=a("li",this);if(b.startItem=="no"){e=a('> li a[href$="'+h+'"]',this).parent("li")}if(e.length==0&&b.startItem=="no"&&location.hash){
	
	e=a('li a[href$="'+location.hash+'"]',this).parent("li")}
	
	if(e.length==0||b.startItem!="no"){
		if(b.startItem=="no"){
			b.startItem=0
		}
		e=a(j[b.startItem])
	}
		g=a("li.selectedLava",this)[0]||a(e).addClass("selectedLava")[0];
		j.mouseover(function(){
			if(a(this).hasClass("homeLava")){
				g=a(this)[0]}c(this)});
				i=a('<li class="backLava"><div class="leftLava"></div><div class="bottomLava"></div><div class="cornerLava"></div></li>').appendTo(this);a(this).mouseout(function(){if(b.autoReturn){if(b.returnHome&&f){c(f[0])}else{if(b.returnDelay){if(d){clearTimeout(d)}d=setTimeout(c,b.returnDelay+b.speed)}else{c()}}}});j.click(function(k){if(b.setOnClick){a(g).removeClass("selectedLava");a(this).addClass("selectedLava");g=this}return b.click.apply(this,[k,this])});if(b.homeTop||b.homeLeft){i.css({left:b.homeLeft,top:b.homeTop,width:b.homeWidth,height:b.homeHeight})}else{i.css({left:g.offsetLeft,top:g.offsetTop,width:g.offsetWidth,height:g.offsetHeight})}function c(k){if(!k){k=g}var m=0,l=0;if(!a.browser.msie){m=(i.outerWidth()-i.innerWidth())/2;l=(i.outerHeight()-i.innerHeight())/2}i.stop().animate({left:k.offsetLeft-m,top:k.offsetTop-l,width:k.offsetWidth,height:k.offsetHeight},b.speed,b.fx)}})}})(jQuery);