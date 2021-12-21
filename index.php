<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Projet TIDAL</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="boite" id="date"><p id="heure" >Date / Heure / Semaine</p></div>
  <div class="boite" id="meteo"><p>Méteo</p>
        <?php
        /* 42.505636,1.515349
        6215b21fb6ed42d8980160421210212*/

        $meteo_xml=new SimpleXMLElement(file_get_contents("https://api.weatherapi.com/v1/current.xml?key=6215b21fb6ed42d8980160421210212&q=42.505636,1.515349&aqi=no"));
        /*print("<pre>");
        var_dump($meteo_xml);
        print("</pre>");
        $current=$meteo_xml->current;
        print("<pre>");
        var_dump($current);
        print("</pre>");*/

        /* TEMPS MAINTENANT */
        /* TEXTE */
        $texte=$meteo_xml->current->condition->text;
        /* ICONE METEO */
        $icone=$meteo_xml->current->condition->icon;
        print("<div class='globalmeteo'><div id='meteoJ'><img class='icone_meteo' src='$icone' alt='logo'/><br/>$texte</br>");
        /* TEMPERATURE */
        $temperature=$meteo_xml->current->temp_c;
        print("Moyenne: $temperature ºC</div>");

        /* PRÉVISION */
        $forecast_xml=new SimpleXMLElement(file_get_contents("https://api.weatherapi.com/v1/forecast.xml?key=6215b21fb6ed42d8980160421210212&q=42.505636,1.515349&days=1&aqi=no&alerts=no"));
        print("<pre>");
        //var_dump($forecast_xml);
        print("</pre>");

        /* JOUR 1 */
        /* TEXTE*/
        $texte1=$forecast_xml->forecast->forecastday->day->condition->text;
        /* ICONE METEO */
        $icone1=$forecast_xml->forecast->forecastday->day->condition->icon;
        print("<div id='meteoJ1'><img class='icone_meteo' src='$icone1' alt='logo' /><br>$texte1</br>");
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
        print("Moyenne: $avg_temp ºC</p></div></div>");
        //var_dump($forecast_xml->forecast->forecastday->day);
        ?>
        
        </div>
  <div class="boite" id="cantine"><p>Cantine</p><img src="images/template.jpg"></div>
  <div class="boite" id="profsabs"><p>Professeurs Absent</p></div>
  <div class="boite" id="info"><p>Informations Administratives</p></div>
  <div class="boite" id="data2"><p>News</p></div>
  <div class="boite" id="vacances"><p>Décompte Des Vacances</p></div>

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
</body>
</html>