$kul[0][‘username’]=”adınız”;
$kul[0][‘password’]=”şifreniz”;
// Dogrulama
function authenticate() 
    { 
    header( 'WWW-Authenticate: Basic realm=" Yetkili Girisi"' ); 
    header( 'HTTP/1.0 401 Unauthorized' );
echo "Dogrulama başarısız. veya Hack girişimi olabilir." ;
function GetIP(){
    if(getenv("HTTP_CLIENT_IP")) {
         $ip = getenv("HTTP_CLIENT_IP");
     } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
         $ip = getenv("HTTP_X_FORWARDED_FOR");
         if (strstr($ip, ',')) {
             $tmp = explode (',', $ip);
             $ip = trim($tmp[0]);
         }
     } else {
     $ip = getenv("REMOTE_ADDR");
     }
    return $ip;
}
echo " <br> <hr>";
$ip_adresi = GetIP();
echo GetIP();
echo " <br>İp adresi ile log tutulmuştur.";
exit; 
}
if (!isset($_SERVER[‘PHP_AUTH_USER’]) || !isset($_SERVER[‘PHP_AUTH_PW’])) { authenticate(); } else
{
for($i=0;$i<count($kul);$i++) { if($_SERVER[‘PHP_AUTH_USER’]==$kul[$i][‘username’] && $_SERVER[‘PHP_AUTH_PW’]==$kul[$i][‘password’]){$auth=TRUE;}}
if($auth !=TRUE) {authenticate();}
}
