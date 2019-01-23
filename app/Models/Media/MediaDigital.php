<?php namespace App\Models\Media;

use App\Traits\Models\DoesSqlStuff;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MediaDigital extends Model
{
    use DoesSqlStuff;

    protected $table = 'media_digital';
    protected $primaryKey = 'media_digital_id';
    protected $fillable = ['media_type_id', 'media_filename', 'media_extension', 'media_alt'];
    protected $hidden = ['media_digital_id','media_type_id'];

    /**
     * @link https://laravel.com/docs/5.6/eloquent#query-scopes
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeMediaType(Builder $builder)
    {
        return $this->joinReverse($builder,MediaType::class);
    }

}