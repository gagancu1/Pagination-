<html>  
<head>  
<title> Pagination </title>  
</head>  
<body>  
  
<?php  
  
    //database connection  
    $conn = mysqli_connect('localhost', 'root', '');  
    if (! $conn) {  
die("Connection failed" . mysqli_connect_error());  
    }  
    else {  
mysqli_select_db($conn, 'dump');  
    }  
  
    //define total number of results you want per page  
    $results_per_page = 10;  
  
    //find the total number of results stored in the database  
    // $query = "select * from consumer_bets LIMIT 100 ,10 ";  
    // $result1 = mysqli_query($conn, $query);  
    // $number_of_result = mysqli_num_rows($result1);  
  
    //determine the total number of pages available  
     $number_of_page = ceil (100 / 10);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
  //retrieve the selected results from database   
   // $query1 = "SELECT * FROM student  LIMIT " . $page_first_result . ',' . 15;  
   $query = "select * from consumer_bets LIMIT $page_first_result , 10 ";   
   $result = mysqli_query($conn, $query);  
     // $result = mysqli_query($conn, $query); 
    //display the retrieved result on the webpage  
    while ($row = mysqli_fetch_array($result)) {  
        echo $row['id'] . ' ' . $row['status'] . '</br>';  
    }  
    //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "pagi.php?page=' . $page . '">' . $page . ' </a>';  
    }  
  //gagan
?>  
</body>  
</html>  



