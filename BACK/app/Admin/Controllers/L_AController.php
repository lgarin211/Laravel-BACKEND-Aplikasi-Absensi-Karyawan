<?php

namespace App\Admin\Controllers;

use App\log_absen;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class L_AController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'log_absen';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new log_absen());

        $grid->column('NIP', __('NIP'));
        $grid->column('Nama_Guru', __('Nama Guru'));
        $grid->column('Status', __('Status'));
        $grid->column('TGL', __('TGL'));
        $grid->column('Absensi_Masuk', __('Absensi Masuk'));
        $grid->column('Absensi_keluar', __('Absensi keluar'));
        $grid->column('Keterangan', __('Keterangan'));
        $grid->column('Gambar', __('Gambar'));
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
        $show = new Show(log_absen::findOrFail($id));

        $show->field('NIP', __('NIP'));
        $show->field('Nama_Guru', __('Nama Guru'));
        $show->field('Status', __('Status'));
        $show->field('TGL', __('TGL'));
        $show->field('Absensi_Masuk', __('Absensi Masuk'));
        $show->field('Absensi_keluar', __('Absensi keluar'));
        $show->field('Keterangan', __('Keterangan'));
        $show->field('Gambar', __('Gambar'));
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
        $form = new Form(new log_absen());

        $form->text('NIP', __('NIP'));
        $form->text('Nama_Guru', __('Nama Guru'));
        $form->text('Status', __('Status'));
        $form->date('TGL', __('TGL'))->default(date('Y-m-d'));
        $form->date('Absensi_Masuk', __('Absensi Masuk'))->default(date('Y-m-d'));
        $form->date('Absensi_keluar', __('Absensi keluar'))->default(date('Y-m-d'));
        $form->text('Keterangan', __('Keterangan'));
        $form->text('Gambar', __('Gambar'));

        return $form;
    }
}
