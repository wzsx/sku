<?php

namespace App\Admin\Controllers;

use App\Model\SkuModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SkuController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->header('商品管理')
            ->description('商品列表')
            ->body($this->grid());
    }
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Model\SkuModel';

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
        $grid->column('goods_desc', __('Goods desc'));
        $grid->column('price0', __('Price0'));
        $grid->column('price', __('Price'));
        $grid->column('ctime', __('Ctime'));
        $grid->column('utime', __('Utime'));
        $grid->column('is_delete', __('Is delete'));

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
        $show->field('goods_desc', __('Goods desc'));
        $show->field('price0', __('Price0'));
        $show->field('price', __('Price'));
        $show->field('ctime', __('Ctime'));
        $show->field('utime', __('Utime'));
        $show->field('is_delete', __('Is delete'));

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

        $form->number('goods_id', __('Goods id'));
        $form->text('goods_sn', __('Goods sn'));
        $form->text('goods_name', __('Goods name'));
        $form->text('goods_desc', __('Goods desc'));
        $form->number('price0', __('Price0'));
        $form->number('price', __('Price'));
        $form->datetime('ctime', __('Ctime'))->default(date('Y-m-d H:i:s'));
        $form->datetime('utime', __('Utime'))->default(date('Y-m-d H:i:s'));
        $form->switch('is_delete', __('Is delete'));

        return $form;
    }
}
