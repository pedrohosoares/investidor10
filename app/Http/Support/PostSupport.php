<?php

namespace App\Http\Support;

class PostSupport{

    public static function filterCategoryChecked(
        object $categories,
        int $categoryID
    ) : object
    {
        return$categories->filter(function($category) use ($categoryID){
            return $category->id == $categoryID;
        });
    }

}
