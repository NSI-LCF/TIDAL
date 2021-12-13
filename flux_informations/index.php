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
        border: 5px solid darkblue;
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
</style>
</head>
<body>
    <div id='div1' class='taille'>
<?php
$flux=new SimpleXMLElement(file_get_contents("https://www.france24.com/fr/europe/rss"));

//print("<pre>");
//var_dump($flux);
//print("</pre>");

$last_update=$flux->channel->lastBuildDate;
print("Source France 24 le :$last_update");

$infos=$flux->channel->item;
foreach ($infos as $info)
{
    $titre=$info->title;
    $description=$info->description;
    print(" <p class='police_info_titre'>Titre: $titre</p><p>Description: $description</p><br />");
    $url=$info->enclosure->attributes()->url;
    print("<img class='image_info' src='$url' />");

    
    //var_dump($url);
    //$image=$info->enclosure->{"@attributes"};
    //print("<p>Image: $image</p>")
}



?>
</div>
<script>

function pageScroll() {
    //window.scrollBy(0,1);
    document.getElementByID("div1").scrollBy(0,1);
    scrolldelay = setTimeout(pageScroll,10);
    console.log('test');
}
pageScroll()
</script>


</body>
</html>