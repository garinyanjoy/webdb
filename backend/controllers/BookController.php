<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Book;

class BookController extends Controller
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

    // 获取所有图书
    public function actionIndex()
    {
        $books = Book::find()->all();
        return [
            'code' => 200,
            'message' => 'success',
            'data' => $books
        ];
    }

    // 获取单本图书
    public function actionView($id)
    {
        $book = Book::findOne($id);
        if ($book) {
            return [
                'code' => 200,
                'message' => 'success',
                'data' => $book
            ];
        }
        return [
            'code' => 404,
            'message' => '图书不存在',
            'data' => null
        ];
    }

    // 创建图书
    public function actionCreate()
    {
        $book = new Book();
        // 获取原始请求数据并解析 JSON
        $data = json_decode(Yii::$app->request->getRawBody(), true);

        // 将数据加载到模型
        $book->load($data, '');
        if ($book->save()) {
            return [
                'code' => 200,
                'message' => '创建成功',
                'data' => $book
            ];
        }
        return [
            'code' => 400,
            'message' => '创建失败',
            'data' => $book->errors
        ];
    }

    // 更新图书
    public function actionUpdate($id)
    {
        $book = Book::findOne($id);
        if ($book) {
            // 获取原始请求数据并解析 JSON
            $data = json_decode(Yii::$app->request->getRawBody(), true);

            // 将数据加载到模型
            $book->load($data, '');
            if ($book->save()) {
                return [
                    'code' => 200,
                    'message' => '更新成功',
                    'data' => $book
                ];
            }
        }
        return [
            'code' => 400,
            'message' => '更新失败',
            'data' => null
        ];
    }

    // 删除图书
    public function actionDelete($id)
    {
        $book = Book::findOne($id);
        if ($book && $book->delete()) {
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
