$(document).ready(function () {
	
	    $('#submitComment').click(function () {
			var username = '<%=session.getAttribute("username")%>';
			var comment = $('#commentText').val(); 
			var recipe=document.title;
			if(username!=""&&username!=null){
				$.ajax({
					type: 'POST',
					url: "addComment.php",
					data: {"comment": comment, "recipe": recipe},
					dataType: 'json',
					
					success: function(re){
						if(re=='1'){
							alert("Comment sent sucessfully");
							if(recipe=="pancakes"){
								reloadPancakesComments();
							}else{
								reloadMeatballsComments();
							}			
						}
					},
					error:function(){
						alert("error");
					}
				});
			}else{
				alert("You must login to send a comment!");
				window.location.href="login.php";
			}
    });
	
	    function reloadPancakesComments() {
        $.getJSON(pancakeComments.php, function (comments) {
            $("#allComments").html("");
            for (var i = 0; i < comments.length; i++) {
                addComment(comments[i]);
            }
        });
		}
	
		function reloadMeatballsComments() {
        $.getJSON(meatballComments.php, function (comments) {
            $("#allComments").html("");
            for (var i = 0; i < comments.length; i++) {
                addComment(comments[i]);
            }
        });
    }
	
	    function addComment(comm) {
				var username=removeQuotes(comm.username);
				var comment=removeQuotes(comm.comment);
				var time=removeQuotes(comm.time);
				var recipeName=document.title;
				$("<p class='author'>" + username + ":</p>").appendTo($("#allComments"));
				$("<p class='entry'>" + comment + ":</p>").appendTo($("#allComments"));
				if (username == session_username) {
					var deleteParagraph = $("<p class='delete'></p>");
					$("<button>Delete</button>").click(deleteButtonHandler(time, recipeName)).appendTo(deleteParagraph);
					$(deleteParagraph).appendTo("#allComments");
				}
		}
		
				
	function deleteButtonHandler(time, recipe) {
				$.ajax({
					type: 'POST',
					url: "deleteCommentAJAX.php",
					data: {"time": time, "recipe": recipe},
					dataType: 'json',
					
					success: function(re){
						if(re=='1'){
							alert("Comment is deleted sucessfully");
							if(recipe=="pancakes"){
								reloadPancakesComments();
							}else{
								reloadMeatballsComments();
							}
						}
					},
					error:function(){
						alert("error");
					}
				});		
    }
	

    function removeQuotes(string) {
        return string.replace(/\"/g, "");
    }

});
