<?php

namespace App\Model\Entity;

class message
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $texte;
    private string $date;
    private int $fkArticle;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexte(): string
    {
        return $this->texte;
    }

    /**
     * @param string $texte
     */
    public function setTexte(string $texte): self
    {
        $this->texte = $texte;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getFkArticle(): int
    {
        return $this->fkArticle;
    }

    /**
     * @param int $fkArticle
     */
    public function setFkArticle(int $fkArticle): self
    {
        $this->fkArticle = $fkArticle;
        return $this;
    }
}
