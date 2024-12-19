<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\VideosComments;

class VideosCommentsController extends Controller
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
        $videos_commentss = VideosComments::find()->all();
        return [
            'code' => 200,
            'message' => 'success',
            'data' => $videos_commentss
        ];
    }

    // 获取单个文章
    public function actionView($id)
    {
        $videos_comments = VideosComments::findOne($id);
        if ($videos_comments) {
            return [
                'code' => 200,
                'message' => 'success',
                'data' => $videos_comments
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
        $videos_comments = new VideosComments();
        // 获取原始请求数据并解析 JSON
        $data = json_decode(Yii::$app->request->getRawBody(), true);

        // 将数据加载到模型
        $videos_comments->load($data, '');
        if ($videos_comments->save()) {
            return [
                'code' => 200,
                'message' => '创建成功',
                'data' => $videos_comments
            ];
        }
        return [
            'code' => 400,
            'message' => '创建失败',
            'data' => $videos_comments->errors
        ];
    }

    // 更新文章
    public function actionUpdate($id)
    {
        $videos_comments = VideosComments::findOne($id);
        if ($videos_comments) {
            // 获取原始请求数据并解析 JSON
            $data = json_decode(Yii::$app->request->getRawBody(), true);

            // 将数据加载到模型
            $videos_comments->load($data, '');
            if ($videos_comments->save()) {
                return [
                    'code' => 200,
                    'message' => '更新成功',
                    'data' => $videos_comments
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
        $videos_comments = VideosComments::findOne($id);
        if ($videos_comments && $videos_comments->delete()) {
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
