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
        $flash = strip_tags($request->get('flash'));
        var_dump($form);
        echo $form->getSerializeDate();
        if ($request->isPost()){ // была ли отправлена форма
            if($form->isValid()){
                //TODO: write to file
                file_put_contents(DATA_DIR.'contact_form.txt'.PHP_EOL,
                    $form->getSerializeDate(),FILE_APPEND);
                Router::redirect('/index.php?route=index/contact&flash=Massage sent');
            }
            $flash = 'Field the field';
        }
//        $args = [
//            'form'=>$form,
//            'flash'=>$flash
//        ];
        // Вернет масси с указаными ключами значения который возьмет из одноименных
        // переменных
        $args = compact('form','flash');
        return $this->render('contact',$args);
    }
}