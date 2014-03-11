var appState = new applicationState()

function applicationState() {
  this.contextMenu = null
}

function loadContextMenu(path) {
  var xmlDoc
  var xslDoc
  var contextMenu

  if(path != "") {
    xmlDoc = new ActiveXObject('MSXML2.DOMDocument')
    xmlDoc.async = false;

    xslDoc = new ActiveXObject('MSXML2.DOMDocument')
    xslDoc.async = false;

    xmlDoc.load(path)
    xslDoc.load("style/context.xsl")

    if(appState.contextMenu != null) appState.contextMenu.removeNode(true)
  
    document.body.insertAdjacentHTML("beforeEnd", xmlDoc.documentElement.transformNode(xslDoc))
    contextMenu = document.body.childNodes(document.body.childNodes.length-1)

    contextMenu.style.left = window.event.x
    contextMenu.style.top = window.event.y

    appState.contextMenu = contextMenu
    window.event.cancelBubble = true
  }
}

function loadContextMenuSub(obj) {
  var contextMenu
  var parentMenu

  parentMenu = returnContainer(obj)
  contextMenu = document.all[obj.id + "Sub"]
  contextMenu.style.display = "block"
  contextMenu.style.top = obj.offsetTop + parentMenu.style.pixelTop
  contextMenu.style.left = obj.offsetWidth + parentMenu.style.pixelLeft
  parentMenu.subMenu = contextMenu
}

function contextHighlightRow(obj) {
  var parentMenu
  var subMenu
  var i

  parentMenu = returnContainer(obj)

  if(obj.selected == "false") {
    for(i=0; i < obj.childNodes.length; i++) {
      obj.childNodes(i).style.backgroundColor = "Highlight";
      obj.childNodes(i).style.color= "HighlightText";     
    }

    if(parentMenu.subMenu != null && parentMenu != parentMenu.subMenu) {
      subMenu = parentMenu.subMenu

      while(subMenu != null) {
        subMenu.style.display = "none"
        subMenu = subMenu.subMenu
      }
    }
    obj.selected = "true"
  }
  else {
    for(i=0; i < obj.childNodes.length; i++) {
		obj.childNodes(i).style.backgroundColor = "#FFFFFF";
		obj.childNodes(i).style.color = "#000000";
    }
    obj.selected = "false"
  }
}

function clean() {
  var contextMenu
  
  // remove and destroy context menu
  if(appState.contextMenu != null) {
    contextMenu = appState.contextMenu.removeNode(true)
    contextMenu = null
  }
}

function returnContainer(container) {
  while(container.tagName != "DIV") {
    container = container.parentNode  
  }
  return container
}