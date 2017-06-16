(function($){
	//Multi Edit For New
    $.fn.extend({
        mxnphpMultiSelect: function() {
            return this.each(function() {
				var parameters = $(this).attr("title").split(',');
				var accumulator_id = parameters[0];
				var input_field = $("#"+parameters[1]);
				//funcion multi-select
				$(this).change(function(e){
					var key = $(this).val();
					val = $(this).children("option:selected").html();	
					if(key != ""){
						if(!in_array(input_field.val(),key)){
							$("#"+accumulator_id).append("<span class='accumulated new'>"+val+"<a href='#'></a></span>");
							if(input_field.val()!="") input_field.val(input_field.val()+",");
							input_field.val(input_field.val()+key);
						};
					};
				});
				
				//funcion delete-select
				$("#"+accumulator_id+" .accumulated.new a").live("click",function(e){
					e.preventDefault();
					var index = $(this).parent().index();
					$(this).parent().remove();
					array = input_field.val();
					array = remove_item(index,array);
					input_field.val(array);
				});
				
			});
        }	
    });
	//Multi-input for Edit
	$.fn.extend({
        mxnphpMultiEdit: function(options) {
            var defaults = {
				add_callback : false, 
				delete_callback: false
            }
            var options =  $.extend(defaults,options);
			//console.log(options.add_callback);
			//options.add_callback('hello');
			//console.log(options);
            return this.each(function() {
				var parameters = $(this).attr("title").split(',');
				var accumulator = $("#"+parameters[0]);
				var input_field = $("#"+parameters[1]);
				var action_url = parameters[2];
				var delete_url = parameters[3];
				var parent_id = $("#"+parameters[4]).val();
				
				//funcion multi-select edit
				$(this).change(function(e){
					var key = $(this).val();
					var val = $(this).children("option:selected").html();
					if(key != ""){						
						if(!in_array(input_field.val(),key)){
							var spinner = $(this).after("<div class='spinner'></div>").next();
							$.post(action_url,{parent:parent_id,son:key},function(data){
								spinner.remove();
								var label = $("<span class='"+accumulator.attr("id")+" accumulated edit'>"+val+"<a href='#"+data+"' class='del'></a></span>");
								accumulator.append(label);
								if(input_field.val()!="") input_field.val(input_field.val()+",");
								input_field.val(input_field.val()+key);
								if(options.add_callback){
									options.add_callback(label,data,val);
								}
							});
						};
					};
				});
				//funcion delete-select edit
				$("#"+accumulator.attr("id")+" .accumulated.edit a").live("click",function(e){
					e.preventDefault();
					//options.delete_callback($(this).parent(),e);
					var pid = $(this).attr("href").split("#");
					var index = $(this).parent().index();					
					$(this).parent().remove();
					array = input_field.val();
					array = remove_item(index,array);
					input_field.val(array);					
					$.post(delete_url,{id:pid[1]});
				});
				
			});
        }
    });
	//Menu Function
	$.fn.extend({
		mxnphpAdminMenu: function(){
			return this.each(function() {
				var selector = "#"+$(this).attr("id")+" a";
				$(selector).click(function(e){
					e.preventDefault();
					var parent = $(this);
					var child = parent.parent().children("ul");
					if(child.length > 0){
						parent.toggleClass('on');
						child.slideToggle("fast","swing");
						child.toggleClass('on');
					}else{
						window.location = parent.attr("href");
					}
				});
			});
		}
	});
	//SubMenu Function
	$.fn.extend({
		mxnphpAdminSubmenu: function(){
			return this.each(function() {
				$(this).click(function(e){
					e.preventDefault();
					var index = $(this).parent().index();
					var top_container = "#"+$(this).parent().parent().next().attr("id");
					$(this).parent().parent().children("li").children(".on").removeClass("on");
					$(this).parent().parent().children().eq(index).children("a").addClass("on");
					$(top_container+" .container.on").removeClass("on");
					$(top_container+" .container").eq(index).addClass("on");
				});
			});
		}
	});
	//Tabs
	$.fn.extend({
		mxnphpAdminTabs: function(){
			return this.each(function() {
				$(this).click(function(e){
					e.preventDefault();
					var current = $("#content .tabs .on").index();
					var new_tab = $(this).index();
					$("#content .tabs .on").removeClass("on")
					$("#content .tabs a").eq(new_tab).addClass("on");
					$("#content .center").eq(current).hide();
					$("#content .center").eq(new_tab).show();
				});
			});
		}
	});
	//Messages
	$.fn.extend({
		mxnphpAdminMessages: function(){
			return this.each(function() {
				$(this).click(function(e){
					e.preventDefault();
					$("#messages").slideUp("fast");
					$("#messages").hide();
				});
			});
		}
	});
	//Delete Prompt	
	$.fn.extend({
		mxnphpAdminDelete: function(){
			return this.each(function() {
				$(this).click(function(e){
					e.preventDefault();
					url = $(this).attr("href");
					$("#overlay .ans.yes").attr('href',url);
					$("#overlay").fadeIn(80,'swing');
					$("#overlay").css("display","table");
					$("#overlay").css("z-index","4");
				});
				$("#overlay .ans.no").click(function(e){
					e.preventDefault();
					$("#overlay").fadeOut(80,'swing');
				});
				$("#overlay .clickarea").click(function(e){
					$("#overlay").fadeOut(80,'swing',function(){
						if(box != false)
							$("#overlay .box").html(box);
					});
				});
			});
		}
	});
	//Datepicker Function
	$.fn.extend({
		mxnphpDatepicker: function(){
			return this.each(function() {
				var real_input_id = "#"+$(this).next().attr("id");
				$(this).datepicker({
					inline: false,
					altField : real_input_id,
					altFormat : 'yy-mm-dd',
					dateFormat : 'dd/mm/yy'
				});
			});
		}
	});
	//Single Image Function
	$.fn.extend({
		mxnphpSingleImage: function(callback){
			
			$(".option_erase").click(mxnphp_image_erase);
			return this.each(function(){
				var params = $(this).attr("title").split(",");
				if($(this).hasClass("new")){
					$(this).uploadify({
						'uploader'       : '/scripts/uploadify.swf',
						'cancelImg'      : '/scripts/cancel.png',
						'script'         : params[0],
						'auto'           : true,
						'multi'          : false,
						'onComplete'     : mxnphp_new_image
					});
				}else if($(this).hasClass("edit")){
					$(this).uploadify({
						'uploader'       : '/scripts/uploadify.swf',
						'cancelImg'      : '/scripts/cancel.png',
						'script'         : params[0],
						'auto'           : true,
						'multi'          : false,
						'scriptData' 	 : {id:params[1],callback:callback},
						'onComplete'	 : mxnphp_new_image
					});
				};				
			});
		}
	});
	//Multi Image Function
	$.fn.extend({
		mxnphpMultiImage: function(){
			return this.each(function(){
				var params = $(this).attr("title").split(",");
				$(this).uploadify({
					'uploader'       : '/scripts/uploadify.swf',
					'cancelImg'      : '/scripts/cancel.png',
					'script'         : params[0],
					'auto'           : true,
					'multi'          : true,
					'scriptData' 	 : {id:params[1]},
					'onComplete'	 : mxnphp_multi_image
				});
			});
		}
	});
	//Password 
    $.fn.extend({
        mxnphpPassword: function(params) {
			defaults = {
				requireCap : true,
				requireSpecialChar : true,
				requireNum : false,
				minLength : 6,
				errorClass : "error",
				validClass : "valid",
				verifyField : false,
				hideSave : false
			};
			params = $.extend(defaults,params);
            return this.each(function(){
				var pField = $(this);
				if(params.hideSave) params.hideSave.hide();
				pField.keyup(function(){
					var val = $(this).val();					
					var caps = params.requireCap ? /[A-Z]/.test(val) : true;
					var num = params.requireNum ? /[0-9]/.test(val) : true;
					var spec = params.requireSpechialChar ? /\W/.test(val) : true;
					var length = val.length >= params.minLength;
					var valid = caps && num && spec && length;
					var message_class = valid ? params.validClass : params.errorClass;
					pField.removeClass(params.validClass).removeClass(params.errorClass).addClass(message_class);
					if(params.verifyField){
						if(!valid) 
							params.verifyField.attr("disabled", "disabled"); 
						else
							params.verifyField.removeAttr("disabled");
					}
					if(params.hideSave){
						var verifyField = params.verifyField ? params.verifyField.hasClass(params.validClass) :  true;
						if(verifyField && valid){
							params.hideSave.show();
						}else{
							params.hideSave.hide();
						}
					}
				});
				if(params.verifyField){
					params.verifyField.keyup(function(){
						var valid = pField.hasClass(params.validClass);						
						var match = false;
						if(params.verifyField.length){
							match = params.verifyField.val() === pField.val();
							var message_class = match ? params.validClass : params.errorClass;
							params.verifyField.removeClass(params.validClass).removeClass(params.errorClass).addClass(message_class);
						}else{
							params.verifyField.removeClass(params.validClass).removeClass(params.errorClass);
							match = false;
						}
						if(params.hideSave){
							if(match && valid){
								params.hideSave.show();
							}else{
								params.hideSave.hide();
							}
						}
					});
				}
			});
        }	
    });
	function mxnphp_multi_image(event, queueID, fileObj, response, data){
		//console.log(response);
		var image = $.parseJSON(response);
		if(image){
			var gallery_div = $(event.target).parent().next();
			gallery_div.append(mxnphp_make_image(image));
		}
	}
	function mxnphp_new_image(event, queueID, fileObj, response, data){	
		//console.log(response);
		var image = $.parseJSON(response);
		if(image){			
			var input = $(event.target).prev();			
			var image_p = input.parent().next();
			var div = mxnphp_make_image(image);
			image_p.html("");
			image_p.append(div);
			input.val(image.filename);			
			//eval(image.callback);
		}
	}
	function mxnphp_make_image(image){
		var size = (typeof image.size != 'undefined') ? image.size : image.tiny;
		var img = $(document.createElement('img')).attr("src",size+"?r="+Math.floor(Math.random()*100001));
		var img_link = $(document.createElement('a')).attr("href",image.full).append(img);
		var delete_link = $(document.createElement('a')).attr("href",image.delete_url).addClass("option_erase").html("erase").click(mxnphp_image_erase);
		var main_container = $(document.createElement('div')).addClass("photo").append(img_link,delete_link);
		return main_container;
	}
	function mxnphp_image_erase(e){
		e.preventDefault();
		var url = $(this).attr("href");
		var container = $(this).parent();
		var input = container.parent().prev().children("input:hidden");
		input.val('');
		container.remove();
		$.post(url);
	}
	function in_array(input_string,valor){
		var values = input_string.split(",");
		for(key in values){
			if(values[key] == valor){
				return true;
			}
		}
		return false;
	}
	function remove_item(index,array){
		array = array.split(",");
		var new_array = "";
		for(key in array){
			if(key != index){
				if(new_array != "") new_array = new_array+",";
				new_array = new_array+array[key];
			}
		}
		return new_array;
	}     
})(jQuery);