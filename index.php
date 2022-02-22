<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Projet TIDAL</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <style>
    
    .taille{
        width:1080px;
        height:300px;
        border: 2px solid darkblue;
        overflow: hidden;
    }
    .image_info{
        width:256px;
        height:144px;
    }
    .police_info_titre{
        font-family : bebas-neue-pro, sans-serif;


    }
    .police_info_description{
        font-family : bebas-neue-pro, sans-serif; 

    }
    .scroll-text{
		overflow-y: auto;
		height: 300px;
        width: 1080px;
    }

   

</style>
</head>
<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="boite" id="date"><img id="logo" src="images/lcf.jpg"><p id="heure"></p> </div>
  <div class="boite" id="meteo"><p>Météo</p><?php


/* 42.505636,1.515349
6215b21fb6ed42d8980160421210212
*/


$meteo_xml=new SimpleXMLElement(file_get_contents("https://api.weatherapi.com/v1/current.xml?key=6215b21fb6ed42d8980160421210212&q=42.505636,1.515349&aqi=no"));
/*print("<pre>");
var_dump($meteo_xml);
print("</pre>");
$current=$meteo_xml->current;
print("<pre>");
var_dump($current);
print("</pre>");*/

print("<p id='prevision'>       Aujourd'hui <br/>");
/* TEMPS MAINTENANT */
/* TEXTE */
/*$texte=$meteo_xml->current->condition->text;
print("$texte");
/* ICONE METEO */
$icone=$meteo_xml->current->condition->icon;
print("<img class='icone_meteo' src='$icone' alt='logo' /><br/>");
/* TEMPERATURE */
$temperature=$meteo_xml->current->temp_c;
print("Moyenne: $temperature ºC</p>");

/* PRÉVISION */

$forecast_xml=new SimpleXMLElement(file_get_contents("https://api.weatherapi.com/v1/forecast.xml?key=6215b21fb6ed42d8980160421210212&q=42.505636,1.515349&days=1&aqi=no&alerts=no"));

print("<pre>");
//var_dump($forecast_xml);
print("</pre>");

/* JOUR 1 */
print("<p id='prevision2'>Demain <br/>");
/* TEXTE*/
/*$texte1=$forecast_xml->forecast->forecastday->day->condition->text;
print("<p id='prevision2'>$texte1");
*/
/* ICONE METEO */

$icone1=$forecast_xml->forecast->forecastday->day->condition->icon;
print("<img class='icone_meteo' src='$icone1' alt='logo'> <br/>");


/* MIN TEMP */
$min_temp=$forecast_xml->forecast->forecastday->day->mintemp_c;
print("Minimum: $min_temp ºC");
print("</br>");

/* MAX TEMP */
$max_temp=$forecast_xml->forecast->forecastday->day->maxtemp_c;
print("Maximum: $max_temp ºC");
print("</br>");

/* AVG TEMP */
$avg_temp=$forecast_xml->forecast->forecastday->day->avgtemp_c;
print("Moyenne: $avg_temp ºC</p>");

//var_dump($forecast_xml->forecast->forecastday->day);


