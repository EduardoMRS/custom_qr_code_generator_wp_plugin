<style>
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #load_box {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: linear-gradient(rgb(131 131 131 / 69%), rgb(0 0 0 / 51%));
        background-size: cover;
        z-index: 9999;
    }

    #load {
        position: fixed;
        height: 140px;
        width: 140px;
    }

    #load_animation {
        position: absolute;
        width: 100%;
        height: 100%;
        border: 16px solid crimson;
        border-radius: 100%;
        border-right: 16px solid transparent;

        animation: loading 1s linear infinite;
    }

    @keyframes loading {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
</head>

<span class="center" id="load_box">
    <span class="center" id="load">
        <span id="load_animation"></span>
        <span class="center" id="load_info"><img src="img/logo.png" style="height: 80px;"></span>
    </span>
</span>

<script>
    showLoader();

    function showLoader() {
        document.getElementById("load_box").style.visibility = "hidden";
        document.getElementById("load_box").style.visibility = "visible";
        document.getElementById("load_box").style.opacity = 1;
    }

    function hideLoader(time) {
        setTimeout(function() {
            var loadBox = document.getElementById("load_box");
            document.body.style.visibility = "visible";
            loadBox.style.opacity = 0;
            loadBox.style.visibility = "hidden";
        }, time);
    }

    // Exemplo de uso: Chame a função hideLoader() quando o conteúdo estiver carregado
    window.addEventListener("load", hideLoader(4000));
</script>