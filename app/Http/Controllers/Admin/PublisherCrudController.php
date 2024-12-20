<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PublisherRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PublisherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PublisherCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Publisher::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/publisher');
        CRUD::setEntityNameStrings('publisher', 'publishers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PublisherRequest::class);
        //CRUD::setFromDb(); // set fields from db columns.// trae por defecto lo de la base de datos
 
         // Campo de nombre
         CRUD::field('name')->label('Name')->type('text');
 
         // Campo de país como select
         CRUD::field('country_id')->label('Country')->type('select')
             ->entity('country') // relación en el modelo
             ->model(\App\Models\Country::class) // modelo de destino
             ->attribute('name'); // columna que queremos mostrar en el dropdown
 
         // También puedes añadir otros campos si es necesario, en lugar de usar `CRUD::setFromDb()`
 
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
