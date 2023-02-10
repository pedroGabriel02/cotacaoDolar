<?php

require_once "app/config/config.php";
require_once "app/modules/hg-api.php";

$hg = new HG_API(HG_API_KEY);
$dolar = $hg->dolar_quotation();
$euro = $hg->euro_quotation();
$peso = $hg->peso_quotation();

if ($hg->is_error() == false){
    $variation = ( $dolar['variation'] < 0 ) ? 'danger' : 'info';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cotação Dólar</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Cotação Dólar</p>
                    <?php if ($hg->is_error() == false): ?>
                    <p>USD <span class="badge badge-pill badge-<?php echo ($variation); ?>"><?php echo ($dolar['buy']); ?></span></p>
                    <?php else: ?>
                    <p><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>
                    <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Cotação Euror</p>
                    <?php if ($hg->is_error() == false): ?>
                    <p>EUR <span class="badge badge-pill badge-<?php echo ($variation); ?>"><?php echo ($euro['buy']); ?></span></p>
                    <?php else: ?>
                    <p><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>
                    <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Cotação Peso Argentino</p>
                    <?php if ($hg->is_error() == false): ?>
                    <p>ARS <span class="badge badge-pill badge-<?php echo ($variation); ?>"><?php echo ($peso['buy']); ?></span></p>
                    <?php else: ?>
                    <p><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>
                    <?php endif; ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>
</html>