function checkip(ip)
{   
    //modify 070920
	if(ip == "192.168.0.0" ||ip == "127.0.0.1" || ip == "127.0.0.0" ) return false;
	
    var scount=0;
    var iplength = ip.length;
    var Letters = "1234567890.";
    for (i=0; i < ip.length; i++){
       var CheckChar = ip.charAt(i);
       if (Letters.indexOf(CheckChar) == -1) return false;
    }

    for (var i = 0;i<iplength;i++){
      if(ip.substr(i,1)==".") scount++;
    }
    if(scount!=3) return false;

    first = ip.indexOf(".");
    last = ip.lastIndexOf(".");
    str1 = ip.substring(0,first);
    subip = ip.substring(0,last);
    sublength = subip.length;
    second = subip.lastIndexOf(".");
    str2 = subip.substring(first+1,second);
    str3 = subip.substring(second+1,sublength);
    str4 = ip.substring(last+1,iplength);

    if (str1=="" || str2=="" ||str3== "" ||str4 == "") return false;
    if (str1< 1 || str1 >255)    return false;
    else if (str2< 0 || str2 >255) return false;
    else if (str3< 0 || str3 >255) return false;	
    else if (str4< 0 || str4 >255) return false;

    return true;
}
