<script type="text/javascript">

    var __dt_categories_list = [];

    <?php foreach ($categories_list as $key => $category) : ?>

        __dt_categories_list.push([

            "<?php echo $category->term_id ?>",
            "<?php echo $category->name ?>"

        ]);
      
    <?php endforeach; ?>

</script>

<?php $category_name_label = mb_strtoupper($category_name_label, 'UTF-8'); ?>

<div class="table-wrapper">

    <div class="toolbar">

        <a id="btnImportProductCategories" class="button button-primary btnImportProductCategories" href="#">
            <?= $import_product_category_file_label ?>
        </a>

    </div>

    <table id="tblProductCategories" class="display" style="width: 100%">

        <thead>

            <tr>

                <th>ID</th>
                <th><?= $category_name_label ?></th>

            </tr>

        </thead>

        <tbody>

        </tbody>
        
    </table>

    <div class="toolbar __foot">

        <div class="update">

            <a id="btnUpdateProductCategories" class="button button-default" href="#">
                <?= $update_label ?>
            </a>

            <span class="recent-update">
                <?= $last_update_label ?>: <span class="time"></span>
            </span>

        </div>

        <!--<div class="export">

            <a id="btnExportShopLists" class="button button-primary" href="#">Export excel file</a>

        </div>-->

    </div>
    
</div>	