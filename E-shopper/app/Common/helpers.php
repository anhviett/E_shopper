<?php
use App\Components\CategoriesRecursive;
use App\NewsCategories;


function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

function getCategory($parent_id): string
{
$data = NewsCategories::all();
$recursive = new CategoriesRecursive($data);
return $recursive->categoriesRecursive($parent_id);
}

function getProductCategory($parent_id): string
{
    $data = \App\Models\ProductCategory::all();
    $recursive = new CategoriesRecursive($data);
    return $recursive->categoriesRecursive($parent_id);
}

function getPostCategory($parent_id): string
{
    $data = \App\Models\PostCategory::all();
    $recursive = new CategoriesRecursive($data);
    return $recursive->categoriesRecursive($parent_id);
}

function saveFile($file, $path)
{
    $base_path = public_path() . '/uploads/';
    $dir_name = $base_path . $path;
    if (!is_dir($dir_name)) {
        // Tạo thư mục của chúng tôi nếu nó không tồn tại
        mkdir($dir_name, 0755, true);
    }
    $file_name = $file->getClientOriginalName();
    $name = explode('.', $file_name);
    $file_name_insert = str_replace(end($name), '', $file_name) . end($name);
    $file->move(base_path() . '/public/uploads/' . $path, $file_name_insert);
    return $path . '/' . $file_name_insert;
}
