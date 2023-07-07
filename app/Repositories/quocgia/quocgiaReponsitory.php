<?php
namespace App\Repositories\quocgia;

use App\Repositories\EloquentRepository;
class quocgiaReponsitory extends EloquentRepository implements quocgiaInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {   
        return \App\Models\quocgia::class;
    }
    // public function getAll()
    // {
    //     return $this->_model::all();
    // }
    public function orderBy(){
        return quocgia::orderBy('id', 'ASC')->search()->paginate(10);
    }


}