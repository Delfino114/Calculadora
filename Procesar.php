<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errores = [];
    
    // Validación del número 1
    if(isset($_POST['num1'])){
        $num1 = trim($_POST['num1']);
        if(!is_numeric($num1)){
            $errores[] = "El número 1 no es válido.";
        }
    } else {
        $errores[] = "Número 1 es requerido.";
    }

    // Validación del número 2
    if(isset($_POST['num2'])){
        $num2 = trim($_POST['num2']);
        if(!is_numeric($num2)){
            $errores[] = "El número 2 no es válido.";
        }
    } else {
        $errores[] = "Número 2 es requerido.";
    }

    // Validación de la operación
    if(isset($_POST['operacion'])){
        $operacion = $_POST['operacion'];
        if(!in_array($operacion, ['suma', 'resta', 'multiplicacion', 'division'])){
            $errores[] = "Operación no válida.";
        }
    } else {
        $errores[] = "Operación es requerida.";
    }

    // Procesamiento de la operación
    if(empty($errores)){
        $num1 = (float)$num1;    
        $num2 = (float)$num2;

        switch($operacion){
            case 'suma':
                $resultado = $num1 + $num2;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                break;
            case 'division':
                if($num2 == 0){
                    $resultado = "Error: División por cero.";
                } else {
                    $resultado = $num1 / $num2;
                }
                break;
        }
    } else {
        $resultado = implode("<br>", $errores);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Calculadora</title>
</head>
<body>
    <h1>Resultado de la Calculadora</h1>
    
    <?php if(isset($resultado)): ?>
        <?php if(is_numeric($resultado)): ?>
            <p>El resultado de la operación es: <?php echo $resultado; ?></p>
        <?php else: ?>
            <p><?php echo $resultado; ?></p>
        <?php endif; ?>
    <?php endif; ?>
    
    <a href="index.html">Volver al formulario</a>
</body>
</html>
