<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	<title>BookIt : BookSearch</title>
	<script src="js/bookSearch.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">	
	
</head>
<body>
<div class="wrapper">
	<?php
	    require_once 'dbconnection/dbConnect.php';
		$connection = dbConnect();
		$sql = "select name from bookcategory";
		$stmt = $connection->prepare($sql);
		$results = $stmt->execute();
		$rows = $stmt->fetchAll();
		
	?>
	<hr>

	
	<div class="navbar navbar-default">
	
	 <form class="navbar-form navbar-left" role="search" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" id="bookname" name="bookname" placeholder="Enter Book Name" >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author Name">
                    </div>
					<div class="form-group">
                        <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter Publisher Name">
                    </div>
					<div class="form-group">
                        <select type="text" class="form-control" id="category" name="category">
							<option value="All Category">All Category</option>
							<?php
							foreach ($rows as $row) {
									echo '<option value="'.$row[0].'">'.$row[0].'</option>';
								}	
							?>
						</select>
                    </div>
                    <button id="searchButton" class="btn btn-default">Search</button>
      </form>
	</div>
	
	<div id="content">
			
	</div>
	
	
	
	
</div>
</body>
	
</html>