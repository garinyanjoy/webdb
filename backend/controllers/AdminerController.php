<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Adminer;

class AdminerController extends Controller
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

    // 获取所有用户
    public function actionIndex()
    {
        $adminers = Adminer::find()->all();
        return [
            'code' => 200,
            'message' => 'success',
            'data' => $adminers
        ];
    }

    // 获取单个用户
    public function actionView($id)
    {
        $adminer = Adminer::findOne($id);
        if ($adminer) {
            return [
                'code' => 200,
                'message' => 'success',
                'data' => $adminer
            ];
        }
        return [
            'code' => 404,
            'message' => '用户不存在',
            'data' => null
        ];
    }

    // 创建用户
    public function actionCreate()
    {
        $adminer = new Adminer();
        // 获取原始请求数据并解析 JSON
        $data = json_decode(Yii::$app->request->getRawBody(), true);

        // 将数据加载到模型
        $adminer->load($data, '');
        if ($adminer->save()) {
            return [
                'code' => 200,
                'message' => '创建成功',
                'data' => $adminer
            ];
        }
        return [
            'code' => 400,
            'message' => '创建失败',
            'data' => $adminer->errors
        ];
    }

    // 更新用户
    public function actionUpdate($id)
    {
        $adminer = Adminer::findOne($id);
        if ($adminer) {
            // 获取原始请求数据并解析 JSON
            $data = json_decode(Yii::$app->request->getRawBody(), true);

            // 将数据加载到模型
            $adminer->load($data, '');
            if ($adminer->save()) {
                return [
                    'code' => 200,
                    'message' => '更新成功',
                    'data' => $adminer
                ];
            }
        }
        return [
            'code' => 400,
            'message' => '更新失败',
            'data' => null
        ];
    }

    // 删除用户
    public function actionDelete($id)
    {
        $adminer = Adminer::findOne($id);
        if ($adminer && $adminer->delete()) {
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
