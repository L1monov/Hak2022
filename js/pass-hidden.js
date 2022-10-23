
			$('body').on('click', '.password-control', function(){
				if ($('#input-password').attr('type') == 'password'){
					$(this).addClass('view');
					$('#input-password').attr('type', 'text');
				} else {
					$(this).removeClass('view');
					$('#input-password').attr('type', 'password');
				}
				return false;
			});
			$('body').on('click', '.reply-password-control', function(){
				if ($('#input-reply-password').attr('type') == 'password'){
					$(this).addClass('view');
					$('#input-reply-password').attr('type', 'text');
				} else {
					$(this).removeClass('view');
					$('#input-reply-password').attr('type', 'password');
				}
				return false;
			});