<?php

namespace App\Admin\Controllers;

use App\Generalsetting;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Generalsetting';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Generalsetting());

        $table->column('id', __('Id'));
        $table->column('setting_name', __('Setting name'));
        // $table->column('grup', __('Grup'));
        // $table->column('value', __('Value'));
        // $table->column('value1', __('Value1'));
        // $table->column('value2', __('Value2'));
        // $table->column('value3', __('Value3'));
        $table->column('Keterangan', __('Keterangan'));
        // $table->column('created_at', __('Created at'));
        // $table->column('updated_at', __('Updated at'));

        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Generalsetting::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('setting_name', __('Setting name'));
        $show->field('grup', __('Grup'));
        $show->field('value', __('Value'));
        $show->field('value1', __('Value1'));
        $show->field('value2', __('Value2'));
        $show->field('value3', __('Value3'));
        $show->field('Keterangan', __('Keterangan'));
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
        $form = new Form(new Generalsetting());

        $form->textarea('setting_name', __('Setting name'));
        $form->textarea('grup', __('Grup'));
        $form->textarea('value', __('Value'));
        $form->textarea('value1', __('Value1'));
        $form->textarea('value2', __('Value2'));
        $form->textarea('value3', __('Value3'));
        $form->textarea('Keterangan', __('Keterangan'));

        return $form;
    }
}
