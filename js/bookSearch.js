jQuery(document).ready(function($) {
    		
			if($('#isbn'))
			{
				$isbnId = $('#isbn').html();
			}
			else{
				$isbnId = "none";
			}
			
			createAjaxReq();
            $('#searchButton').click(function(e){
			$("#content").empty();
                e.preventDefault();
				$isbnId = "none";
				 createAjaxReq();
                return false;
            });
			
            function createAjaxReq() {
                $.ajax({
                    url: 'booksearch.php',
                    type: 'get',
					dataType: 'json',
                    data: {bookname: $('input#bookname').val(),author: $('input#author').val(),publisher: $('input#publisher').val(),category:$("#category option:selected").text(),isbn:$isbnId},
                    success: function(data) {
						$("#content").empty();
						$(data.Books).each(function(){
							$output="<div>Title : "+this.title+"<br>Edition : "+this.edition+"<br>Author: "+this.author+"</div>";
							
							if(this.copies>0){
							$output = $output+"<a href='javascript:sendRequest(\""+this.isbn+"\");'><span >Request</span></a> |";
							}
							$output = $output+"<a href='javascript:addToWishList(\""+this.isbn+"\");'><span > Add To Wish List</span></a><br>Copies Available : "+this.copies+"<br>ISBN : "+this.isbn+"<br>Publisher : "+this.publisher+"<br><hr>";
							
							$("#content").append($output);
							});

						},
					error:function(e){
						
					}
                });
            }
    	});