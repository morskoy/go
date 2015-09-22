<?php

class TransportController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column1';


/**
* @return array action filters
*/
public function filters(){
    return array(
        'accessControl', // perform access control for CRUD operations
        'postOnly + delete',
    );
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
 */
public function accessRules() {
    return array(
        array('allow',  // allow all users to perform 'index' and 'view' actions
            'actions'=>array('index','view','find','add'),
            'users'=>array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions'=>array('update','my','delete'),
            'users'=>array('@'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=>array('admin'),
            'users'=>array('admin'),
        ),
        array('deny',  // deny all users
            'users'=>array('*'),
        ),
    );
}



/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionAdd(){
    $model=new Transport;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);


    if(isset($_POST['Transport']))
    {
        $model->attributes=$_POST['Transport'];
        //$model->user_id =  Yii::app()->user->id;

        if($model->save())
        $this->redirect(array('view','id'=>$model->id));
    }

    $this->render('add',array(
    'model'=>$model,
    ));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id){
    $model=$this->loadModel($id);


    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Transport']))
    {

        $model->attributes=$_POST['Transport'];
        //var_dump($model->attributes);
        if($model->save()) {


        $this->redirect(array('view','id'=>$model->id));
        }
    }

    $this->render('update',array(
    'model'=>$model,
    ));
}

    /**
    * Deletes a particular model.
    * If deletion is successful, the browser will be redirected to the 'admin' page.
    * @param integer $id the ID of the model to be deleted
    */
    public function actionDelete($id){

        if(Yii::app()->request->isPostRequest)
        {
            $model = $this->loadModel($id);
            // we only allow deletion via POST request
            if($model->user_id == Yii::app()->user->id) $model->delete();
            else
                throw new CHttpException(400,'Invalid user_id');

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
        throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
    * Lists all models.
    */
    public function actionIndex(){

        $dataProvider=new CActiveDataProvider('Transport');

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Показывает транспорт пользователя
    */
    public function actionMy(){
        $dataProvider=new CActiveDataProvider('Transport', array(
            'criteria' => array(
                'condition' => 'user_id = :user_id',
                'params' => array(':user_id'=>Yii::app()->user->id),
            ),
            'sort' => array(
                'defaultOrder' => 'date_add DESC',
            )
        ));
        $this->render('my',array(
            'dataProvider'=>$dataProvider,

        ));

    }

    /**
     *  Find transport
      */
    public function actionFind(){

        $model = new Transport('search');
        $model->unsetAttributes();
        if(isset($_GET['Transport'])) $model->attributes = $_GET['Transport'];
        $this->render('find',array('model' => $model));

    }

    /**
    * Manages all models.
    */
    public function actionAdmin() {

        $model=new Transport('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Transport']))
        $model->attributes=$_GET['Transport'];

        $this->render('admin',array(
        'model'=>$model,
    ));
    }

    /**
    * Returns the data model based on the primary key given in the GET variable.
    * If the data model is not found, an HTTP exception will be raised.
    * @param integer the ID of the model to be loaded
    */
    public function loadModel($id) {

        $model=Transport::model()->findByPk($id);
        if($model===null)
        throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }



/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
    if(isset($_POST['ajax']) && $_POST['ajax']==='transport-form')  {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
}

}
