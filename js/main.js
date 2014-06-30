$(document).ready(
	function() 
	{

		$('#datepicker').datepicker( { dateFormat : "yy-mm-dd"}, {showAnim : "blind"} );
		$('#submit').click( function() 
		{

			$.post( "ajax.php", 
				//Javascript object key for POST variable
				{
					first_name : $("#first_name").val(),
					last_name : $("#last_name").val(),
					dob : $("#datepicker").datepicker().val(), 
					user_name : $("#user_name").val(),
					pass_word : $("#pass_word").val()
				}, 
				function( data )
				{
					$("#responseText").val( data );
				}
			);

		});

	}
);