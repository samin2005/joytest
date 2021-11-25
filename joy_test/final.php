<?
ini_set('display_errors', 'Off');
error_reporting(0);
session_start();

if(time() - $_SESSION['timefour'] < 15 || !isset($_SESSION['timefour']))
{
	echo "you did not complete the linkvertise";
	echo "<meta http-equiv='Refresh' Content='4;url=https://keyauth.com/snowwy/'>"; 
	return;
}

$ch = curl_init("https://keyauth.com/api/seller/?sellerkey=010c4da44ae7db416a21664ad2ed2f60&type=add&expiry=0.041666666666667&mask=XXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX&level=1&amount=1&format=text");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$key = curl_exec($ch);
curl_close($ch);

$_SESSION['time'] = NULL;
$_SESSION['timetwo'] = NULL;
$_SESSION['timethree'] = NULL;
$_SESSION['timefour'] = NULL;
print("Powered by KeyAuth.com login system");
?>

<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <script>
        function copyToClipboard() {
            var e = "<?php echo $key ?>";
            var tempItem = document.createElement('input');
            tempItem.setAttribute('type','text');
            tempItem.setAttribute('display','none');
            let content = e;
            if (e instanceof HTMLElement) {
            		content = e.innerHTML;
            }
            tempItem.setAttribute('value',content);
            document.body.appendChild(tempItem);
            tempItem.select();
            document.execCommand('Copy');
            tempItem.parentElement.removeChild(tempItem);
            alert("Successfully copied the key to your clipboard!");
        }
</script>
    
<title>KeySystem</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="MainDesign.css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
<div class="keysyscontainer">
    <div class="box">
        <span class="title">GENARATE KEY</span>
        <span class="text"> This key is valid for around 10 minutes only. </span>
        <span class="text"> Your key: <?php echo $key ?></span>
        <button onclick = "return copyToClipboard()" class="button Copy">Copy Key</button>
</html>
