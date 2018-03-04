<?php 
    function sanitizeTitle($string) {
   //php composer.phar dump-autoload
        if(!$string) return false;
        $utf8 = array(
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'd'=>'đ|Đ',
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
                );
        foreach($utf8 as $ascii=>$uni) $string = preg_replace("/($uni)/i",$ascii,$string);
        $string = utf8Url($string);
        return $string;
    }
 
    function utf8Url($string){        
        $string = strtolower($string);
        $string = str_replace( "ß", "ss", $string);
        $string = str_replace( "%", "", $string);
        $string = preg_replace("/[^_a-zA-Z0-9 -]/", "",$string);
        $string = str_replace(array('%20', ' '), '-', $string);
        $string = str_replace("----","-",$string);
        $string = str_replace("---","-",$string);
        $string = str_replace("--","-",$string);
        return $string;
    } 

    function showCategories($categories, $parent_id = 0, $stt = 0) {
        $cate_child = array();
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        if (empty(!$cate_child) ) {
            if ($stt == 0){
            foreach ($cate_child as $key => $item) {
                echo '<li><a href="'.$item['url_link'].'">'.$item['name'].'</a>';
                showCategories($categories, $item['id'], ++$stt);
                echo '</li>';
            }
        }
        else if ($stt == 1){
            echo '<ul class="dropdown">';
            foreach ($cate_child as $key => $item) {
                echo '<li><a href="'.$item['url_link'].'">'.$item['name'].'</a>';
                showCategories($categories, $item['id'], ++$stt);
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<ul class="dropdown fix-ul">';
            foreach ($cate_child as $key => $item) {
                echo '<li><a href="'.$item['url_link'].'">'.$item['name'].'</a>';
                showCategories($categories, $item['id'], ++$stt);
                echo '</li>';
            }
            echo '</ul>';
        }
        }
    }


    function showCategoriesLeft($categories, $parent_id = 0, $stt = 0) {
        $cate_child = array();
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }
        if (empty(!$cate_child) ) {
            if ($stt == 0) {
                foreach ($cate_child as $key => $item) {
                    echo '<h3 class="sidebar-title"><a href="'.$item['url_link'].'">'.$item['name'].'</a></h3>';
                    showCategoriesLeft($categories, $item['id'], ++$stt);
                }
            }
        else if ($stt == 1){
            echo '<div class="sidebar-list mtb-20"><ul>';
            foreach ($cate_child as $key => $item) {
                echo '<li><input type="checkbox"><a href="'.$item['url_link'].'">'.$item['name'].'</a>';
                showCategoriesLeft($categories, $item['id'], ++$stt);
                echo '</li>';
            }
            echo '</ul></div>';
        } else {
            echo '<div class="sidebar-list ml-20"><ul>';
            foreach ($cate_child as $key => $item) {
                echo '<li><input type="checkbox"><a href="'.$item['url_link'].'">'.$item['name'].'</a>';
                showCategoriesLeft($categories, $item['id'], ++$stt);
                echo '</li>';
            }
            echo '</ul></div>';
        }
        }
    }
 ?>