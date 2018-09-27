<?php
error_reporting(0);
require_once 'phar://main.phar/class.php';
if(strtolower(substr(PHP_OS, 0, 3)) == 'win') { // windows < 10 does't support color on terminal :'(
	$R  = "";
	$RR = "";
	$G  = "";
	$GG = "";
	$B  = "";
	$BB = "";
	$Y  = "";
	$YY = "";
	$X  = "";
} else {
	$R  = "\e[91m";
	$RR = "\e[91;7m";
	$G  = "\e[92m";
	$GG = "\e[92;7m";
	$B  = "\e[36m";
	$BB = "\e[36;7m";
	$Y  = "\e[93m";
	$YY = "\e[93;7m";
	$X  = "\e[0m";
	system("clear");
}

function loading($time) {
	echo "\rLoading |\r";
	usleep($time);
	echo "\rlOading /\r";
	usleep($time);
	echo "\rloAding -\r";
	usleep($time);
	echo "\rloaDing \\"."\r";
	usleep($time);
	echo "\rloadIng |\r";
	usleep($time);
	echo "\rloadiNg /\r";
	usleep($time);
	echo "\rloadinG -\r";
	usleep($time);
	echo "\rloading \\"."\r";
}

echo $Y.
" ___         _        ___        _           
|_ _|_ _  __| |_ __ _| _ \___ __| |_ ___ _ _ 
 | || ' \(_-<  _/ _` |  _/ _ (_-<  _/ -_) '_|
|___|_||_/__/\__\__,_|_| \___/__/\__\___|_|  ";
echo $R."\n++++++++++++++++++++++++++++++++++++++";
echo $B."\nAuthor  : Cvar1984                   ".$R."+";
echo $B."\nGithub  : https://github.com/Cvar1984".$R."+";
echo $B."\nTeam    : BlackHole Security         ".$R."+";
echo $B."\nVersion : 0.0.1                      ".$R."+";
echo $B."\nDate    : 06-09-2018                 ".$R."+";
echo $R."\n++++++++++++++++++++++++++++++++++++++".$X."\n\n";
if(!(isset($argv[1]) AND isset($argv[3]))) {
	echo "Usage: [Options] {value}\n";
	echo "  --username,\t-u <dir/file>\n";
	echo "  --password,\t-p <dir/file>\n";
	echo "  --video-only,\t-vo ( use this if file is not an images)\n";
	echo "Example : ".$GG.$argv[0]." -u username.txt -p password.txt".$X."\n";
	exit;
}
// username
if($argv[1] == '--username' OR $argv[1] == '-u') {
	$username=$argv[2];
}

elseif($argv[2] == '--username' OR $argv[2] == '-u') {
	$username=$argv[3];
}

elseif($argv[3] == '--username' OR $argv[3] == '-u') {
	$username=$argv[4];
}

elseif($argv[4] == "--username" OR $argv[4] == "-u") {
	$username=$argv[5];
}

elseif(isset($argv[5]) == '--username' OR isset($argv[5]) == '-u') {
	$username=$argv[6];
}
// password
if($argv[1] == "--password" OR $argv[1] == "-p") {
	$password=$argv[2];
}

elseif($argv[2] == "--password" OR $argv[2] == "-p") {
	$password=$argv[3];
}

elseif($argv[3] == "--password" OR $argv[3] == "-p") {
	$password=$argv[4];
}

elseif($argv[4] == "--password" OR $argv[4] == "-p") {
	$password=$argv[5];
}

elseif(isset($argv[5]) == "--password" OR isset($argv[5]) == "-p") {
	$password=$argv[6];
}
// mode
if($argv[1] == "--video-only" OR $argv[1] == "-vo") {
	$vo=true;
}

elseif($argv[2] == "--video-only" OR $argv[2] == "-vo") {
	$vo=true;
}

elseif($argv[3] == "--video-only" OR $argv[3] == "-vo") {
	$vo=true;
}

elseif($argv[4] == "--video-only" OR $argv[4] == "-vo") {
	$vo=true;
}
elseif(isset($argv[5]) == "--video-only" OR isset($argv[5]) == "-vo") {
	$vo=true;
}

if(file_exists($username) AND file_exists($password)) {
	$username=explode("\n", file_get_contents($username));
	$password=explode("\n", file_get_contents($password));
} else {
	die($RR."[-] username & password file not found [-]\n".$X);
}

inputpath:
$path=readline("[#] Filename : ");
if(!file_exists($path)) {
	echo $RR."[-] File not foud\n".$X;
	goto inputpath;
}

$caption=readline("[#] Caption : "); // use '\n' for newline

if(isset($vo)) {
	for($x=0;$x<=count($username);$x++) {
		echo $Y."[!] Please wait a moment [!]$X\n";
		loading(100000);
		$ig=new InstagramUpload();
		$ig->Login($username[$x],$password[$x]);
		$ig->UploadVideo($path,false,"$caption");
		echo $G."[+] $username[$x] Done uploading video [+]$X\n";
	}
}
else {
	for($x=0;$x<=count($username);$x++) {
		echo $Y."[!] Please wait a moment [!]$X\n";
		loading(100000);
		$ig=new InstagramUpload();
		$ig->Login($username[$x],$password[$x]);
		$ig->UploadPhoto($path,"$caption");
		echo $G."[+] $username[$x] Done uploading photo [+]$X\n";
	}
}
