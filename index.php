<?php
include('admin/config/bd.php');

?>
<?php
date_default_timezone_set('America/Santo_Domingo');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Resultados de la Lotería</title>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #fafafa;
        }

        .bolo {
            text-align: center;
            font-size: 24px;
            width: 25px;
            background: linear-gradient(45deg, #d7d7d7 1%, #d7d7d7 50%, #ebebeb 51%, #ebebeb 100%);
            padding: 8px;
            border-radius: 50%;
            display: inline;
            margin-right: 10px;
        }

        .loteria {
            float: left;
            margin-left: 65px;
            background-color: white;
            width: 250px;
            border-radius: 15px;
            height: 220px;
            margin-bottom: 25px;

        }

        .contenedor {
            line-height: 50px;
            width: 185px;
            margin: auto;

            display: block;

        }

        .fl {
            line-height: 24px;
        }

        .pr {
            width: 225px;
            line-height: 55px;
        }

        .st {
            width: 225px;
            line-height: 40px;
        }

        .b-pr {
            margin-left: 20px;
        }

        .nc {
            width: 225px;
        }

        .nc-b {
            margin-left: 30px;
        }

        .ang {
            line-height: 60px;
        }

        .lot {
            width: 225px;
            line-height: 50px;
        }

        .verde {
            background: linear-gradient(135deg, #52b231 0%, #52b231 50%, #1d8c10 51%, #1d8c10 100%);
            color: white;
        }

        .gris {
            background: linear-gradient(45deg, #d7d7d7 1%, #d7d7d7 50%, #ebebeb 51%, #ebebeb 100%);
            color: black;
        }

        .hora {
            margin-top: 10px;
            font-weight: 700;
            text-align: center;
            font-size: 22px;

        }

        .banner-container {
            margin-bottom: 30px;
            position: fixed;
            width: 100%
        }

        #hora {
            position: absolute;
            top: 83%;
            right: 10%;
            font-size: 18px;
            color: black;
            z-index: 4;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <?php
    // Incluir la biblioteca PHP Simple HTML DOM Parser
    include('simple_html_dom.php');

    // Enviar una solicitud HTTP a la página web de Conectate.com.do
    $url = "https://www.conectate.com.do/loterias/";
    $html = file_get_contents($url);

    // Analizar el HTML devuelto utilizando la biblioteca PHP Simple HTML DOM Parser
    $dom = new \simple_html_dom();
    $dom->load($html);


    $hora_act = date('H:i');
    ?>
    <header class="banner-container">
        <div>
            <img src="img/fondo1.png" width="100%" height="200px" alt="">
            <div id="hora"></div>

        </div>
    </header>
    <br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- <?php foreach ($loterias as $lote) { ?>
        <div class="loteria">
            <div class="contenedor">

                <img src="img/<?php echo $lote['imagen'] ?>" alt="" width="165px" height="90px" class="lot-img">
                <div class="bolo <?php echo $lote['color'] ?>">
                    <?php echo $lote['primera']; ?>
                </div>
                <div class="bolo <?php echo $lote['color'] ?>">
                    <?php echo $lote['segunda']; ?>
                </div>
                <div class="bolo <?php echo $lote['color'] ?>">
                    <?php echo $lote['tercera']; ?>
                </div>
            </div>
            <div class="hora">

                <?php
                $hora = $lote['Hora'];


                echo date("g:i a", strtotime($hora)); ?>
            </div>
        </div>
    <?php } ?> -->
    
    <div class="loteria">
        <div class="contenedor">

            <img src="img/laprimera-rojo.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 92)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 93)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 94)->plaintext; ?>
                <div class="bolo <?php if ($hora_act < "12:05"){
                echo "gris";
             }else if($hora_act >= "12:05"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "12:05"){
                echo "gris";
             }else if($hora_act >= "12:05"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "12:05"){
                echo "gris";
             }else if($hora_act >= "12:05"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
           
        </div>
        <div class="hora">

            12:00 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/lasuertedominicanalogo.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 98)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 99)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 100)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "12:35"){
                echo "gris";
             }else if($hora_act >= "12:35"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "12:35"){
                echo "gris";
             }else if($hora_act >= "12:35"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "12:35"){
                echo "gris";
             }else if($hora_act >= "12:35"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            12:30 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/NRT.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 44)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 45)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 46)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "13:05"){
                echo "gris";
             }else if($hora_act >= "13:05"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "13:05"){
                echo "gris";
             }else if($hora_act >= "13:05"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "13:05"){
                echo "gris";
             }else if($hora_act >= "13:05"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            12:55 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/logoStroke.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 104)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 105)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 106)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "14:00"){
                echo "gris";
             }else if($hora_act >= "14:00"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "14:00"){
                echo "gris";
             }else if($hora_act >= "14:00"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "14:00"){
                echo "gris";
             }else if($hora_act >= "14:00"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            1:55 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/fl_logo_rgb.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 71)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 72)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 73)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "13:40"){
                echo "gris";
             }else if($hora_act >= "13:40"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "13:40"){
                echo "gris";
             }else if($hora_act >= "13:40"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "13:40"){
                echo "gris";
             }else if($hora_act >= "13:40"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            1:35 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/ganamas.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 1)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 2)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 3)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "14:45"){
                echo "gris";
             }else if($hora_act >= "14:45"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "14:45"){
                echo "gris";
             }else if($hora_act >= "14:45"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "14:45"){
                echo "gris";
             }else if($hora_act >= "14:45"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            2:40 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/ny.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 65)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 66)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 67)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "14:35"){
                echo "gris";
             }else if($hora_act >= "14:35"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "14:35"){
                echo "gris";
             }else if($hora_act >= "14:35"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "14:35"){
                echo "gris";
             }else if($hora_act >= "14:35"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            2:30 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/lasuertedominicanalogo.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 101)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 102)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 103)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "18:05"){
                echo "gris";
             }else if($hora_act >= "18:05"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "18:05"){
                echo "gris";
             }else if($hora_act >= "18:05"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "18:05"){
                echo "gris";
             }else if($hora_act >= "18:05"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            6:00 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/loteka-logo-AA05D21CAB-seeklogo.com.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 57)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 58)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 59)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "20:05"){
                echo "gris";
             }else if($hora_act >= "20:05"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "20:05"){
                echo "gris";
             }else if($hora_act >= "20:05"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "20:05"){
                echo "gris";
             }else if($hora_act >= "20:05"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            7:55 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/laprimera-rojo.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 95)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 96)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 97)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "20:10"){
                echo "gris";
             }else if($hora_act >= "20:10"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "20:10"){
                echo "gris";
             }else if($hora_act >= "20:10"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "20:10"){
                echo "gris";
             }else if($hora_act >= "20:10"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            8:00 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/logo-811524695.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 4)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 5)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 6)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "21:00"){
                echo "gris";
             }else if($hora_act >= "21:00"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "21:00"){
                echo "gris";
             }else if($hora_act >= "21:00"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "21:00"){
                echo "gris";
             }else if($hora_act >= "21:00"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            8:50 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/quiniela-pale-logo-2FFC94C4C2-seeklogo.com.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 35)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 36)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 37)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "21:00"){
                echo "gris";
             }else if($hora_act >= "21:00"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "21:00"){
                echo "gris";
             }else if($hora_act >= "21:00"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "21:00"){
                echo "gris";
             }else if($hora_act >= "21:00"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            8:55 pm </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/fl_logo_rgb.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 74)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 75)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 76)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "22:00"){
                echo "gris";
             }else if($hora_act >= "22:00"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "22:00"){
                echo "gris";
             }else if($hora_act >= "22:00"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "22:00"){
                echo "gris";
             }else if($hora_act >= "22:00"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        <div class="hora">

            9:50 pm </div>
    </div>
    </div>
    <div class="loteria">
        <div class="contenedor">

            <img src="img/ny.png" alt="" width="165px" height="90px" class="lot-img">
            <?php
                $bolo1 = $dom->find('span[class=score ]', 68)->plaintext;
                $bolo2 = $dom->find('span[class=score ]', 69)->plaintext;
                $bolo3 = $dom->find('span[class=score ]', 70)->plaintext; ?>
             <div class="bolo <?php if ($hora_act < "22:40"){
                echo "gris";
             }else if($hora_act >= "22:40"){
                echo "verde";}?>">
                    <?php echo $bolo1 ?> </div>
                <div class="bolo <?php if ($hora_act < "22:40"){
                echo "gris";
             }else if($hora_act >= "22:40"){
                echo "verde";}?>">
                    <?php echo $bolo2 ?> </div>
                <div class="bolo <?php if ($hora_act < "22:40"){
                echo "gris";
             }else if($hora_act >= "22:40"){
                echo "verde";}?>">
                    <?php echo $bolo3 ?> </div>
        </div>
        <div class="hora">

            10:30 pm </div>
    </div>

    <script type="text/javascript">
        function actualizar() {
            location.reload(true);
        }
        //Función para actualizar cada 5 segundos(5000 milisegundos)
        setInterval("actualizar()", 60000);
    </script>
    <script src="js/app.js"></script>
</body>

</html>