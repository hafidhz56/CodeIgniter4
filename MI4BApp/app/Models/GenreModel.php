<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
    protected $table            = 'genre';   // Nama table yang ada di database
    protected $primaryKey       = 'id';     // Nama kolom yang menjadi primary key
    protected $useAutoIncrement = true;     // Beri nilai true jika terdapat autoincrement
    protected $allowFields      = [];       // Digunakan untuk menentukan kolom mana saja yang dapat kita insert data

    public function getAllData()
    {
     return $this->findAll();
    }
 
    
}
