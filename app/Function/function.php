<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 20/10/16
 * Time: 16:24
 */
function showCategories($categories, $parent_id = 0, $stt = 0)
{
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->menu_parent_id == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }

    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        if ($stt == 0){
            // là cấp 1
            echo '<ul>';
        }
        else if ($stt == 1){
            echo '<ul class="dropdown-1">';
            // là cấp 2
        }
        else if ($stt == 2){
            echo '<ul class="dropdown-2">';
            // là cấp 3
        }
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>'.$item['menu_title'];
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['menu_id'], $stt++);
            echo '</li>';
        }
        echo '</ul>';
    }
}