//0002
var WC = new Object();
WC.event = new Object();
var WC3ReadyBound = false;
var WC3isReady = false;
function WC3BindReady(){
  if ( WC3ReadyBound ) return;
    WC3ReadyBound = true;
  if ( document.addEventListener ) {
    document.addEventListener( "DOMContentLoaded", function(){
      document.removeEventListener( "DOMContentLoaded", arguments.callee, false );
      WC.targetLinks();
    }, false );
  } else if ( document.attachEvent ) {
    document.attachEvent("onreadystatechange", function(){
      if ( document.readyState === "complete" ) {
        document.detachEvent( "onreadystatechange", arguments.callee );
        WC.targetLinks();
      }
    });
    if ( document.documentElement.doScroll && window == window.top ) (function(){
      if ( WC3isReady ) return;
      try {
        document.documentElement.doScroll("left");
      } catch( error ) {
        setTimeout( arguments.callee, 0 );
        return;
      }
      WC.targetLinks();
    })();
  }
  else{
    WC.event.add(window, "load", WC.targetLinks);
  }
}
WC3BindReady();

WC.targetLinks = function(){
 if (!document.getElementsByTagName) return;
 var anchors = document.getElementsByTagName("a");
 var target ;
 for (var i=0; i<anchors.length; i++) {
   var anchor = anchors[i];
   var anchor_class = anchor.getAttribute("className");
   if (anchor_class==null){
      var anchor_class = anchor.getAttribute("class");
  }
  if (anchor_class!=null){
     var point = anchor_class.indexOf("wctr_",0);
     if (point!= -1){
       target = anchor_class.substr(point+4, anchor_class.length-(point+4));
       point = target.indexOf(" ",0);
       if (point !=-1){
         target = target.substr(0,point) ;
       }
       if (!(target == "_blank"  || target == "_parent" || target == "_self" || target == "_top")) {
          target = target.substr(1,target.length-1) ;
       }
      anchor.target = target;
    }
  }

 }
 WC3isReady = true;
}
WC.event.add = function(elm_, type_, func_) {
  if(! elm_) { return false; }
  if(elm_.addEventListener) {
    elm_.addEventListener(type_, func_, false);
  } else if(elm_.attachEvent) {
    elm_.attachEvent('on'+type_, func_);
  } else {
    return false;
  }
  return true;
};
WC.event.remove = function(elm_, type_, func_) {
  if(! elm_) { return false; }
  if(elm_.removeEventListener) {
    elm_.removeEventListener(type_, func_, false);
  } else if(elm_.detachEvent) {
    elm_.detachEvent('on'+type_, func_);
  } else {
    return false;
  }
  return true;
};
WC.event.target = function(evt_) {
  if(evt_ && evt_.target) {
    if(evt_.target.nodeType == 3) {
      return evt_.target.parentNode;
    } else {
      return evt_.target;
    }
  } else if(window.event && window.event.srcElement) {
    return window.event.srcElement;
  } else {
    return null;
  }
};
