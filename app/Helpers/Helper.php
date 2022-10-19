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
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow(' . $category->id . ', \'/cate_destroy\')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char .'---');
            }
        }
        return $html;
    }

    public static function product($products): string
    {
        $html = '';
        foreach($products as $key => $product){
                $html .= '
                <tr>
                    <td>'. $product->id .'</td>
                    <td>'. $product->name .'</td>
                    <td>'. self::active($product->active) .'</td>
                    <td>'. $product->updated_at .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="product_edit/'.$product->id.'"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('.$product->id.', \'product_destroy\')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';

                unset($products[$key]);
                $html .= self::category($products);
        }
        return $html;
    }

    public static function active($active = 0) : string{
        return $active == 0 ? '<span class="btn btn-danger btn-xs">No</span>' : '<span class="btn btn-success btn-xs">Yes</span>';
    }
    public static function level($level = 1) : string{
        return $level == 1 ? '<p>Khách hàng</p>' : '<p>Quản lý</p>';
    }
}
