<?php
//
//namespace app\controllers;
//
//use yii\rest\ActiveController;
//use yii\filters\Cors;
//
//class VideoController extends ActiveController
//{
//    public $modelClass = 'app\models\Video';
//
//    public function behaviors()
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['corsFilter'] = [
//            'class' => Cors::class,
//        ];
//        return $behaviors;
//    }
//}
//


namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Video;

class VideoController extends Controller
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
        $videos = Video::find()->all();
        return [
            'code' => 200,
            'message' => 'success',
            'data' => $videos
        ];
    }

    // 获取单本图书
    public function actionView($id)
    {
        $video = Video::findOne($id);
        if ($video) {
            return [
                'code' => 200,
                'message' => 'success',
                'data' => $video
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
        $video = new Video();
        $video->load(Yii::$app->request->post(), '');

        if ($video->save()) {
            return [
                'code' => 200,
                'message' => '创建成功',
                'data' => $video
            ];
        }
        return [
            'code' => 400,
            'message' => '创建失败',
            'data' => $video->errors
        ];
    }

    // 更新图书
    public function actionUpdate($id)
    {
        $video = Video::findOne($id);
        if ($video) {
            $video->load(Yii::$app->request->post(), '');
            if ($video->save()) {
                return [
                    'code' => 200,
                    'message' => '更新成功',
                    'data' => $video
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
        $video = Video::findOne($id);
        if ($video && $video->delete()) {
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


