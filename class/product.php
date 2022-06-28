<?php
// MODEL du MVC ///////////////////////////////////////////////////////
class Product
{

    private string $nom;
    private float $prix;
    private bool $enPromo;
    private int $remise;
    private string $categorie;

    public function __construct($nom, $prix, $enPromo, $remise, $categorie)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->enPromo = $enPromo;
        $this->remise = $remise;
        $this->categorie = $categorie;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEnPromo()
    {
        return $this->enPromo;
    }

    public function getRemise()
    {
        return $this->remise;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public static function trierParNom($l1, $l2)
    {
        return strtolower($l1->nom) <=> strtolower($l2->nom);
    }

    public static function trierParCategorieEtNom($l1, $l2)
    {
        if (strtolower($l1->categorie) <=> strtolower($l2->categorie)) {
            return strtolower($l1->nom) <=> strtolower($l2->nom);
        } else {
            return strtolower($l1->categorie) <=> strtolower($l2->categorie);
        }
    }

    public function setPromo(bool $value)
    {
        if ($value === true) {
            $this->enPromo = true;
        } else {
            $this->enPromo = false;
        }
    }

    public function setRemise(int $value)
    {
        $this->remise = $value;
    }
}