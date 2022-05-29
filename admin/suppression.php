<?php

if (isset($_POST['insert']))
{
    $xml = new DomDocument("1.0","UTF-8");
    $xml->load('studentdb.xml');
    $name=$_POST['nom'];
    $xpath = new DOMXpath($xml);
    foreach($xpath->query("/listeCV/medecin[nom='$name'")as $node)
    {
        $node->parentNode->removeChild($node)
    }
    $xml->save('admin.xml');
}
?>