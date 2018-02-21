<?php namespace App\Providers\Models;

use App\Contracts\Models\Person as PersonInterface;
/**
 * @method \App\Models\Person createModel(array $attributes = [])
 * @method \App\Models\Person getOne($id, $columns = ['*'])
 */
class Person extends Model implements PersonInterface
{
    protected $model = \App\Models\Person::class;

}