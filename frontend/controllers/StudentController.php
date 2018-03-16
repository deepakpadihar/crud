<?php
namespace frontend\controllers;
use Yii;
use app\models\Student;
use yii\web\Controller;
 
/**
 * manual CRUD
 **/
class StudentController extends Controller
{  
   
    public function actionCreate()
    {
        $model = new Student();
 
        // new record
        if($model->load(Yii::$app->request->post()) && $model->save()){
        	Yii::$app->session->setFlash('saved');
        	
             return $this->redirect(['index']);


        }
                 
        return $this->render('create', ['model' => $model]);
    }


     public function actionIndex()
    {
        $student = Student::find()->all();
         
        return $this->render('index', ['model' => $student]);
    }


      public function actionEdit($id)
    {
        $model = Student::findone($id);
 
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
         
        // update record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }
         
        return $this->render('edit', ['model' => $model]);
    }  



     public function actionDelete($id)
     {
         $model = Student::findOne($id);
         
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
             
        // delete record
        $model->delete();
         
        return $this->redirect(['index']);
     }   

         public function actionFlashData()   
       {   
      $session = Yii::$app->session;   
      // set a flash message named as "welcome"   
      $session->setFlash('welcome', 'Successfully Logged In!');   
      return $this->render('showflash');
      return $this->redirect(['index']);   
       }   
}




?>