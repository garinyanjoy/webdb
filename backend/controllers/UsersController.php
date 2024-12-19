<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Users;

class UsersController extends Controller
{
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                ],
            ],
        ];
    }

    // 获取所有文章
    public function actionIndex()
    {
        $userss = Users::find()->all();
        return [
            'code' => 200,
            'message' => 'success',
            'data' => $userss
        ];
    }

    // 获取单个文章
    public function actionView($id)
    {
        $users = Users::findOne($id);
        if ($users) {
            return [
                'code' => 200,
                'message' => 'success',
                'data' => $users
            ];
        }
        return [
            'code' => 404,
            'message' => '文章不存在',
            'data' => null
        ];
    }

    // 创建文章
    public function actionCreate()
    {
        $users = new Users();
        // 获取原始请求数据并解析 JSON
        $data = json_decode(Yii::$app->request->getRawBody(), true);

        // 将数据加载到模型
        $users->load($data, '');
        if ($users->save()) {
            return [
                'code' => 200,
                'message' => '创建成功',
                'data' => $users
            ];
        }
        return [
            'code' => 400,
            'message' => '创建失败',
            'data' => $users->errors
        ];
    }

    // 更新文章
    public function actionUpdate($id)
    {
        $users = Users::findOne($id);
        if ($users) {
            // 获取原始请求数据并解析 JSON
            $data = json_decode(Yii::$app->request->getRawBody(), true);

            // 将数据加载到模型
            $users->load($data, '');
            if ($users->save()) {
                return [
                    'code' => 200,
                    'message' => '更新成功',
                    'data' => $users
                ];
            }
        }
        return [
            'code' => 400,
            'message' => '更新失败',
            'data' => null
        ];
    }

    // 删除文章
    public function actionDelete($id)
    {
        $users = Users::findOne($id);
        if ($users && $users->delete()) {
            return [
                'code' => 200,
                'message' => '删除成功',
                'data' => null
            ];
        }
        return [
            'code' => 400,
            'message' => '删除失败',
            'data' => null
        ];
    }
}
