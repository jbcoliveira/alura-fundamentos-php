<?php

function mensagem($tipo, $mensagem) {
    $tipo_msg = '';
    switch ($tipo) {
    case 'info':
        $tipo_msg = 'alert-info';    
        break;  
    case 'success':
        $tipo_msg = 'text-success';
        break;
    case 'danger':
        $tipo_msg = 'text-danger';    
        break;
    case 'warning':
        $tipo_msg = 'alert-warning';    
        break;    
  
    case 'dismissable':
        $tipo_msg = 'alert-dismissable';    
        break;        
    
    default:
        $tipo_msg = 'alert-info';
        break;
    }
    
    
    echo '<p class=' . $tipo_msg . '>' . $mensagem. '</p>';
    
}
