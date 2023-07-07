<?php
namespace App\Repositories\tapphim;

use App\Repositories\EloquentRepository;
class tapphimReponsitory extends EloquentRepository implements tapphimInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {   
        return \App\Models\tapphim::class;
    }
    // public function getAll()
    // {
    //     return $this->_model::all();
    // }
    // public function orderBy(){
    //     return phim::orderBy('id', 'ASC')->search()->paginate(10);
    // }


}