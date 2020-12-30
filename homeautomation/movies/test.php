<?php
ini_set('display_errors', 'On');
ini_set('display_errors', 1);

//echo "test";

if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");

/*
if(!($con = ssh2_connect("97.102.21.254", "2224")))
{
    echo "fail: unable to establish connection";
}
else
{
echo "connection made, trying to authenticate";
*/

/*
$con = ssh2_connect("97.102.21.254", "2224", array('hostkey'=>'ssh-rsa'));
//$con = ssh2_connect("97.102.21.254", "2224");

if (ssh2_auth_pubkey_file($con, 'stevens',
                          '/var/www/html/homeautomation/keys/stevensKey.pub',
                          '/var/www/html/homeautomation/keys/stevensKey', 'stevens')) {
  echo "Public Key Authentication Successful\n";
} else {
  die('Public Key Authentication Failed');
}

*/

//}


/*
if (!function_exists("ssh2_connect")) {
echo "ssh2 doesn't exist";

}
*/



if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");
//if(!($con = ssh2_connect("97.102.21.254", "2224")))

if(!($con = ssh2_connect("97.102.21.254", "22")))
{
echo "test";

/*
  if ($con === false) {
        $error = error_get_last();
        throw new Exception("
        Error Type : ".$error["type"]."<br/>
        Message : ".$error["message"]."<br/>
        File : ".$error["file"]."<br/>
        Line : ".$error["line"]."<br/>");
    }
*/

    echo "fail: unable to establish connection";
}
else
{
    //if(!ssh2_auth_password($con, "stevens", "stevens"))
    if(!ssh2_auth_password($con, "jared", "Jared01*"))
    {
        echo "fail: unable to authenticate ";
    }
    else
    {
        echo "{'success':'authenticated'}";

        
        //$stream = ssh2_exec($con, 'sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@97.102.21.254 "powershell.exe -File .\Documents\PROGRAMS\SCRIPTS\openMovieScript.ps1"');
        

       $psCommand ='powershell -InputFormat None -F "C:\\PROGRAMS\\POWERSHELL\\SCRIPTS\\openMovieScript.ps1"';
       
       echo "</br>";
       echo "</br>";
       echo "send string: " . $psCommand;

       $psFullCommand = "sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@97.102.21.254 '" . $psCommand . "'";

       echo "</br>";
       echo "</br>";
       echo "send string: " . $psFullCommand;

        $stream = ssh2_exec($con, $psFullCommand);


        
/*

        sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@97.102.21.254 "powershell -InputFormat None -F "C:\\PROGRAMS\\POWERSHELL\\SCRIPTS\\openMovieScript.ps1""
        
        */
        // "cmd.exe /c powershell.exe C:\Users\Stevens\Documents\PROGRAMS\SCRIPTS\openMovieScript.ps1"');

        //echo $stream;
        //$echo $ssh->exec('pwd');
       //echo $ssh->exec('ls -la');
        //$stream = ssh2_exec($con, "./makedir.sh");
          //  stream_set_blocking($stream, true);
        //$item = "";
        //while ($input = fread($stream,4096)) {
          //     $item .= $input;
       // }
       // echo $item;
    }
}


?>