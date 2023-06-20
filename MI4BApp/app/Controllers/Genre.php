<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//step 1
use App\Models\genreModel;

class Genre extends BaseController
{
    //step 2 
    protected $genre;
    //step 3
    public function __construct() 
    {
        //step 4
        $this->genre = new genreModel();
    }

    public function all()
    {
           //dd($this->film->getAllData());
           $data['semuagenre'] = $this->genre->getAllData();
           return view("film/semuagenre", $data);
    }
}