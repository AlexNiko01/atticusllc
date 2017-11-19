<?php
function enfold_child_styles()
{
    wp_enqueue_script('jquery.dropdown', get_stylesheet_directory_uri() . '/js/jquery.dropdown.min.js', array(), true, true);

    wp_enqueue_style('style-child', get_stylesheet_directory_uri() . '/css/custom.css', null, null);
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', array(), true, true);
    wp_localize_script('main', 'global',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}

add_action('wp_enqueue_scripts', 'enfold_child_styles', 100);


add_shortcode('search_form', function () {
    return get_search_form(false);
});
if (function_exists('acf_add_options_page')) {

    $option_page = acf_add_options_page(array(
        'page_title' => 'Options',
        'menu_title' => 'Options',
        'menu_slug' => 'theme-general-options',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

}


//add_filter('iwm_input','mmmy_custom_map_input');

function mmmy_custom_map_input($input)
{

    /* Conditional tag to populate the map automatically, if using CUSTOM POST TYPE as source */
    var_dump($input);
    $oldInput = $input;
    if ($input == 'my_custom_map_data') {

        //EDIT HERE

        $cpt_id = 'product';
        $region_code_meta = 'wpcf-regioncode'; //custom meta field name to fetch region code;

        /*
        OR If you're using coordinates, you'll need 2 fields
        $region_code_meta = array('wpcf-lat','wpcf-lon');
        */

        $tooltip_meta = 'wpcf-tooltip'; //custom meta field name to fetch tooltip info;
        $color_meta = 'wpcf-color'; //cutom meta field name to fetch color codes

        //AVOID EDIT BELOW

        $input = '';

        $args = array(
            'post_type' => $cpt_id,
        );

        $cpt = new WP_Query($args);

        // The Loop
        if ($cpt->have_posts()) {

            while ($cpt->have_posts()) : $cpt->the_post();

                if (is_array($region_code_meta)) {
                    $regioncode = get_post_meta(get_the_ID(), $region_code_meta[0], true) . ' ' . get_post_meta(get_the_ID(), $region_code_meta[1], true);
                } else {
                    $regioncode = get_post_meta(get_the_ID(), $region_code_meta, true);
                }

                $tooltiptitle = get_the_title();
                $tooltipinfo = get_post_meta(get_the_ID(), $tooltip_meta, true);;
                $actionvalue = do_shortcode(get_the_content());
                $colorcode = get_post_meta(get_the_ID(), $color_meta, true);

                //to clean the content from commas (,) and semi-colons (;)
                $oreplace = array(",", ";");
                $ofinal = array("&#44", "&#59");
                $actionvalue = str_replace($oreplace, $ofinal, $actionvalue);

                //model: Region Code, Tooltip Title, Tooltip info, Action Value (URL), Color Code;
                $input .= $regioncode . ',' . $tooltiptitle . ',' . $tooltipinfo . ',' . $actionvalue . ',' . $colorcode . ';';

            endwhile;

        }

        /* Restore original Post Data */
        wp_reset_postdata();

    }

    return $oldInput;

}


function get_US_list()
{
    return ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virg"];
}

function no_post_nav($entries)
{
    if (get_post_type() == 'product') $entries = array();
    return $entries;
}

add_filter('avia_post_nav_entries', 'no_post_nav');

function setColor($pesticide_classification)
{
    $color = '';
    if ($pesticide_classification == 'Fungicide') {
        $color = '#236192';
    } else if ($pesticide_classification == 'Herbicide') {
        $color = '#006747';
    } else if ($pesticide_classification == 'Insecticide') {
        $color = '#7C2529';
    }
    return $color;
}

function register_endpoint($action, $callback)
{
    add_action('wp_ajax_' . $action, $callback);
    add_action('wp_ajax_nopriv_' . $action, $callback);
}


function search_products()
{
    $data = $_POST;
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'meta_query' => [
            'relation' => 'AND'
        ]
    );

    if (isset($data['market'])) {
        $args['meta_query'][] = [
            'key' => 'market',
            'value' => (array)$data['market'],
            'compare' => 'IN'
        ];
    }

    if (isset($data['pesticide_classification'])) {
        $args['meta_query'][] = [
            'key' => 'pesticide_classification',
            'value' => (array)$data['pesticide_classification'],
            'compare' => 'IN'
        ];
    }

    if (isset($data['state'])) {
        $args['meta_query'][] = [
            'key' => 'state',
            'value' => (array)$data['state'],
            'compare' => 'IN'
        ];
    }

    if (isset($data['key_uses'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'post_tag',
                'terms' => (array)$data['key_uses'],
            ]
        ];
    }

    $result = [
        'Fungicide' => [
            'color' => '#236192',
            'posts' => []
        ],

        'Herbicide' => [
            'color' => '#006747',
            'posts' => []
        ],

        'Insecticide' => [
            'color' => '#7C2529',
            'posts' => []
        ]
    ];

    $query = new WP_Query($args);
    $products = $query->posts;
    foreach ($products as $product) {
        $current_post = [
            'product_logo' => '',
            'active_ingredient' => '',
            'compare_to' => 'clipper',
            'downloads' => [],
            'link' => ''
        ];
        $product_logo = get_field('logo', $product->ID);
        if(is_array($product_logo)){
            $current_post['product_logo'] = $product_logo['url'];
        }

        $chemical_details = get_field('chemical_details', $product->ID);
        if (isset($chemical_details['active_ingredient'])) {
            $current_post['active_ingredient'] = $chemical_details['active_ingredient'];
        }
        $current_post['downloads']['product_brochure_pdf'] = get_field('product_brochure_pdf', $product->ID);
        $current_post['downloads']['specimen_label'] = get_field('specimen-label', $product->ID);
        $current_post['downloads']['sds_href'] = get_field('sds-href', $product->ID);
        $current_post['plink'] = get_permalink($product->ID);
        $pesticide_classification = get_field('pesticide_classification', $product->ID);

        if(isset($result[$pesticide_classification])){
            $result[$pesticide_classification]['posts'][] = $current_post;
        }
    }
    echo json_encode($result);
    wp_die();
}

register_endpoint('search_products', 'search_products');