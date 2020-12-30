<?php

include('Net/SSH2.php');


require('/var/www/html/config.php'); 
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');


header('Content-type: application/json');


    $json_str = file_get_contents('php://input');

    //$title = $json_str;
    $json_Conv = json_decode($json_str, true);
    $title = $json_Conv[data];
    //print_r($title);
    //echo "test: " . $title;

require('/var/www/html/homeautomation/moviesConfig.php');
$dbname = "Home_Automation";
          

/*
try {



    $dbh = new PDO("mysql:host=$serverIpAddress;dbname=$dbname", $db_username, $db_password);
        //set the error mode

        
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $TimeUpdateInfo = "UPDATE RequestedMovie SET Title = :Title WHERE id = 1";
//$stmt = $dbh->prepare($TimeUpdateInfo);

$stmt = $dbh->prepare($TimeUpdateInfo);
$stmt->bindParam(":Title", $title);

        $stmt->execute();
        //$success = $stmt->rowCount();


        $success = 1;
        }
catch(Exception $e)
{
         {
            echo '{"success":0,"error_message":'.$e->getMessage().'}';
         }
        
        
}

*/


$success = 1;





if ($success > 0) {
				//	error_log("User '$username' created.");
					echo '{"success":1';


if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");

if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");
//if(!($con = ssh2_connect("97.102.21.254", "2224")))

//if(!($con = ssh2_connect("97.102.18.39", "22")))

if(!($con = ssh2_connect($serverIpAddress, "22")))
{
//echo "test";

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

    echo ',"status": "unable to establish connection"}';
}
else
{

    if(!ssh2_auth_password($con, "jared", "Jared01*"))
    {
       echo ',"status":"unable to authenticate"}';
    }
    else
    {
       echo ',"status":"ssh authenticated"}';

       //$psCommand ='powershell -InputFormat None -F "C:\\PROGRAMS\\POWERSHELL\\SCRIPTS\\openMovieScript.ps1"';
      // $psCommand ='powershell -InputFormat None -F "C:\\PROGRAMS\\POWERSHELL\\SCRIPTS\\MOVIE_ACTIONS\\startMovie.ps1"';


/*
       $psCommand ='powershell -InputFormat None -F "C:\\PROGRAMS\\POWERSHELL\\SCRIPTS\\TV_ACTIONS\\START_WATCHERS\\startOpenKodiWatchers.ps1"';

       $psFullCommand = "sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@" . $serverIpAddress. " '" . $psCommand . "'";
       //sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@97.102.21.254 powershell -InputFormat None -F 'C:\PROGRAMS\POWERSHELL\SCRIPTS\MOVIE_ACTIONS\startMovie.ps1'
       //sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@97.102.21.254 powershell -InputFormat None -F 'C:\PROGRAMS\POWERSHELL\SCRIPTS\\openMovieScript.ps1'
       $stream = ssh2_exec($con, $psFullCommand);


      sleep(10);

*/

      $psCommand ='powershell -InputFormat None -F "C:\\PROGRAMS\\POWERSHELL\\SCRIPTS\\TV_ACTIONS\\TRIGGERS\\triggerOpenKodi.ps1"';

       $psFullCommand = "sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@" . $serverIpAddress. " '" . $psCommand . "'";
       //sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@97.102.21.254 powershell -InputFormat None -F 'C:\PROGRAMS\POWERSHELL\SCRIPTS\MOVIE_ACTIONS\startMovie.ps1'
       //sshpass -p stevens ssh -o StrictHostKeyChecking=no -p 2224 stevens@97.102.21.254 powershell -InputFormat None -F 'C:\PROGRAMS\POWERSHELL\SCRIPTS\\openMovieScript.ps1'
       $stream = ssh2_exec($con, $psFullCommand);




    }
}








/*
                    $ssh = new Net_SSH2('-p 2224 97.102.21.254');
                    if (!$ssh->login('stevens', 'stevens')) {
                        echo 'SSH failed';
                        exit('login failed');
                    } else {

                        echo 'SSH logged in';
                    }

                    echo $ssh->exec('pwd');
                    echo $ssh->exec('ls -la');

				} else {
					echo '{"success":0,"error_message":"Invalid Data."}';
				}
                */


}

?>