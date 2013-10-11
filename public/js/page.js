// JavaScript Document
	editAreaLoader.init({
		id: "zqq"	// id of the textarea to transform
		,fullscreen:true		
		,start_highlight: true	// if start with highlight
		,allow_resize: "both"
		,allow_toggle: false
		,word_wrap: true
		,language: "zh"
		,syntax: "php"	
		,toolbar: "new_document, save, load, |, search, go_to_line, |, undo, redo, |, select_font, |, history,|, currhistory, |, help"
		,is_multi_files: true
		,show_line_colors: true
		,load_callback: "myload"
		,save_callback: "mysave"
		,history_callback: "myhistory"
		,currhistory_callback: "currhistory"
	});
	
	function myload(){
		if(edituid!=0){
			edit_show("zh_openfile");
		}
		else{
			edit_show("zh_login");
		}
	}
	
	function mysave(eid, content){
		if(content=='' && !confirm("文件内容为空，确定保存？")){
			return false;
		}
		else if(content!='' && !confirm("确定保存？")){
			return false;
		}
		else{
			content = content.replace(/\+/g,"%2B");
    		content = content.replace(/\&/g,"%26");
			var fid = $(window.frames["frame_zqq"].document).find(".selected").attr("id");
			$.ajax({
				url:"./function/save.php",
				type:"POST",
				data:"fid="+fid+"&content="+content+"",
				dataType:"json",
				success: function(data){
					if(data.error!=0){
						alert(data.msg);
					}
					else{
						$(window.frames["frame_zqq"].document).find("#"+fid+" strong").hide();
						alert(data.msg);
					}
				}
			});
		}
	}
	
	function myhistory(more){
		edit_show("zh_history");
		$("#zh_history_show").html("<tr><td>正在加载，请稍后...</td></tr>");
		
		more = more?more:0;
		$.ajax({
			url:"./function/history.php",
			type:"POST",
			data:"more="+more+"",
			success: function(data){
				$("#zh_history_show").html(data);
			}
		});
	}
	
	function currhistory(more){
		var fid = $(window.frames["frame_zqq"].document).find(".selected").attr("id");
		if(fid==undefined){
			alert("您没有打开任何文件！");
			return false;
		}
		edit_show("zh_curr_history");
		$("#zh_currhistory_show").html("<tr><td>正在加载，请稍后...</td></tr>");
		
		more = more?more:0;
		$.ajax({
			url:"./function/curr_history.php",
			type:"POST",
			data:"more="+more+"&fid="+fid+"",
			success: function(data){
				$("#zh_currhistory_show").html(data);
			}
		});
	}
		
	function edit_getheight(){
		var wheight = $(window).height()-25;
		$("#zqq").css("height",wheight);
	}
	/*弹出框显示*/
	function edit_show(id){
		$("#"+id+"").show();
		$("#ly").show();	
	}
	/*弹出框影藏*/
	function edit_hide(id){
		$("#"+id+"").hide();
		$("#ly").hide();	
	}
	/*登录*/
	function edit_login(){
		var username = $("#zh_username").val();
		var password = $("#zh_password").val();
		var vcode = $("#zh_vcode").val();
		
		if(username=='' || password==''){
			alert("用户名和密码不能为空！");
			return false;
		}
		else if(vcode==''){
			alert("验证码不能为空！");
			return false;
		}
		else{
			$.ajax({
				url:"./function/login.php",
				type:"POST",
				data:"username="+username+"&password="+password+"&vcode="+vcode+"",
				dataType:"json",
				success: function(data){
					if(data.error==0){
						window.location.reload();
					}
					else{
						alert(data.msg);
					}
				}
			});
		}
	}
	/*上传文件*/
	var retvalue;
	function ajaxFileUpload(eid)
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});
		$.ajaxFileUpload
		(
			{
				url:'./function/upload.php',
				secureuri:false,
				fileElementId:''+eid+'',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					uploadcb(data);
				}
			}
		)
		return retvalue;
	}
	
	/*打开文件*/
	function edit_openfile(type){
		var path = $("#path_"+type+"").val();
		if(type==1){
			edit_path1(path);
		}
		else if(type==2){
			edit_path2(path);
		}
		else if(type==3){
			edit_path3();
		}
	}
		
	function edit_path1(path){
		if(path=='' || path=='../'){
			alert("请填写要打开文件的路径地址！");
			return false;
		}
		else{
			edit_hide("zh_history");
			edit_openit(1,path)
		}
	}
	
	function edit_path2(path){
		if(path=='' || path=='http://'){
			alert("请填写要打开页面的URL地址！");
			return false;
		}
		else{
			edit_hide("zh_history");
			edit_openit(2,path)
		}
	}
	
	function edit_path3(data){
		ajaxFileUpload('path_3');
	}
	
	function uploadcb(data){
		if(data.error==0){
			var path = data.file;
			edit_openit(3,path);
		}
		else{
			alert(data.msg);
			return false;
		}
	}
	
	function edit_openit(type,path){
		$.ajax({
			type:"POST",
			url:"./function/openfile.php",
			data:"type="+type+"&path="+path+"",
			dataType:"json",
			success: function(data){
				if(data.error==0){
					edit_hide("zh_openfile");
					var new_file= {id: ""+data.fid+"", text: ''+data.content+'', syntax: 'php', title: ''+data.fname+''};
					editAreaLoader.openFile('zqq', new_file);
				}
				else{
					alert(data.msg);
				}
			}
		});
	}
	
	$(function(){
		edit_getheight();
	})