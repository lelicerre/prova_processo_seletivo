<?php

include_once 'DataRequest.php';

if(isset($_POST['action'])) {
    $dataRequest = new DataRequest();

    switch($_POST['action']) {
        case 'getClientData':
            $data = $dataRequest->dadosClientes();
            break;
        case 'getSupplierData':
            $data = $dataRequest->dadosFornecedores();
            break;
        case 'getUserData':
            $data = $dataRequest->dadosUsuarios();
            break;
        default:
            $data = array('error' => 'Ação inválida');
    }

    header('Content-Type: application/json');
    echo json_encode($data);
}
