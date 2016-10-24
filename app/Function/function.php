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
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->menu_parent_id == $parent_id) {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }

    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child) {
        if ($stt == 0) {
            // là cấp 1
            echo '<ul>';
        } else if ($stt == 1) {
            echo '<ul class="dropdown-1">';
            // là cấp 2
        } else if ($stt == 2) {
            echo '<ul class="dropdown-2">';
            // là cấp 3
        }
        foreach ($cate_child as $key => $item) {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>' . $item['menu_title'];
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['menu_id'], $stt++);
            echo '</li>';
        }
        echo '</ul>';
    }
}

function showMenu($menu,$options, $parent_id = 0, $stt = 0)
{
    $menu_child = array();
    foreach ($menu as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->menu_parent_id == $parent_id)
        {
            $menu_child[] = $item;
            unset($menu[$key]);
        }
    }

    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($menu_child) {
        if ($stt == 0) {
            // là cấp 1
            echo '<ul>';
        } else if ($stt == 1) {
            echo '<ul class="dropdown-1">';
            // là cấp 2
        } else if ($stt == 2) {
            echo '<ul class="dropdown-2">';
            // là cấp 3
        }
        foreach ($menu_child as $key => $item) {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>';
            echo '<a href="">' . $item->menu_title . '</a>';
            echo '<div>';
            echo '<table border="0">';
            echo '<tr>';
            echo '<td>Title</td>';
            echo '<td><input id="" name="" value="' . $item->menu_title . '"/></td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Link</td>';
            echo '<td><input id="" name="" value="' . $item->menu_link . '"/></td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Parent</td>';
            echo '<td>';
            echo '<select id="menu_parent_id_'.$item->menu_id.'">';
            echo '<option>-TOP-</option>';
            foreach ($options as $option) {
                if($item->menu_id !== $option->menu_id){
                    echo '<option value="'.$option->menu_id.'">' . $option->menu_title . '</option>';
                }
            }
            echo '</select>';
            echo '<input type="button" name="" class="button" value="Lưu"/>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showMenu($menu,$options, $item['menu_id'], $stt++);
            echo '</li>';
        }
        echo '</ul>';
    }
}