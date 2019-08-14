<?php

$newBlocktop = Mage::getModel('cms/block')
          ->setTitle('Fancy Contact Form top block')
          ->setContent('This is the top content static block<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et magna eget arcu consequat consequat. Aliquam at tincidunt tortor. Integer malesuada pellentesque erat, vitae tincidunt ante viverra sit amet. Donec id odio dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida, dui vel aliquam feugiat, magna mi dapibus sem, eu sagittis dui sapien ut ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ut quam odio. Cras faucibus nisi eu odio malesuada tempus. Nunc aliquet nisi a nibh pretium ornare. Quisque at orci tortor, a tempus sem.</p>')
          ->setIdentifier('fancyformtop')
          ->setIsActive(true)
          ->setStores(array(0))
          ->save();

$newBlocktop = Mage::getModel('cms/block')
          ->setTitle('Fancy Contact Form bottom block')
          ->setContent('This is the bottom content static block <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et magna eget arcu consequat consequat. Aliquam at tincidunt tortor. Integer malesuada pellentesque erat, vitae tincidunt ante viverra sit amet. Donec id odio dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida, dui vel aliquam feugiat, magna mi dapibus sem, eu sagittis dui sapien ut ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ut quam odio. Cras faucibus nisi eu odio malesuada tempus. Nunc aliquet nisi a nibh pretium ornare. Quisque at orci tortor, a tempus sem.</p>')
          ->setIdentifier('fancyformbottom')
          ->setIsActive(true)
          ->setStores(array(0))
          ->save();
$newBlocktop = Mage::getModel('cms/block')
          ->setTitle('Fancy Contact Form confirmation block')
          ->setContent('<p>This is the content static block in confirmation</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et magna eget arcu consequat consequat. Aliquam at tincidunt tortor. Integer malesuada pellentesque erat, vitae tincidunt ante viverra sit amet. Donec id odio dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida, dui vel aliquam feugiat, magna mi dapibus sem, eu sagittis dui sapien ut ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ut quam odio. Cras faucibus nisi eu odio malesuada tempus. Nunc aliquet nisi a nibh pretium ornare. Quisque at orci tortor, a tempus sem.</p>')
          ->setIdentifier('fancyformconfirmation')
          ->setIsActive(true)
          ->setStores(array(0))
          ->save();

?>
