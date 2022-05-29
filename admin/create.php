<?php

$xml= new DomDocument("1.0","UTF-8");
$xml->load("admin.xml");
$xpath = new DOMXpath($xml);


//$listeCV = $xml->getElementByTagName("listeCV")->item(0);
if(!$xml)
{
    $listeCV=$xml->createElement('listeCV');
    $xml->appendChild($listeCV);
}
else { $listeCV=$xml->firstChild;}
if (isset($_POST['create'])) {
$name=$_POST['nom'];
$firstname=$_POST['prenom'];
$desc=$_POST['description'];
$dom=$_POST['domaine'];
$exp=$_POST['exprerience'];
$infoTag =$xml->createElement("medecin");
$base->appendChild($xmlItem = $xml->createElement('medecin'));
//$listeCV->appenChild("$infoTag");
$nameTag=$xml->createElement("nom",$name);
$infoTag->appendChild($nameTag);
$firstnameTag =$xml->createElement("prenom", $firstname);
$infoTag->appendChild($firstnameTag);
$descTag=$xml->createElement("description",$desc);
$infoTag->appendChild($descTag);
$domTag=$xml->createElement("domaine",$dom);
$infoTag->appendChild($domTag);
$expTag=$xml->createElement("experience",$exp);
$infoTag->appendChild($expTag);
//$listeCV->appendChild($infoTag);
$xml->save('admin.xml');
echo "<xmp>".$xml->saveXML()."</xmp>";
}
?>