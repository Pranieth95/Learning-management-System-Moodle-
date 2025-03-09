<br>
<h3>Add New Club Event</h3>
<p align="center"><a href="index11.php"><b>Event Management</b></a></p>
<p align="center"><a href="index22.php"><b>Club Management</b></a></p>

  	<form name= 'clubeventform' method='POST' action="<?php $_SERVER['PHP_SELF'];?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&white=true">
    	<label for="clubTitle">Event Title:</label>
    	<input type="text" id="ClubEvents" name="ClubEvents" placeholder="Title here...">

    	<label for="Details">Event Details:</label>
    	<textarea id="ClubDetails" name="ClubDetails" placeholder="Event Details..." style="height:200px"></textarea>

    <p align="center"><a href="index55.php"><b>Edit Club Events</b></a></p>
    	<label for="Expenses">Estimated Budget:</label><br>
    	<span class="Expenses">
    		<input type="number" placeholder="Enter Est. Budget..." min="0" max="10000000" step="1" value="" name="Expenses" id="expenses" required="required" /><br>
            <p class="expenses">(Enter Est. Budget or zero for none)</p>
		</span>
   
    <input type="reset" name="reset" id="reset" value="Clear">
    <input type="submit" name="Add" id="addclub" value="Add Event">
    
  
    	<button class="Cbutton" id="goBack">Back</button>

        
  	</form>
