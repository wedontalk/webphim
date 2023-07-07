<?php
namespace App\Repositories\phim;

use App\Repositories\EloquentRepository;
class phimReponsitory extends EloquentRepository implements phimInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {   
        return \App\Models\phim::class;
    }
    // public function getAll()
    // {
    //     return $this->_model::all();
    // }
    // public function orderBy(){
    //     return phim::orderBy('id', 'ASC')->search()->paginate(10);
    // }


}