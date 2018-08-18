<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Image extends Model
{
    
     public function category()
    {
        return $this->belongsToMany('App\Category');
    }
    
       public function add($image, $description)
    {
        $fileName = $image->store('uploads');
        $this->image = $fileName;
        $this->description = $description;

    }
    
    public function addRelation($categories, $id)
    {
        
        $collection = collect($categories);
        
        $collection->each(function ($item, $key) { 
            
            //сюда почему-то не передаётся аргумент  $id
              DB::table('category_image')->insert(
                 [
                 'image_id' => $id,
                 'category_id' => $item
                 ]
              );   
         }); 
    }
    
        
    public function updateImage($image, $imgOld)
    {
        //если пользователь загрузил новую картинку, то заменить её
        //если нет, то оставить старую
         if($image) {
            Storage::delete($imgOld->image);
            $fileName = $image->store('uploads');
            
            $this->image = $fileName;

         }
                       
    }
    
    public function deleteImage($image)
    {  
      Storage::delete($image->image);
      $this->destroy($image->id);
      
      DB::table('category_image')->where('image_id', $image->id)->delete();
    }
}
