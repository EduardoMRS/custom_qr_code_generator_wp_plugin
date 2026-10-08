<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<style>
    div.btn {
        background: #ababab;
        border-radius: 4px;
        transition: 1s;
    }

    div.btn:hover {
        transition: 1s;
    }

    .qr-code-delete {
        background: #FF5722 !important;
        color: white;
        text-shadow: 0px 0px 3px black;
    }

    .qr-code-delete:hover {
        background: #b70505 !important;
        color: #939393;
        text-shadow: 0px 0px 15px black;
    }

    div.color-qr-block {
        width: 100%;
        border-radius: 14px;
        box-shadow: inset 0px 0px 4px 0px black;
    }
</style>
<div class="row justify-content-center gap-1">
    <?php
    include_once("../../wp-load.php");
    global $wpdb;

    $query_select = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}qr_generator");
    if ($query_select) {
        foreach ($query_select as $line) {
    ?>
            <div class="d-flex justify-content-between">
                <div class="col-11 btn qr-code-select" data-value-qr="<?php echo $line->id; ?>">
                    <div class="row justify-content-between">
                        <div class="col-sm-auto text-start"><?php echo $line->name; ?></div>
                        <div class="col-sm-2 d-flex flex-row gap-2 px-2" style="padding: 2px;">
                            <div class="col"><?php echo $line->size; ?>px</div>
                            <div class="color-qr-block" style="background: <?php echo $line->color_bk; ?>;"></div>
                            <div class="color-qr-block" style="background: <?php echo $line->color_ft; ?>;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-auto d-flex flex-wrap align-items-center btn qr-code-delete" onclick="qr_select_delete(<?php echo $line->id; ?>)">
                    <i class="fa-solid fa-trash"></i>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>