<?php
if(!isset($config)){
    $config = array();
}

$config['main_menu'] = array(
    'items' =>  array(
        'index' => array(
            'label' => 'Tierillustration',
            'link'  => '/'
        ),
        'flyer' => array(
            'label' => 'Flyer',
            'link'  => '/flyer.php'
        ),
        'auto' => array(
            'label' => 'Auto',
            'link'  => '/auto.php'
        ),
        'weitere' => array(
            'label' => 'Weitere Projekte',
            'link'  => '/weitere.php'
        ),
        'comic' => array(
            'label' => 'Comics',
            'link'  => '/comic.php'
        )
    )
);
 $config['side_menu'] =
     array (

            'items' => array(
                            'kontakt' => array(
                                      'label' =>'Kontakt',
                                      'link' => '/kontakt.php'
                                      ),
                            'info' => array(
                                'label' =>'Info',
                                'link' => '/info.php'
                                     ),

                             )

            );
