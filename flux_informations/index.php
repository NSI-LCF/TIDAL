<?php
$flux=new SimpleXMLElement(file_get_contents("https://www.france24.com/fr/europe/rss"));

print("<pre>");
var_dump($flux);
print("</pre>");

$last_update=$flux->channel->lastBuildDate;
print("Source France 24 le :$last_update");

$infos=$flux->channel->item;
foreach ($infos as $info)
{
    $titre=$info->title;
    $description=$info->description;
    print("<p>Titre: $titre</p><p>Description: $description</p><br />");
}

?>