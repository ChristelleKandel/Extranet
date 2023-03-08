<?php

namespace App\Data;

use App\Entity\Team;
use App\Entity\Users;
use App\Entity\Qualifications;

class SearchData
{
    //système de recherche par mot clé
    /**
    * @var string
    */
    public ?string $searchBar = '';

    // /**
    // * @var string
    // */
    // public ?string $prenom = '';

    // /**
    // * @var Users
    // */
    // public $prenom = null;

    // /**
    // * @var string
    // */
    // public ?string $nom = '';
    
    //système de tri par qualification. Je passe un tableau pour avoir plusieurs choix possibles  
    /**
    * @var Qualifications[]
    */
    public $qualif = [];
    
    //système de tri par niveau. Je passe un objet si je mets un select de liste.  
    /**
    * @var Team
    */
    public $team = null;

    //Encore en poste actuellement
    /**
     * @var boolean
     */
    public $enPoste = true;
}