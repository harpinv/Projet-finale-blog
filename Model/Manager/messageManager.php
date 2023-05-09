<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\message;

class messageManager
{
    /**
     * Returns all messages in the database.
     * @return array
     */
    public function getAll(): array
    {
        $messages = [];
        $sql = "SELECT * FROM message";
        $request = DB::getInstance()->query($sql);
        if ($request) {
            $data = $request->fetchAll();
            foreach ($data as $messageData) {
                $messages[] = (new message())
                    ->setId($messageData['id'])
                    ->setNom($messageData['nom'])
                    ->setPrenom($messageData['prenom'])
                    ->setTexte($messageData['texte'])
                    ->setDate($messageData['date'])
                    ->setFkArticle($messageData['fkArticle'])
                ;
            }
        }

        return $messages;
    }

    /**
     * Saves a new message to the database.
     * @return string
     */

    public function getMessageById(string $nom, string $prenom, string $texte, string $fkArticle): string
    {
        $sql = "INSERT INTO message (nom, prenom, texte, fkArticle)
                VALUES (:nom, :prenom, :texte, :fkArticle)
                ";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':texte', $texte);
        $stmt->bindParam(':fkArticle', $fkArticle);

        $stmt->execute();

        return "Le contact a bien été enregistré";
    }

    //Deletes a message from the database.
    public function getMessageSupprime($id)
    {
        $sql = "DELETE FROM message WHERE id = $id";
        $request = DB::getInstance()->prepare($sql);

        $request->execute();
    }
}
