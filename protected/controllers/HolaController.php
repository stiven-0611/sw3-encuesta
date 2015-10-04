<?php
#http://localhost/yii/encuesta/hola/index
class HolaController extends controller
{
	public function actionIndex()
	{
		$model=CActiveRecord::model("Users")->findAll();
		$twitter="@stiven0611";
		$this->render("index",array("model"=>$model,"twitter"=>$twitter));
	}

}