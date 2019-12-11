<?php
namespace app\controllers\moduleAdminPanel\contentPanel;

use devskyfly\php56\types\Vrbl;
use devskyfly\yiiModuleAdminPanel\controllers\contentPanel\AbstractFileTransferController;
use Yii;
use app\models\moduleAdminPanel\contentPanel\entityWithSection\EntityFileExtension;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;

class FileTransferController extends AbstractFileTransferController
{

    public function fileClass()
    {
        return EntityFileExtension::class;
    }

    public function actionIndex()
    {
        $file=EntityFileExtension::find()->where(['id'=>1])->one();
        if(Vrbl::isNull($file))throw new BadRequestHttpException('There is no such entity with id=\'1\'');
        $response=Yii::$app->response;
        return $this->sendFileByGuid($file->guid, $response);
    }
}