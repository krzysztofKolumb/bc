<?php
ob_start();
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
header('X-Powered-By:');
?>
<!doctype html>
<html lang="pl">
<head>
        <title>Przerwa techniczna</title>
</head>
 <style>
     h1 {
         text-align: center;
         padding: 100px 0 0 0;
     }
</style>
<body>
    <h1>Przerwa techniczna</h1>
</body>
</html>