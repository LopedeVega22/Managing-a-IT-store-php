<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Precios - Cyber Monday</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h1 {
            color: #667eea;
            text-align: center;
            margin-bottom: 30px;
        }
        .search-form {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .resultado {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
        }
        .exito {
            background: #e8f5e8;
            border-left: 4px solid #2e7d32;
        }
        .error {
            background: #ffebee;
            border-left: 4px solid #c62828;
        }
        .precio-total {
            font-size: 1.5em;
            font-weight: bold;
            color: #2e7d32;
            text-align: center;
            margin: 20px 0;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
        }
        .info {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #2196f3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>💰 Calcular Precio del Pedido</h1>

        <div class="info">
            <h3>💡 Información de precios:</h3>
            <ul>
                <li>iPhone: 1000€</li>
                <li>MacBook: 2000€</li>
                <li>AirPods: 200€</li>
                <li>iPad: 800€</li>
            </ul>
        </div>

        <div class="search-form">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nombre">Buscar por nombre:</label>
                    <input type="text" id="nombre" name="nombre" 
                           placeholder="Dejar vacío para calcular todos los pedidos"
                           value="">
                </div>
                <button type="submit" name="calcular" class="btn">Calcular Precio</button>
            </form>
        </div>

        <!-- Resultados del cálculo -->
   
            <div class="resultado">
                <h3>Resultado:</h3>
               
                
              
                    <div class="precio-total">
                        Total:
        <?php
            $nombreBuscado = $_POST['nombre'];
            $archivo = 'pedidos.txt';
            $precio=0;
            $file = fopen($archivo, 'r');
            $encontrado = false; // si no esta encontrado sera false
            if ($nombreBuscado==''){
                $encontrado = true;
                while (!feof($file)) {
                    $linea = trim(fgets($file));
                    if (!empty($linea)) {
                        //Busca patron "nombre:correo"
                        $partes = explode(",", $linea);
                        if ($partes[2]=='MacBook'){
                            $precio_pedido= 2000 * intval($partes[3]);
                        }
                        if ($partes[2]=='iPhone'){
                            $precio_pedido= 1000 * intval($partes[3]);
                        }
                        if ($partes[2]=='AirPods'){
                            $precio_pedido= 200 * intval($partes[3]);
                        }
                        if ($partes[2]=='iPad'){
                            $precio_pedido= 800 * intval($partes[3]);
                        }
                        $precio=$precio+$precio_pedido;
                    }
                }
                echo $precio;
            }
            while (!feof($file)) {
            $linea = trim(fgets($file));
                if (!empty($linea)) {
                //Busca patron "nombre:correo"
                $partes = explode(",", $linea);
                    if (strcmp($nombreBuscado, $partes[0])==0){ //strcmp compara dos cadenas si devuelve 0 son iguales
                        if ($partes[2]=='MacBook'){
                            $precio= 2000 * intval($partes[3]);
                        }
                        if ($partes[2]=='iPhone'){
                            $precio= 1000 * intval($partes[3]);
                        }
                        if ($partes[2]=='AirPods'){
                            $precio= 200 * intval($partes[3]);
                        }
                        if ($partes[2]=='iPad'){
                            $precio= 800 * intval($partes[3]);
                        }
                        $encontrado = true;
                        echo $precio;
                    }
                 }
                 else{
                    //calcular todos los pedidos
                 }
            }
            fclose($file);
            if(!$encontrado){
                echo "Usted aun no ha realizado un pedido: $nombreBuscado.";
            }
        ?> €
                    </div>
               
            </div>
      

        <a href="index.html" class="back-link">← Volver al menú principal</a>
        
    </div>
</body>
</html>