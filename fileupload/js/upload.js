$(document).ready(function(){
    setInterval(function(){
		updateUnreadMessageCount();	
	}, 60000);	
	setInterval(function(){
		updateUserDocs();			
	}, 5000);
	$(".file_upload_list").animate({ 
		scrollTop: $(document).height() 
	}, "fast");
    $(document).on('click', '.contact', function(){		
		$('.contact').removeClass('active');
		$(this).addClass('active');
		var to_user_id = $(this).data('touserid');
		showUserDocs(to_user_id);
	});	 
}); 
function showUserDocs(to_user_id){
	$.ajax({
		url:"upload_action.php",
		method:"POST",
		data:{to_user_id:to_user_id, action:'show_docs'},
		dataType: "json",
		success:function(response){
			$('#userSection').html(response.userSection);
			$('#file_upload_lists').html(response.conversation);	
			$('#unread_'+to_user_id).html('');
		}
	});
}
function updateUserDocs() {
	$('li.contact.active').each(function(){
		var to_user_id = $(this).attr('data-touserid');
		$.ajax({
			url:"upload_action.php",
			method:"POST",
			data:{to_user_id:to_user_id, action:'update_user_docs'},
			dataType: "json",
			success:function(response){				
				$('#file_upload_lists').html(response.conversation);			
			}
		});
	});
}
function updateUnreadMessageCount() {
	$('li.contact').each(function(){
		if(!$(this).hasClass('active')) {
			var to_user_id = $(this).attr('data-touserid');
			$.ajax({
				url:"upload_action.php",
				method:"POST",
				data:{to_user_id:to_user_id, action:'update_unread_message'},
				dataType: "json",
				success:function(response){		
					if(response.count) {
						$('#unread_'+to_user_id).html(response.count);	
					}					
				}
			});
		}
	});
}