<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//step 1
use App\Models\FilmModel;

class Film extends BaseController
{
    //step 2 
    protected $film;
    //step 3
    public function __construct() 
    {
        //step 4
        $this->film = new FilmModel();
    }
    public function index()
    {
        $data['data_film'] = $this->film->getAllDatajoin();
        //dd($this->film->getFilm());
        return view("film/index", $data);
    }
    
    public function all()
    {
           //dd($this->film->getAllData());
           $data['semuafilm'] = $this->film->getAllDataJoin();
           return view("film/semuafilm", $data);
    }


    public function file_by_id()
    {
           dd($this->film->getDataByID(1));
    }

    public function film_by_genre()
    {
           dd($this->film->getDataBy("horor"));
    }

    public function film_order()
    {
           dd($this->film->getOrderBy());
    }

    public function film_limit_five()
    {
           dd($this->film->getLimit());
    }

    public function add()
    {
       return view("film/add");
    }
}
