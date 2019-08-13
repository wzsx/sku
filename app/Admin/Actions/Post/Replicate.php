<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = 'sku管理';

//    public function handle(Model $model)
//    {
//        // $model ...
//        $model->replicate()->save();
//
//        return $this->response()->success('Success message.')->refresh();
//    }
    public function href()
    {
        //echo $id;
        //echo $this->getKey();die;
        $key = $this->getKey();
        //return '/admin/sku-detail/'.$key;
        return '/admin/good'.$key;
    }
}