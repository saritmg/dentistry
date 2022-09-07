$(document).ready(function(){
	$("#register").click(function(){
	// alert("..registering..");
	var name=$("#name").val();
	var phone=$("#phone").val();
	var age=$("#age").val();
	var add=$("#address").val();
	var email=$("#email").val();
	var pass = $("#password").val();

	var data="name=" + name + "&phone=" + phone + "&age=" + age + "&add=" + add +
	"&email=" + email + "&pass=" + pass;

		$.ajax({
			method:"post",
			url:"register_form.php?",
			data: data,
			success:function(data)
			{
				$("#register_output").html(data);
			}
		});
});
	
});