<?php
/*
 *  Created on Sep 10, 2012
 *  Author Kate Mironova - ktmironova@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

class Magazento_FancyForm_Block_ContactForm extends Mage_Core_Block_Template {

    protected function _construct() {
        return parent::_construct();
    }

    public function getModel() {
        return Mage::getModel('fancyform/data');
    }

}

?>
