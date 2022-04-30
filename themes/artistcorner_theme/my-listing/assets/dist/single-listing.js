! function(t) {
    "function" == typeof define && define.amd ? define("singleListing", t) : t()
}(function() {
    "use strict";
    var a, s, n, t, i, e;
    MyListing.Helpers.css_escape = function(t) {
            if (0 == arguments.length) throw new TypeError("`CSS.escape` requires an argument.");
            for (var i, e = String(t), n = e.length, a = -1, s = "", o = e.charCodeAt(0); ++a < n;) 0 != (i = e.charCodeAt(a)) ? s += 1 <= i && i <= 31 || 127 == i || 0 == a && 48 <= i && i <= 57 || 1 == a && 48 <= i && i <= 57 && 45 == o ? "\\" + i.toString(16) + " " : (0 != a || 1 != n || 45 != i) && (128 <= i || 45 == i || 95 == i || 48 <= i && i <= 57 || 65 <= i && i <= 90 || 97 <= i && i <= 122) ? e.charAt(a) : "\\" + e.charAt(a) : s += "�";
            return s
        }, jQuery(function(n) {
            var t = {
                postid: n("#case27-post-id").val(),
                authid: n("#case27-author-id").val()
            };

            function a(i) {
                ! function(t) {
                    t.contents.hide(), t.pagination.hide(), t.loader.show()
                }(i), n.ajax({
                    url: CASE27.mylisting_ajax_url + "&action=get_related_listings",
                    type: "GET",
                    dataType: "json",
                    data: {
                        listing_id: t.postid,
                        page: i.page,
                        field_key: i.field_key
                    },
                    success: function(t) {
                        i.contents.html(t.html), i.pagination.html(t.pagination), i.menu_spinner.hide(), i.counter.html(t.formatted_count).removeClass("hide"),
                            function(t) {
                                t.loader.hide(), t.contents.fadeIn(150), t.pagination.fadeIn(150)
                            }(i), setTimeout(function() {
                                jQuery(".lf-background-carousel").owlCarousel({
                                    margin: 20,
                                    items: 1,
                                    loop: !0
                                }), jQuery('[data-toggle="tooltip"]').tooltip({
                                    trigger: "hover"
                                })
                            }, 10)
                    }
                })
            }
            n(".toggle-tab-type-related_listings").each(function(t, i) {
                var e = {};
                e.menu = n(this), e.id = e.menu.data("section-id"), e.section = n("#listing_tab_" + e.id), e.field_key = e.menu.data("options").field_key, e.loader = e.section.find(".tab-loader"), e.contents = e.section.find(".tab-contents"), e.pagination = e.section.find(".tab-pagination"), e.counter = e.menu.find(".items-counter"), e.menu_spinner = e.menu.find(".tab-spinner"), e.page = 0, a(e), e.pagination.on("click", "a", function(t) {
                    t.preventDefault(), e.page = parseInt(n(this).data("page"), 10) - 1, a(e)
                })
            })
        }), jQuery(function(n) {
            var t = {
                postid: n("#case27-post-id").val(),
                authid: n("#case27-author-id").val()
            };

            function a(i) {
                ! function(t) {
                    t.contents.hide(), t.pagination.hide(), t.loader.show()
                }(i), n.ajax({
                    url: CASE27.ajax_url + "?action=mylisting_get_products&security=" + CASE27.ajax_nonce,
                    type: "POST",
                    dataType: "json",
                    data: {
                        products: i.products,
                        page: i.page,
                        author_id: t.authid
                    },
                    success: function(t) {
                        i.contents.html(t.html), i.pagination.html(t.pagination), i.counter.html(t.formatted_count),
                            function(t) {
                                t.loader.hide(), t.contents.fadeIn(150), t.pagination.fadeIn(150)
                            }(i)
                    }
                })
            }
            n(".toggle-tab-type-store").each(function(t, i) {
                var e = {};
                e.menu = n(this), e.id = e.menu.data("section-id"), e.section = n("#listing_tab_" + e.id), e.loader = e.section.find(".store-loader"), e.contents = e.section.find(".store-contents"), e.pagination = e.section.find(".store-pagination"), e.counter = e.menu.find(".items-counter"), e.products = e.menu.data("options").products, e.page = 0, a(e), e.pagination.on("click", "a", function(t) {
                    t.preventDefault(), e.page = parseInt(n(this).data("page"), 10) - 1, a(e)
                })
            })
        }), a = jQuery, s = a(".listing-tab-toggle").first().data("section-id"), a(".listing-tab-toggle").on("click", function(t) {
            t.preventDefault(), a(".profile-menu li.active").removeClass("active"), a(this).parent().addClass("active");
            var i = a(".listing-tab.tab-active"),
                e = a(this).data("section-id"),
                n = a(".listing-tab#listing_tab_" + MyListing.Helpers.css_escape(e));
            if (i.attr("id") === "listing_tab_" + e) return i.addClass("tab-same"), void setTimeout(function() {
                i.removeClass("tab-same")
            }, 100);
            i.addClass("tab-hiding"), setTimeout(function() {
                i.removeClass("tab-active tab-hiding").addClass("tab-hidden"), n.addClass("tab-showing"), setTimeout(function() {
                    n.removeClass("tab-hidden tab-showing").addClass("tab-active").trigger("mylisting:single:tab-switched"), jQuery(document).trigger("mylisting/single:tab-switched")
                }, 25)
            }, 200), !0 !== MyListing.isListingPreview && history.replaceState(null, null, s === e ? " " : "#" + e)
        }), (n = jQuery)(".qa-internal-link a").on("click", function(t) {
            var i = n(this).attr("href"),
                e = n('.listing-tab-toggle[data-section-id="' + MyListing.Helpers.css_escape(i.substring(1)) + '"]');
            e.length && e.click()
        }), t = jQuery, i = window.location.hash.substr(1), e = t(".listing-tab-toggle#listing_tab_" + MyListing.Helpers.css_escape(i) + "_toggle"), i.length && e.length ? e.first().click() : t(".listing-tab-toggle").first().click(),
        function(t) {
            t(".listing-tab.tab-layout-masonry").on("mylisting:single:tab-switched", function() {
                if (!t(this).hasClass("pre-init")) return t(this).find(".listing-tab-grid").isotope("layout");
                t(this).removeClass("pre-init").find(".listing-tab-grid").isotope(t("body").hasClass("rtl") ? {
                    originLeft: !1
                } : {})
            });
            var e = MyListing.Helpers.debounce(function() {
                t(".listing-tab.tab-layout-masonry:not(.pre-init) .listing-tab-grid").isotope("layout")
            }, 100);
            t(".listing-tab.tab-layout-masonry .grid-item").each(function(t, i) {
                new ResizeSensor(i, e)
            })
        }(jQuery), jQuery(function(s) {
            ! function() {
                if (s("#report-listing-modal").length) {
                    var i = s("#report-listing-modal"),
                        e = i.find(".validation-message"),
                        n = s("#case27-post-id").val();
                    i.find(".report-submit").on("click", function(t) {
                        t.preventDefault(), e.hide(), i.find(".sign-in-box").addClass("cts-processing-login"), s.ajax({
                            url: CASE27.ajax_url + "?action=report_listing&security=" + CASE27.ajax_nonce,
                            type: "POST",
                            dataType: "json",
                            data: {
                                listing_id: n,
                                content: i.find(".report-content").val()
                            },
                            success: function(t) {
                                i.find(".sign-in-box").removeClass("cts-processing-login"), "error" === t.status && e.html("<em>" + t.message + "</em>").show(), "success" === t.status && i.find(".report-wrapper").html('<div class="submit-message"><em>' + t.message + "</em></div>")
                            }
                        })
                    })
                }
            }(), s(".comments-list .comment .review-galleries .gallery-item img").on("click", function(t) {
                t.preventDefault();
                var e = [],
                    n = this,
                    a = 0;
                s(this).parents(".review-galleries").find(".gallery-item img").each(function(t, i) {
                    if (!i.dataset.fullSizeSrc || !i.dataset.fullSizeWidth || !i.dataset.fullSizeHeight) return !1;
                    i.dataset.fullWidth = i.dataset.fullSizeWidth, i.dataset.fullHeight = i.dataset.fullSizeHeight, e.push({
                        src: i.dataset.fullSizeSrc,
                        w: i.dataset.fullWidth || 0,
                        h: i.dataset.fullHeight || 0,
                        el: i
                    }), i == n && (a = t)
                }), new MyListing.PhotoSwipe(e, a)
            })
        }),
        function() {
            var i = document.querySelector(".listing-main-info"),
                e = document.querySelector(".main-info-desktop"),
                n = document.querySelector(".main-info-mobile"),
                t = window.matchMedia("(max-width: 1200px)");
            if (i && e && n) {
                t.matches && n.appendChild(i);
                var a = function(t) {
                    t.matches ? n.appendChild(i) : e.appendChild(i)
                };
                "function" == typeof t.addEventListener ? t.addEventListener("change", a) : t.addListener(a)
            }
        }(), jQuery(function(s) {
            var o = s("#case27-post-id").val();
            s(".comments-list-wrapper").each(function(t, i) {
                var e = (i = s(i)).data("current-page"),
                    n = i.data("page-count"),
                    a = 1 < e ? "lower" : "upper";
                i.on("click", ".nav-links .load-more", function(t) {
                    t.preventDefault(), "upper" == a ? e++ : e--, i.addClass("loading-comments"), s.get(CASE27.mylisting_ajax_url, {
                        action: "list_comments",
                        page: e,
                        post_id: o,
                        page_count: n,
                        direction: a
                    }, function(t) {
                        "string" == typeof t && ('<ul class="comments-list"></ul>' === t || t.length < 10 ? i.find(".nav-links .load-more").hide() : i.find("ul.comments-list").append(s(t).children())), i.removeClass("loading-comments"), ("lower" == a && e <= 1 || "upper" == a && n <= e) && i.find(".nav-links .load-more").hide()
                    })
                })
            })
        }), jQuery(function(i) {
            i(".hide-notification").click(function(t) {
                t.preventDefault(), i(t.target).parents(".listing-notifications").hide()
            })
        })
});