<?php 
namespace frontend\controllers;
//rest api develoment in progress

use Yii;
use app\models\Student;
use yii\rest\ActiveController; //restfull api 
use yii\web\NotFoundHttpException;
class RestApiController extends ActiveController
{
    public $modelClass = 'app\models\Student'; //model class
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']); //unset the index action
        return $actions;
    }
    protected function findModel($user_id)
    {
        if (($model = Student::findOne($user_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdate($user_id)
    {
        $model = $this->findModel($user_id);
    
        $data = Yii::$app->getRequest()->getBodyParams();
    
        $logFile = __DIR__ . '/update_action.log';
        $fileTarget = new \yii\log\FileTarget();
        $fileTarget->logFile = $logFile;
        Yii::$app->log->targets['file'] = $fileTarget;
    
        Yii::info('UPDATE_ACTION - Data before load: ' . print_r($data, true)); // Log data before load
    
        if (!$model->load($data, '')) {
            return ['success' => false, 'message' => 'Data not loaded'];
        }
    
        Yii::info('UPDATE_ACTION - Model after load: ' . print_r($model->attributes, true)); // Log model after load
    
        $saveResult = $model->save();
    
        Yii::info('UPDATE_ACTION - Save result: ' . ($saveResult ? 'true' : 'false')); // Log save result
    
        if (!$saveResult) {
            Yii::info('UPDATE_ACTION - Save errors: ' . print_r($model->getErrors(), true)); // Log save errors
            return ['success' => false, 'message' => 'Save failed', 'errors' => $model->getErrors()];
        }
    
        return ['success' => true, 'model' => $model];
    }

}

?>
