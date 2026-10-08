<?php
include_once("componet/load.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="fonts/fa/css/all.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="./js/qr-code-styling.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de QR Code - IEAB</title>
    <style>
        .container-qr {
            position: relative;
            width: fit-content;
            background: white;
        }

        .container-qr .qr-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-qr .qr-logo #qr-logo {
            width: 64px;
            background-color: #ffffff;
            padding: 10px;
        }

        .btn-download-qr {
            background: #fd940c;
            color: white;
        }

        #wpwrap {
            background: #f0f0f1;
        }
    </style>
</head>

<body>
    <section class="container">
        <div class="row justify-content-center align-items-center pb-4 pt-4 gap-3">
            <div id="container-qr" class="container-qr justify-content-center" style="display:none;">
                <div id="qr"></div>
            </div>

            <div class="col-sm-6">
                <div class="row justify-content-between gap-2">
                    <div class="col-sm-12">
                        <label class="form-label" for="qr-name">Nome do QR Code</label>
                        <input class="form-control" type="text" id="qr-name" placeholder="" value="IEAB MDO - Home">
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="qr-value">Texto</label>
                        <input class="form-control" type="text" id="qr-value" placeholder="link ou texto" value="<?php echo "https://" . $_SERVER['HTTP_HOST']; ?> - Home">
                    </div>
                    <div class="col-sm-auto">
                        <label class="form-label" for="qr-size">Tamanho</label>
                        <select class="form-control" id="qr-size">
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250" selected>250</option>
                            <option value="300">300</option>
                        </select>

                    </div>
                    <div class="col-sm-auto">
                        <label class="form-label" for="dots-type">Formato dos Pontos</label>
                        <select class="form-control" id="dots-type">
                            <option value="dots">Pontos</option>
                            <option value="rounded">Redondo</option>
                            <option value="extra-rounded" selected>Muito redondo</option>
                            <option value="square">Quadrado</option>
                        </select>
                    </div>
                    <div class="col-sm-auto">
                        <label class="form-label" for="corners-type">Formato dos Cantos</label>
                        <select class="form-control" id="corners-type">
                            <option value="dot">Pontos</option>
                            <option value="extra-rounded" selected>Muito redondo</option>
                            <option value="square">Quadrado</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label class="form-label" for="qr-color-background">Cor de Fundo</label>
                        <input class="form-control" type="color" name="qr-color-background" id="qr-color-background" value="#ffffff">
                    </div>
                    <div class="col-auto">
                        <label class="form-label" for="qr-color-foreground">Cor dos Sharps</label>
                        <input class="form-control" type="color" name="qr-color-foreground" id="qr-color-foreground" value="#000000">
                    </div>
                    <div class="col-sm-auto">
                        <label class="form-label" for="qr-format-download">Formato</label>
                        <select class="form-control" id="qr-format-download">
                            <option value="png">PNG</option>
                            <option value="svg" selected>SVG</option>
                            <option value="jpeg">JPEG</option>
                            <option value="webp">WEBP</option>
                        </select>
                    </div>
                    <div class="w-100 d-flex justify-content-between pt-2 gap-2">
                        <button class="btn btn-primary" id="qr-new" onclick="new_qr(true)" style="width:70%;">Gerar</button>
                        <button class="btn btn-download-qr" id="capture-button" disabled>Baixar<i class="fa-solid fa-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div id="table_result" class="container">

        </div>
    </section>

    <?php
    // include_once("./inc/load-table.php");
    // include_once("./inc/select-table.php");
    ?>
    <script>
        load_table_qr();

        function new_qr(load) {
            if (load) {
                showLoader();
                hideLoader(1000);
            }

            /*var insert_data = {
                value: document.getElementById("qr-value").value,
                name: document.getElementById("qr-name").value,
                size: document.getElementById("qr-size").value,
                color_bk: document.getElementById("qr-color-background").value,
                color_ft: document.getElementById("qr-color-foreground").value,
                dots_type: document.getElementById("dots-type").value,
                corners_type: document.getElementById("corners-type").value,
            }
            var dadosJSON = JSON.stringify(insert_data);
            var xhr = new XMLHttpRequest();

            xhr.open('POST', './componet/insert.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    load_table_qr();
                    var resposta = xhr.responseText;
                } else {
                    console.log("Falha no insert");
                }
            };*/

            // Envia os dados para o PHP
            // xhr.send(dadosJSON);

            var size = document.getElementById("qr-size").value;
            var value = document.getElementById("qr-value").value;
            var color_bk = document.getElementById("qr-color-background").value;
            var color_ft = document.getElementById("qr-color-foreground").value;
            var dots_type = document.getElementById("dots-type").value;
            var corners_type = document.getElementById("corners-type").value;

            switch (corners_type) {
                case "square":
                    corners_center_type = "square";
                    break;

                default:
                    corners_center_type = "dot";
                    break;
            };

            (function() {
                qrCode = new QRCodeStyling({
                    width: size,
                    height: size,
                    type: "svg",
                    data: value,
                    image: "./logo.webp",
                    dotsOptions: {
                        color: color_ft,
                        type: dots_type
                    },
                    cornersSquareOptions: {
                        color: color_ft,
                        type: corners_type
                    },
                    cornersDotOptions: {
                        type: corners_center_type
                    },
                    backgroundOptions: {
                        color: color_bk,
                    },
                    imageOptions: {
                        crossOrigin: "anonymous",
                        margin: 10
                    }
                });
                document.getElementById("qr").innerHTML = '';
                qrCode.append(document.getElementById("qr"));
                document.getElementById("container-qr").innerHTML.qrCode;
                document.getElementById("container-qr").style.display = "flex";
                document.getElementById("capture-button").removeAttribute("disabled");
            })();
        }

        document.getElementById('capture-button').addEventListener('click', function() {
            qrCode.download({
                name: document.getElementById("qr-name").value,
                extension: document.getElementById("qr-format-download").value
            });
        });
    </script>
</body>

</html>