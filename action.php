<?php

require 'vendor/autoload.php';

$filter = array(
    'name' => array(
        'required',
        'max_length(50)'
    ),
    'email' => array(
        'required',
        'email'
    ),
    'agree' => array(
        'required'
    ),
);

$validation_result = SimpleValidator\Validator::validate($_POST, $filter);


if ($validation_result->isSuccess() == true) {
    $filename = 'uploads/'.uniqid().'.json';
    file_put_contents($filename, json_encode($_POST));
    echo "Спасибо!";
} 

else {
    echo "Неправильно заполнены данные";
}
