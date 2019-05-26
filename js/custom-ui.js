$(document).ready(function(){
	var protocol = location.protocol;
	var slashes = protocol.concat("//");
	var host = slashes.concat(window.location.hostname);
	$("#filer_input2").filer({limit:5,maxSize:50,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:null,type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
$("#image_file").val($("#image_file").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#image_file").val();$("#image_file").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

$("#filer_input3").filer({limit:3,maxSize:30,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:null,type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
$("#banner_image").val($("#banner_image").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#banner_image").val();$("#banner_image").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});$("#filer_input4").filer({limit:1,maxSize:10,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:null,type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
$("#logo_image").val(new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#logo_image").val();$("#logo_image").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input5").filer({limit:2,maxSize:50,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:null,type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
		$("#sub_banner_image").val($("#sub_banner_image").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#sub_banner_image").val();$("#sub_banner_image").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input9").filer({limit:1,maxSize:10,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:{watermark:0},type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
		$("#logo_image").val(new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#logo_image").val();$("#logo_image").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input10").filer({limit:3,maxSize:30,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:{watermark:0},type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
		$("#banner_image").val($("#banner_image").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#banner_image").val();$("#banner_image").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input11").filer({limit:2,maxSize:20,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:{watermark:0},type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
		$("#sub_banner_image").val($("#sub_banner_image").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#sub_banner_image").val();$("#sub_banner_image").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input20").filer({limit:3,maxSize:30,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:{watermark:0},type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
		$("#product_details").val($("#product_details").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#product_details").val();$("#product_details").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input21").filer({limit:3,maxSize:30,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:{watermark:0},type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
		$("#product_images").val($("#product_images").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#product_images").val();$("#product_images").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input23").filer({limit:10,maxSize:100,fileMaxSize:10,extensions:['jpg','jpeg','gif','png','pdf','doc','docx','txt'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:{watermark:0},type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=host+"/uploads/"+new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
		$("#service_documents").val($("#service_documents").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#service_documents").val();$("#service_documents").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

	$("#filer_input24").filer({limit:1,maxSize:50,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:null,type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
$("#image_file").val($("#image_file").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+host+"/uploads/"+file_name;$.post(SITE_URL+"site/DeleteImageFromS3",{file:file_name});image_file_string=$("#image_file").val();$("#image_file").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

    $("#filer_input_store_logo").filer({limit:1,maxSize:50,fileMaxSize:10,extensions:['jpg','jpeg','gif','png'],changeInput:'<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',showThumbs:true,theme:"dragdropbox",templates:{box:'<ul class="jFiler-items-list jFiler-items-grid"></ul>',item:'<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',itemAppend:'<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',progressBar:'<div class="bar"></div>',itemAppendToEnd:false,canvasImage:true,removeConfirmation:true,_selectors:{list:'.jFiler-items-list',item:'.jFiler-item',progressBar:'.bar',remove:'.jFiler-item-trash-action'}},dragDrop:{dragEnter:null,dragLeave:null,drop:null,dragContainer:null},uploadFile:{url:SITE_URL+"site/AjaxImageUpload",data:null,type:'POST',enctype:'multipart/form-data',synchron:true,beforeSend:function(){},success:function(data,itemEl,listEl,boxEl,newInputEl,inputEl,id){var parent=itemEl.find(".jFiler-jProgressBar").parent(),new_file_name=JSON.parse(data),new_file_name_url=new_file_name;filerKit=inputEl.prop("jFiler");filterkit_length=filerKit.files_list.length;if(id>=filterkit_length){filerKit.files_list[filterkit_length-1].name=new_file_name;}else{filerKit.files_list[id].name=new_file_name;}
                $("#image_file").val($("#image_file").val()+','+new_file_name_url);itemEl.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");});},error:function(el){var parent=el.find(".jFiler-jProgressBar").parent();el.find(".jFiler-jProgressBar").fadeOut("slow",function(){$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");});},statusCode:null,onProgress:null,onComplete:null},files:null,addMore:false,allowDuplicates:true,clipBoardPaste:true,excludeName:null,beforeRender:null,afterRender:null,beforeShow:null,beforeSelect:null,onSelect:null,afterShow:null,onRemove:function(itemEl,file,id,listEl,boxEl,newInputEl,inputEl){var filerKit=inputEl.prop("jFiler"),file_name=filerKit.files_list[id].name;new_file_name_url=","+file_name;image_file_string=$("#image_file").val();$("#image_file").val(image_file_string.replace(new_file_name_url,''));},onEmpty:null,options:null,dialogs:{alert:function(text){return alert(text);},confirm:function(text,callback){confirm(text)?callback():null;}},captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only {{fi-extensions}} Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}});

})
