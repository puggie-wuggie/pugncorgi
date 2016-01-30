<?php

function get_url_contents($path)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$path);
    curl_setopt($ch, CURLOPT_FAILONERROR,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $retValue = curl_exec($ch);                      
    curl_close($ch);
    return $retValue;
}


$url = "http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=pug&rsz=8";
$url2 = "http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=corgi&rsz=8";

$json = get_url_contents($url);
$json2 = get_url_contents($url2);

$data = json_decode($json);
$data2 = json_decode($json2);

$result = $data->responseData->results;
$result2 = $data2->responseData->results;
$count = count($result);

/*
print_r($data);
print_r($data2);

foreach ($data->responseData->results as $result) {
    echo '<img src="' . $result->url . '"/><br/>';
}
    foreach ($data2->responseData->results as $result2) {
    echo '<img src="' . $result2->url . '"/><br/>';
}

*/


?>

<!DOCTYPE hyml>
<html>
    <head>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <link rel="stylesheet" href="/pugncorgi/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="/pugncorgi/fancybox/jquery.fancybox.pack.js"></script>
        
         <script>
            /* function gen_rand(0, $count-1) {
                 return Math.random();
             }*/
            
                 
             
        $(document).ready(function() {
            $('.fancybox').fancybox();
        });
        </script>
        
        <title>Daily Corgi and Pug</title>
        <link href = 'http://fonts.googleapis.com/css?family=Indie Flower' 
              rel = 'stylesheet' type = 'text/css'>
        <link rel = "stylesheet" href = "company.css">
    </head>
    <body>
        
        <div id = "wrapper">
            <header>
            <h1>Daily Corgi and Pug</h1>
            <h2>The heaven of corgi and pug lover</h2>
            
            <p>
                Our cleansing, nourishing and relaxing facilities<br/>
                will provide the fix you need for corgi and pug. <br />
                Treat yourself to what you would ask for,<br/> they are waiting.
            </p><br/>
                <a class = "action" href = "mailto:pugncorgi@gmail.com">Send your love for pug and corgi now!</a>
</header>
            <section id = "icons">
                <div class = "icon">
                    <a class="fancybox" rel="group" href="<?php $rand = rand(0,$count-1); echo $result[$rand]->url; ?>"><img src = "images/pugwrinkles.png"/></a>
                    <p>Come hither </br/>Pug Addicts</p>
                    
                </div>
                <div class = "icon">
                    <a class="fancybox" rel="group" href="<?php echo $result2[$rand]->url; ?>"><img src = "images/corgi2.png" /></a>
                    <p>Come hither </br/>Corgi Addicts</p>
                </div>
            </section>
            
            <section>
                <img class = "nap" src="images/header.jpg" />
            <h3>Services</h3>
            <ul>
                <li>Cleanse your eyes</li>
                <li>Refresh your mind</li>
                <li>Relieve stress from human beings</li>
                <li>Imagine your own heaven</li>
            </ul>
            </section>

<footer>
            Do Not Ever Find Me Inc. <br />
            44-5058 Fake Avenue<br/>
            Vancouver, BC, V6R 3P4<br/>
            Tel: 778-000-0010<br/>
            Fax: 778-000-0011
            </footer>
        </div>
    </body>
 </html>  


 