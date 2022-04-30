<div class="evaluate-forms__prds">    
    <?php if ( $user_rating > 0 ) :
            echo "Bạn đã đánh giá sản phẩm này, xin hãy tham gia đánh giá các sản phẩm khác của chúng tôi.";
          endif; ?>
    <?php if ( $user_rating === 0 && !$is_admin_role  ) : ?>
        <h3 class="titles-form__evaluate">Gửi đánh giá của bạn <span class="required">(*)</span></h3>
        <form id="frmRating" method="POST" action="/submit-comments">
            <div class="top-forms__evaluate">
                <textarea id="txtUserReviews" name="txtUserReviews" class="textarea-evaluate__forms txtUserReviews" 
                            rows="3" 
                            placeholder="Đánh giá của bạn về sản phẩm này"></textarea>
            </div>
            <div class="bottoms-forms__evaluate">
                <div class="row gutter-15">
                    <div class="col-lg-12">
                        <div class="star-evaluate__forms">
                            <p class="titles-evaluate__form">Đánh giá <span class="required">(*)</span></p>
                            <div class="star-group__evalues">
                                <div class="rating">
                                    <div class="stars">
                                        <input class="star star-5" id="istar-5" type="radio" value="5" name="rate"> <label class="star star-5" for="istar-5"> </label>
                                        <input class="star star-4" id="istar-4" type="radio" value="4" name="rate"> <label class="star star-4" for="istar-4"></label>
                                        <input class="star star-3" id="istar-3" type="radio" value="3" name="rate"> <label class="star star-3" for="istar-3"></label>
                                        <input class="star star-2" id="istar-2" type="radio" value="2" name="rate"> <label class="star star-2" for="istar-2"></label>
                                        <input class="star star-1" id="istar-1" type="radio" value="1" name="rate"> <label class="star star-1" for="istar-1"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-5">
                        <input type="text" name="txtFullName" placeholder="Tên của bạn (bắt buộc)" class="" required>
                    </div>
                    <div class="col-lg-5">
                        <input type="text" name="txtEmail" placeholder="Email của bạn (không bắt cuộc)" class="">
                    </div>-->
                    <div class="col-lg-2">
                        <button type="submit" name="btnSendComment" class="btn-share__evaluate">Gửi</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="txtRatingPoint" id="txtRatingPoint" value="" />
            <input type="hidden" name="product_id" id="txtProductId" value="<?= $post->ID ?>" />
            <input type="hidden" name="from_product" id="txtFromProduct" value="<?= $_SERVER['REQUEST_URI'] ?>" />
        </form>
    <?php endif; ?>
</div>