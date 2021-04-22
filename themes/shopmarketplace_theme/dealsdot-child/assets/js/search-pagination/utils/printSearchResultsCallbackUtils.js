export function printSearchResultsCallback(data, pagination) {

    let html = '';

    if (data.length > 0) {

        data.forEach(product => {

            html += `
                <div class="product">

                    <div class="product-image">
        
                        <div class="image">
        
                            <a href="${product['permalink']}">

                                ${product['featured_image']}                
                                
                            </a>
        
                        </div>
                        
                    </div>
        
                    <div class="product-info text-left">
        
                        <h3 class="name">
        
                            <a href="${product['permalink']} ">
                                ${product['name']} 
                            </a>
        
                        </h3>

                        <div class="store-info tcenter">
                                <strong>Produit proposé par: <a href="${product['url_shop_name']}">${product['shop_name']}</a></strong>
                            </div>
        
                        <div class="product-price">
                            <span class="price">
                                    ${product['price_html']} 
                            </span>
                        </div>

                    </div>

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">							
                                <li class="lnk wishlist">
                                    <div class="tinv-wraper woocommerce tinv-wishlist tinvwl-shortcode-add-to-cart" data-product_id="${product['id']}">
                                        <div class="tinv-wishlist-clear"></div>
                                        <a
                                            role="button"
                                            aria-label="Add to Wishlist"
                                            class="tinvwl_add_to_wishlist_button tinvwl-icon-heart tinvwl-position-after"
                                            data-tinv-wl-list="[${product['id']}]"
                                            data-tinv-wl-product="${product['id']}"
                                            data-tinv-wl-productvariation="0"
                                            data-tinv-wl-productvariations="[0]"
                                            data-tinv-wl-producttype="simple"
                                            data-tinv-wl-action="add"
                                        >
                                            <span class="tinvwl_add_to_wishlist-text">Add to Wishlist</span>
                                        </a>
                                        <div class="tinv-wishlist-clear"></div>
                                        <div class="tinvwl-tooltip">Add to Wishlist</div>
                                    </div>
                                </li>							
                            </ul>
                        </div>
                    </div>               
                    
        
                </div>
            `;


        });

        jQuery('.product-lists').html(html);

    } else {

        html = `<div class="empty-lists-box">Désolé, nous n'avons trouvé aucun produit correspondant à ces critères ...</div>`;

        jQuery('#results').html(html);

    }

}