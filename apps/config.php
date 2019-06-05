<?Php
/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 
$database = "oms_db";       // Your database name
$username = "oms_view";            // Your login userid 
$password = "AbWdHTVtSLrwgrHn";            // Your password 
//////// End of database details of your server //////

// START OF AAJ Ki DATA 
    date_default_timezone_set("Asia/Kolkata");
    $aajki_date = date("Y-m-d H:i:s");
    $Assress_IP = "http://"."172.16.1.65"."/OMS";
    // IP Address of your hosting location 
    // Please remove the OMS_2 from $Assress_IP variable to retrive web-content
// END OF AAJ Ki DATA 


 


//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?> 

