
// function getdetails(){
//  var reg_no = $('#reg_no').val(); //reference the roll number id = rno
//  	$.ajax({
//  	 type: "POST",
//  	 url: "register_details.php",
//  	 data: {id:reg_no}, //name-value pair of data being POSTED
//  	 success: function(response) {
//                $('#butrow').fadeOut('slow'); //JQuery call on success
//      }  
//  	}).done(function( result ) {
//  		//Write to div area with id = msg
//  		$("#msg").html( " Details of User " +reg_no +" = "+result + "<br /><br /><strong>Refresh</strong> to make submit button re-appear" );
//  	});
// }

$(document).ready(function(){
	$("#submit").click(function(){
	// alert("..registering..");
	var name=$("#name").val();
	var age=$("#age").val();
	var email=$("#email").val();
	var reg_no = $('#reg_no').val();

	var data="reg_no=" + reg_no + "name=" + name + "&age=" + age + "&email=" + email;

		$.ajax({
			method:"post",
			url:"register_details.php?",
			data: data,
			success:function(data)
			{
				$("#butrow").fadeOut('slow'); //jquery call on success
			}
		}).done(function(result){
			//div area with id msg
			$("#msg").html("DETAILS OF THE USER IN TABULAR FORMAT" + result +
				"<br /><br /><strong>Refresh</strong> to make the button re-appear");
});
	
});
});
	