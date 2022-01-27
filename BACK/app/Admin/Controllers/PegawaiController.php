<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class PegawaiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new User());

        // $table->column('id', __('Id'));
        $table->column('name', __('Name'));
        $table->column('nip', __('Nip'));
        $table->column('jabatan', __('Jabatan'));
        // $table->column('jenis_kelamin', __('Jenis kelamin'));
        // $table->column('tempat_l', __('Tempat l'));
        // $table->column('tgl_l', __('Tgl l'));
        // $table->column('notel', __('Notel'));
        $table->column('email', __('Email'));
        // $table->column('password', __('Password'));
        // $table->column('two_factor_secret', __('Two factor secret'));
        // $table->column('two_factor_recovery_codes', __('Two factor recovery codes'));
        $table->column('jumlah_jam_kerja', __('Jumlah jam kerja (menit)'));
        // $table->column('profile_photo_path', __('Profile photo path'));
        // $table->column('email_verified_at', __('Email verified at'));
        // $table->column('remember_token', __('Remember token'));
        // $table->column('current_team_id', __('Current team id'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('nip', __('Nip'));
        $show->field('jabatan', __('Jabatan'));
        $show->field('jenis_kelamin', __('Jenis kelamin'));
        $show->field('tempat_l', __('Tempat l'));
        $show->field('tgl_l', __('Tgl l'));
        $show->field('notel', __('Notel'));
        $show->field('email', __('Email'));
        $show->password('password', __('Password'));
        $show->field('two_factor_secret', __('Two factor secret'));
        $show->field('two_factor_recovery_codes', __('Two factor recovery codes'));
        $show->field('jumlah_jam_kerja', __('Jumlah jam kerja'));
        $show->field('profile_photo_path', __('Profile photo path'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('remember_token', __('Remember token'));
        $show->field('current_team_id', __('Current team id'));
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
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->text('nip', __('Nip'));
        $form->text('jabatan', __('Jabatan'));
        $form->text('jenis_kelamin', __('Jenis kelamin'));
        $form->text('tempat_l', __('Tempat l'));
        $form->date('tgl_l', __('Tgl l'))->default(date('Y-m-d'));
        $form->text('notel', __('Notel'));
        $form->email('email', __('Email'));
        $form->password('password', __('Password'));
        $form->textarea('two_factor_secret', __('Two factor secret'));
        $form->textarea('two_factor_recovery_codes', __('Two factor recovery codes'));
        $form->text('jumlah_jam_kerja', __('Jumlah jam kerja'));
        $form->text('profile_photo_path', __('Profile photo path'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->text('remember_token', __('Remember token'));
        $form->number('current_team_id', __('Current team id'));

        return $form;
    }
}
