<?php

include_once('colors.php');

function italiawp2_css_strip_whitespace($css){
	  $replace = array(
	    "#/\*.*?\*/#s" => "",
	    "#\s\s+#"      => " ",
	  );
	  $search = array_keys($replace);
	  $css = preg_replace($search, $replace, $css);
	  $replace = array(
	    ": "  => ":",
	    "; "  => ";",
	    " {"  => "{",
	    " }"  => "}",
	    ", "  => ",",
	    "{ "  => "{",
	    ";}"  => "}",
	    ",\n" => ",",
	    "\n}" => "}",
	    "} "  => "}\n",
	  );
	  $search = array_keys($replace);
	  $css = str_replace($search, $replace, $css);

	  return trim($css);
}

function italiawp2_dynanic_styles() {
    $color_black = "#000";
    $color_white = "#fff";
    $color_grey_10 = "#f5f5f0";
    $color_grey_15 = "#f6f9fc";
    $color_grey_20 = "#eee";
    $color_grey_30 = "#ddd";
    $color_grey_40 = "#a5abb0";
    $color_grey_50 = "#5a6772";
    $color_grey_60 = "#444e57";
    $color_grey_80 = "#30373d";
    $color_grey_90 = "#1c2024";
    $color_teal_30 = "#00c5ca";
    $color_teal_50 = "#65dcdf";
    $color_teal_70 = "#004a4d";

    $main_color = get_option('italiawp2_main_color', '#06c');
    $main_color_HSL = hex2hsl($main_color);
    //$hex = hsl2hex($main_color_HSL);

    //$color_5 = colorChangeSL($main_color, -50, +50);
    $color_5 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-50/100, $main_color_HSL[2]+50/100 ));

    //$color_10 = colorChangeSL($main_color, -40, +40);
    $color_10 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-40/100, $main_color_HSL[2]+40/100 ));

    //$color_20 = colorChangeSL($main_color, -30, +30);
    $color_20 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-30/100, $main_color_HSL[2]+30/100 ));

    //$color_30 = colorChangeSL($main_color, -20, +20);
    $color_30 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-20/100, $main_color_HSL[2]+20/100 ));

    //$color_40 = colorChangeSL($main_color, -15, +8);
    $color_40 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-15/100, $main_color_HSL[2]+8/100 ));

    $color_50 = $main_color;

    //$color_60 = colorChangeSL($main_color, 0, -5);
    $color_60 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-5/100 ));

    //$color_70 = colorChangeSL($main_color, 0, -10);
    $color_70 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-10/100 ));

    //$color_80 = colorChangeSL($main_color, 0, -15);
    $color_80 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-15/100 ));

    //$color_90 = colorChangeSL($main_color, 0, -20);
    $color_90 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-20/100 ));

    //$color_95 = colorChangeSL($main_color, 0, -25);
    $color_95 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-25/100 ));

    $color_98 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-40/100 ));
    $color_99 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-60/100 ));

    $color_compl = colorCompl($main_color);
    $color_compl_HSL = hex2hsl($color_compl);

    //$color_compl_5 = colorSetSL($color_compl, 20, 95);
    $color_compl_5 = hsl2hex(array($color_compl_HSL[0], (20/100), (95/100) ));

    //$color_compl_10 = colorSetSL($color_compl, 30, 90);
    $color_compl_10 = hsl2hex(array($color_compl_HSL[0], (30/100), (90/100) ));

    //$color_compl_80 = colorSetSL($color_compl, 100, 40);
    $color_compl_80 = hsl2hex(array($color_compl_HSL[0], (100/100), (40/100) ));

    //$color_compl_link_footer = colorSetSL($main_color, 100, 80);
    $color_compl_link_footer = hsl2hex(array($color_compl_HSL[0], (100/100), (80/100) ));

    if (get_option('italiawp2_colore_primario'))
        update_option('italiawp2_colore_primario', $color_50);
    else
        add_option('italiawp2_colore_primario', $color_50);

    if (get_option('italiawp2_colore_primario_chiaro'))
        update_option('italiawp2_colore_primario_chiaro', $color_30);
    else
        add_option('italiawp2_colore_primario_chiaro', $color_30);

    if (get_option('italiawp2_colore_primario_scuro'))
        update_option('italiawp2_colore_primario_scuro', $color_95);
    else
        add_option('italiawp2_colore_primario_scuro', $color_95);

    if (get_option('italiawp2_colore_complementare'))
        update_option('italiawp2_colore_complementare', $color_compl);
    else
        add_option('italiawp2_colore_complementare', $color_compl);

    ob_start();
    include 'style.php';
    $buffer = ob_get_clean();

    echo italiawp2_css_strip_whitespace($buffer);
}

add_action('wp_head', 'italiawp2_dynanic_styles', 99);
