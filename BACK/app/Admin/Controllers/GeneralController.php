<?php

namespace App\Admin\Controllers;

use App\General;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GeneralController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'General';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new General());

        $grid->column('id', __('Id'));
        $grid->column('nama_Role', __('Nama Role'));
        $grid->column('Status_Role', __('Status Role'));
        $grid->column('Fungsi', __('Fungsi'));
        $grid->column('Value1', __('Value1'));
        $grid->column('Value2', __('Value2'));
        $grid->column('Value3', __('Value3'));
        $grid->column('Catatan', __('Catatan'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(General::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama_Role', __('Nama Role'));
        $show->field('Status_Role', __('Status Role'));
        $show->field('Fungsi', __('Fungsi'));
        $show->field('Value1', __('Value1'));
        $show->field('Value2', __('Value2'));
        $show->field('Value3', __('Value3'));
        $show->field('Catatan', __('Catatan'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new General());

        $form->text('nama_Role', __('Nama Role'));
        $form->text('Status_Role', __('Status Role'));
        $form->text('Fungsi', __('Fungsi'));
        $form->text('Value1', __('Value1'));
        $form->text('Value2', __('Value2'));
        $form->text('Value3', __('Value3'));
        $form->text('Catatan', __('Catatan'));

        return $form;
    }
}
