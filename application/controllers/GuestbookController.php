<?php
/**
 * Created by PhpStorm.
 * User: pleha
 * Date: 20.09.2017
 * Time: 21:29
 */
class GuestbookController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $guestbook = new Application_Model_Guestbook();
        $this->view->entries = $guestbook->fetchAll();
    }
    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Guestbook();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $model = new Application_Model_Guestbook($form->getValues());
                $model->save();
                return $this->_helper->redirector('index');
            }
        }
        $this->view->form = $form;
    }
}

