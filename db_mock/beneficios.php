<?php
require_once './models/beneficioModel.php';

return [
    new beneficioModel("1", "Vale-Alimentacao", "alimentacao", ""),
    new beneficioModel("2", "Vale-Combustivel", "transporte", ""),
    new beneficioModel("3", "Academia", "convenio", "", true),
    new beneficioModel("4", "Cartao-Presente", "presente", "")
];

?>