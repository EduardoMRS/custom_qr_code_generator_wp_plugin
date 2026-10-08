<script>
    function qr_select_delete(cod_del) {
        showLoader();
        hideLoader(2000);

        fetch("./componet/delete.php?cod_del=" + cod_del)
            .then(response => {
                if (response.ok) {
                    load_table_qr();
                } else {
                    throw new Error("Erro na solicitação.");
                }
            })
    }
</script>