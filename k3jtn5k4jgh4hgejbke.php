<?

$databasehost = "54.94.128.189";
$databasename = "trubby";
$databaseusername ="trubby";
$databasepassword = "raiztrubby";

$con = mysql_connect($databasehost,$databaseusername,$databasepassword) or die(mysql_error());
mysql_select_db($databasename) or die(mysql_error());
mysql_query("SET CHARACTER SET utf8");
$query = $_GET['query'];
$sth = mysql_query($query);

if (mysql_errno()) {
    header("HTTP/1.1 500 Internal Server Error");
    echo $query.'\n';
    echo mysql_error();
}
else
{
    $rows = array();
    while($r = mysql_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);
}
?>
