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
       $data["errors"] = session('errors');
       return view("film/add", $data);
    }

    public function store()
    {
       $validation = $this->validate([
              'nama_film' => [
              'rules'=> 'required',
              'errors' => [ 
                     'required'=> 'Kolom Nama Film Harus diisi'
              ]
              ],

              'id_genre' => [
                     'rules' =>'required', 
                      'errors' => [
                            'required' =>'Kolom Genre Harus diisi'
              ]
              ],
              'duration' => [
                      'rules'=> 'required',
                      'errors' => [
                             'required' =>'Kolom Durasi Harus diisi'
              ]
              ],
              'cover' => [
                      'rules'=> 'uploaded[cover]|mime_in[cover, image/jpg,image/jpeg, image/png]|max_size[cover,2048]',
                      'errors'=> [
                            'uploaded'=> 'Kolom Cover harus berisi file.',
                            'nime_in' =>'Tipe file pada Kolon Cover harus berupa JPG, JPEG, atau PNG',
                             'max_size' =>'Ukuran file pada Kolen Cover melebihi batas maksimum'
              ]
              ]
              ]);

              if (!$validation) {
              $errors = \Config\services::validation()->getErrors();

              return redirect()->back()->withInput()->with("errors", $errors);
              }
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
        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->to('/film');
    }

    public function update($id)
    {
        $data["genre"] = $this->genre->getAllData();
        $data["errors"] = session('errors');
        $data["dataFilm"] = $this->film->getDataByID($id);
        return view("film/edit", $data);
    }
    public function edit(){
       $validation = $this->validate([
           'nama_film' => [
               'rules' => 'required',
               'errors'=> [
                   'required' => 'Kolom Nama Film Harus Diisi'
               ]
           ],
           'id_genre' => [
               'rules' => 'required',
               'errors'=> [
                   'required' => 'Kolom Genre Harus Diisi'
               ]
           ],
           'duration' => [
               'rules' => 'required',
               'errors'=> [
                   'required' => 'Kolom Durasi Harus Diisi'
               ]
           ],
           'cover' => [
               'rules' => 'mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048] ',
               'errors'=> [
                   'mime_in' => 'Tipe file pada kolom cover harus berupa jpg, jpeg atau png',
                   'max_size' => 'Ukuran file pada kolom cover melebihi batas maksimum'
               ]
           ]
       ]);
       if (!$validation){
           $errors = \Config\Services::validation()->getErrors();
           return redirect()->back()->withInput()->with('errors',$errors);
       }
       $image = $this->request->getFile('cover');

       //Ambil data lama
       $film =$this->film->find($this->request->getPost('id'));
       //tambah request ID
       $data=[
           'id' => $this->request->getPost('id'),
           'nama_film' => $this->request->getPost('nama_film'),
           'id_genre' => $this->request->getPost('id_genre'),
           'duration' => $this->request->getPost('duration'),
       ];
       $cover = $this->request->getFile('cover');
       if ($cover->isValid() && !$cover->hasMoved()){
           //Generate nama unik
           $imageName = $cover->getRandomName();
           //Pindahkan file ke direktori penyimpanan
           $cover->move(ROOTPATH . 'public/assets/cover', $imageName);
           //Hapus file lama jika ada
           if ($film['cover']){
               unlink(ROOTPATH . 'public/assets/cover' . $film['cover']);
           }
           $data['cover'] = $imageName;
       }

       $this->film->save($data);
       session()->setFlashData('success', 'Data berhasil diperbarui');
       return redirect()->to('/film');
   }
   public function destroy($id)
   {
       $this->film->delete($id);
       session()->setFlashdata('success', 'Data Berhasil Dihapus.');
       return redirect()->to('/film');
   }

}
