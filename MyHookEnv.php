<?php

/*
Plugin Name: My Hook Env
Description: Overrides the hooks in my test environment
Version: 0.1a
Author: Dennis Ploetner 
Author URI: http://lloc.de/
*/

/*
Copyright 2011  Dennis Ploetner  (email : re@lloc.de)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function my_msls_blog_collection_get( $objects ) {
    $object   = array( 1 => 'Override English', 2 => 'Override Deutsch', );
    return $objects;
}
add_filter( 'msls_blog_collection_construct', 'my_msls_blog_collection_get' );

?>
