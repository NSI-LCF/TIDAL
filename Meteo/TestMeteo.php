<!DOCTYPE html>
<html>
<head>
    <style>
        .icone_meteogmoijerhgoijdrg
        {
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

/* TEMPS MAINTENANT */
$meteo_xml=new SimpleXMLElement(file_get_contents("https://api.weatherapi.com/v1/current.xml?key=6215b21fb6ed42d8980160421210212&q=42.505636,1.515349&aqi=no"));
print("<pre>");
var_dump($meteo_xml);
print("</pre>");
$current=$meteo_xml->current;
print("<pre>");
var_dump($current);
print("</pre>");

/* TEXTE */
$texte=$meteo_xml->current->condition->text;
print("$texte");
/* ICONE METEO */
$icone=$meteo_xml->current->condition->icon;
print("<img class='icone_meteo' src='$icone' alt='logo' />");
/* TEMPERATURE */
$temperature=$meteo_xml->current->temp_c;
print("$temperature ºC");



/* PRÉVISION */
$prevision_xml=new SimpleXMLElement(file_get_contents("https://api.weatherapi.com/v1/forecast.xml?key=6215b21fb6ed42d8980160421210212&q=42.505636,1.515349&days=1&aqi=no&alerts=no"));
print("<pre>");
var_dump($prevision_xml);
print("</pre>");
?>
</body>
</html>
