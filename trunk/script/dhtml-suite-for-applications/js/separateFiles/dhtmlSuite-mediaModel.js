if(!window.DHTMLSuite)var DHTMLSuite=new Object();DHTMLSuite.mediaModel=function(inputArray){var id;var thumbnailPathSmall;var thumbnailPath;var largeImagePath;var title;var caption;try{if(!standardObjectsCreated)DHTMLSuite.createStandardObjects()}catch(e){alert('Include the dhtmlSuite-common.js file')}
if(inputArray)this.addItem(inputArray)}
DHTMLSuite.mediaModel.prototype=
{addItem:function(inputArray){this.id=inputArray['id'];if(inputArray['thumbnailPathSmall'])this.thumbnailPathSmall=inputArray['thumbnailPathSmall'];if(inputArray['thumbnailPath'])this.thumbnailPath=inputArray['thumbnailPath'];if(inputArray['largeImagePath'])this.largeImagePath=inputArray['largeImagePath'];if(inputArray['title'])this.title=inputArray['title'];if(inputArray['caption'])this.caption=inputArray['caption']}}
DHTMLSuite.mediaCollection=function(){var mediaObjects;this.mediaObjects=new Array()}
DHTMLSuite.mediaCollection.prototype={addItemsFromMarkup:function(elementId){var ul=document.getElementById(elementId);var lis=ul.getElementsByTagName('LI');for(var no=0;no<lis.length;no++){var img=lis[no].getElementsByTagName('IMG')[0];var index=this.mediaObjects.length;var mediaArray=new Object();mediaArray.id=lis[no].id;if(img){mediaArray.thumbnailPath=img.src}
mediaArray.title=lis[no].title;mediaArray.caption=lis[no].getAttribute('caption');mediaArray.largeImagePath=lis[no].getAttribute('largeImagePath');mediaArray.thumbnailPathSmall=lis[no].getAttribute('thumbnailPathSmall');this.mediaObjects[index]=new DHTMLSuite.mediaModel(mediaArray)}
DHTMLSuite.discardElement(ul)},__removeImage:function(idOfMedia){for(var no=0;no<this.mediaObjects.length;no++){if(this.mediaObjects[no].id==idOfMedia){var retVal=this.mediaObjects[no].id;this.mediaObjects.splice(no,1);return retVal}}
return false},getMediaById:function(idOfMedia){for(var no=0;no<this.mediaObjects.length;no++){if(this.mediaObjects[no].id==idOfMedia){return this.mediaObjects[no]}}
return false}}