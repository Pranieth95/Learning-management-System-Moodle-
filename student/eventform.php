<br>
<h3>Add Event</h3>
<p align="center"><a href="index44.php"><b>Edit Events</b></a></p>
  	<form name= 'eventform' method='POST' action="<?php $_SERVER['PHP_SELF'];?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&black=true">
    	<label for="clubTitle">Event Title:</label>
    	<input type="text" id="ClubEvents" name="txttitle" placeholder="Title here...">

    	<label for="Details">Event Details:</label>
    	<textarea id="ClubDetails" name="txtdetail" placeholder="Event Details..." style="height:200px"></textarea>   
    	
<br>    
    <input type="reset" name="reset" id="reset" value="Clear">
    <input type="submit" name="btnadd" id="add" value="Add Event">    
  	</form>	
	
	
	
	
	
	
<!----	
<form name= 'eventform' method='POST' action="&v=true&add=true">
	<table width='400px'>
		<tr>
			<td width='150px'>Title</td>
			<td width='250px'><input type='text' name='txttitle'></td>
		</tr>
		<tr>
			<td width='150px'>Details</td>
			<td width='250px'><textarea name='txtdetail'></textarea></td>
		</tr>
		<tr>
			<td colspan='2' align='center'><input type='submit' name='btnadd' value='Add Event'></td>
		</tr>
	</table> 
	
</form>---->