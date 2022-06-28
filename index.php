<?php

// CONTROLLER du MVC ///////////////////////////////////////////////////////

// Chargement de la representation d'une categoie (CLASS Category : model)
require_once("./class/category.php");
// Chargement de la representation d'un produit (CLASS Product : model)
require_once("./class/product.php");

// Creation de 5 categories
$categoie1 = new Category("Console de jeu");
$categoie2 = new Category("Odinateur protable");
$categoie3 = new Category("Ordinateur de bureau");
$categoie4 = new Category("Tablette multimédia");
$categoie5 = new Category("Smartphone");

// Creation de 5 produits
$produit1 = new Product("ps2", 9.99, true, 99, "Console de jeu");
$produit2 = new Product("fujitsu", 999.99, true, 10, "Odinateur protable");
$produit3 = new Product("hewlett packard", 1999.99, false, 0, "Ordinateur de bureau");
$produit4 = new Product("ipad pro", 999.99, false, 0, "Tablette multimédia");
$produit5 = new Product("samsung galaxy note20 ultra 5g", 699.99, true, 50, "Smartphone");
$productlist = array($produit1, $produit2, $produit3, $produit4, $produit5);


// VUE du MVC //////////////////////////////////////////////////////////////
for ($i = 0; $i < count($productlist); $i++) {
    if ($productlist[$i]->getEnPromo() === true) {
        echo $productlist[$i]->getNom() . " est en promo" . "<br/>";
    }
}

echo "<br/>";

for ($i = 0; $i < count($productlist); $i++) {
    if ($productlist[$i]->getRemise() > 0) {
        echo $productlist[$i]->getNom() . " : " . $productlist[$i]->getRemise() . " % <br/>";
        echo "prix normal : " . $productlist[$i]->getPrix() . " $ <br/>";
        $remise = $productlist[$i]->getPrix() * ($productlist[$i]->getremise() / 100);
        echo "prix en solde : " . ($productlist[$i]->getPrix() - $remise) . "$ aprés remise" . "<br/><br/>";
    }
}

echo "<br/>";
echo "Afficher la liste des produits triés par leur nom. Information affichée : nom du produit";
echo "<br/>";

usort($productlist, [Product::class, 'trierParNom']);
for ($i = 0; $i < count($productlist); $i++) {
    echo $productlist[$i]->getNom() . "<br/>";
}

echo "<br/>";
echo "Afficher la liste des produits triés par catégorie et par nom de produit. Informations 
affichées : nom de la catégorie et nom du produit";
echo "<br/>";

usort($productlist, [Product::class, 'trierParCategorieEtNom']);
for ($i = 0; $i < count($productlist); $i++) {
    echo $productlist[$i]->getCategorie() . " : " . $productlist[$i]->getNom() . "<br/>";
}

echo "<br/>";
echo "Donner la possibilité dans l’application de mettre à tout moment un produit en promotion 
ou de lui affecter un pourcentage de remise";
echo "<br/>";

// $produit3 = new Product("hewlett packard", 1999.99, false, 0, "Ordinateur de bureau");
$produit3->setPromo(true);
$produit3->setRemise(50);
echo $produit3->getNom();
echo "<br/>";
echo "En promo : " . $produit3->getEnPromo() . "<br/>";
echo "Remise : " . $produit3->getRemise() . " %";