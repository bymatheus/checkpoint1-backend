<?php
    require 'nex-calculosalario.php'
?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
        <main>
            <div class="container py-4">
                <?php
                    if (isset($_POST['salario'])) {
                        $salario = salarioLiquido(
                            $_POST['salario'],
                            $_POST['dependentes']
                        );
                ?>
                    <div class="row align-items-md-stretch">
                        <div class="col-12 mb-3">
                            <div class="h-100 p-5 text-white bg-dark rounded-3">
                                <p>Seu salário liquido é de</p>
                                <h2>R$ <?=number_format($salario, 2, ',', '.')?></h2>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>

                <div class="p-5 mb-4 bg-light rounded-3">
                    <div class="container-fluid py-5">
                        <form method="POST" action="nex-efetuacalculo.php">
                            <div class="mb-3">
                                <label for="salario">Salário Bruto</label>
                                <div class="input-group">
                                    <div class="input-group-text">R$</div>
                                    <input type="text" class="form-control" id="salario" name="salario" placeholder="1000,00" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="dependentes" class="form-label">Dependentes</label>
                                <input type="number" class="form-control" id="dependentes" name="dependentes" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Calcular</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
</html>