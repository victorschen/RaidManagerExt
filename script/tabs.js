	var currentTab = null;
	
	function mouseOver(tab){
		if(tab != currentTab){
			document.getElementById(tab).style.backgroundImage = "url(style/default/tab_hover.gif)";
		}
	}
	
	function mouseOut(tab){
		if(tab != currentTab){
			document.getElementById(tab).style.backgroundImage = "url(style/default/tab_normal.gif)";
		}
	}
	
	function mouseClick(tab){
		if(currentTab != null){
			document.getElementById(currentTab).style.backgroundImage = "url(style/default/tab_normal.gif)";
		}
		currentTab=tab;
		document.getElementById(tab).style.backgroundImage = "url(style/default/tab_click.gif)";
		properties.style.visibility = 'hidden';
		saveproperties.style.visibility = 'hidden';
		switch(tab){
			case 'options':
				properties.style.visibility = 'visible';
				break;
			case 'save':
				saveproperties.style.visibility = 'visible';
				break;
			case 'rebuild':
				rebuildraid.style.visibility = 'visible';
				break;
		}
	}