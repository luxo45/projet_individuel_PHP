<!Doctype html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>account</title>
	</head>
	<body>
<?php
$displayAccountId = $_Get['id'] ?? null;
if (! $displayAccountId || ! is_numeric($displayAccountId)) {
    ?>
    
    <div>
		<p> To be displayed, this page need a valid numeric id as querry</p>
	</div>
	<?php
    
} else { 
    try {
        $connection = new PDO('mysql:host=localhost;dbname=infos', 'root');
    } catch (PDOException $exception) {
        http_response_code(500);
        echo 'A problem occured, contact support';
        exit(1); 
    }
}
$sql = "SELECT username, password FROM user WHERE id=".$displayAccountId;
$results = $connection->query($sql);
$allResults = $results->fetchAll();
if (empty ($allResults)) {
    ?>
        <div>
        	<p>To be displayed, this page need a valid numeric id as querry</p>
        
        </div>
        <?php 
        return;
    }
    foreach ($allResults as $aLine){
       ?>
       <div>
       	<p>Username : <?php echo $aLine['username']; ?></p>
       	<p>Password : <?php echo $aLine['password']; ?></p>
       </div> 
        <?php 