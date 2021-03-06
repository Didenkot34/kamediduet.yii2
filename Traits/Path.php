<?php

namespace app\Traits;

trait Path
{
    public function getPostPath($idCategory, $idPost)
    {
        return 'images/event/category' . $idCategory . '/post' . $idPost;
    }

    public function getCategoryPath($idCategory)
    {
        return 'images/cat' . $idCategory ;
    }

    public function removeDirectory($dir)
    {

        if ($dir && $objs = glob($dir . "/*")) {
            foreach ($objs as $obj) {
                is_dir($obj) ? $this->removeDirectory($obj) : unlink($obj);
            }
        }
        rmdir($dir);
    }

    public function pre($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}