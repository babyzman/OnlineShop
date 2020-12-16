<!-- language: php -->
<?php
error_reporting(0); // disable the annoying error report
class page_class
{
   // Properties
   var $current_page;
   var $amount_of_data;
   var $page_total;
   var $row_per_page;

   // Constructor
   function page_class($rows_per_page)
   {
      $this->row_per_page = $rows_per_page;

      $this->current_page = $_GET['page'];
      if (empty($this->current_page))
         $this->current_page = 1;
   }

   function specify_row_counts($amount)
   {
      $this->amount_of_data = $amount;
      $this->page_total= 
         ceil($amount / $this->row_per_page);
   }   

   function get_starting_record()
   {
      $starting_record = ($this->current_page - 1) * 
                     $this->row_per_page;
      return $starting_record;               
   }   

   function show_pages_link()
   {
      if ($this->page_total > 1)
      {
        print("<center><div class=\"notice\"><span class=\"note\">Halaman: ");
        for ($hal = 1; $hal <= $this->page_total; $hal++)
        {
           if ($hal == $this->current_page)
              echo "$hal | ";
           else   
              {
                 $script_name = $_SERVER['PHP_SELF'];

                 echo "<a href=\"$script_name?page=$hal\">$hal</a> |\n";
              }
        }   
      }
   }   
}
?>
<!-- language: php -->
    <?php $per_page = 2;
    $page = new Page_class($per_page);
    error_reporting(0); // disable the annoying error report
	$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
    mysqli_select_db($connection,"id15522295_dbproject");
    $result= mysqli_query($connection,"SELECT * FROM `product detail`");
    // paging start
    $row_counts = mysqli_num_rows($result);
    $page->specify_row_counts($row_counts);
    $starting_record = $page->get_starting_record();

    $result= mysqli_query($connection,"SELECT * FROM `product detail` LIMIT $starting_record, $per_page");
    $number = $starting_record; //numbering
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0 ) 
    {   // if no result is found
        echo "<div class=\"notice\">
    <center><span class=note>NO DATA</span></center>
    </div>";
    }
    else    {
		while($rows = $result->fetch_assoc())
		{
			echo $rows['ProductID'];
        }
	}

?>
// call the page link
<?php

$page->show_pages_link();
?>