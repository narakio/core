<?php namespace App\Models\Media;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{

    protected $table = 'media_types';
    public $timestamps = false;
    protected $primaryKey = 'media_type_id';
    protected $fillable = ['media_title', 'media_description', 'media_uuid', 'media_in_use'];

    /**
     * @link https://laravel.com/docs/5.6/eloquent#query-scopes
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeMediaDigital(Builder $builder)
    {
        return MediaEntity::scopeMediaDigital($builder);
    }

    public function getFilename()
    {
        return sprintf('%s.%s', $this->getAttribute('media_uuid'), $this->getAttribute('media_extension'));
    }

}