<?php
namespace App\Repositories\loaiphim;

use App\Repositories\EloquentRepository;
class loaiphimReponsitory extends EloquentRepository implements loaiphimInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {   
        return \App\Models\loaiphim::class;
    }
    // public function getAll()
    // {
    //     return $this->_model::all();
    // }
    public function orderBy(){
        return loaiphim::orderBy('id', 'ASC')->search()->paginate(10);
    }


}