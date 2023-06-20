<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table            = 'film';   // Nama table yang ada di database
    protected $primaryKey       = 'id';     // Nama kolom yang menjadi primary key
    protected $useAutoIncrement = true;     // Beri nilai true jika terdapat autoincrement
    protected $allowFields      = [];       // Digunakan untuk menentukan kolom mana saja yang dapat kita insert data



   public function getFilm()
   {

    $data =[
        [
            "nama_film" => "Sewu Dino",
            "genre"     => "horor",
            "duration"  => "1 jam 43 menit"
        ],
        [
            "nama_film" => "fast x",
            "genre"     => "action",
            "duration"  => "2 jam 20 menit"
        ],
        [
            "nama_film" => "evil dead rise",
            "genre"     => "horor",
            "duration"  => "1 jam 50 menit"
        ],
        [
            "nama_film" => "guardians of galaxy vol 3",
            "genre"     => "action",
            "duration"  => "2 jam 30 menit"
        ],
        [
            "nama_film" => "one piece film red",
            "genre"     => "fantasi ",
            "duration"  => "1 jam 55 menit"
        ]
    ];

    return $data;
   }

   public function getAllData()
   {
    return $this->findAll();
   }
   
   public function getAllDataJoin()
    {
        $query = $this->db->table("film")
            ->select("film.*,genre.nama_genre")
            ->join("genre", "genre.id = film.id_genre");
        return $query->get()->getResultArray();
    }

   public function getDataByID($id)
   {
    return $this->find($id);
   }

   public function getDataBy($data)
   {
    return $this->where("genre", $data)->findAll();
   }

   public function getOrderBy()
   {
    return $this->orderBy('created_at', 'desc')->findAll();
   }

   public function getLimit()
   {
    return $this->limit(5)->findAll();
   }
}

