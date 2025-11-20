<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo - Cyber Monday</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #667eea;
            margin-bottom: 30px;
        }
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 20px 0;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .sorteo-result {
            background: #fff3cd;
            padding: 30px;
            border-radius: 10px;
            margin: 20px 0;
            border: 2px dashed #ffc107;
        }
        .ganador {
            font-size: 1.5em;
            font-weight: bold;
            color: #e91e63;
            margin: 15px 0;
        }
        .info {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎁 Sorteo de Pedidos</h1>

        <div class="info">
            <p>Total de pedidos registrados:
                <?php
                    $total_pedidos=0;
                    $archivo='pedidos.txt';
                    $file = fopen($archivo, 'r');
                    // si no esta encontrado sera false
                    while (!feof($file)) {
                        $linea = trim(fgets($file));
                        if (!empty($linea)) {
                            $total_pedidos=$total_pedidos+1;
                        }
                    }
                    fclose($file);
                    echo $total_pedidos;
                ?>
            </p>
          
        </div>

        <form method="POST" action="">
            <button type="submit" name="realizar_sorteo" class="btn">🎲 Realizar Sorteo</button>
        </form>

        
            <div class="sorteo-result">
                <h2>¡Tenemos un ganador! 🎉</h2>
                <div class="ganador"></div>
                <p>Número sorteado:
                    <?php
                    $total_pedidos=0;
                    $archivo='pedidos.txt';
                    $file = fopen($archivo, 'r');
                    // si no esta encontrado sera false
                    while (!feof($file)) {
                        $linea = trim(fgets($file));
                        if (!empty($linea)) {
                            $total_pedidos=$total_pedidos+1;
                        }
                    }
                    fclose($file);
                        $premio=rand(1,$total_pedidos);
                        echo $premio;
                    ?>
                </p>
                <p>¡Felicidades!
                <?php
                    $lista='';
                    $archivo='pedidos.txt';
                    $file = fopen($archivo, 'r');
                    // si no esta encontrado sera false
                    while (!feof($file)) {
                        $linea = trim(fgets($file));
                        if (!empty($linea)) {
                            $partes = explode(",", $linea);
                            $lista=$lista . $partes[0] . ",";
                        }
                    }
                    fclose($file);
                    $nombres=explode(",",$lista);
                        $ganador=$premio-1;
                        echo $nombres[$ganador];
                    ?>     Tu pedido será gratuito.</p>
            </div>
      

        <a href="index.html" class="back-link">← Volver al menú principal</a>
    </div>
</body>
</html>