$('#login-alert-modal').modal({
	keyboard:true
});

function modal_open() {
	$('#login-alert-modal').modal('show');
}

$(function() {
	$("#login-btn").click(function() {
		$.ajax({
			type:'post',
			url:'./../php/login_check.php',
			data: {
				username:$('#username').val(),
				userpw:$('#userpw').val(),
			},
			dataType: 'json',
			success: function(data) {
				if(data.status == 'success') {
					console.log('로그인 성공');
					window.location.href = './main.php';
				} else if(data.status == 'error') {
					modal_open();
				}
			},
		});

		return true;
	});
});