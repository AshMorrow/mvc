<?php

/**
 * Created by PhpStorm.
 * User: koragg
 * Date: 21.04.16
 * Time: 16:32
 */
class IndexController extends Controller
{
    public function indexAction(Request $request,array $param = []){

        $model = new PageModel();
        $page = $model->findByAllias('homepage');
        $param = array(
            'page' => $page
        );
       return $this->render('index',$param);
    }

    public function contactAction(Request $request){
        $form = new ContactForm($request);
        $datetime = new DateTime();
        if ($request->isPost()){ // была ли отправлена форма
            if($form->isValid()){
                
                
                (new FeedbackModel())->save([
                   'id' => null,
                    'username' => $form->username,
                    'email' => $form->email,
                    'massage' => $form->massage,
                    'created' => $datetime->format('Y-m-d H:i:s'),
                    'ip' => $request->getIpAddres()
                ]);
                Session::setFlash('Massage sent');
                Router::redirect('/index.php?route=index/contact');
            }
            Session::setFlash('Field the field');
        }
//        $args = [
//            'form'=>$form,
//            'flash'=>$flash
//        ];
        // Вернет масси с указаными ключами значения который возьмет из одноименных
        // переменных
        $args = compact('form');
        return $this->render('contact',$args);
    }


}