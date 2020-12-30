<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');

$connection = ssh2_connect('192.168.1.3', 2223);
ssh2_auth_password($connection, 'stevens', 'stevens');

$stream = ssh2_exec($connection, 'c:/Users/stevens/automation/startKodi.bat -i');

 \stream_set_blocking($stream, true);

    $response = \stream_get_contents($stream);
    fclose($stream);

//echo $connection->exec('pwd');
//echo $connection->exec('ls -la');

echo "success";

// stream_set_blocking($stream, true);
// $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
// echo stream_get_contents($stream_out);
// echo stream_get_contents($stream);

// include('Net/SSH2.php');

// $ssh = new Net_SSH2('192.168.1.3');
// if (!$ssh->login('stevens', 'stevens')) {
//     exit('Login Failed');
// }

// echo $ssh->exec('pwd');
// echo $ssh->exec('ls -la');


?>

