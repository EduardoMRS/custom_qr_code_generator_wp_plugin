<script>
    function load_table_qr() {
        fetch("./componet/table.php")
            .then(response => {
                if (response.ok) {
                    return response.text(); // Converte a resposta para texto
                }
                throw new Error("Erro na solicitação.");
            })
            .then(data => {
                document.getElementById("table_result").innerHTML = data;

                $(document).ready(function() {
                    $(".qr-code-select").click(function() {
                        var valor = $(this).data("value-qr");
                        showLoader();
                        hideLoader(2000);

                        fetch("./componet/select.php?cod=" + valor)
                            .then(response => {
                                if (response.ok) {
                                    return response.text(); // Em seguida, retorne a resposta como texto
                                } else {
                                    throw new Error("Erro na solicitação.");
                                }
                            })
                            .then(data => {
                                qr_data = JSON.parse(data)
                                console.log(qr_data);

                                document.getElementById("qr-value").value = qr_data.value;
                                document.getElementById("qr-name").value = qr_data.name;
                                document.getElementById("qr-size").value = qr_data.size;
                                document.getElementById("qr-color-background").value = qr_data.color_bk;
                                document.getElementById("qr-color-foreground").value = qr_data.color_ft;
                                document.getElementById("dots-type").value = qr_data.dots_type;
                                document.getElementById("corners-type").value = qr_data.corners_type;
                                new_qr();
                            })
                            .catch(error => {
                                console.error("Erro: " + error);
                            });
                            document.getElementById("qr-new").innerHTML = "Atualizar";
                            $("#qr-value").change(function() {
                            document.getElementById("qr-new").innerHTML = "Gerar";
                            });


                    });
                });
            })
            .catch(error => {
                console.error("Erro: " + error);
            });
    }
</script>