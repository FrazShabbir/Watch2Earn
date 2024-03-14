// ************* Tooltip close button **************
$(".close_btn").click(function() {
    $(".tool_div").css('display', 'none');
});
// ======================================
//      Cover Card Text
// ======================================
    // ************* Tooltip Display **************
        $("#cover_heading").on('keyup keydown change click', function() {
            $(".heading_style_tooltip, .cover_sub_text_style_tooltip, .body_style_tooltip, .footer_style_tooltip")
                .css('display', 'none');
            $(".cover_heading_style_tooltip").css('display', 'block');
        });

        $("#cover_sub_text").on('keyup keydown change click', function() {
            $(".heading_style_tooltip, .cover_heading_style_tooltip, .body_style_tooltip, .footer_style_tooltip")
                .css('display', 'none');
            $(".cover_sub_text_style_tooltip").css('display', 'block');
        });

    // ************* Font Family **************
        $(".cover_heading_font_style").on('change', function() {
            $("#cover_heading").css('font-family', $(this).val());
        });
        $(".cover_sub_text_font_style").on('change', function() {
            $("#cover_sub_text").css('font-family', $(this).val());
        });

    // ************* Font Size **************
        $(".cover_heading_font_size").on('change', function() {
            $("#cover_heading").css('font-size', $(this).val());
        });
        $(".cover_sub_text_font_size").on('change', function() {
            $("#cover_sub_text").css('font-size', $(this).val());
        });

    // ************* Color Picker **************
        $('#cover_heading_colorpicker').on('input', function() {
            $('#cover_heading_hexcolor').val(this.value);
            $("#cover_heading").css('color', $('#cover_heading_hexcolor').val());
        });
        $('#cover_heading_hexcolor').on('input', function() {
            $('#cover_heading_colorpicker').val(this.value);
            $("#cover_heading").css('color', $('#cover_heading_hexcolor').val());
        });

        $('#cover_sub_text_colorpicker').on('input', function() {
            $('#cover_sub_text_hexcolor').val(this.value);
            $("#cover_sub_text").css('color', $('#cover_sub_text_hexcolor').val());
        });
        $('#cover_sub_text_hexcolor').on('input', function() {
            $('#cover_sub_text_colorpicker').val(this.value);
            $("#cover_sub_text").css('color', $('#cover_sub_text_hexcolor').val());
        });

        // ************* Text Alignment **************

            $('#cover_heading_align_left').click(function() {
                $('.cover_heading').css('text-align', 'left');
                $('#cover_heading_alignment').val('left');
            });
            $('#cover_heading_align_center').click(function() {
                $('.cover_heading').css('text-align', 'center');
                $('#cover_heading_alignment').val('center');

            });
            $('#cover_heading_align_right').click(function() {
                $('.cover_heading').css('text-align', 'right');
                $('#cover_heading_alignment').val('right');

            });

            $('#cover_sub_text_align_left').click(function() {
                $('.cover_sub_text').css('text-align', 'left');
                $('#cover_sub_text_alignment').val('left');
            });
            $('#cover_sub_text_align_center').click(function() {
                $('.cover_sub_text').css('text-align', 'center');
                $('#cover_sub_text_alignment').val('center');
            });
            $('#cover_sub_text_align_right').click(function() {
                $('.cover_sub_text').css('text-align', 'right');
                $('#cover_sub_text_alignment').val('right');
            });


// ======================================
//      Inner Card Text
// ======================================
    // ************* Tooltip Display **************
        $("#heading_text").on('keyup keydown change click', function() {
            $(".body_style_tooltip, .footer_style_tooltip, .heading_style_tooltip, .cover_heading_style_tooltip")
                .css('display', 'none');
            $(".heading_style_tooltip").css('display', 'block');
        });

        $("#body_text").on('keyup keydown change click', function() {
            $(".heading_style_tooltip, .footer_style_tooltip, .heading_style_tooltip, .cover_heading_style_tooltip")
                .css('display', 'none');
            $(".body_style_tooltip").css('display', 'block');
        });

        $("#footer_text").on('keyup keydown change click', function() {
            $(".heading_style_tooltip, .body_style_tooltip, .heading_style_tooltip, .cover_heading_style_tooltip")
                .css('display', 'none');
            $(".footer_style_tooltip").css('display', 'block');
        });

    // ************* Font Family **************
        $(".font-action").on('change', function() {
            $(".heading_text").css('font-family', $(this).val());
        });
        $(".body-font-action").on('change', function() {
            $(".body_text").css('font-family', $(this).val());
        });
        $(".footer-font-action").on('change', function() {
            $(".footer_text").css('font-family', $(this).val());
        });

    // ************* Font Size **************
        $(".font_size").on('change', function() {
            $(".heading_text").css('font-size', $(this).val());
        });
        $(".body_font_size").on('change', function() {
            $(".body_text").css('font-size', $(this).val());
        });
        $(".footer_font_size").on('change', function() {
            $(".footer_text").css('font-size', $(this).val());
        });

    // ************* Color Picker **************
        $('#heading_colorpicker').on('input', function() {
            $('#heading_hexcolor').val(this.value);
            $("#heading_text").css('color', $('#heading_hexcolor').val());
        });
        $('#heading_hexcolor').on('input', function() {
            $('#heading_colorpicker').val(this.value);
            $("#heading_text").css('color', $('#heading_hexcolor').val());
        });
        $('#body_colorpicker').on('input', function() {
            $('#body_hexcolor').val(this.value);
            $("#body_text").css('color', $('#body_hexcolor').val());
        });
        $('#body_hexcolor').on('input', function() {
            $('#body_colorpicker').val(this.value);
            $("#body_text").css('color', $('#body_hexcolor').val());
        });
        $('#footer_colorpicker').on('input', function() {
            $('#footer_hexcolor').val(this.value);
            $("#footer_text").css('color', $('#footer_hexcolor').val());
        });
        $('#footer_hexcolor').on('input', function() {
            $('#footer_colorpicker').val(this.value);
            $("#footer_text").css('color', $('#footer_hexcolor').val());
        });

    // ************* Text Alignment **************
        $('#heading_align_left').click(function() {
            $('.heading_text').css('text-align', 'left');
            $('#heading_alignment').val('left');
        });
        $('#heading_align_center').click(function() {
            $('.heading_text').css('text-align', 'center');
            $('#heading_alignment').val('center');
        });
        $('#heading_align_right').click(function() {
            $('.heading_text').css('text-align', 'right');
            $('#heading_alignment').val('right');
        });

        $('#body_align_left').click(function() {
            $('.body_text').css('text-align', 'left');
            $('#body_alignment').val('left');
        });
        $('#body_align_center').click(function() {
            $('.body_text').css('text-align', 'center');
            $('#body_alignment').val('center');
        });
        $('#body_align_right').click(function() {
            $('.body_text').css('text-align', 'right');
            $('#body_alignment').val('right');
        });

        $('#footer_align_left').click(function() {
            $('.footer_text').css('text-align', 'left');
            $('#footer_alignment').val('left');
        });
        $('#footer_align_center').click(function() {
            $('.footer_text').css('text-align', 'center');
            $('#footer_alignment').val('center');
        });
        $('#footer_align_right').click(function() {
            $('.footer_text').css('text-align', 'right');
            $('#footer_alignment').val('right');
        });
