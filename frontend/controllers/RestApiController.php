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
    public function actionIndex()
    {
        try {
            //limit the fields to be displayed, hide username and password
            $model = Student::find()->select(['user_id','nik','email','no_HP'])->all();
            return $model;
        } catch (\Exception $e) {
            Yii::error('Exception when retrieving students: ' . $e->getMessage());
            return ['success' => false, 'message' => 'An error occurred when retrieving the students'];
        }
    }
    //action view to display single record
    public function actionView($user_id){
        //limit the fields to be displayed, hide username and password
        try {
        $model = Student::find()->select(['user_id','nik','email','no_HP'])
                ->where(['user_id'=>$user_id])->one();
        return $model;
        } catch(\Exception $e){
            Yii::error('Exception when retrieving student: ' . $e->getMessage());
            return ['success' => false, 'message' => 'An error occurred when retrieving the student'];
        }
    }
    //action create to create new record
    public function actionCreate()
    {
        $model = new Student();
        $data = Yii::$app->request->getBodyParams();
        $model->attributes = $data;
        try {
            if ($model->save()) {
                return ['success' => true, 'message' => 'Record saved successfully'];
            } else {
                return ['success' => false, 'message' => 'Record not saved successfully', 'errors' => $model->errors];
            }
        } catch (\Exception $e) {
            Yii::error('Exception when saving: ' . $e->getMessage());
            return ['success' => false, 'message' => 'An error occurred when saving'];
        }
    }
    //action update to update existing record
    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->user->identity->user_id);
        //add exception if exception occured
        try{
            if($model->load(Yii::$app->getRequest()->getBodyParams(),'')
                && $model->save()){
                return $model;
            }
        } catch(\Exception $e){
            Yii::$app->response->statusCode = 422;
            return [
                'message'=>$model->getErrors(),
            ];
        }
    }
    //action delete to delete existing record
    public function actionDelete($user_id)
    {
        try{
            $model = $this->findModel($user_id);
            $model->delete(); //delete the record
            Yii::$app->response->statusCode = 204; //set response status code
        } catch(\Exception $e){
            Yii::$app->response->statusCode = 422;
            return [
                'message'=>$model->getErrors(),
            ];
        }
    }
    
}

?>
