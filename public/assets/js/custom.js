function get_students(class_id) {
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