<?php
// connecting to database
$conn = mysqli_connect("localhost", "u115488740_fOne", "ArtF0Und0ne@1122", "u115488740_artFOne") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry I can't help you";
echo " Please Contact Our Sales team for  a <a href='tel:7880022009' style='color:lightgrey; font-size:1.4rem; font-weight:600;'>call</a> <br> or message us on <br> <a href='https://wa.me/7880022009'  style='color:lightgrey; font-size:1.4rem; font-weight:600;'> WhatsApp</a>.";
}

?>