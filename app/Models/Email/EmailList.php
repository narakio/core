<?php namespace App\Models\Email;

use App\Traits\Enumerable;
use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    use Enumerable;

    protected $primaryKey = 'email_list_id';
    protected $fillable = ['email_list_name', 'entity_id'];
    public $timestamps = false;

//    const BLOG_POSTS_DIGEST = 0x12c;    //300
    const NEWSLETTERS = 0x7d0;            //2000

    public static function getList()
    {
        $constants = self::getConstants();
        $list = [];
        foreach ($constants as $name => $id) {
            $list[$id] = strtolower($name);
        }
        return $list;
    }

}
