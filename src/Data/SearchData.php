<?php

namespace App\Data;

class SearchData
{
    //système de mot clé 
    /**
    * @var string
    */
    public ?string $searchBar = '';

    /**
    * @var string
    */
    public ?string $prenom = '';

    /**
    * @var string
    */
    public ?string $nom = '';
    
    /**
    * @var Qualification
    */
    public $qualif = null;
    
    /**
    * @var Team
    */
    public $team = null;

}