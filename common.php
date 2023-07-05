<?php
$pageID = get_option('page_on_front');

class RavineClass
{
    public $date;
    public $active;
    public $conditions = array();

    function __construct(){
        $this->date = current_datetime();
        $this->active = false;
    }
}

class RV_FrontPage extends RavineClass
{
    function __construct() {
        $pageID = get_option('page_on_front'); // 
        $this->active = get_field('rav_aktivni_rocnik', $pageID);
        $this->date = get_field('rav_datum_zavodu', $pageID);
    }
}

class RV_VintagePage extends RavineClass
{
    function __construct(){
        global $post;
        $pageID = $post->ID;
        $this->active = get_field('rav_aktivni_rocnik', $pageID);
        $this->date = get_field('rav_date', $pageID);        
    }
}

if (isset($post)){
    $rav_front = new RV_FrontPage();
    $rav_vnt = new RV_VintagePage();
} else {
    $rav_front = new RavineClass();
    $rav_vnt = new RavineClass();
}
?>