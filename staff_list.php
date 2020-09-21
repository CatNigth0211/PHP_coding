<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>スタッフ情報修正画面</title>
</head>
<body>

<?php

try{

	$dsn= 'mysql:dbname=shop;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');
	
	$sql = 'SELECT code,name FROM mst_staff WHERE 1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$dbh = null;
	
	print 'スタッフ一覧<br /><br />';
	
	print '<form method="post" action="staff_edit.php">';
	while(true){
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		if($rec==false){
			break;
		}
		print'<input type="radio" name="staffcode"value="'.$rec['code'].'">';
		print $rec['name'];
		print'</br>';
	}
	
}catch(Exception $e){
	print 'ただいま障害により大変ご迷惑をおかけしております。';
	exit();
	
}
print '<input type="submit" value="修正">';
print '</form>';

?>


</body>
</html>