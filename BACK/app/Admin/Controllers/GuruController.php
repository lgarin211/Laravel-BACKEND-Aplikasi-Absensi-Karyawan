<?php

namespace App\Admin\Controllers;

use App\Guru;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GuruController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Guru';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Guru());

        $grid->column('NIP', __('NIP'));
        $grid->column('Nama_Guru', __('Nama Guru'));
        $grid->column('Username', __('Username'));
        $grid->column('password', __('Password'));
        $grid->column('Jumlah_Jam_Kerja', __('Jumlah Jam Kerja'));
        $grid->column('Jabatan', __('Jabatan'));
        $grid->column('PP', __('Photo Profile link'));
        $grid->column('Kontak', __('Kontak'));
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
        $show = new Show(Guru::findOrFail($id));

        $show->field('NIP', __('NIP'));
        $show->field('Nama_Guru', __('Nama Guru'));
        $show->field('Username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('Jumlah_Jam_Kerja', __('Jumlah Jam Kerja'));
        $show->field('Jabatan', __('Jabatan'));
        $show->field('PP', __('PP'));
        $show->field('Kontak', __('Kontak'));
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
        $form = new Form(new Guru());

        $form->number('NIP', __('NIP'));
        $form->text('Nama_Guru', __('Nama Guru'));
        $form->text('Username', __('Username'));
        $form->password('password', __('Password'));
        $form->text('Jumlah_Jam_Kerja', __('Jumlah Jam Kerja'));
        $form->textarea('Jabatan', __('Jabatan'));
        $form->textarea('PP', __('PP'));
        $form->textarea('Kontak', __('Kontak'));

        return $form;
    }
}
