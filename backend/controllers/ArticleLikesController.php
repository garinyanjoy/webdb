<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\ArticleLikes;

class ArticleLikesController extends Controller
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
        $article_likess = ArticleLikes::find()->all();
        return [
            'code' => 200,
            'message' => 'success',
            'data' => $article_likess
        ];
    }

    // 获取单个文章
    public function actionView($id)
    {
        $article_likes = ArticleLikes::findOne($id);
        if ($article_likes) {
            return [
                'code' => 200,
                'message' => 'success',
                'data' => $article_likes
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
        $article_likes = new ArticleLikes();
        // 获取原始请求数据并解析 JSON
        $data = json_decode(Yii::$app->request->getRawBody(), true);

        // 将数据加载到模型
        $article_likes->load($data, '');
        if ($article_likes->save()) {
            return [
                'code' => 200,
                'message' => '创建成功',
                'data' => $article_likes
            ];
        }
        return [
            'code' => 400,
            'message' => '创建失败',
            'data' => $article_likes->errors
        ];
    }

    // 更新文章
    public function actionUpdate($id)
    {
        $article_likes = ArticleLikes::findOne($id);
        if ($article_likes) {
            // 获取原始请求数据并解析 JSON
            $data = json_decode(Yii::$app->request->getRawBody(), true);

            // 将数据加载到模型
            $article_likes->load($data, '');
            if ($article_likes->save()) {
                return [
                    'code' => 200,
                    'message' => '更新成功',
                    'data' => $article_likes
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
        $article_likes = ArticleLikes::findOne($id);
        if ($article_likes && $article_likes->delete()) {
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
