<?php
/*
 *  Created on Sep 10, 2012
 *  Author Kate Mironova - ktmironova@gmail.com - Magazento.com
 *  Copyright Proskuryakov Ivan. Magazento.com © 2011. All Rights Reserved.
 *  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
 */
?>
<?php

Class Magazento_Fancyform_Model_Data {

    public function isExtensionEnabled() {
        return Mage::getStoreConfig('fancyform/options/enable');
    }

    public function getTitle() {
        return Mage::getStoreConfig('fancyform/options/blocktitle');
    }

    public function getAdditionalText() {
        return Mage::getStoreConfig('fancyform/options/additionaltext');
    }

}

?>
