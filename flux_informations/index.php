<html>
<head>

<style>
    body{
        width:1080px;
        height:300px;
    }
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

<?php
$flux=new SimpleXMLElement(file_get_contents("https://www.france24.com/fr/europe/rss"));

//print("<pre>");
//var_dump($flux);
//print("</pre>");
?>
<div class="taille" id="data">

<?php
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
</div>

<div id="data2"></div>
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
    
    document.getElementById("data").innerHTML=m;
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