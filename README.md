# SocialMediaPornstars.com API usage example
Basic PHP example code on how to use the socialmediapornstars.com API endpoint to fetch the social media handles of all adult models included on the website.

**Reminder:** If you use any of the provided datasets in any format for your own non-commercial and commercial projects, a backlink is required.
Simply provide credit to the root domain (https://socialmediapornstars.com) as the source of the provided data. If possible, instead of crediting the root domain, providing a direct link to the matching model pages would be even more appreciated.

### How to use the API? ###

As the first step, you'll need to browse and select the model listed on the website from which you want to fetch the social media profile urls.
Visit the main website and click on the model you want to select.
On the model pages, you will find the hash attached to that particular model.

_Make sure to copy the hash_, so we can _paste it at the end of the API url_ later.

For this basic example, I'll be using the hash of the adult model Kiara Mia.

```
Model URL: https://socialmediapornstars.com/Pornstar.php?hash=74311d12a031f400c29d652f3dc65225bb11817a3f76d6a628986806f832fe8a
```
```
API url: https://socialmediapornstars.com/API.php?hash=74311d12a031f400c29d652f3dc65225bb11817a3f76d6a628986806f832fe8a
```

### Execute Curl to make a simple GET request ###

First, we will be using Curl to send a simple GET request to the API endpoint.

```
<?php
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
```

### Usig the JSON response (with PHP) ###
Now that you have your data, we can print the results on page or store it to a SQL (or any other database) of choice for later usage.
In this example we'll just output it on-page directly.

```
Twitter: <i><?php echo $data['twitter']; ?></i><br>
Snapchat: <i><?php echo $data['snapchat'];?></i><br>
Instagram: <i><?php echo $data['instagram'];?></i><br>
Facebook: <i><?php echo $data['facebook'];?></i><br>
Camsoda: <i><?php echo $data['camsoda'];?></i>
```

In some cases, a model might not have her own Facebook or Snapchat account, in such cases the API returns with 'None'.
You might not want to echo (or print) an empty output on page, or display the string like "none". If so, you can simply use the following example: 

```
// Check if profile does not output <i>None</i>
<?php if ($data['instagram'] != 'None') echo $data['instagram'];?>
```

As a final example, here's a line you can copy and paste in order to include a direct link to the social media accounts. In the line below, we'll use twitter:
```
<a href="https://twitter.com/<?php echo $data['twitter']; ?>">Click here for Kiara Mia's Twitter Account</a>
```

Using $data['twitter'] and variables directly while echo-ing also works, but only when using double quotes instead of single quotes. Alternatively, you can do:
```
<?php echo "<a href='https://twitter.com/".$data['twitter']."'>Click here for Kiara Mia's Twitter Account</a>"; ?>
```

That's it! That's all it takes, pretty much as simple as it gets... 


### Final note ###
It's also good practise to first check whether or not there's either a "status": "200" or "message": "OK" included in the JSON respose, just to make sure you aren't including any non-valid info or error messages in your pages.

If you do use our public API, don't forget to include the required backlink to credit the source. That goes for all our public datasets. See our terms of service for more info.
