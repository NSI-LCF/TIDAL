<!DOCTYPE html>
<html>
<head>
    <style>
        .icone_meteo
        {
        margin-left:100px ;
         width:108px;
         height:108px;
        }
        </style>
</head>
<body>
<?php
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


/* TEMPS MAINTENANT */
/* TEXTE */
$texte=$meteo_xml->current->condition->text;
print("$texte");
/* ICONE METEO */
$icone=$meteo_xml->current->condition->icon;
print("<img class='icone_meteo' src='$icone' alt='logo' />");
/* TEMPERATURE */
$temperature=$meteo_xml->current->temp_c;
print("Moyenne: $temperature ºC");




/* PRÉVISION */

$forecast_xml=new SimpleXMLElement(file_get_contents("https://api.weatherapi.com/v1/forecast.xml?key=6215b21fb6ed42d8980160421210212&q=42.505636,1.515349&days=1&aqi=no&alerts=no"));

print("<pre>");
//var_dump($forecast_xml);
print("</pre>");




/* JOUR 1 */
/* TEXTE*/
$texte1=$forecast_xml->forecast->forecastday->day->condition->text;
print("$texte1");

/* ICONE METEO */
$icone1=$forecast_xml->forecast->forecastday->day->condition->icon;
print("<img class='icone_meteo' src='$icone1' alt='logo' />");


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
</body>
</html>
