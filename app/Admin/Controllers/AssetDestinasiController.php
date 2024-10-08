<?php

namespace App\Admin\Controllers;

use App\Models\AssetDestinasi;
use App\Models\DestinasiWisata;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AssetDestinasiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AssetDestinasi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AssetDestinasi());

        $grid->column('id', __('Id'));
        $grid->column('destinasiWisata.nama', 'Destinasi');
        $grid->column('gambar', __('Gambar'))->image();
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
        $show = new Show(AssetDestinasi::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('destinasi_wisata_id', __('Destinasi wisata id'));
        $show->field('gambar', __('Gambar'));
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
        $form = new Form(new AssetDestinasi());

        $form->select('destinasi_wisata_id', 'Destinasi Wisata')->options(
            DestinasiWisata::all()->pluck('nama', 'id')
        )->required();

        $form->image('gambar')->move('public/uploads/');

        return $form;
    }
}
