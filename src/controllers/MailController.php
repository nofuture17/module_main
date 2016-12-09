<?php
/**
 * Created by PhpStorm.
 * User: nofuture17
 * Date: 05.11.2016
 * Time: 21:01
 */

namespace amd_php_dev\module_main\controllers;


use amd_php_dev\yii2_components\controllers\PublicController;
use yii\base\Exception;
use yii\web\BadRequestHttpException;

class MailController extends \yii\web\Controller
{
    public function actionCallBack()
    {
        $model = $this->createModel();

        $model->address = !empty(\yii::$app->params['MAIL.CALLBACK']) ? \yii::$app->params['MAIL.CALLBACK'] : $this->getAddress();

        if ($this->sendMail($model)) {
            $model->active = \amd_php_dev\module_main\models\MainMail::ACTIVE_ACTIVE;
        } else {
            $model->active = \amd_php_dev\module_main\models\MainMail::ACTIVE_BLOCKED;
        }

        $model->save();
        \Yii::$app->end();
    }

    public function actionQuestion()
    {
        $model = $this->createModel();

        $model->name = 'База знаний';
        $model->address = !empty(\yii::$app->params['MAIL.QUESTION']) ? \yii::$app->params['MAIL.QUESTION'] : $this->getAddress();

        if ($this->sendMail($model)) {
            $model->active = \amd_php_dev\module_main\models\MainMail::ACTIVE_ACTIVE;
        } else {
            $model->active = \amd_php_dev\module_main\models\MainMail::ACTIVE_BLOCKED;
        }

        $model->save();
        \Yii::$app->end();
    }

    public function actionFindError()
    {
        $model = $this->createModel();

        $model->name = 'Ошибка на сайте';
        $model->address = !empty(\yii::$app->params['MAIL.ERROR']) ? \yii::$app->params['MAIL.ERROR'] : $this->getAddress();

        if ($this->sendMail($model)) {
            $model->active = \amd_php_dev\module_main\models\MainMail::ACTIVE_ACTIVE;
        } else {
            $model->active = \amd_php_dev\module_main\models\MainMail::ACTIVE_BLOCKED;
        }

        $model->save();
        \Yii::$app->end();
    }

    /**
     * @return \amd_php_dev\module_main\models\MainMail
     */
    protected function createModel()
    {
        $request = \yii::$app->request;
        $formData = $request->post();

        if (!$this->chechForm($formData)) {
            throw new BadRequestHttpException('Не верно заполнена форма!');
            \Yii::$app->end();
        }

        $date = date('h:i:s d.m.Y');
        $model = new \amd_php_dev\module_main\models\MainMail();
        $model->name = 'Обратный звонок';
        $model->page = $request->referrer;
        $model->address = $this->getAddress();
        $phone = isset($formData['phone']) ? "\nТелефон: {$formData['phone']};" : '';
        $text = <<<TEXT
Имя: {$formData['name']};
Почта: {$formData['email']};{$phone}
Время: {$date};
Страница: {$model->page};
Вопрос:
{$formData['question']};
TEXT;
        $model->data = \yii\helpers\HtmlPurifier::process($text);

        return $model;
    }

    protected function chechForm($formData)
    {
        $res = true;

        if (empty($formData['name'])) {
            $res = false;
        }

//        if (empty($formData['email'])) {
//            $res = false;
//        }

//        if (empty($formData['question'])) {
//            $res = false;
//        }

        return $res;
    }

    /**
     * @param $mail \amd_php_dev\module_main\models\MainMail
     * @return mixed
     */
    public function sendMail($mail)
    {
        $result = false;

        try {
            $result = \Yii::$app->mailer->compose('@app/modules/main/mails/email-form', ['mail' => $mail]) // TODO: Сделать алиас для модуля при подключиении
                ->setFrom([\Yii::$app->params['MAILER.USERNAME'] => \Yii::$app->name])
                ->setTo($mail->address)
                ->setSubject($mail->name . ' ' . \yii::$app->request->hostName)
                ->send();
        } catch (Exception $e) {
            $mail->data . "\n\n {$e->getMessage()}";
            $result = false;
        }

        return $result;
    }

    public function getAddress()
    {
        return \Yii::$app->params['SUPPORT_EMAIL'];
    }

    protected function checkReCaptcha()
    {
        if ($recaptcha = \yii::$app->request->post('g-recaptcha-response')) {
            return false;
        }

        $google_url = "https://www.google.com/recaptcha/api/siteverify";
        $secret = \yii::$app->params['RECAPTCHA.S_KEY'];
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        $res=$this->getCurlData($url);
        $res= json_decode($res, true);
        //reCaptcha введена
        return (boolean) $res['success'];
    }

    protected function getCurlData($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $curlData = curl_exec($curl);
        curl_close($curl);
        return $curlData;
    }

}