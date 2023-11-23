<?php 
namespace frontend\controllers;
//rest api develoment in progress
use Yii;
use app\models\Student;
use yii\rest\ActiveController; //restfull api 
use yii\web\NotFoundHttpException;
class RestApiController extends ActiveController
{
    //securing my api with user authentication
    public function behaviors(){
        $behaviors = parent::behaviors(); //get parent behavior
        $behaviors['authenticator'] = [ //add authenticator
            'class'=>\yii\filters\auth\HttpBasicAuth::class, //use basic auth
            'auth'=>function($username,$password){ //callback function to authenticate user
                $user = Student::findByUsername($username); //find user by username
                if($user && $user->validatePassword($password)){ //validate password
                    return $user; //return user
                }
                return null; //return null if user not found
            },
        ];
        return $behaviors;
    }
    public $modelClass = 'app\models\Student'; //model class
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'],
            $actions['create'], $actions['update'],
            $actions['delete']);
        return $actions;
    }
    //customize action, find model by user_id
    protected function findModel($user_id)
    {
        if (($model = Student::findOne($user_id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //prevent update data, if username and password not match
    protected function findIdentity($username){
        if(($model=Student::findOne(['username'=>$username])) !==null){
            return $model;
        }
        throw new NotFoundHttpException("User with username $username does not exist.");
    }

    //action index to display all records
    public function actionIndex(){
        //limit the fields to be displayed, hide username and password
        $model = Student::find()->select(['user_id','nik','email','no_HP'])->all();
        return $model;
    }
    //action view to display single record
    public function actionView($user_id){
        //limit the fields to be displayed, hide username and password
        $model = Student::find()->select(['user_id','nik','email','no_HP'])
                ->where(['user_id'=>$user_id])->one();
        return $model;
    }
    //action create to create new record
    public function actionCreate(){
        $model = new Student(); //create new object
        $data  = Yii::$app->getRequest()->getBodyParams(); //get request data
        $model->attributes = $data; //assign values
        if($model->save()){
            return ['success'=>true,'message'=>'Record saved successfully'];
        }
        else
            return ['success'=>false,'message'=>'Record not saved successfully'];
    }
    //action update to update existing record
    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->user->identity->user_id);
        if($model->load(Yii::$app->getRequest()->getBodyParams(),'')
            && $model->save()){
            return $model;
        }
        Yii::$app->response->statusCode = 422;
        return [
            'message'=>$model->getErrors(),
        ];
    }
    /*public function actionUpdate($user_id)
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
    }*/

}

?>
