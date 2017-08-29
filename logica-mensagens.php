<?php
session_start();
function mensagem($tipo, $mensagem) {
    $tipo_msg = '';
    switch ($tipo) {
        case 'info':
            $tipo_msg = 'alert-info';
            break;
        case 'success':
            $tipo_msg = 'alert-success';
            break;
        case 'danger':
            $tipo_msg = 'alert-danger';
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


    echo '<p class=' . $tipo_msg . '>' . $mensagem . '</p>';
}

function mostraAlerta($tipo) {
    if (isset($_SESSION[$tipo])) {
        mensagem($tipo, $_SESSION[$tipo]);
        unset($_SESSION[$tipo]);
    }
}
