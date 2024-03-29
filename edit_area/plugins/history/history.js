/**
 * Plugin designed for history prupose. It add a button (that manage an alert) and a select (that allow to insert tags) in the toolbar.
 * This plugin also disable the "f" key in the editarea, and load a CSS and a JS file
 */  
var EditArea_history= {
	/**
	 * Get called once this file is loaded (editArea still not initialized)
	 *
	 * @return nothing	 
	 */	 	 	
	init: function(){	
		//	alert("history init: "+ this._someInternalFunction(2, 3));
		editArea.load_css(this.baseURL+"css/history.css");
		//editArea.load_script(this.baseURL+"history2.js");
	}
	/**
	 * Returns the HTML code for a specific control string or false if this plugin doesn't have that control.
	 * A control can be a button, select list or any other HTML item to present in the EditArea user interface.
	 * Language variables such as {$lang_somekey} will also be replaced with contents from
	 * the language packs.
	 * 
	 * @param {string} ctrl_name: the name of the control to add	  
	 * @return HTML code for a specific control or false.
	 * @type string	or boolean
	 */
	 
	 /*	
	,get_control_html: function(ctrl_name){
		switch(ctrl_name){
			case "history_but":
				// Control id, button img, command
				return parent.editAreaLoader.get_button_html('history_but', 'history.gif', 'history_cmd', false, this.baseURL);
			case "history_select":
				html= "<select id='history_select' onchange='javascript:editArea.execCommand(\"history_select_change\")' fileSpecific='no'>"
					+"			<option value='-1'>{$history_select}</option>"
					+"			<option value='h1'>h1</option>"
					+"			<option value='h2'>h2</option>"
					+"			<option value='h3'>h3</option>"
					+"			<option value='h4'>h4</option>"
					+"			<option value='h5'>h5</option>"
					+"			<option value='h6'>h6</option>"
					+"		</select>";
				return html;
		}
		return false;
	}
	*/
	
	,get_control_html: function(ctrl_name){
		switch(ctrl_name){
			case "history":
				// Control id, button img, command
				return parent.editAreaLoader.get_button_html('history_but', 'history.gif', 'history_press', false, this.baseURL);
		}
		return false;
	}
	
	/**
	 * Get called once EditArea is fully loaded and initialised
	 *	 
	 * @return nothing
	 */	 	 	
	
	/*
	,onload: function(){ 
		alert("history load");
	}
	*/
	,onload: function(){ 
		if(editArea.settings["history_default"] && editArea.settings["history_default"].length>0)
			this.default_language= editArea.settings["history_default"];
	}
	
	/**
	 * Is called each time the user touch a keyboard key.
	 *	 
	 * @param (event) e: the keydown event
	 * @return true - pass to next handler in chain, false - stop chain execution
	 * @type boolean	 
	 */
	 
	 /*
	,onkeydown: function(e){
		var str= String.fromCharCode(e.keyCode);
		// desactivate the "f" character
		if(str.toLowerCase()=="f"){
			return true;
		}
		return false;
	}
	*/
	,onkeydown: function(e){
		
	}
	
	/**
	 * Executes a specific command, this function handles plugin commands.
	 *
	 * @param {string} cmd: the name of the command being executed
	 * @param {unknown} param: the parameter of the command	 
	 * @return true - pass to next handler in chain, false - stop chain execution
	 * @type boolean	
	 */
	 
	 /*
	,execCommand: function(cmd, param){
		// Handle commands
		switch(cmd){
			case "history_select_change":
				var val= document.getElementById("history_select").value;
				if(val!=-1)
					parent.editAreaLoader.insertTags(editArea.id, "<"+val+">", "</"+val+">");
				document.getElementById("history_select").options[0].selected=true; 
				return false;
			case "history_cmd":
				alert("user clicked on history_cmd");
				return false;
		}
		// Pass to next handler in chain
		return true;
	}
	*/
	
	,execCommand: function(cmd, param){
		// Handle commands
		switch(cmd){
			case "history_press":
				test();
				return false;
		}
		// Pass to next handler in chain
		return true;
	}
	
	/**
	 * This is just an internal plugin method, prefix all internal methods with a _ character.
	 * The prefix is needed so they doesn't collide with future EditArea callback functions.
	 *
	 * @param {string} a Some arg1.
	 * @param {string} b Some arg2.
	 * @return Some return.
	 * @type unknown
	 */
	 
	/* 
	,_someInternalFunction : function(a, b) {
		return a+b;
	}
	*/
	
};

editArea.add_plugin("history", EditArea_history);

function showdiv(){
	
	
}

function test(){
	//alert("你妹！");
	//showdiv("您好！");	
	$("#ly").show();
}