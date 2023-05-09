<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\article;

class articleManager
{
    /**
     * Returns all articles in the database.
     * @return array
     */
    public function getAll(): array
    {
        $articles = [];
        $sql = "SELECT * FROM article";
        $request = DB::getInstance()->query($sql);
        if ($request) {
            $data = $request->fetchAll();
            foreach ($data as $articleData) {
                $articles[] = (new article())
                    ->setId($articleData['id'])
                    ->setTitre($articleData['titre'])
                    ->setResume($articleData['resume'])
                    ->setText($articleData['text'])
                    ->setAuteur($articleData['auteur'])
                    ->setDate($articleData['date'])
                ;
            }
        }

        return $articles;
    }

    /**
     * Allows you to save a new part in the database.
     * @return string
     */

    public function getArticleById(string $titre, string $resume, string $text, string $auteur): string
    {
        $sql = "INSERT INTO article (titre, resume, text, auteur)
                VALUES (:titre, :resume, :text, :auteur)
                ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':resume', $resume);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':auteur', $auteur);

        $stmt->execute();

        return "Le contact a bien été enregistré";
    }

    //Deletes an aricle from the database.
    public function getArticleSupprime($id)
    {
        $sql = "DELETE FROM article WHERE id = $id";
        $request = DB::getInstance()->prepare($sql);

        $request->execute();
    }

    //Allows you to modify an aricle in the database.
    public function getArticleModifie(int $id, string $titre, string $resume, string $text, string $auteur): string
    {
        $sql = "UPDATE article SET titre = :titre, resume = :resume, text = :text, auteur = :auteur WHERE id = :id
                ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':resume', $resume);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':auteur', $auteur);

        $stmt->execute();

        return "Le contact a bien été enregistré";
    }
}
