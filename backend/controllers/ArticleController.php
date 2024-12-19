<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Article;

class ArticleController extends Controller
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
        $articles = Article::find()->all();
        return [
            'code' => 200,
            'message' => 'success',
            'data' => $articles
        ];
    }

    // 获取单个文章
    public function actionView($id)
    {
        $article = Article::findOne($id);
        if ($article) {
            return [
                'code' => 200,
                'message' => 'success',
                'data' => $article
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
        $article = new Article();
        // 获取原始请求数据并解析 JSON
        $data = json_decode(Yii::$app->request->getRawBody(), true);

        // 将数据加载到模型
        $article->load($data, '');
        if ($article->save()) {
            return [
                'code' => 200,
                'message' => '创建成功',
                'data' => $article
            ];
        }
        return [
            'code' => 400,
            'message' => '创建失败',
            'data' => $article->errors
        ];
    }

    // 更新文章
    public function actionUpdate($id)
    {
        $article = Article::findOne($id);
        if ($article) {
            // 获取原始请求数据并解析 JSON
            $data = json_decode(Yii::$app->request->getRawBody(), true);

            // 将数据加载到模型
            $article->load($data, '');
            if ($article->save()) {
                return [
                    'code' => 200,
                    'message' => '更新成功',
                    'data' => $article
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
        $article = Article::findOne($id);
        if ($article && $article->delete()) {
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
