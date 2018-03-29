$('#id-success-modal').modal({
	keyboard:true
});

$('#id-fail-modal').modal({
	keyboard:true
});

$(function() {
	$("#login-btn").click(function() {
		$.ajax({
			type:'post',
			url:'./../php/id_dup_check.php',
			data: {
				userid: $('#userid').val()
			},
			dataType: 'json',
			success: function(data) {
				console.log(data);
				if(data.status == 'success') {
					$('#id-success-modal').modal('show');
				} else if(data.status == 'error') {
					$('#id-fail-modal').modal('show');
				}
			},
		});
	});
});