<?php

/*
 *  Created on Sep 20, 2012
 *  Author Kate Mironova - ktmironova@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */

require_once 'Mage/Contacts/controllers/IndexController.php';

class Magazento_FancyForm_IndexController extends Mage_Contacts_IndexController {

    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function postAction() {
        $post = $this->getRequest()->getPost();
        if ($post) {
            if ($post['hideit'] == 1) {
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

                    if (!Zend_Validate::is(trim($post['hideit']), 'NotEmpty')) {
                        $error = true;
                    }

                    if ($error) {
                        throw new Exception("error in user data");
                    }
                    $mailTemplate = Mage::getModel('core/email_template');
                    /* @var $mailTemplate Mage_Core_Model_Email_Template */
                    $mailTemplate->setDesignConfig(array('area' => 'frontend'))
                            ->setReplyTo($post['email'])
                            ->sendTransactional(
                                    Mage::getStoreConfig(self::XML_PATH_EMAIL_TEMPLATE), Mage::getStoreConfig(self::XML_PATH_EMAIL_SENDER), Mage::getStoreConfig(self::XML_PATH_EMAIL_RECIPIENT), null, array('data' => $postObject)
                    );

                    if (!$mailTemplate->getSentSuccess()) {
                        throw new Exception('cant send email');
                    }

                    $translate->setTranslateInline(true);

                    echo "1";
                    return;
                } catch (Exception $e) {

                    echo "0";

                    return;
                }
            } else {
                $this->_redirect('*/*/');
            }
        }
    }

}
