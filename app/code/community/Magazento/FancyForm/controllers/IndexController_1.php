<?php
/*
 *  Created on Sep , 2012
 *  Author Kate Mironova - ktmironova@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */

require_once 'Mage/Contacts/controllers/IndexController.php';

class Magazento_FancyForm_IndexController extends Mage_Contacts_IndexController {

    public function indexAction() {
//        if ($this->getRequest()->getrequestString() == '/contacts/')
//            $this->_redirect('fancyform/index');;
//        die('...');


        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction() {
        $post = $this->getRequest()->getPost();
        if ($post) {
            $translate = Mage::getSingleton('core/translate');
            /* @var $translate Mage_Core_Model_Translate */
            $translate->setTranslateInline(false);
            try {
                $postObject = new Varien_Object();
                $postObject->setData($post);

                $error = false;

                if (!Zend_Validate::is(trim($post['name']), 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['comment']), 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                    $error = true;
                }

                if (Zend_Validate::is(trim($post['hideit']), 'NotEmpty')) {
                    $error = true;
                }

                if ($error) {
                    throw new Exception();
                }
                $mailTemplate = Mage::getModel('core/email_template');
                /* @var $mailTemplate Mage_Core_Model_Email_Template */
                $mailTemplate->setDesignConfig(array('area' => 'frontend'))
                        ->setReplyTo($post['email'])
                        ->sendTransactional(
                                Mage::getStoreConfig(self::XML_PATH_EMAIL_TEMPLATE), Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER), Mage::getStoreConfig(self::XML_PATH_EMAIL_RECIPIENT), null, array('data' => $postObject)
                );

                if (!$mailTemplate->getSentSuccess()) {
                    throw new Exception();
                }

                $translate->setTranslateInline(true);

//      		json_encode(array('status' => 1));
                echo "success";
                return;
            } catch (Exception $e) {

                // die(json_encode(array('error' => $e->getMessage())));
                echo "error";

                return;
            }
        } else {
            $this->_redirect('*/*/');
        }
    }

}
