<!DOCTYPE html>
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
<img src="https://app.mobilitat.ad/gifs/Arcalis.gif" />

  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="boite" id="date"><img id="logo" src="images/lcf.jpg"><p id="heure" >Date / Heure / Semaine</p></div>
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



?>
</div>
<div class="boite" id="cantine"><p>Cantine</p><img src="images/template.jpg"></div>
<div class="boite" id="profsabs"><p>Professeurs Absent</p></div>
<div class="boite" id="info"><p>Informations Administratives</p></div>
<div class="boite" id="data2"><p>News</p></div>
<div class="boite" id="vacances"><p>Webcams</p>
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
print("Source France 24 le :$last_update");
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
<img style="width: 10%;height:10%;" src="https://app.mobilitat.ad/gifs/Arcalis.gif?t=20220131110311" data-actual="https://app.mobilitat.ad/gifs/Arcalis.gif?t=20220131110311" class="img-fluid" onerror="this.onerror=null;this.src='https:\\/\\/www.mobilitat.ad/images/offline.gif';" title="CG3 / PK 20+670 (Arcalís Sud) / 1.900 metres">

</body>
</html>