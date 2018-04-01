var isChecked = false;

$('#id-success-modal').modal({
	keyboard:true
});

$('#id-fail-modal').modal({
	keyboard:true
});

// When page loaded.
$(function() {
	// ID Input value change event
	$('#userid').change(function() {
		isChecked = false;
	});

	// Dup Checking with AJAX
	$("#dup-check-btn").click(function() {
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
				} else if(data.status == 'non-admit') {
					alert("미승인된 계정입니다. 교육부장에게 문의하세요.");
				}
			},
		});
	});

	// modal control
	$("#modal-cancel1-btn").click(function() {
		isChecked = false;
		$('#userid').val('');
		$('#id-success-modal').modal('hide');
	});

	// modal control
	$("#modal-cancel2-btn").click(function() {
		isChecked = false;
		$('#userid').val('');
		$('#id-fail-modal').modal('hide');
	});

	// modal control
	$("#modal-ok-btn").click(function() {
		isChecked = true;
		$('#id-success-modal').modal('hide');
	});

	// Signup Button control
	$("#signup-btn").click(function() {
		console.log('SignUp processing..');
		if(isChecked == false)
		{
			alert("ID 중복체크를 해주세요.");
			return false;
		}
		else
		{
			var re = /[0-9]{10}/;
			if(!($("#usernum").val().match(re)))
			{
				alert("학번을 정확하게 입력해주세요.");
				return false;
			}
			else
			{
				var regExp = /[0-9a-zA-Z][_0-9a-zA-Z-]*@[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+){1,2}$/;
				
				// email not match
				if (!($("#usermail").val().match(regExp)))
				{
					alert("이메일을 정확하게 입력해주세요.");
					return false;
				}
				else
				{
					$("#signup-form").submit();
					return true;
				}
			}
		}
	});
});