<?php
   include('../../session.php');
   include('../../config.php');
$query="SELECT* FROM penyulang WHERE 1 ORDER by name" ;
$result = mysqli_query($db, $query);
if (!$result) {
die('Invalid query: ' . mysqli_error());
              }
			  
               
?>

<?php

//fetch.php


$parent_category_id = 0;

$query = "SELECT * FROM tbl_category";


foreach($result as $row)
{
 $data = get_node_data($parent_category_id, $connect);
}

echo json_encode(array_values($data));

function get_node_data($parent_category_id, $connect)
{
 $query = "SELECT * FROM tbl_category WHERE parent_category_id = '".$parent_category_id."'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = array();
 foreach($result as $row)
 {
  $sub_array = array();
  $sub_array['text'] = $row['category_name'];
  $sub_array['nodes'] = array_values(get_node_data($row['category_id'], $connect));
  $output[] = $sub_array;
 }
 return $output;
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Add New Node in Dynamic Treeview using PHP Mysql Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <style>
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">How to Add New Node in Dynamic Treeview using PHP Mysql Ajax</h2>
   <br /><br />
   <div class="row">
    <div class="col-md-6">
     <h3 align="center"><u>Add New Category</u></h3>
     <br />
     <form method="post" id="treeview_form">
      <div class="form-group">
       <label>Select Parent Category</label>
       <select name="parent_category" id="parent_category" class="form-control">
       
       </select>
      </div>
      <div class="form-group">
       <label>Enter Category Name</label>
       <input type="text" name="category_name" id="category_name" class="form-control">
      </div>
      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
      </div>
     </form>
    </div>
    <div class="col-md-6">
     <h3 align="center"><u>Category Tree</u></h3>
     <br />
     <div id="treeview"></div>
    </div>
   </div>
  </div>
 </body>
</html>
<script>
 $(document).ready(function(){

  fill_parent_category();

  fill_treeview();
  
  function fill_treeview()
  {
   $.ajax({
    url:"fetch.php",
    dataType:"json",
    success:function(data){
     $('#treeview').treeview({
      data:data
     });
    }
   })
  }

  function fill_parent_category()
  {
   $.ajax({
    url:'fill_parent_category.php',
    success:function(data){
     $('#parent_category').html(data);
    }
   });
   
  }

  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
   $.ajax({
    url:"add.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
     fill_treeview();
     fill_parent_category();
     $('#treeview_form')[0].reset();
     alert(data);
    }
   })
  });
 });
</script>