?></div>
  <div class="boite" id="cantine"><p>Cantine</p><img src="images/template.jpg"></div>
  <div class="boite flex" id="profsabs"><p>Professeurs Absent</p>
  
  <?php
    $datalist = file_get_contents('http://localhost/tidal/backoffice/api.php');
    $apiData = json_decode($datalist, true);
    $apiData2 = $apiData["profs-abs"];
    //$apiData2 = ["M.Jany","M.toto","M.tutu","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany","M.Jany"];
    
    for ($i=1;$i<7;$i++)

    {
        for ($j=1;$j<5;$j++)
        {
            $prof[$i][$j]=" "; 
        }
    }
    $i=0;
    $j=1;
    foreach ($apiData2 as $prof1)
    {   $i++;
        if ($i>6)
        {
        $i=1;
        $j++;
        }
        $prof[$i][$j]=$prof1;
    }
    //var_dump($prof);
    //error_reporting( E_WARNING );
    echo "<table>";
    echo "<tr><td>".$prof[1][1]."</td><td>".$prof[1][2]."</td><td>".$prof[1][3]."</td><td>".$prof[1][4]."</td></tr>";
    echo "<tr><td>".$prof[2][1]."</td><td>".$prof[2][2]."</td><td>".$prof[2][3]."</td><td>".$prof[2][4]."</td></tr>";
    echo "<tr><td>".$prof[3][1]."</td><td>".$prof[3][2]."</td><td>".$prof[2][3]."</td><td>".$prof[3][4]."</td></tr>";
    echo "<tr><td>".$prof[4][1]."</td><td>".$prof[4][2]."</td><td>".$prof[2][3]."</td><td>".$prof[4][4]."</td></tr>";
    echo "<tr><td>".$prof[5][1]."</td><td>".$prof[5][2]."</td><td>".$prof[2][3]."</td><td>".$prof[5][4]."</td></tr>";
    echo "<tr><td>".$prof[6][1]."</td><td>".$prof[6][2]."</td><td>".$prof[2][3]."</td><td>".$prof[6][4]."</td></tr>";
    echo "</table>";
    /*
    foreach ($apiData2 as $data3)
    {
        $i++;
        echo "<tr><td> $data3</td> </tr>";
    };
    echo "<table>";
    */
    ?>
  
</div>
  <div class="boite" id="info"><p>Informations Administratives</p></div>
  <div class="boite" id="data2"><p>News</p></div>
  <div class="boite" id="vacances"><p> Webcams</p>
  <table>
        <tr>
            <td>
                <iframe name="webcams" width="250px" height="140px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://webtv.feratel.com/webtv/?design=v3&amp;pg=40354CFF-57D1-4271-9EE2-08A745983EDD&amp;cam=15060"></iframe>
            </td>
            <td>
                <iframe name="webcams" width="250px" height="140px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://webtv.feratel.com/webtv/?design=v3&amp;pg=40354CFF-57D1-4271-9EE2-08A745983EDD&amp;cam=15040"></iframe>
            </td>
            <td>
                <iframe name="webcams" width="250px" height="140px" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://webtv.feratel.com/webtv/?design=v3&amp;pg=40354CFF-57D1-4271-9EE2-08A745983EDD&amp;cam=15031"></iframe>
            </td>
            <td>
                <img alt="WebCam over Andorra la Vella &amp; Escaldes Engordany" loop="0" src="http://el-viking.com/webcam/Andorra.jpg" width="250px" height="140px">
            </td>
        </tr>
    </table>
  </div>

<?php
$flux=new SimpleXMLElement(file_get_contents("https://www.france24.com/fr/europe/rss"));

$last_update=$flux->channel->lastBuildDate;
//print("Source France 24 le :$last_update");
print("");
$informations=[];
$numero_information=0;
$infos=$flux->channel->item;
$nb_infos=count($infos)-1;

foreach ($infos as $info)
{
    $information="<table>";
    $titre=$info->title;
    $description=$info->description;
    //$description=substr($description,2);
    $description=str_replace("\n","<br>",$description);
    $information.=" <header><h1 class='police_info_titre'> $titre $numero_information /$nb_infos</h1><header><tr><td><h2>$description</h2></td>";
    $url=$info->enclosure->attributes()->url;
    $information.="<td><img class='image_info' src='$url' /><td></tr></table>";

    $informations[$numero_information]=$information;
    $numero_information++;
    //var_dump($url);
    //$image=$info->enclosure->{"@attributes"};
    //print("<p>Image: $image</p>")
}
/*
foreach ($informations as $info)
{ 
  //  print($info);
}  
*/
?>
<script>
//var nb=-1;
<?php
    $i="";
    foreach ($informations as $info)
    { 
        $info=str_replace('"','',$info);
        $i.="\"$info\",";
    }  
    $i=substr($i,0,-1);
    
    $i="var information=[".$i."];";
    print($i);

    ?>
var nb=0; 
function pageScroll() 
{
    
    
    
    
	//alert(nb);
    
    m=information[nb];
    
    document.getElementById("data2").innerHTML=m;
	nb=nb+1;
	
    if (nb><?php print($nb_infos) ?>) 
    {
        nb=0;
    }
    
        
}
scrolldelay = setInterval(pageScroll,10000);
</script>
</body>
</html>