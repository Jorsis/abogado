if(!window.DHTMLSuite)var DHTMLSuite=new Object();DHTMLSuite.modalMessage=function(props){var url;var htmlOfModalMessage;var domRef;var divs_transparentDiv;var divs_content;var iframeEl;var layoutCss;var width;var height;var isModal;var existingBodyOverFlowStyle;var dynContentObj;var cssClassOfMessageBox;var shadowDivVisible;var shadowOffset;var objectIndex;this.url='';this.htmlOfModalMessage='';this.layoutCss='modal-message.css';this.height=200;this.width=400;this.cssClassOfMessageBox=false;this.shadowDivVisible=true;this.shadowOffset=5;this.isModal=true;try{if(!standardObjectsCreated)DHTMLSuite.createStandardObjects()}catch(e){alert('Include the dhtmlSuite-common.js file')}
this.objectIndex=DHTMLSuite.variableStorage.arrayDSObjects.length;DHTMLSuite.variableStorage.arrayDSObjects[this.objectIndex]=this;var ind=this.objectIndex;DHTMLSuite.commonObj.addEvent(window,"resize",function(){DHTMLSuite.variableStorage.arrayDSObjects[ind].__resizeTransparentDiv()});if(props)this.__setInitialProps(props)}
DHTMLSuite.modalMessage.prototype={__setInitialProps:function(props){if(props.url)this.setSource(props.url);if(props.htmlOfModalMessage)this.setHtmlContent(props.htmlOfModalMessage);if(props.domRef)this.setDomReference(props.domRef);if(props.width)this.width=props.width;if(props.height)this.height=props.height;if(props.cssClassOfMessageBox)this.cssClassOfMessageBox=props.cssClassOfMessageBox;if(props.shadowOffset)this.shadowOffset=props.shadowOffset;if(props.shadowDivVisible)this.shadowDivVisible=props.shadowDivVisible;if(props.isModal||props.isModal===false||props.isModal===0)this.isModal=props.isModal;if(props.waitMessage)this.setWaitMessage(waitMessage)},setIsModal:function(isModal){this.isModal=isModal},setSource:function(urlOfSource){if(urlOfSource)this.__clearProperties();this.url=urlOfSource},setHtmlContent:function(newHtmlContent){if(newHtmlContent)this.__clearProperties();this.htmlOfModalMessage=newHtmlContent},setDomReference:function(domRef){if(domRef)this.__clearProperties();if(domRef)domRef=DHTMLSuite.commonObj.getEl(domRef);if(domRef){domRef=domRef.cloneNode(true)}
this.domRef=domRef},setSize:function(width,height){if(width)this.width=width;if(height)this.height=height},setCssClassMessageBox:function(newCssClass){this.cssClassOfMessageBox=newCssClass;if(this.divs_content){if(this.cssClassOfMessageBox)
this.divs_content.className=this.cssClassOfMessageBox;else
this.divs_content.className='modalDialog_contentDiv'}},setShadowOffset:function(newShadowOffset){this.shadowOffset=newShadowOffset
},setWaitMessage:function(newMessage){if(!this.dynContentObj){try{this.dynContentObj=new DHTMLSuite.dynamicContent()}catch(e){alert('Include dhtmlSuite-dynamicContent.js')}}
this.dynContentObj.setWaitMessage(newMessage)},setWaitImage:function(newImage){if(!this.dynContentObj){try{this.dynContentObj=new DHTMLSuite.dynamicContent()}catch(e){alert('Include dhtmlSuite-dynamicContent.js')}}
this.dynContentObj.setWaitImage(newImage)},setCache:function(cacheStatus){if(!this.dynContentObj){try{this.dynContentObj=new DHTMLSuite.dynamicContent()}catch(e){alert('Include dhtmlSuite-dynamicContent.js')}}
this.dynContentObj.setCache(cacheStatus)},display:function(){var ind=this.objectIndex;if(!this.divs_transparentDiv){DHTMLSuite.commonObj.loadCSS(this.layoutCss);this.__createDivElements()}
this.__resizeAndPositionDivElements();if(this.isModal){this.divs_transparentDiv.style.display='block'}else{this.divs_transparentDiv.style.display='none'}
this.divs_content.style.display='block';this.divs_shadow.style.display='block';if(this.iframeEl){setTimeout('DHTMLSuite.variableStorage.arrayDSObjects['+ind+'].iframeEl.style.display="block"',150)}
this.__resizeAndPositionDivElements();window.refToThisModalBoxObj=this;setTimeout('window.refToThisModalBoxObj.__resizeAndPositionDivElements()',100);this.__addHTMLContent()},setShadowDivVisible:function(visible){this.shadowDivVisible=visible},close:function(){document.documentElement.style.overflow='';this.divs_transparentDiv.style.display='none';this.divs_content.style.display='none';this.divs_shadow.style.display='none';if(this.iframeEl)this.iframeEl.style.display='none'},__clearProperties:function(){if(this.domRef)DHTMLSuite.discardElement(this.domRef);this.domRef=null;this.url=false;this.htmlOfModalMessage=false},__createDivElements:function(){this.divs_transparentDiv=document.createElement('DIV');this.divs_transparentDiv.className='DHTMLSuite_modalDialog_transparentDivs';this.divs_transparentDiv.style.left='0px';this.divs_transparentDiv.style.top='0px';this.divs_transparentDiv.id='transparentDiv';document.body.appendChild(this.divs_transparentDiv);if(!document.getElementById('DHTMLSuite_modalBox_contentDiv')){this.divs_content=document.createElement('DIV');this.divs_content.className='DHTMLSuite_modalDialog_contentDiv';this.divs_content.id='DHTMLSuite_modalBox_contentDiv';document.body.appendChild(this.divs_content)}else{this.divs_content=document.getElementById('DHTMLSuite_modalBox_contentDiv')}
this.divs_shadow=document.createElement('DIV');this.divs_shadow.className='DHTMLSuite_modalDialog_contentDiv_shadow';document.body.appendChild(this.divs_shadow);if(DHTMLSuite.clientInfoObj.isMSIE){this.iframeEl=document.createElement('<iframe frameborder=0 src="about:blank" scrolling="no">');this.iframeEl.style.filter='alpha(opacity=0)';this.iframeEl.style.cssText='filter:alpha(opacity=0)';this.iframeEl.style.position='absolute';this.iframeEl.style.zIndex=100001;this.iframeEl.style.display='none';this.iframeEl.style.left='0px';this.iframeEl.style.top='0px';document.body.appendChild(this.iframeEl)}},__resizeAndPositionDivElements:function(){var topOffset=Math.max(document.body.scrollTop,document.documentElement.scrollTop);if(this.cssClassOfMessageBox)
this.divs_content.className=this.cssClassOfMessageBox;else
this.divs_content.className='DHTMLSuite_modalDialog_contentDiv';if(!this.divs_transparentDiv)return;var bodyWidth=DHTMLSuite.clientInfoObj.getBrowserWidth();var bodyHeight=DHTMLSuite.clientInfoObj.getBrowserHeight();this.divs_content.style.width=this.width+'px';this.divs_content.style.height= this.height+'px';var tmpWidth=this.divs_content.offsetWidth;var tmpHeight=this.divs_content.offsetHeight;this.divs_content.style.left=Math.ceil((bodyWidth-tmpWidth)/2)+'px';;this.divs_content.style.top=(Math.ceil((bodyHeight-tmpHeight)/2)+topOffset)+'px';this.divs_shadow.style.left=(this.divs_content.style.left.replace('px','')/1+this.shadowOffset)+'px';this.divs_shadow.style.top=(this.divs_content.style.top.replace('px','')/1+this.shadowOffset)+'px';this.divs_shadow.style.height=tmpHeight+'px';this.divs_shadow.style.width=tmpWidth+'px';if(!this.shadowDivVisible)this.divs_shadow.style.display='none';this.__resizeTransparentDiv()},__resizeTransparentDiv:function(){if(!this.divs_transparentDiv)return;var divHeight=DHTMLSuite.clientInfoObj.getBrowserHeight();var divWidth=DHTMLSuite.clientInfoObj.getBrowserWidth();this.divs_transparentDiv.style.height=divHeight+'px';this.divs_transparentDiv.style.width=divWidth+'px';if(this.iframeEl){this.iframeEl.style.width=this.divs_transparentDiv.style.width;this.iframeEl.style.height=this.divs_transparentDiv.style.height}},__addHTMLContent:function(){if(!this.dynContentObj){try{this.dynContentObj=new DHTMLSuite.dynamicContent()}catch(e){alert('Include dhtmlSuite-dynamicContent.js')}}
if(this.url){this.dynContentObj.loadContent('DHTMLSuite_modalBox_contentDiv',this.url)}
if(this.htmlOfModalMessage){this.divs_content.innerHTML=this.htmlOfModalMessage}
if(this.domRef){this.divs_content.innerHTML ='';this.divs_content.appendChild(this.domRef);var dis=DHTMLSuite.commonObj.getStyle(this.domRef,'display');if(dis=='none')this.domRef.style.display='block';this.domRef.style.visibility='visible'}}}