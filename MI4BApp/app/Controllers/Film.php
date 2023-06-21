<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//step 1
use App\Models\FilmModel;
use App\Models\GenreModel;     //tambahkan 1

class Film extends BaseController
{
    //step 2 
    protected $film;
    protected $genre;              //tambahkan 2
    //step 3
    public function __construct() 
    {
        //step 4
        $this->film = new FilmModel();
        $this->genre = new GenreModel();         //tambahkan 3
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
       $data["genre"] = $this->genre->getAllData();
       return view("film/add", $data);
    }

    public function store()
    {
        $image = $this->request->getFile('cover');
        // Generate nama file yang unik
        $imageName = $image->getRandomName();
        // Pindahkan file ke direktori penyimpanan
        $image->move(ROOTPATH . 'public/assets/cover/',$imageName);
        $data =[
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration'=> $this->request->getPost('duration'),
            'cover'=> $imageName,
        ];
        $this->film->save($data);
        return redirect()->to('/film');
    }
}
