/**
 * Search
 *
 * Auto-complete search word Class
 */

if(typeof(weburl)!='undefined') var wordlist_url = weburl+'/suggestwordList.php';
else var wordlist_url = 'suggestwordList.php';


var Search = Class.create();
Search.prototype = {

	/**
	 * Creator
	 *
	 * @param input: Keyword input box
	 * @param panel: diplay panel for suggested words
	 */
	initialize: function(input, panel) {

		this.input = input;
		this.panel = panel;

		Event.observe(input, 'keyup', this.doOnKeyUp.bindAsEventListener(this));
		Event.observe(input, 'keypress', this.doOnKeyPress.bindAsEventListener(this));
		Event.observe(panel, 'click', this.doOnClick.bindAsEventListener(this));

	},

	setSearchWord: function(searchWord) {
		this.input.value = searchWord;
		if(this.panel.visible()) {
			this.panel.hide();
			this.panel.innerHTML = '';
		}
	},

	doOnKeyUp: function(e) {

		if ((e.keyCode == Event.KEY_RETURN) || (e.keyCode == Event.KEY_UP) || (e.keyCode == Event.KEY_DOWN) ||
			(e.keyCode == Event.KEY_LEFT) || (e.keyCode == Event.KEY_RIGHT) || (e.keyCode == Event.KEY_ESC) ||
			(e.keyCode == 229)) {
			return;
		}

		this.request(e);
	},

	items: null,
	currItem: -1,
	doOnKeyPress: function(e) {

		if(e.keyCode!=Event.KEY_RETURN && e.keyCode!=Event.KEY_ESC
			&& e.keyCode!=Event.KEY_UP && e.keyCode!=Event.KEY_DOWN
			&& e.keyCode!=Event.KEY_LEFT && e.keyCode!=Event.KEY_RIGHT) {
			return;
		}

		if(e.keyCode==Event.KEY_ESC || this.input.value=='') {

			this.currItem = -1;
			this.panel.hide();

			return false;
		}

		if(!this.items || this.items.length==0) {
			return;
		}


		switch(e.keyCode) {

		case Event.KEY_RETURN:

			if(this.currItem>=0 && this.items[this.currItem]) {
				this.setSearchWord(this.items[this.currItem].innerHTML.stripTags().strip().unescapeHTML());
			}
			break;

		case Event.KEY_DOWN:

			if(this.currItem>=0) {
				this.items[this.currItem].removeClassName('hover');
			}

			this.currItem = (this.currItem<this.items.length-1)? this.currItem + 1: 0;
			this.items[this.currItem].addClassName('hover');
//			alert("currentItem = " + this.currItem + "\nlength = " + this.items.length);
			break;

		case Event.KEY_UP:

			if(this.currItem>=0) {
				this.items[this.currItem].removeClassName('hover');
			}

			this.currItem = (this.currItem>0)? this.currItem - 1: this.items.length - 1;
			this.items[this.currItem].addClassName('hover');
			break;

		case Event.KEY_LEFT:

			if(this.currItem>=0) {
				this.items[this.currItem].removeClassName('hover');
			}

			if(this.items.length>5) {
				this.currItem = (this.currItem>=5)? this.currItem - 5: (this.currItem - 5) + this.items.length;
			}
			else {
				this.currItem = (this.currItem>0)? this.currItem - 1: this.items.length - 1;
			}

			this.items[this.currItem].addClassName('hover');
			break;

		case Event.KEY_RIGHT:

			if(this.currItem>=0) {
				this.items[this.currItem].removeClassName('hover');
			}

			if(this.items.length>5) {
				this.currItem = (this.currItem<this.items.length - 5)? this.currItem + 5: this.currItem + 5 - this.items.length;
			}
			else {
				this.currItem = (this.currItem<this.items.length - 1)? this.currItem + 1: 0;
			}

			this.items[this.currItem].addClassName('hover');
			break;

		default:
			break;
		}

		this.cancelBubble();
		return;
	},

	cancelBubble: function(ev) {

		var e = ev;
		if (!e) {
			e = window.event;
		}

		e.cancelBubble = true;
		if (e.stopPropagation) {
			e.stopPropagation();
		}
	},

	doOnClick: function(e) {

		var o = Event.element(e);
		Element.extend(o);

		if(o.tagName.toLowerCase()=='span') {
			o = o.up();
		}
		else if(o.tagName.toLowerCase()!='li') {
			return false;
		}

		this.input.value = o.innerHTML.stripTags().strip().unescapeHTML();

		//alert(this.input.form.name);
		this.input.form.submit();
	},

	WORDLIST_URL: wordlist_url,
	request: function(e) {

		if(this.input.value=='') {

			this.currItem = -1;
			this.panel.hide();

			return;
		}

		if(!this.panel.visible()) {
			this.panel.show();
		}

/*		new Ajax.Updater(this.panel, this.WORDLIST_URL, {
			method: "get",
//			parameters: $(this.input.form).serialize()
			parameters: {
				searchWord: this.input.value
			}
//			insertion: Insertion.Bottom
		});
*/
		new Ajax.Request(this.WORDLIST_URL, {

				method: "get",
				
				parameters: {
					searchWord: this.input.value,
					language: this.input.form.language.value
				},

				onSuccess: (function(transport) {
				//alert(transport.responseText);
					this.panel.innerHTML = transport.responseText;
					this.items = this.panel.getElementsBySelector('li');
					if(!this.items || this.items.length==0) {
						this.panel.hide();
					}
				}).bind(this),
				onFailure: function(transport) {
//					this.panel.hide();
				},
				onException: function(request, exception) {
//					this.panel.hide();
				}
			}
		);

	}
};



        function addListener(element,e,fn){ 
     if(element.addEventListener){ 
    element.addEventListener(e,fn,false); 
     } else { 
     element.attachEvent("on" + e,fn); 
     } 
    }
        addListener(document,"click",function(evt){ 


                var evt = window.event?window.event:evt,target=evt.srcElement||evt.target;
                var c = 0;
				var clickArea = 0;
                    while(target!=null && target.id != "searchform"){
                        target = target.parentNode;

						if(target!=null && target.id=='searchform') clickArea = 1;

						if(c++ >= 5) break;

                    }

                if(clickArea==0) document.getElementById('autocompletepanel').style.display='none';
    
         
        }) 

