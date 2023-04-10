<?php 
/** For use with Content No Cache */
function header_obj(){
    return get_header();
}

add_shortcode('header', 'header_obj');

?>