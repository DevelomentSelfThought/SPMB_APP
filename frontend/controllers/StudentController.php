<?php
namespace frontend\controllers; //should be put at the top of the file
use Yii; // Yii is a class that represents the Yii framework
use yii\web\Controller;
use app\models\Country;
use app\models\EntryForm; // EntryForm is a class that represents a form
use app\models\CountryForm;
use app\models\Student;
use app\models\StudentDataDiriForm;
use app\models\StudentDataOForm;
use app\models\StudentDataOrangTuaForm;
use app\models\StudentExtraForm;
use app\models\StudentLoginForm;
use app\models\StudentRegisterForm;
use app\models\StudentResetForm;
use app\models\StudentTokenForm;
use app\models\StudentAkademikForm;
use app\models\StudentTokenActivate;
use app\models\StudentBahasaForm;
use app\models\StudentPrestasiForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

//use app\controllers\AccessControl;

use yii\data\Pagination; // Pagination is a class that represents pagination

class StudentController extends Controller // StudentController extends the Controller class
{

    public function behaviors() //behavior test for logout and profile update, add other behaviors here
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                //only registered users can access the following actions : student-data-diri, student-data-o-tua, student-extra
                'only' => ['register-student','student-data-diri', 'student-data-o-tua', 'student-extra',
                    'student-akademik', 'student-bahasa', 'student-prestasi', 'student-informasi','student-biaya'],
                'rules' => [
                    [
                        'actions' => ['student-data-diri', 'student-data-o-tua', 'student-extra',
                            'student-akademik', 'student-bahasa', 'student-prestasi', 'student-informasi','student-biaya'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [  //only guests can access the following actions : register-student
                        'actions'=>['register-student'],
                        'allow'=>true,
                        'roles' =>['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class'=>VerbFilter::class,
                'actions'=> [
                    'logout'=>['post']
                ],
            ],
        ];
    }
    //redirect to the login page if the user is not already logged in
   public function beforeAction($action)
    {
        if (in_array($action->id, ['student-data-diri', 'student-data-o-tua', 'student-extra',
            'student-akademik', 'student-bahasa', 'student-prestasi', 'student-informasi', 'student-biaya'])) {
            if (Yii::$app->user->isGuest) {
                return $this->redirect(['student/login']);
            }
        }
        return parent::beforeAction($action);
    }

    public function actionIndex(): string { // actionIndex() is the default action in a controller
        return $this->render('index');
    }
    //action for login
    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest){ //if the user is not a guest
            Yii::$app->user->logout();
            return $this->goHome(); //go to the home page
        }
        $model_student  = new StudentLoginForm(); //create an instance of the StudentLoginForm class
        if($model_student->load(Yii::$app->request->post()) && $model_student->login()){
            //if the form is submitted and the login is successful
            //redirect to student-data-diri
            return $this->redirect(['student/student-data-diri']);
            //return $this->redirect('student/student-data-diri') //render the login success page
        }
        $model_student->password = ''; //clear the password
        return $this->render('login', ['model_student' => $model_student]); //render the login page
    }
    //action for logout
    public function actionLogout()
    {
        Yii::$app->user->logout(); //logout the user
        return $this->goHome(); //go to the previous page, customize this to go to the home page
    }
    //action for reset password
    public function actionResetPassword()
    {
        $model_student_reset  = new StudentResetForm(); //create an instance of the StudentLoginForm class
        if($model_student_reset->load(Yii::$app->request->post()) && 
            $model_student_reset->resetPassword()){
            //if the form is submitted and the password is reset
            Yii::$app->session->setFlash('success', 'Password berhasil direset. Silakan login untuk melanjutkan.');
            return $this->redirect(['student/login']);
        }
        //$model_student_reset->password = ''; //clear the password
        return $this->render('reset-password', ['model_student_reset' => $model_student_reset]); //render the reset password page
    }
    //action for register student
    public function actionRegisterStudent(){ //action for handling registration form
        $model_student_register = new StudentRegisterForm(); //create an instance of the StudentRegisterForm class
        if($model_student_register->load(Yii::$app->request->post()) && $model_student_register->registerStudent()){
            //if the form is submitted and the registration is successful
            return $this->redirect(['student/student-token-activate']); //go to the next page, customize this to go to the home page
        }
        return $this->render('register-student',['model_student_register'=>$model_student_register]); //render the registration page

    }
    //action for token student form (for student to input the access token)
    public function actionTokenStudent() {
        $model_student_token = new StudentTokenForm(); //create an instance of the StudentTokenForm class
        //if the form is submitted and the access token is valid
        if($model_student_token->load(Yii::$app->request->post()) && $model_student_token->validateAccessToken()){
            return $this->goBack(); //go to the previous page, customize this to go to the home page
        }
        return $this->render('token-student',['model_student_token'=>$model_student_token]); //render the token student page
    }
    //action for insert data diri
    public function actionStudentDataDiri() { //action for personal information form
        //action for personal information form

        /*$model_student_data_diri = new StudentDataDiriForm(); //create an instance of the StudentDataDiriForm class
        if($model_student_data_diri->load(Yii::$app->request->post())
            && $model_student_data_diri->insertDataDiri()){
            return $this->redirect(['student/student-data-o-tua']); //go to the next page, customize this to go to the home page
        }
        return $this->render('student-data-diri',
            ['model_student_data_diri'=>$model_student_data_diri]); //render the personal information page(data diri)
        */
        $model_student_data_diri = StudentDataDiriForm::findDataDiri(); //create an instance of the StudentDataDiriForm class
        if($model_student_data_diri === null){
            $model_student_data_diri = new StudentDataDiriForm();
        }
        if($model_student_data_diri->load(Yii::$app->request->post())
            && $model_student_data_diri->insertDataDiri()){
            return $this->redirect(['student/student-data-o-tua']); //go to the next page, customize this to go to the home page
        }
        return $this->render('student-data-diri',
            ['model_student_data_diri'=>$model_student_data_diri]); //render the personal information page(data diri)
    }
    //action for insert data orang tua
    public function actionStudentDataOTua() {
        /*$model_student_data_o = new StudentDataOForm(); //create an instance of the StudentDataOForm class
        if($model_student_data_o->load(Yii::$app->request->post())
            && $model_student_data_o->insertDataOTua()){
            return $this->redirect(['student/student-akademik']);        
        }*/
        $model_student_data_o = StudentDataOForm::findDataOTua(); //create an instance of the StudentDataDiriForm class
        if($model_student_data_o === null){
            $model_student_data_o = new StudentDataOForm();
        }
        if($model_student_data_o->load(Yii::$app->request->post())
            && $model_student_data_o->insertDataOTua()){
            return $this->redirect(['student/student-akademik']);        
        }
        return $this->render('student-data-o-tua',
            ['model_student_data_o'=>$model_student_data_o]); //render the parent information page(data orang tua)
    }
    //action for insert extra activity
    public function actionStudentExtra(){
        $model_student_extra = new StudentExtraForm(); //create an instance of the StudentExtraForm class
        if($model_student_extra->load(Yii::$app->request->post())
            && $model_student_extra->insertStudentExtra()){
            return $this->redirect(['student/student-prestasi']);
        }
        return $this->render('student-extra',
            ['model_student_extra'=>$model_student_extra]); //render the extra activity page
    }
    //action for insert data akademik
public function actionStudentAkademik(){
    $model_student_akademik = new StudentAkademikForm(); //create an instance of the StudentAkademikForm class
    if($model_student_akademik->load(Yii::$app->request->post())){
        $model_student_akademik->file = UploadedFile::getInstance($model_student_akademik, 'file');
        if($model_student_akademik->file){
            // Validate the uploaded file before moving it
            if($model_student_akademik->validate()){
                $uploadFolder ='uploads/';
                if(!file_exists($uploadFolder)){ //not exist, make a new directory
                    mkdir($uploadFolder, 0777, true);
                }
                $fileBaseName = $model_student_akademik->file->baseName.'_'.Yii::$app->user->identity->username.'_'.date('Y-m-d');
                $filePath = $uploadFolder . $fileBaseName . '.' . $model_student_akademik->file->extension;
                $model_student_akademik->file->saveAs($filePath);
                $model_student_akademik->file_sertifikat = $filePath; //save the path to the database

                //trying to insert data akademik to database
                if($model_student_akademik->insertStudentAkademik()){
                    return $this->redirect(['student/student-bahasa']);    
                }
                else{ //error message
                    Yii::$app->session->setFlash('error', "Data Akademik gagal disimpan");
                }
            }
        }
    }
    return $this->render('student-akademik',
        ['model_student_akademik'=>$model_student_akademik]); //render the akademik page
}
//action for autocomplete for school name
public static function actionAutocomplete($term) {
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $results = (new \yii\db\Query())
        ->select('sekolah')
        ->from('t_r_sekolah_dapodik')
        ->where(['like', 'sekolah', $term])
        ->all();
    return array_column($results, 'sekolah');
}
//action for token activate, this is already cleaned up
public function actionStudentTokenActivate(){
    $model = new StudentTokenActivate(); //create an instance of the StudentTokenActivateForm class
    if($model->load(Yii::$app->request->post()) && $model->activate()){
        return $this->redirect(['student/login']); //go to the login page
    }
    return $this->render('student-token-activate', ['model' => $model]); //render the token activate page
}
//action for data bahasa, this is already cleaned up
public function actionStudentBahasa(){
    $model = new StudentBahasaForm(); //create an instance of the StudentBahasaForm class
    if($model->load(Yii::$app->request->post())&& $model->insertBahasaData()){
        return $this->redirect(['student/student-extra']);
    }
    return $this->render('student-bahasa',['model'=>$model]); //render the bahasa page
}
//action for data prestasi, to do more clean up on this action
public function actionStudentPrestasi(){
    $model  = new StudentPrestasiForm();
    if($model->load(Yii::$app->request->post()) && $model->insertPrestasiData()){
        return $this->redirect(['student/student-informasi']);
    }
    return $this->render('student-prestasi',['model'=>$model]);
}
//action for store information, to do more clean up on this action
public function actionStudentInformasi(){
    $model = new \app\models\StudentInformasiForm();
    //set flash message if the data is successfully inserted to database
    if($model->load(Yii::$app->request->post()) && $model->insertInformasiData()){
        return $this->redirect(['student/student-biaya']);
    }
    return $this->render('student-informasi',['model'=>$model]);
}
//action for store biaya, to do more clean up on this action
public function actionStudentBiaya(){
    $model = new \app\models\StudentBiayaForm();
    //set flash message if the data is successfully inserted to database
    if($model->load(Yii::$app->request->post())){
        //set flash message ok if the voucher is valid
        if($model->validateVoucher()){
            Yii::$app->session->setFlash('ok', "Voucher berhasil digunakan, silahkan melakukan pembayaran");
        }
    }
    return $this->render('student-biaya',['model'=>$model]);
}
//action for pengunguman, to do more clean up on this action
public function actionStudentPengumuman(){
    $model = new \app\models\StudentPengumumanForm();
    //set flash message if the data is successfully inserted to database
    if($model->load(Yii::$app->request->post()) && $model->insertPengumumanData()){
        return $this->redirect(['student/student-biaya']); //to do: change this to pengumuman page
    }
    return $this->render('student-pengumuman',['model'=>$model]);
}
}
?>