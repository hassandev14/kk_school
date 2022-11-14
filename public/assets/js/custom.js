//////////////////////////////////// this is used for student///////////////////////////////////////////////////////////////////////
function get_students() {
	var class_id = $('#class_id').find(":selected").val();
	request = $.ajax({
        url: "/get_students",
        type: "get",
        data: "class_id="+class_id
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		
		$("#std_div").html(response);
        console.log(response);
    });
}


//////////////////////////////////// this is used for student Attendence///////////////////////////////////////////////////////////////////////
function see_attendence()
{

	var today_date = $('.hassaan').val();
	var class_id = $('#class_id').find(":selected").val();
	request = $.ajax({
        url: "/see_attendence",
        type: "get",
        data: "class_id="+class_id+'&today_date='+today_date
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		
		$("#std_div").html(response);
        console.log(response);
    });
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function get_students_for_fee() {
	var class_id = $('#class_id').find(":selected").val();
	request = $.ajax({
        url: "/get_students_for_fee",
        type: "get",
        data: "class_id="+class_id
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		
		$("#std_div").html(response);
        console.log(response);
    });	
}

//////////////////////////////////// this is used for student Fee///////////////////////////////////////////////////////////////////////
function see_students_fee_paid()
{

	var submit_date = $('.hassaan').val();
	var class_id = $('#class_id').find(":selected").val();
	request = $.ajax({
        url: "/see_students_fee_paid",
        type: "get",
        data: "class_id="+class_id+'&submit_date='+submit_date
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
		
		$("#std_div").html(response);
        console.log(response);
    });
	
}