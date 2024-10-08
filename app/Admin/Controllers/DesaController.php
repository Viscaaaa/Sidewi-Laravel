<?php

namespace App\Admin\Controllers;

use App\Models\DesaWisata;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;


class DesaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'DesaWisata';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DesaWisata());

        $grid->column('id', __('Id'));
        $grid->column('gambar', __('Gambar'))->image();
        $grid->column('alamat', __('Alamat'));
        $grid->column('nama', __('Nama Desa'));
        $grid->column('deskripsi', __('Deskripsi'));
        $grid->column('kategori', __('Kategori'));
        $grid->column('kabupaten', __('Kabupaten'));
        $grid->column('slug', __('Slug'));
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
        $show = new Show(DesaWisata::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('gambar', __('Gambar'));
        $show->field('alamat', __('Alamat'));
        $show->field('nama', __('Nama Desa'));
        $show->field('deskripsi', __('Deskripsi'));
        $show->field('maps', __('Maps'));
        $show->field('kategori', __('Kategori'));
        $show->field('kabupaten', __('Kabupaten'));
        $show->field('slug', __('Slug'));
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
        $form = new Form(new DesaWisata());
        $form->image('gambar')->move('public/uploads/');
        $form->text('alamat', __('Alamat'));
        $form->text('nama', __('Nama Desa'));
        $form->textarea('deskripsi', __('Deskripsi'));
        $form->latlong('maps', __('maps'))->default(['lat' => -8.4095, 'lng' => 115.1889]);
        $form->select('kategori', 'Kategori')->options(['rintisan' => 'Rintisan', 'berkembang' => 'Berkembang', 'maju' => 'Maju', 'mandiri' => 'Mandiri']);
        $form->select('kabupaten', 'Kabupaten')->options([
            'Badung' => 'Badung',
            'Bangli' => 'Bangli',
            'Buleleng' => 'Buleleng',
            'Denpasar' => 'Denpasar',
            'Gianyar' => 'Gianyar',
            'Jembrana' => 'Jembrana',
            'Karangasem' => 'Karangasem',
            'Klungkung' => 'Klungkung',
            'Tabanan' => 'Tabanan'
        ]);
        $form->hidden('slug');



        $form->saving(function (Form $form) {

            // format slug
            $namaDesa = $form->input('nama');
            $kabupaten = $form->input('kabupaten');
            $slug = Str::slug("{$namaDesa} {$kabupaten}");
            $form->input('slug', $slug);

            // format untuk map
            $maps = $form->input('maps');
            if (isset($maps['lat']) && isset($maps['lng'])) {
                $form->input('maps', "{$maps['lat']},{$maps['lng']}");
            }
        });

        return $form;
    }
}
