<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory , Searchable;

    protected $fillable = ['name','description','price', 'category_id'];
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */

    public function toSearchableArray(){
        $category = $this->category;
        $array =[
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=>$this->description,
            "category"=>$category
        ];
        return $array;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value){
        $this->is_accepted=$value;
        $this->save();
        return true;
    }

    static public function toBeRevisionedcount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
