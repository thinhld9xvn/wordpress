<div id="col-left">



    <div class="col-wrap">



        <div class="navtab-content">



            <h3>
                <?php echo $themehelper->translate("Thêm ngôn ngữ mới"); ?>
            </h3>



            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">



                <div class="nav-groupbox mtop20">



                    <label for="slqtransLangBox">
                        <?php echo $themehelper->translate("Mời chọn một ngôn ngữ"); ?>
                    </label>



                    <div id="slqtransLangBox" class="slqtransLangBox" data-dropcontainer="true">



                        <span class="qtranslate_e_uibox ui_select_box w95p">



                            <span class="qtranslate_ui_selected_item">

                            </span>



                            <span class="qtranslate_ui_arrow dashicons-before dashicons-arrow-down"></span>



                        </span>



                        <ul class="qtranslate_e_listbox w95p" data-droptarget="true">



                            <?php 

                                foreach ( $languages as $lang ) : 



                                    extract( $lang ); ?>



                                    <li 

                                        data-value="<?php echo $locale; ?>"



                                        data-langname="<?php echo $name["$qtranslate_ui_language"]; ?>" 



                                        data-langcode="<?php echo $code; ?>"



                                        data-langlocale="<?php echo $locale; ?>">



                                        <img class="vmiddle" src="<?php echo $flag_base64; ?>" /> 



                                        <span class="vmiddle">

                                            <?php echo $name["$qtranslate_ui_language"]; ?> - 

                                            <?php echo $locale; ?>

                                        </span>



                                    </li>    



                            <?php endforeach; ?>                                   



                        </ul>



                    </div>                                     



                </div>                   



                <div class="nav-groupbox mtop20">



                    <label for="txtqtransLangName">
                        <?php echo $themehelper->translate("Tên ngôn ngữ"); ?>
                    </label>



                    <input id="txtqtransLangName" class="w95p" type="text" name="txtqtransLangName" readonly="readonly" />



                </div>



                 <div class="nav-groupbox mtop20">



                    <label for="txtqtransLangLocale">
                        <?php echo $themehelper->translate("Mã khu vực"); ?>
                    </label>



                    <input id="txtqtransLangLocale" class="w95p" type="text" name="txtqtransLangLocale" readonly="readonly" />



                </div>





                <div class="nav-groupbox mtop20">



                    <label for="txtqtransLangCode">
                         <?php echo $themehelper->translate("Mã ngôn ngữ"); ?>
                     </label>



                    <input id="txtqtransLangCode" class="w95p" type="text" name="txtqtransLangCode" readonly="readonly" />



                </div>





                <div class="nav-groupbox mtop20">



                    <button class="button button-primary" name="btnNewLanguageSubmit" type="submit">
                        <?php echo $themehelper->translate("Thêm ngôn ngữ"); ?>
                    </button>



                </div>



            </form>



        </div>



    </div>



</div>



<div id="col-right">



    <?php 

        $lang_packages = $_SESSION['qtranslate_languages']; ?>



    <div class="col-wrap">



        <div class="qtranslate-notify pull-right mtop20">



            <?php if ( $lang_packages ) : 



                    echo sizeof( $lang_packages ) . ' ' . $themehelper->translate("ngôn ngữ đã được thêm vào.");



                  else :



                    echo $themehelper->translate("Chưa có ngôn ngữ nào được thêm.");



                 endif; ?>



        </div>



        <div class="clearfix"></div>



        <table class="wp-list-table widefat fixed striped languages mtop35 w100p">



            <thead>



                <tr>



                    <th>

                        <a href="#">
                            <?php echo $themehelper->translate("Cờ ngôn ngữ"); ?>
                        </a>

                    </th>



                    <th>

                        <a href="#">
                            <?php echo $themehelper->translate("Tên ngôn ngữ"); ?>
                        </a>

                    </th>



                    <th>

                        <a href="#">
                            <?php echo $themehelper->translate("Mã khu vực"); ?>
                        </a>

                    </th>



                    <th>

                        <a href="#">
                            <?php echo $themehelper->translate("Mã ngôn ngữ"); ?>
                        </a>

                    </th>



                    <th class="tcenter">   

                        <a href="#">
                            <?php echo $themehelper->translate("Ngôn ngữ mặc định"); ?>
                        </a>

                    </th>



                    <th>

                    </th>



                </tr>



            </thead>



            <tbody>



                <?php 

                    foreach ( $lang_packages as $lang ) : ?>                                



                        <tr>

                            <td>

                                <img class="vmiddle" src="<?php echo $lang_helper->get_flag_language( $lang->locale ); ?>" />

                            </td>



                            <td>

                                <?php echo $lang->name; ?>

                            </td>



                             <td>

                                <?php echo $lang->locale; ?>

                            </td>



                            <td>

                                <?php echo $lang->code; ?>

                            </td>



                            <td class="tcenter"> 



                                <?php if ( 0 == $lang->ldefault ) : ?>



                                    <a href="<?php echo admin_url( "$current_screen->parent_file?page=$this->option_page_url&set_default_lang=$lang->name" ) ?>">
                                        <?php echo $themehelper->translate("Thiết lập mặc định"); ?>
                                    </a>



                                <?php else: ?>



                                    <img class="vmiddle" src="<?php echo DEFAULT_BASE64_SRC ?>" />



                                <?php endif; ?>



                            </td>



                            <td class="tcenter">



                                <a href="<?php echo admin_url( "$current_screen->parent_file?page=$this->option_page_url&remove_lang=$lang->name" ) ?>">

                                    <img class="vmiddle" src="<?php echo REMOVE_BASE64_SRC ?>" />

                                </a>



                            </td>



                        </tr>



                <?php endforeach; ?>

                



            </tbody>



        </table>



    </div>



</div>