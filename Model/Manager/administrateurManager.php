<?php

namespace App\Model\Manager;

use App\Model\DB;
use App\Model\Entity\administrateur;

class administrateurManager
{
    /**
     * Returns all database administrators.
     * @return array
     */
    public function getAll(): array
    {
        $administrateurs = [];
        $sql = "SELECT * FROM administrateur";
        $request = DB::getInstance()->query($sql);
        if($request) {
            $data = $request->fetchAll();
            foreach ($data as $administrateurData) {
                $administrateurs[] = (new administrateur())
                    ->setId($administrateurData['id'])
                    ->setNom($administrateurData['id'])
                    ->setPrenom($administrateurData['id'])
                    ->setIdentifients($administrateurData['identifients'])
                    ->setPassword($administrateurData['password'])
                ;
            }
        }

        return $administrateurs;
    }
}
