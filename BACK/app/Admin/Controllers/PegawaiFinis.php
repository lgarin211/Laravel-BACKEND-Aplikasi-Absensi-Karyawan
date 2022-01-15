<?php

namespace App\Admin\Controllers;

use App\User;
use App\log_absen;

use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;
use Illuminate\Support\Facades\DB;


class PegawaiFinis extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Telah Melakukan Presensi';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        // dd(DB::table('users')->get());
        // dump(DB::table('log_absens')->
        // where('jam_masuk','like','%'.date('m-d-Y').'%')
        // ->join('users', 'users.id', '=', 'log_absens.id_user')
        // ->get());
        $table = new Table(new log_absen());
        $table->model()->where('jam_masuk','like','%'.date('m-d-Y').'%')
        ->join('users', 'users.id', '=', 'log_absens.id_user');
        $table->column('id', __('Id'));
        
        // $table->column('id_user', __('Id user'));
        $table->column('name', __('name'));
        $table->column('jam_masuk', __('Jam masuk'));
        // $table->column('bukti_masuk', __('Bukti Kehadiran'));
        // $table->column('bukti_masuk', __('Bukti masuk'));
        $table->column('keterangan', __('Keterangan'));
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
        $show = new Show(log_absen::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('id_user', __('Id user'));
        $show->field('jam_masuk', __('Jam masuk'));
        $show->field('jam_keluar', __('Jam keluar'));
        $show->field('bukti_masuk', __('Bukti masuk'));
        $show->field('keterangan', __('Keterangan'));
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

        $form->number('id_user', __('Id user'));
        $form->text('jam_masuk', __('Jam masuk'));
        $form->text('jam_keluar', __('Jam keluar'));
        $form->text('bukti_masuk', __('Bukti masuk'));
        $form->text('keterangan', __('Keterangan'));

        return $form;
    }
}

