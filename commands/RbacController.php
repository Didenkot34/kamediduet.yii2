<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        // добавляем разрешение "indexPost"
        $indexPost = $auth->createPermission('index');
        $indexPost->description = 'Index';
        $auth->add($indexPost);

        // добавляем разрешение "viewPost"
        $viewPost = $auth->createPermission('view');
        $viewPost->description = 'view';
        $auth->add($viewPost);

        // добавляем разрешение "createPost"
        $createPost = $auth->createPermission('create');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('update');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // добавляем роль "author" и даём роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $viewPost);
        // добавляем роль "author" и даём роли разрешение "viewPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $viewPost);


        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $indexPost);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}