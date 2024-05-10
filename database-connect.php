<!-- Connecting -->
<?php
$databaseName = 'DRHYMAUN_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . 
$databaseName;
$username = 'drhymaun_writer';
$password = 'nTcc]uXZ4B,,I4nfqQi<';

$pdo = new PDO($dsn, $username, $password);
if($pdo) print '<!-- Connection complete -->';
?>
