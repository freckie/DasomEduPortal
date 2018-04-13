$('#login-alert-modal').modal({
	keyboard:true
});

function modal_open() {
	$('#login-alert-modal').modal('show');
}

function login() {
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
				if(data.position == 'admin') {
					window.location.href = './admin.php';
				} else {
					window.location.href = './main.php';
				}
			} else if(data.status == 'error') {
				modal_open();
			} else if(data.status == 'non-admit') {
				alert("미승인된 계정입니다. 교육부장에게 문의하세요.");
			}
		},
	});
}

$(function() {

	$("#userpw").keydown(function (key) {
		if(key.keyCode == 13) {
			console.log('연터눌림');
			login();
		}
	});

	$("#login-btn").click(function () {
		login();

		return true;
	});
});