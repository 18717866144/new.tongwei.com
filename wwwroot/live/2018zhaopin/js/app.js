//返回顶部
		function goTop(options) {			
			var defaults = {			
				showHeight : 150,
				speed : 100,
				contentWidth : 1200,
				width : 55,
				defaultShow:true,
				className: 'go-to-top',
				html:'<a class="go-to-top"></a>'
			};			
			var options = $.extend(defaults,options);
			var thisObj = '.'+options.className;
			var windowWidth = $(window).width();
			$(thisObj).css({'right':(windowWidth-options.contentWidth)/2 -options.width});
			var f=0;
			var s='';
			$(window).resize(function(){
				windowWidth = $(window).width();
				$(thisObj).css({'right':(windowWidth-options.contentWidth)/2 -options.width});
			});
			$(window).scroll(
				function(){
					$(window).scrollTop()  > options.showHeight ?  f=1 : f=2 ;
					if(f==1 && s!='show'){
						$(thisObj).show();
						s='show';
					}else if(f==2 && s!='hide'){
						$(thisObj).hide();
						s='hide';
					}else{
						
					}
				}
			);
			$(thisObj).click(function(){$("html,body").animate({scrollTop: 0}, options.speed);	});
		}
		
		$(function(){
			goTop();
		})
		