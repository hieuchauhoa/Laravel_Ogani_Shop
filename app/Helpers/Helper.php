<?php

namespace App\Helpers;

class Helper{
    public static function category($categories, $parent_id = 0, $char = ''){
        $html = '';
        foreach($categories as $key => $category){
            if($category->parent_id == $parent_id){
                $html .= '
                <tr>  
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>'.$category->id .'</td>
                    <td>'.$char. $category->name .'</td>
                    <td>'.$category->active .'</td>
                    <td>'.$category->updated_at.'</td>
                    <td><a href="" class="active" ui-toggle-class=""><i class="fa fa-edit text-success text-active"></i><i class="fa fa-times text-danger text"></i></a></td>
                </tr>';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char .'--');
            }
        }
        return $html;
    }
}