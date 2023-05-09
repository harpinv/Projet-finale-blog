<?php

namespace App\Model\Entity;

class administrateur
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $identifients;
    private string $password;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return administrateur
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
     * @return administrateur
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
     * @return administrateur
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifients(): string
    {
        return $this->identifients;
    }

    /**
     * @param string $identifients
     * @return administrateur
     */
    public function setIdentifients(string $identifients): self
    {
        $this->identifients = $identifients;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return administrateur
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}
