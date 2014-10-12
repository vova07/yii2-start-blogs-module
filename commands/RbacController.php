<?php

namespace vova07\blogs\commands;

use Yii;
use yii\console\Controller;

/**
 * Blogs RBAC controller.
 */
class RbacController extends Controller
{
    /**
     * @inheritdoc
     */
    public $defaultAction = 'add';

    /**
     * @var array Main module permission array
     */
    public $mainPermission = [
        'name' => 'administrateBlogs',
        'description' => 'Can administrate all "Blogs" module'
    ];

    /**
     * @var array Permission
     */
    public $permissions = [
        'BViewBlogs' => [
            'description' => 'Can view backend blogs list'
        ],
        'BCreateBlogs' => [
            'description' => 'Can create backend blogs'
        ],
        'BUpdateBlogs' => [
            'description' => 'Can update backend blogs'
        ],
        'BDeleteBlogs' => [
            'description' => 'Can delete backend blogs'
        ],
        'viewBlogs' => [
            'description' => 'Can view blogs'
        ],
        'createBlogs' => [
            'description' => 'Can create blogs'
        ],
        'updateBlogs' => [
            'description' => 'Can update blogs'
        ],
        'updateOwnBlogs' => [
            'description' => 'Can update own blogs',
            'rule' => 'author'
        ],
        'deleteBlogs' => [
            'description' => 'Can delete blogs'
        ],
        'deleteOwnBlogs' => [
            'description' => 'Can delete own blogs',
            'rule' => 'author'
        ]
    ];

    /**
     * Add comments RBAC.
     */
    public function actionAdd()
    {
        $auth = Yii::$app->authManager;
        $superadmin = $auth->getRole('superadmin');
        $mainPermission = $auth->createPermission($this->mainPermission['name']);
        if (isset($this->mainPermission['description'])) {
            $mainPermission->description = $this->mainPermission['description'];
        }
        if (isset($this->mainPermission['rule'])) {
            $mainPermission->ruleName = $this->mainPermission['rule'];
        }
        $auth->add($mainPermission);

        foreach ($this->permissions as $name => $option) {
            $permission = $auth->createPermission($name);
            if (isset($option['description'])) {
                $permission->description = $option['description'];
            }
            if (isset($option['rule'])) {
                $permission->ruleName = $option['rule'];
            }
            $auth->add($permission);
            $auth->addChild($mainPermission, $permission);
        }

        $auth->addChild($superadmin, $mainPermission);

        $updateBlogs = $auth->getPermission('updateBlogs');
        $updateOwnBlogs = $auth->getPermission('updateOwnBlogs');
        $deleteBlogs = $auth->getPermission('deleteBlogs');
        $deleteOwnBlogs = $auth->getPermission('deleteOwnBlogs');

        $auth->addChild($updateBlogs, $updateOwnBlogs);
        $auth->addChild($deleteBlogs, $deleteOwnBlogs);

        return static::EXIT_CODE_NORMAL;
    }

    /**
     * Remove comments RBAC.
     */
    public function actionRemove()
    {
        $auth = Yii::$app->authManager;
        $permissions = array_keys($this->permissions);

        foreach ($permissions as $name => $option) {
            $permission = $auth->getPermission($name);
            $auth->remove($permission);
        }

        $mainPermission = $auth->getPermission($this->mainPermission['name']);
        $auth->remove($mainPermission);

        return static::EXIT_CODE_NORMAL;
    }
}
