<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'image', 'is_active','parent_id'];

    // Quan hệ danh mục con
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Quan hệ danh mục cha
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public $timestamps = false;
    
    protected $dates = ['deleted_at'];

    const CAT_STATUS_ENABLE  = 1;
    const CAT_STATUS_DISABLE = 0;

    public static function getCategoriesParentAndSub()
    {
        $result = array('' => '');

        $categories = Category::all();


        $result = array();

        foreach ($categories as $category) {
            if(!$category->parent_id) {
                $result[] = $category;
            }
        }

        $result = self::sortCategoriesByOrder($result);

        foreach ($result as $key => $value){
            $sub = array();

            foreach ($categories as $keyS => $valueS) {

                if($value->id == $valueS->parent_id){
                    $sub[] = $valueS;
                }

            }

            $sub = self::sortCategoriesByOrder($sub);
            $result[$key]->sub = $sub;
        }

        return $result;
    }
    public static function sortCategoriesByOrder($categories)
    {
        if (!$categories || count($categories) < 2) {
            return $categories;
        }

        usort($categories, function($a, $b) {
            return strcmp($a->name, $b->name);
        });

        return $categories;
    }
}
