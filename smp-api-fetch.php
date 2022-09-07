<?php 
// In this example I'll be using model: Kiara Mia, see readme for more info.
// Model URL: https://socialmediapornstars.com/Pornstar.php?hash=74311d12a031f400c29d652f3dc65225bb11817a3f76d6a628986806f832fe8a
// API url: https://socialmediapornstars.com/API.php?hash=74311d12a031f400c29d652f3dc65225bb11817a3f76d6a628986806f832fe8a


$url = 'https://socialmediapornstars.com/API.php?hash=74311d12a031f400c29d652f3dc65225bb11817a3f76d6a628986806f832fe8a';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
if(curl_error($ch)) { 
echo 'error:' . curl_error($ch);
};
curl_close($ch);
$data = json_decode($json,true);
?>

<!-- // print the results (or add it to your SQL database etc)  -->
<p>
Twitter: <i><?php echo $data['twitter']; ?></i><br>
Snapchat: <i><?php echo $data['snapchat'];?></i><br>
Instagram: <i><?php echo $data['instagram'];?></i><br>
Facebook: <i><?php echo $data['facebook'];?></i><br>
Camsoda: <i><?php echo $data['camsoda'];?></i>
</p>

<!-- Check if profile does not output 'None' -->
<p><i><?php if ($data['instagram'] != 'None') echo $data['instagram'];?></i></p>

<!-- Example to output a direct link -->
<a href="https://twitter.com/<?php echo $data['twitter']; ?>">Click here for Kiara Mia's Twitter Account</a>
