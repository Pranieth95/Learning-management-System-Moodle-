<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "cirp");
$columns = array( 'regno', 'name', 'dob', 'ccategoryid', 'totamount');

$query = "SELECT * FROM student WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'dob BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';

}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR regno LIKE "%'.$_POST["search"]["value"].'%" 
  OR name LIKE "%'.$_POST["search"]["value"].'%" 
  OR ccategoryid LIKE "%'.$_POST["search"]["value"].'%"
  OR totamount LIKE "%'.$_POST["search"]["value"].'%"  )
 ';
 
 
 
}



$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();

 $sub_array[] = $row["regno"];
 $sub_array[] = $row["name"];
  $sub_array[] = $row["dob"];
 
 $sub_array[] = $row["ccategoryid"];
 $sub_array[] = $row["totamount"]; 
 
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM student";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>

