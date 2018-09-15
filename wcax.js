function Fgetunicode(str){
	var moji;
	var uni = "";
	for( var i=0;i<str.length;i++){
		moji = str.charCodeAt(i);
		if(moji <= 255){
			if(moji <=15){
				uni = uni + "%0" + moji.toString(16);
			} else if(moji >=48 && moji <=57){
				uni = uni + str.charAt(i);
			} else if(moji >=65 && moji <=90){
				uni = uni + str.charAt(i);
			} else if(moji >=97 && moji <=122){
				uni = uni + str.charAt(i);
			} else {
				uni = uni + "%" + moji.toString(16);
			}
		} else {
			uni = uni + "%u" + moji.toString(16);
		}
	}
	return uni;
}
function mySetCookie(myCookie, path, myValue, myS){
   var myExp = new Date();
   myExp.setTime(myExp.getTime()+(myS*1000));
   var myItem = "@" + myCookie + "=" + escape(myValue) + ";";
   var myExpires = "expires="+myExp.toGMTString();
   document.cookie =  myItem + "path="+path+";" + myExpires ;
}
function myGetCookie(myCookie){
   var myCookie = "@" + myCookie + "=";
   var myValue = null;
   var myStr = document.cookie + ";" ;
   var myOfst = myStr.indexOf(myCookie);
   if (myOfst != -1){
      var myStart = myOfst + myCookie.length;
      var myEnd   = myStr.indexOf(";" , myStart);
      myValue = unescape(myStr.substring(myStart,myEnd));
   }
   return myValue;
}

function FPathGet(){
    var p = location.pathname ;
    var r=p.substring(0,p.lastIndexOf("\/")+1);
    return r;
}
function AxWrite(s0,pno){
    var UcntCName=s0+"U_CNT";
    var PcntCName=s0+"P_CNT"+pno;
    var myUCnt = myGetCookie(UcntCName); 
    if (myUCnt == null){
       myUCnt = 0;
    }
    myUCnt = eval(myUCnt) + 1;
    var myPCnt = myGetCookie(PcntCName);
    if (myPCnt == null){
       myPCnt = 0; 
    }
    myPCnt = eval(myPCnt) + 1;
	if(location.protocol=='https:'){
	  strProtocol ='https:';
	} else {
	  strProtocol ='http:';
	}
    document.write('<IMG src="'+strProtocol+'//analytics.global-websystem.net/wgsys/wgax2.php'
    +'?name='+s0
    +'&dadr='+Fgetunicode(document.URL)
    +'&pno='+pno
    +'&ucnt='+myUCnt
    +'&pcnt='+myPCnt
    +"&sw="+(screen.width)
    +"&sh="+(screen.height)
    +'&cd='+(screen.colorDepth)
    +'&fadr='+Fgetunicode(document.referrer)
    +'" width=0 height=0 style="border:0px;">');
    mySetCookie(UcntCName,"/",myUCnt,30*60);
    mySetCookie(PcntCName,FPathGet(),myPCnt,30*60);
}

