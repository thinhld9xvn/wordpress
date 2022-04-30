! function(e) {
    "function" == typeof define && define.amd ? define("addListingAdmin", e) : e()
}(function() {
    "use strict";
    jQuery(function(t) {
        t(".file-upload-field.multiple-uploads .job-manager-uploaded-files").sortable({
            helper: "clone",
            appendTo: document.body
        }), t('.c27-work-hours .day-wrapper .work-hours-type input[type="radio"]').on("change", function(e) {
            t(this).val();
            t(this).parents(".day-wrapper").removeClass(["day-status-enter-hours", "day-status-closed-all-day", "day-status-open-all-day", "day-status-by-appointment-only"].join(" ")).addClass("day-status-" + t(this).val())
        })
    }), jQuery(function(w) {
        w(".event-picker").each(function() {
            var t = w(this),
                e = t.data("dates"),
                d = t.data("key"),
                a = t.data("limit"),
                l = "no" !== t.data("timepicker"),
                k = t.data("l10n"),
                r = t.find(".dates-list"),
                n = t.find(".date-add-new"),
                i = e.length + 1,
                s = t.find(".datetpl").text();

            function o() {
                var e = t.find(".single-date").length;
                a <= e ? n.hide() : n.show(), e < 1 && p()
            }

            function p() {
                c({
                    start: "",
                    end: "",
                    repeat: !1,
                    frequency: 2,
                    unit: "weeks",
                    until: moment().add(1, "years").locale("en").format("YYYY-MM-DD"),
                    index: i++
                })
            }

            function c(e) {
                var t = w(s.replace(/{date}/g, d + "[" + e.index + "]")),
                    u = t.find(".is-recurring input"),
                    f = t.find(".date-start input"),
                    m = t.find(".date-end input"),
                    h = t.find(".repeat-frequency input"),
                    v = t.find(".repeat-unit"),
                    y = t.find(".repeat-message"),
                    g = t.find(".repeat-end input");

                function a() {
                    if (u.prop("checked")) {
                        var e = f.val(),
                            t = m.val(),
                            a = g.val(),
                            n = parseInt(h.val(), 10),
                            i = v.find("input:checked").val();
                        if (e.length && t.length && a.length && n) {
                            e = moment(e), t = moment(t), (a = moment(a)).set({
                                hour: 23,
                                minute: 59,
                                second: 59
                            }), "weeks" === i && (i = "days", n *= 7), "years" === i && (i = "months", n *= 12);
                            for (var d = Math.abs(e.diff(a, i)), l = Math.floor(d / n), r = [], s = 1; s < Math.min(l + 1, 6); s++) {
                                var o = e.clone().add(n * s, i),
                                    p = t.clone().add(n * s, i);
                                r.push("".concat(o.format(CASE27.l10n.datepicker.format), " - ").concat(p.format(CASE27.l10n.datepicker.format)))
                            }
                            var c = k.next_five.replace("%d", l);
                            l < 1 ? c = k.no_recurrences : l < 5 && (c = k.next_recurrences), y.show().html("<span>".concat(c, "</span><ul><li>").concat(r.join("</li><li>"), "</li></ul>"))
                        } else y.hide()
                    }
                }
                f.val(e.start), m.val(e.end), u.prop("checked", e.repeat), h.val(e.frequency), v.find('input[value="'.concat(e.unit, '"]')).prop("checked", !0), g.val(e.until), e.repeat && t.find(".recurrence").addClass("is-open"), u.on("change", function() {
                    a(), w(this).prop("checked") ? t.find(".recurrence").addClass("is-open") : t.find(".recurrence").removeClass("is-open")
                });
                new MyListing.Datepicker(f, {
                    timepicker: l
                });
                var n = new MyListing.Datepicker(m, {
                        timepicker: l
                    }),
                    i = new MyListing.Datepicker(g);
                e.start && t.find(".date-start").removeClass("date-empty"), e.end && t.find(".date-end").removeClass("date-empty"), f.on("datepicker:change", function(e) {
                    n.setMinDate(moment(e.detail.value)), i.setMinDate(moment(e.detail.value)), a(), e.detail.value ? t.find(".date-start").removeClass("date-empty") : t.find(".date-start").addClass("date-empty")
                }), m.on("datepicker:change", function(e) {
                    a(), e.detail.value ? t.find(".date-end").removeClass("date-empty") : t.find(".date-end").addClass("date-empty")
                }), g.on("datepicker:change", a), h.on("input", a), v.find("input").on("change", a), a(), r.append(t)
            }
            e.forEach(function(e, t) {
                c({
                    start: e.start,
                    end: e.end,
                    repeat: e.repeat,
                    frequency: e.repeat ? e.frequency : 2,
                    unit: e.repeat ? e.unit : "weeks",
                    until: e.repeat ? e.until : moment(e.start).add(1, "years").locale("en").format("YYYY-MM-DD"),
                    index: t
                })
            }), e.length || p(), n.click(function(e) {
                e.preventDefault(), c({
                    start: "",
                    end: "",
                    repeat: !1,
                    frequency: 2,
                    unit: "weeks",
                    until: moment().add(1, "years").locale("en").format("YYYY-MM-DD"),
                    index: i++
                }), o()
            }), w(this).on("click", ".remove-date", function(e) {
                e.preventDefault(), w(this).parents(".single-date").remove(), o()
            }), o()
        })
    }), jQuery(function(d) {
        d(".listing-form-field .file-upload-field").on("click", ".remove-uploaded-file", function(e) {
            e.preventDefault(), d(this).parents(".uploaded-file").remove()
        }), d(".listing-form-field .file-upload-field").on("dblclick", ".uploaded-file", function(e) {
            e.preventDefault(), "hidden" === d(this).find("input").attr("type") ? d(this).find("input").attr("type", "text") : d(this).find("input").attr("type", "hidden")
        }), d(".listing-form-field .listing-file-upload-input").click(function(e) {
            e.preventDefault();
            var a = d(this).parents(".file-upload-field").find(".job-manager-uploaded-files"),
                n = d(this).data("name"),
                i = "yes" === d(this).data("multiple");
            if (d(this).data("file_frame")) d(this).data("file_frame").open();
            else {
                var t = wp.media.frames.file_frame = wp.media({
                    multiple: !0
                });
                t.open(), d(this).data("file_frame", t), t.on("select", function() {
                    t.state().get("selection").each(function(e) {
                        var t;
                        "image" === (e = e.toJSON()).type ? (t = d('\n\t\t<div class="uploaded-file">\n\t\t\t<span class="uploaded-image-preview"></span>\n\t\t\t<a class="remove-uploaded-file"><i class="mi delete"></i></a>\n\t\t\t<input type="hidden" class="input-text">\n\t\t</div>')).find(".uploaded-image-preview").css("background-image", 'url("' + e.url + '")') : (t = d('\n\t\t<div class="uploaded-file">\n\t\t\t<span class="uploaded-file-preview">\n\t\t\t\t<i class="mi insert_drive_file uploaded-file-icon"></i>\n\t\t\t\t<code></code>\n\t\t\t</span>\n\t\t\t<a class="remove-uploaded-file"><i class="mi delete"></i></a>\n\t\t\t<input type="hidden" class="input-text">\n\t\t</div>')).find("code").text(e.filename);
                        t.find("input").attr("name", "current_" + n).val(e.encoded_guid), i ? a.append(t) : a.html(t)
                    })
                })
            }
        })
    }), jQuery(function(a) {
        a(".c27-work-hours .bl-tabs-menu a").on("click", function(e) {
            e.preventDefault();
            var t = a(this).attr("href");
            a(".c27-work-hours .tab-pane").removeClass("active"), a(".c27-work-hours .tab-pane" + t).addClass("active"), a(this).parent().addClass("active").siblings().removeClass("active")
        })
    })
});