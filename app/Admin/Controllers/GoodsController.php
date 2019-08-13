<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\Replicate;
use App\Model\SkuModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SkuModel);

        $grid->column('goods_id', __('Goods id'));
        $grid->column('goods_sn', __('Goods sn'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('goods_img', __('Goods img'))->image();
        $grid->column('short_desc', __('Short desc'));
        $grid->column('price0', __('Price0'));
        $grid->column('price', __('Price'));
        $grid->column('ctime', __('Created at'));
        $grid->column('utime', __('Updated at'));
        $grid->column('is_delete', __('Is delete'));
        $grid->column('is_on', __('Is onsale'));
        $grid->actions(function($actions){
            $actions->add(new Replicate);
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(SkuModel::findOrFail($id));

        $show->field('goods_id', __('Goods id'));
        $show->field('goods_sn', __('Goods sn'));
        $show->field('goods_name', __('Goods name'));
        $show->field('goods_img', __('Goods img'));
        $show->field('goods_desc', __('Goods desc'));
        $show->field('price0', __('Price0'));
        $show->field('price', __('Price'));
        $show->field('ctime', __('Ctime'));
        $show->field('utime', __('Utime'));
        $show->field('is_delete', __('Is delete'));
        $show->field('is_onsale', __('Is onsale'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SkuModel);
        $form->text('goods_sn', __('Goods sn'));
        $form->text('goods_name', __('Goods name'));
        $form->image('goods_img', __('Goods img'));
        $form->text('goods_desc', __('Goods desc'));
        $form->number('price0', __('Price0'));
        $form->number('price', __('Price'));
        $form->switch('is_delete', __('Is delete'));
        $form->switch('is_onsale', __('Is onsale'))->default(1);

        return $form;
    }
}
