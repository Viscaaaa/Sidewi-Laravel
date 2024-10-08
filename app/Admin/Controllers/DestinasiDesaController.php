<?php

namespace App\Admin\Controllers;

use App\Models\DesaWisata;
use App\Models\DestinasiWisata;
use App\Models\AssetDestinasi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class DestinasiDesaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'DestinasiWisata';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DestinasiWisata());

        $grid->column('id', __('Id'));
        $grid->column('deskripsi', __('Deskripsi'));
        $grid->column('nama', 'Nama Destinasi');
        $grid->column('desaWisata.nama', 'Desa');
        $grid->column('gambar', __('Gambar'))->image();
        $grid->column('slug', __('Slug'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->filter(function ($filter) {


            $filter->disableIdFilter();


            $filter->like('tb_desa_wisatas_id', 'Nama Desa')->select(function () {
                return DesaWisata::pluck('nama', 'id');
            });

            $filter->like('nama', 'Nama Destinasi');
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
        $show = new Show(DestinasiWisata::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('deskripsi', __('Deskripsi'));
        $show->field('nama', __('Nama'));
        $show->field('gambar', __('Gambar'))->image();
        $show->field('slug', __('Slug'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));


        // note belum bisa tampil berupa gallery

        $show->photos('Gallery Photos', function ($photo) {
            $photo->resource('/admin/asset-destinasi');
            $photo->photo_path(__('Photo Path'))->image();
        })->fromRelation('assetDestinasi');



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new DestinasiWisata());

        $form->select('tb_desa_wisatas_id', 'Desa Wisata')->options(
            DesaWisata::all()->pluck('nama', 'id')
        )->required();
        $form->textarea('deskripsi', __('Deskripsi'));
        $form->text('nama', 'Nama Destinasi');
        $form->image('gambar')->move('public/uploads/');
        $form->hidden('slug');

        $form->saving(function (Form $form) {

            $namaDestinasi = $form->input('nama');
            $desaWisata = DesaWisata::find($form->tb_desa_wisatas_id);
            $namaDesa = $desaWisata ? $desaWisata->nama : '';
            $form->slug = Str::slug($namaDestinasi . ' ' . $namaDesa);
        });


        return $form;
    }
}
