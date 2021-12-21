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
  <div class="boite" id="date"><p id="heure" >Date / Heure / Semaine</p></div>
  <div class="boite" id="meteo"><p>Méteo</p></div>
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