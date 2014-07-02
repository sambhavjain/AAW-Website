<?php

$path=$_SERVER['PATH_INFO'];

$pageRequest=explode('/',$path);

if($pageRequest[0]=="")
	header('Location: ./views');
else if ($pageRequest[0]=="joinus") {
	header('Location: ./views/form.html');
}else
    echo "404 Page Not Found";

?>

