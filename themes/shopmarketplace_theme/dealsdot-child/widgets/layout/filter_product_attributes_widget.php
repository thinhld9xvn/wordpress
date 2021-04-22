<?php
   $livraisons = $_GET['livraisons'];
   $clickandcollect = $_GET['clickandcollect'];  ?>

<div class="widget widget-filter-attributes">
    <h4 class="widget-title">Filtrer</h4>

    <div class="widget-content">
        <div class="filter-box">
            <label>
                <input type="checkbox" 
                        class="chkFilterProductAttributes" 
                        name="livraisons" 
                        value="<?= \Stores\STORE_DATA::YES_VALUE ?>" 
                        <?= $livraisons === \Stores\STORE_DATA::YES_VALUE ? 'checked' : '' ?> />
                <span class="padLeft5">Livraisons</span>
            </label>
        </div>
        <div class="filter-box">
            <label>
                <input type="checkbox" 
                        class="chkFilterProductAttributes" 
                        name="clickandcollect" 
                        value="<?= \Stores\STORE_DATA::YES_VALUE ?>" 
                        <?= $clickandcollect === \Stores\STORE_DATA::YES_VALUE ? 'checked' : '' ?> />
                <span class="padLeft5">Click &amp; Collect</span>
            </label>
        </div>
        <div class="sm mtop10 flex flex-just-end">

            <button id="btnFilterAttributes" class="btn btn-primary btnFilterAttributes" type="submit">
                Filtrer
            </button>

        </div>
    </div>
</div>
