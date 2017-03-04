var cls_=function(obj){
	 return document.getElementsByClassName(obj);
}
var $=function(obj){
    return document.getElementById(obj);
}
var reply=cls_('reply');
var loadhold=cls_('loadhold')[0];
var loginhold=cls_('loginhold')[0];
var load=$('load');
var login=$('login');
var closeload=$('closeload');
var closelogin=$('closelogin');
var coverpage=$('coverpage');
load.onclick=function(){
     loadhold.style.display='block';
     coverpage.style.display='block';
}
closeload.onclick=function(){
     loadhold.style.display='none';
     coverpage.style.display='none'; 
}
login.onclick=function(){
     loginhold.style.display='block';
     coverpage.style.display='block'; 
}
closelogin.onclick=function(){
     loginhold.style.display='none';
     coverpage.style.display='none'; 
}

for(var i=0;i<reply.length;i++){
	reply[i].onclick=function(e){
		 var obj=e.target;
		 if(obj.className=="replyshow"){
         	this.getElementsByClassName('replyit')[0].style.display='block';
         	this.getElementsByClassName('replyshow')[0].style.display='none';
         	this.getElementsByClassName('replyhide')[0].style.display='inline-block';
         }
         if(obj.className=="replyhide"){
         	this.getElementsByClassName('replyit')[0].style.display='none';
         	this.getElementsByClassName('replyshow')[0].style.display='inline-block';
         	this.getElementsByClassName('replyhide')[0].style.display='none';
         }
    }
}

