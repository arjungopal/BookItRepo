<html>
<head>
<title>Add New Books</title>
	<script>
	
	
	
	</script>
</head>
<body>
<center>
<h3>ADD BOOKS</h3>
<form id="addBooks" method = "post" action="BookAddDB.php">
	<table>
		<tr>
			<td>
				Enter Tittle 
			</td>
			<td>
				<input type = "text" id = "title" name ="title"placeholder= "Enter TITLE"/>
			</td>
		</tr>
		<tr>
			<td>
				Enter ISBN
			</td>
			<td>
				<input type = "text" id = "isbn" name="isbn" placeholder= "Enter ISBN"/>
			</td>
		</tr>
		<tr>
			<td>
				Enter Edition
			</td>
			<td>
				<input type = "text" id = "edition" name="edition" placeholder= "Enter Edition"/>
			</td>
		</tr>
		<tr>
			<td>
				Enter Author
			</td>
			<td>
				<input type = "text" id = "author1" name="author" placeholder= "Enter Author"/>
			</td>
		</tr>
		<tr>
			<td>
				Enter another Author
			</td>
			<td>
				<input type = "text" id = "author2" name="year" placeholder= "optional"/>
			</td>
		</tr>

		<tr>
			<td>
				Enter another Author
			</td>
			<td>
				<input type = "text" id = "author3" name="year" placeholder= "optional"/>
			</td>
		</tr>
		<tr>
			<td>
				Enter another Author
			</td>
			<td>
				<input type = "text" id = "author4" name="year" placeholder= "optional"/>
			</td>
		</tr>
		<tr>
			<td>
				Enter Year
			</td>
			<td>
				<input type = "text" id = "year" name="year" placeholder= "Enter Year"/>
			</td>
		</tr>
		<tr>
			<td>
				Select Category
			</td>
			<?php 
										include('dbConnect.php');
										$conn = dbConnect();
			?>
			<td>
				<select id = "category" name="category">
				<option>Select a Category</option>
				<?php 
				$query1 = "SELECT CategoryId,Name FROM category ";
				foreach ($conn->query($query1) as $row) 
				{ ?>  
				<option value="<?php echo $row['CategoryId'];?>"><?php echo $row['Name']; ?>
				</option><?php } 
				?>			
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Select Publisher
			</td>
			<td>
				<select id = "publisher" name="publisher">
				<option>Select a Publisher</option>
				<?php 
				$query1 = "SELECT PublisherId,Name FROM publisher ";
				foreach ($conn->query($query1) as $row) 
				{ ?>  
				<option value="<?php echo $row['PublisherId'];?>"><?php echo $row['Name']; ?>
				</option><?php } 
				?>
				
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Enter Price
			</td>
			<td>
				<input type = "text" id = "price" name="price" placeholder= "Enter Price"/>
			</td>
		</tr>
		<tr>
			<td>
				No of Books
			</td>
			<td>
				<input type = "text" id = "copies" name="copies" placeholder= "No of books"/>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<input type = "submit" value="ADD BOOKS"/>
			</td>
		</tr>
</form>

</center>
</body>
</html>

