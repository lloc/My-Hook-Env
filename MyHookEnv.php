<?php

/*
Plugin Name: My Hook Env
Description: Overrides the hooks in my test environment
Version: 0.1
Author: Dennis Ploetner 
Author URI: http://lloc.de/
*/

/**
 * Example - How to filter the blog collection
 * 
 * @param array $arr
 * @return array
 */ 
function my_msls_blog_collection_get( $arr ) {
    /*
     * Resets the parameter
     */
    $arr = array();
    /*
     * Creates a collection with just 2 blogs ( blog_id == 1 and blog_id == 2 )
     */ 
    foreach ( array( 1, 2, ) as $id ) {
        $arr[$id] = get_blog_details( $id );
    }
    return $arr;
}
add_filter( 'msls_blog_collection_construct', 'my_msls_blog_collection_get' );

/**
 * Example - How to filter the output of the links in the frontend
 * 
 * @param string $url
 * @param MslsLink $link
 * @param bool $current
 * @return string
 */
function my_msls_output_get( $url, $link, $current ) {
    return sprintf(
        /*
         * Returns the same html code like MslsOutput
         */
        '<a href="%s" title="%s"%s>%s</a>',
        /*
         * Uses just the path instead of the complete URL
         */ 
        parse_url( $url, PHP_URL_PATH ),
        /*
         * $link is an instance of MslsLink
         */
        $link->txt,
        /*
         * Changes the class for the current element too
         */
        ( $current ? ' class="current"' : '' ),
        /*
         * Class MslsLink has defined a __toString-method
         */  
        $link
    );
}
add_filter( 'msls_output_get', 'my_msls_output_get', 10, 3 );

?>
