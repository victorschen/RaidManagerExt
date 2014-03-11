function dyniframesize(iframename)
{	

  var pTar = null;
  pTar =  parent.document.getElementById(iframename);

  if (pTar && !window.opera)
  {
    //begin resizing iframe
    pTar.style.display="block"
    
    if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight)
	{
      //ns6 syntax
      pTar.height = pTar.contentDocument.body.offsetHeight+FFextraHeight; 
    }
    else if (pTar.Document && pTar.Document.body.scrollHeight)
	{
      //ie5+ syntax
      pTar.height = pTar.Document.body.scrollHeight;
    }
  }
  
}

