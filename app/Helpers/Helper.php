<?php

namespace App\Helpers;

class Helper{
    public static function category($categories, $parent_id = 0, $char = ''): string
    {
        $html = '';
        foreach($categories as $key => $category){
            if($category->parent_id == $parent_id){
                $html .= '
                <tr>
                    <td>'. $category->id .'</td>
                    <td>'. $char . $category->name .'</td>
                    <td>'. self::active($category->active) .'</td>
                    <td>'. $category->updated_at .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="cate_edit/'.$category->id.'"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('.$category->id.', \'cate_destroy\')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char .'---');
            }
        }
        return $html;
    }
    public static function active($active = 0) : string{
        return $active == 0 ? '<span class="btn btn-danger btn-xs">No</span>' : '<span class="btn btn-success btn-xs">Yes</span>';
    }
}
