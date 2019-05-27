	
OrganizeUsers();
changeUsers();
insertMessage();
websocket_handler();
deleteMessage();


	/**
	 * a method to Handle the front-end Websocket using Pusher
	 * for realtime change to the chat box.
	 */
	function websocket_handler(){
		// Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('533e0bb6806be7633a1f', {
          cluster: 'eu',
          forceTLS: true
        });
        var channel = pusher.subscribe('chatbot');
        channel.bind('App\\Events\\Sent', addMessage);
        function addMessage(data) {
        	data.id = data.message.id;
        	data.created_at = data.message.created_at;
        	data.message = data.message.message;
          newChatLine(data);
        };
	}

	/**
	 * a method to get the chat History between 2 users
	 * firs make a call to API /api/messages/{fromUserID}/{toUserID}
	 * then append the output to the chat box
	 */
	function getChat(user_id, to_user_id){

		$.get( "api/messages/"+user_id+"/"+to_user_id, function( data ) {
	        $.each(data, function (index, message) { 
	        	newChatLine(message);
	        });	  
		});

	}
	

	/**
	 * Simple method to append new line of message to the chat box
	 * to be reused and prevend code duplication 
	 */
	function newChatLine(message){

	    $(".chat").append($('#chatRow').html()); 
	    $(".chat .username").last().append(message.user.name);
	    $(".chat .messageDate").last().append(message.created_at);
	    $(".chat .messageDate .msg-id").last().val(message.id); 
	    $(".chat .messageDate").last().append(' <i class="fa fa-trash delete-msg" aria-hidden="true"></i>');
	    $(".chat .message").last().append(message.message); 
	}


	/**
	 * Insert a new Message to the Database after validating the required parameters
	 * with a call to api/messages 
	 */
	function insertMessage(){
		
		$("#btn-chat").on('click',function(){ 

			var user_id = $('#fromUsers').val();
			var to_user_id = $('#toUsers').val();
			var message = $('.message-text').val();
	    	
			if (user_id != '' && to_user_id != '') {
				
				if (message) {
					$.post( "api/messages/",{ from_user_id: user_id, to_user_id: to_user_id, message: message }, function( data ) { });	
				}else{
					$('.notification').html('<p style="color:red;"> please Write a message first</p>');
				}

			}else{
				$('.notification').html('<p style="color:red;"> please Select users first</p>');
			}
			setTimeout(function(){ $('.notification').html(''); }, 3000); //remove the notification after 3 seconds
			$('.message-text').val('');
		});
	}

	/**
	 * Delete a message by ID 
	 * Display an alert "confirm" box, TODO only allow the user to delete his own messages 
	 * ajax request to a Delete API, remove the message from the HTML DOM
	 */
	function deleteMessage(){

		$("body").on('click','.delete-msg',function(){ 
			var id =  $(this).parent().find('.msg-id').val();
				var r = confirm("are you sure you would like to delete the message ? ");
				if (r == true) {
					$.ajax({
					    type: 'DELETE',
					    url: "api/messages/"+id,
					    data: {'id': id},
					    async: false
					});
					$(this).parents().eq(5).find('.clearfix').remove();
				}
		});
	}


	/**
	 * second, get the chat dialog between 2 selected users 
	 * on selecting a new user 
	 */
	 function changeUsers(){

		$("#fromUsers").change(function(){
			var user_id = $('#fromUsers').val();
			// rebuild the chat box
			$('.chat').html('');

			var to_user_id = $('#toUsers').val();
			if (user_id && to_user_id) {
				getChat(user_id, to_user_id);
			}	
			
		});

		$("#toUsers").change(function(){
			var to_user_id = $('#toUsers').val();
			// rebuild the chat box
			$('.chat').html('');

			var user_id = $('#fromUsers').val();
			if (user_id && to_user_id) {
				getChat(user_id, to_user_id);
			}

				
		});
	}



	/**
	 * Simple method to organise the users in the dropdownlis
	 * when user is selected to send message, will be disapled to receive it
	 * to prevent a user from sending a message to himself
	 */
	function OrganizeUsers(){

		$("#fromUsers").on("change", function() {
		  let $boxval = $("#fromUsers").val();

		  $("#toUsers > option").each(function(ind) {
		    let ele = $("#toUsers > option").eq(ind);
		    if (ele.val() === $boxval) ele.attr("disabled", "disabled");
		    else ele.removeAttr("disabled");
		  });
		})

		$("#toUsers").on("change", function() {
		  let $boxval = $("#toUsers").val();

		  $("#fromUsers > option").each(function(ind) {
		    let ele = $("#fromUsers > option").eq(ind);
		    if (ele.val() === $boxval) ele.attr("disabled", "disabled");
		    else ele.removeAttr("disabled");
		  });
		})
	}
