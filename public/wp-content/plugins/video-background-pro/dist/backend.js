jQuery(document).ready(function(i){i(function(){i("#vidbg_advanced_options").hide(),i(".cmb2-id-vidbg-metabox-field-advanced-button a").click(function(e){e.preventDefault(),"none"===i("#vidbg_advanced_options").css("display")?(i("#vidbg_advanced_options").show(),i("a.advanced-options-button").text(vidbgpro_localized_text.hide_advanced)):(i("#vidbg_advanced_options").hide(),i("a.advanced-options-button").text(vidbgpro_localized_text.show_advanced))})}),i(function(){i(document).ajaxComplete(function(){function e(e,o,d,t){return!0===d?i(e+'[name="style['+o+']"]').parents().eq(t):i(e+'[name="style['+o+']"]')}i('.so-sidebar select[name="style[vidbg_so_type]"]').length&&("self-host"===e("select","vidbg_so_type",!1).val()&&(e("input","vidbg_so_youtube_url",!0,2).hide(),e("input","vidbg_so_youtube_start",!0,2).hide(),e("input","vidbg_so_youtube_end",!0,2).hide(),e("input","vidbg_so_mp4",!0,2).show(),e("input","vidbg_so_webm",!0,2).show(),e("input","vidbg_so_vimeo_url",!0,2).hide()),"youtube"===e("select","vidbg_so_type",!1).val()&&(e("input","vidbg_so_youtube_url",!0,2).show(),e("input","vidbg_so_youtube_start",!0,2).show(),e("input","vidbg_so_youtube_end",!0,2).show(),e("input","vidbg_so_mp4",!0,2).hide(),e("input","vidbg_so_webm",!0,2).hide(),e("input","vidbg_so_vimeo_url",!0,2).hide()),"vimeo"===e("select","vidbg_so_type",!1).val()&&(e("input","vidbg_so_vimeo_url",!0,2).show(),e("input","vidbg_so_mp4",!0,2).hide(),e("input","vidbg_so_webm",!0,2).hide(),e("input","vidbg_so_youtube_url",!0,2).hide(),e("input","vidbg_so_youtube_start",!0,2).hide(),e("input","vidbg_so_youtube_end",!0,2).hide()),e("select","vidbg_so_type",!1).bind("change",function(o){"self-host"===i(this).val()&&(e("input","vidbg_so_youtube_url",!0,2).hide(),e("input","vidbg_so_youtube_start",!0,2).hide(),e("input","vidbg_so_youtube_end",!0,2).hide(),e("input","vidbg_so_mp4",!0,2).show(),e("input","vidbg_so_webm",!0,2).show(),e("input","vidbg_so_vimeo_url",!0,2).hide()),"youtube"===i(this).val()&&(e("input","vidbg_so_youtube_url",!0,2).show(),e("input","vidbg_so_youtube_start",!0,2).show(),e("input","vidbg_so_youtube_end",!0,2).show(),e("input","vidbg_so_mp4",!0,2).hide(),e("input","vidbg_so_webm",!0,2).hide(),e("input","vidbg_so_vimeo_url",!0,2).hide()),"vimeo"===i(this).val()&&(e("input","vidbg_so_vimeo_url",!0,2).show(),e("input","vidbg_so_mp4",!0,2).hide(),e("input","vidbg_so_webm",!0,2).hide(),e("input","vidbg_so_youtube_url",!0,2).hide(),e("input","vidbg_so_youtube_start",!0,2).hide(),e("input","vidbg_so_youtube_end",!0,2).hide())}),e("input","vidbg_so_overlay",!1).is(":checked")?(e("input","vidbg_so_overlay_color",!0,5).show(),e("input","vidbg_so_overlay_alpha",!0,2).show(),e("input","vidbg_so_overlay_texture_url",!0,3).show()):(e("input","vidbg_so_overlay_color",!0,5).hide(),e("input","vidbg_so_overlay_alpha",!0,2).hide(),e("input","vidbg_so_overlay_texture_url",!0,3).hide()),e("input","vidbg_so_overlay",!1).change(function(o){i(this).is(":checked")?(e("input","vidbg_so_overlay_color",!0,5).show(),e("input","vidbg_so_overlay_alpha",!0,2).show(),e("input","vidbg_so_overlay_texture_url",!0,3).show()):(e("input","vidbg_so_overlay_color",!0,5).hide(),e("input","vidbg_so_overlay_alpha",!0,2).hide(),e("input","vidbg_so_overlay_texture_url",!0,3).hide())}),e("input","vidbg_so_loop",!1).is(":checked")?e("input","vidbg_so_end_frame_poster",!0,3).show():e("input","vidbg_so_end_frame_poster",!0,3).hide(),e("input","vidbg_so_loop",!1).change(function(o){i(this).is(":checked")?e("input","vidbg_so_end_frame_poster",!0,3).show():e("input","vidbg_so_end_frame_poster",!0,3).hide()}),e("input","vidbg_so_enable_loader",!1).is(":checked")?e("input","vidbg_so_loader_bg_poster",!0,3).show():e("input","vidbg_so_loader_bg_poster",!0,3).hide(),e("input","vidbg_so_enable_loader",!1).change(function(o){i(this).is(":checked")?e("input","vidbg_so_loader_bg_poster",!0,3).show():e("input","vidbg_so_loader_bg_poster",!0,3).hide()}))})}),i(function(){var e=".cmb2-id-vidbg-metabox-field-mp4, .cmb2-id-vidbg-metabox-field-webm",o=".cmb2-id-vidbg-metabox-field-youtube-url, .cmb2-id-vidbg-metabox-field-start-sec, .cmb2-id-vidbg-metabox-field-end-sec",d=".cmb2-id-vidbg-metabox-field-vimeo-url";"self-host"===i("#vidbg_metabox_field_type").val()&&i(o+", "+d).hide(),"youtube"===i("#vidbg_metabox_field_type").val()&&i(e+", "+d).hide(),"vimeo"===i("#vidbg_metabox_field_type").val()&&i(e+", "+o).hide(),i("#vidbg_metabox_field_type").bind("change",function(t){"self-host"===i(this).val()&&(i(e).show(),i(o+", "+d).hide()),"youtube"===i(this).val()&&(i(o).show(),i(e+", "+d).hide()),"vimeo"===i(this).val()&&(i(d).show(),i(e+", "+o).hide())})}),i(function(){i("#vidbg_metabox_field_no_loop1, #vidbg_metabox_field_no_loop2").bind("change",function(e){i("#vidbg_metabox_field_no_loop1").is(":checked")?i(".cmb2-id-vidbg-metabox-field-end-poster").hide():i("#vidbg_metabox_field_no_loop2").is(":checked")&&i(".cmb2-id-vidbg-metabox-field-end-poster").show()}).trigger("change")}),i(function(){i("#vidbg_metabox_field_overlay1, #vidbg_metabox_field_overlay2").bind("change",function(e){i("#vidbg_metabox_field_overlay1").is(":checked")?(i(".cmb2-id-vidbg-metabox-field-overlay-color, .cmb2-id-vidbg-metabox-field-overlay-alpha, .cmb2-id-vidbg-metabox-field-overlay-texture").hide(),i(".postbox-container .cmb-row:not(:last-of-type).cmb2-id-vidbg-metabox-field-overlay").css({"border-bottom":"1px solid #e9e9e9"})):i("#vidbg_metabox_field_overlay2").is(":checked")&&(i(".cmb2-id-vidbg-metabox-field-overlay-color, .cmb2-id-vidbg-metabox-field-overlay-alpha, .cmb2-id-vidbg-metabox-field-overlay-texture").show(),i(".postbox-container .cmb-row:not(:last-of-type).cmb2-id-vidbg-metabox-field-overlay").css({"border-bottom":"0"}))}).trigger("change")}),i(".cmb-type-vidbg-slider").each(function(){var e=i(this),o=e.find(".vidbg-slider-field-value"),d=e.find(".vidbg-slider-field"),t=e.find(".vidbg-slider-field-value-text"),_=o.data();d.slider({range:"min",value:_.start,min:_.min,animate:"fast",max:_.max,slide:function(i,e){o.val(e.value),t.text(e.value)}}),o.val(d.slider("value")),t.text(d.slider("value")),e.css({visibility:"visible"})}),jQuery(document).on("click",".vidbgpro-admin-notice .notice-dismiss",function(){jQuery.ajax({url:ajaxurl,data:{action:"vidbgpro_dismiss_notices"}})})});