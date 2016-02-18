<?php

class VisitController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/booking';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('test','index','bookingperiod','bookinghourly','availrooms'),
                'users' => array('*'),
            ),
            /*
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),*/
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Visit');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionBookingPeriod()
    {
        $cs = Yii::app()->clientScript;
        $cs->packages = array(
            'datepicker' => array(
                'basePath' => 'application.vendor.eternicode.bootstrap-datepicker',
                'baseUrl',
                'js' => array('dist/js/bootstrap-datepicker.js', 'dist/locales/bootstrap-datepicker.'
                    . substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '.min.js'),
                'css' => array('dist/css/bootstrap-datepicker.min.css'),
                'depends' => array('jquery'),
                'position' => CClientScript::POS_END,
            ),
        );
        $cs->registerPackage('datepicker');

        $model = new FormBookingPeriod();

        // uncomment the following code to enable ajax-based validation
        if(isset($_POST['ajax']) && $_POST['ajax']==='visit-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['FormBookingPeriod'])) {
            $model->attributes = $_POST['FormBookingPeriod'];
            
            if ($model->validate()) {
                
                $attr = $model->attributes; 
                $visit = new Visit();
                $client = new Client();
                $t_inc = TimeKeeper::dailyStartDatetimePrepare($attr['t_incoming']);
                $t_out = TimeKeeper::dailyFinishDatetimePrepare($attr['t_outgoing']);
                
                //Find id client if he registered else save new client attributes and return he id: 
                $bookkey = strrev(date('mdhi'));
                if (!$id = $client->findByPhone($attr['visiter_phone']))
                    $id = $client->saveBookingClient($attr['visiter_phone'],$attr['visiter_name'],$pass);
                    
                if ($visit->savingItem($attr['room_id'],$id,$t_inc,$t_out)) { 
                    //Yiimailer::mailing();
                    $this->_createBookMessage($attr,$passkey);
                    Yii::app()->user->setFlash('booked_success','
                    <h4>Thank you for contacting us. We waiting your with pleasure!</h4> 
                    <pre>
                    
                    OFFICIAL NOTICE:
                    ================
                    
                    Dear, '. ucfirst(strtolower($attr['visiter_name'])).'!
                    
                    Reserved room #'.$attr['room_id'].' at '.Yii::app()->params['CompanyName'].' wait for your visit.
                    You mast register after  : '.$attr['t_incoming'].' '.Yii::app()->params['RegistrationTime'].' PM
                    and use this room before : '.$attr['t_outgoing'].' '.Yii::app()->params['DepartureTime'].' AM
                    
                    You may visit our site and edit your visit by entering your ticket code: '.$bookkey.'
                    or call to '.Yii::app()->params['CompanyName'].': '.Yii::app()->params['CompanyPhone'].' 
                    
                    Good luck!                                 '.date('Y-m-d H:i:s').'
                    </pre>');
                } 
                $this->refresh();
                Yii::app()->end();
            }
        }

        $this->render('form_period',array(
            'model'=>$model,
        ));
    }

    public function actionBookingHourly()
    {
        $cs = Yii::app()->clientScript;
        $cs->packages = array(
            'datetimepicker' => array(
                'basePath' => 'application.vendor.smalot.bootstrap-datetimepicker',
                'baseUrl',
                'js' => array(
                    'js/bootstrap-datetimepicker.min.js',
                    'js/locales/bootstrap-datetimepicker.'
                    . substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '.js'
                ),
                'css' => array('css/bootstrap-datetimepicker.min.css'),
                'depends' => array('jquery'),
                'position' => CClientScript::POS_END,
            ),
        );
        $cs->registerPackage('datetimepicker');

        //$model = new Visit('booking_hourly');
        $model = new FormBookingHourly();

        // uncomment the following code to enable ajax-based validation
          if(isset($_POST['ajax']) && $_POST['ajax']==='visit-form') {
              echo CActiveForm::validate($model);
              Yii::app()->end();
          }

          if (isset($_POST['FormBookingHourly'])) {
                $model->attributes = $_POST['FormBookingHourly'];

                if ($attr = $model->validate()) {

                    $visit = new Visit();
                    $client = new Client();
                    $t_inc = TimeKeeper::dailyStartDatetimePrepare($attr['t_incoming']);
                    $t_out = TimeKeeper::dailyFinishDatetimePrepare($attr['t_outgoing']);
                    $bookkey = strrev(date('mdhi'));
                    if (!$id = $client->findByPhone($attr['visiter_phone']))
                        $id = $client->saveBookingClient($attr['visiter_phone'],$attr['visiter_name'],$bookkey);
                    
                    if ($visit->savingItem($attr['room_id'],$attr['visiter_phone'],$t_inc,$t_out)) {
                    //Yiimailer::mailing();
                    Yii::app()->user->setFlash('booked_success','Thank you for contacting us. We will respond to '.$bookkey); 
                    $this->refresh();
                    Yii::app()->end();      
                    }          
                }
            }
         
        $this->render('form_hourly',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
            $model=User::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Visit $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'visit-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Perform load data for dropdownlist available rooms for requirement datarange
     */
    public function actionAvailrooms()
    {
        // Получаем и подготавливаем принятые данные:
        if (isset($_POST['FormBookingPeriod'])) {
            $period=$_POST['FormBookingPeriod'];
            $arrival_datetime = TimeKeeper::dailyStartDatetimePrepare($period['t_incoming']);
            $departure_datetime = TimeKeeper::dailyFinishDatetimePrepare($period['t_outgoing']);
            
        } elseif (isset($_POST['FormBookingHourly'])) {
            $period = $_POST['FormBookingHourly'];
            $arrival_datetime = TimeKeeper::toDateTime($period['visit_datetm']);
            $departure_datetime = TimeKeeper::calcHourlyDeparture($period['visit_datetm'], 
                    $period['visit_duration']);
        }
        
        $is_vacant = 1;    
        $sql = "select id, room_number from rooms where is_vacant = :is_vacant";
        $sql_available = 'SELECT id, room_id FROM visits';
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $command->bindParam(":is_vacant",$is_vacant, PDO::PARAM_INT);
        $rows = $command->queryAll();

        //print_r($rows);
        if (!count($rows)) {
                echo '<option>'
                    .Yii::t('site','Not availabel rooms at the time!')
                    .'</option>';
        }
        
        foreach($rows as $row=>$value)
        {
            
            echo CHtml::tag(
                    'option',
                    array('value'=>$value['id']),
                    CHtml::encode($value['room_number']),
                    true
                    );
        }
    }
    
    public function actionTest()
    {
       $model = new Client();
       var_dump($model->findByPhone('505050'));
    }
        
}
