<?php

class CompanyProfile extends AppModel {

    var $belongsTo = array(
        'City',
        'State',
    );
    
    var $validate = array(
        
    );
}

?>
