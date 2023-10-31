<?php
//model for student extra activity form, an idea is merge all form into one model
//since this is very short, we can put it in one file, for example : Student
namespace app\models;

use Yii;
use yii\base\Model;

class StudentExtraForm extends Model {
    //public public data member, possibly adding latter
    //member for organization
    public $nama_organisasi_1; 
    public $nama_organisasi_2;
    public $nama_organisasi_3;
    public $nama_organisasi_4;

    public $jabatan_organisasi_1;
    public $jabatan_organisasi_2;
    public $jabatan_organisasi_3;
    public $jabatan_organisasi_4;

    public $tanggal_organisasi_1;
    public $tanggal_organisasi_2;
    public $tanggal_organisasi_3;
    public $tanggal_organisasi_4;

    public $tanggal_organisasi_1_end;
    public $tanggal_organisasi_2_end;
    public $tanggal_organisasi_3_end;
    public $tanggal_organisasi_4_end;
    //member for activity, without end mean the start of the activity
    public $nama_kegiatan_1; 
    public $nama_kegiatan_2;
    public $nama_kegiatan_3; 
    public $nama_kegiatan_4;

    /**
     * Returns the current schedule status.
     * @return string the current schedule status
     */
    public static function getCurrentScheduleStatus()
    {
        // Implement your logic to get the current schedule status here
        // For example, you can retrieve the current schedule from the database
        // and check if it is open or closed
        return 'open'; // Replace this with your actual implementation
    }

    /**
     * Returns the predikat values from the database.
     * @return array the predikat values
     */
    public static function getPredikat()
    {
        $predikat = Yii::$app->db->createCommand('SELECT `id`, `desc` from t_r_predikat_kelulusan')->queryAll();
        return $predikat;
    }

    /**
     * Returns the form fields with the appropriate enable/disable settings based on the current schedule status.
     * @return array the form fields
     */
    public function getFormFields()
    {
        // Get the current schedule status
        $currentScheduleStatus = self::getCurrentScheduleStatus();

        // Get the predikat values
        $predikat = self::getPredikat();

        // Create an array of predikat values for use in the dropdown list
        $predikatList = [];
        foreach ($predikat as $row) {
            $predikatList[$row['desc']] = $row['id'];
        }

        // Create the form fields with the appropriate enable/disable settings based on the current schedule status
        $fields = [
            'nama_organisasi_1' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'nama_organisasi_2' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'nama_organisasi_3' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'nama_organisasi_4' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'jabatan_organisasi_1' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'jabatan_organisasi_2' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'jabatan_organisasi_3' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'jabatan_organisasi_4' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_1' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_2' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_3' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_4' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_1_end' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_2_end' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_3_end' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'tanggal_organisasi_4_end' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'nama_kegiatan_1' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'nama_kegiatan_2' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'nama_kegiatan_3' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'nama_kegiatan_4' => [
                'type' => 'textInput',
                'options' => [
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ],
            'predikat_kelulusan_id' => [
                'type' => 'dropDownList',
                'items' => $predikatList,
                'options' => [
                    'prompt' => 'Select Predikat',
                    'enable' => $currentScheduleStatus == 'open'
                ]
            ]
        ];

        return $fields;
    }
}

<?php
use yii\widgets\ActiveForm;

// Create an instance of the StudentExtraForm model
$model = new app\models\StudentExtraForm();

// Get the form fields with the appropriate enable/disable settings based on the current schedule status
$fields = $model->getFormFields();

// Create the ActiveForm and generate the form fields
$form = ActiveForm::begin();
foreach ($fields as $fieldName => $field) {
    echo $form->field($model, $fieldName)->{$field['type']}($field['options']);
}
ActiveForm::end();









// Get the current schedule status
$currentScheduleStatus = getCurrentScheduleStatus();

// Create the ActiveForm and disable the nama_organisasi_1 field if the current schedule is not open
$form = ActiveForm::begin();
echo $form->field($model, 'nama_organisasi_1', [
    'enable' => $currentScheduleStatus == 'open'
])->textInput();
// Add other fields here
ActiveForm::end();



public function rules()
{
    return [
        [['nama_organisasi_1'], 'required', 'when' => function ($model) {
            return $model->getCurrentScheduleStatus() == 'open';
        }, 'whenClient' => "function (attribute, value) {
            return $('#current-schedule-status').val() == 'open';
        }"],
        // Add other validation rules here
    ];
}


<?php
use yii\widgets\ActiveForm;

// Create an instance of the StudentExtraForm model
$model = new app\models\StudentExtraForm();

// Get the form fields with the appropriate enable/disable settings based on the current schedule status
$fields = $model->getFormFields();

// Create the ActiveForm and generate the form fields
$form = ActiveForm::begin();
foreach ($fields as $fieldName => $field) {
    echo $form->field($model, $fieldName, [
        'enable' => $field['options']['enable']
    ])->{$field['type']}($field['options']);
}
ActiveForm::end();