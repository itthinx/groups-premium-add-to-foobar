<?php
/**
 * groups-premium-add-to-foobar.php
 *
 * Copyright (c) 2014 "kento" Karim Rahimpur www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author Karim Rahimpur
 * @package groups-premium-add-to-foobar
 * @since 1.0.0
 *
 * Plugin Name: Groups Premium add to Foobar
 * Plugin URI: http://www.itthinx.com/plugins/groups
 * Description: An example of how to add users to another group when they join a group.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: http://www.itthinx.com
 * Donate-Link: http://www.itthinx.com
 * License: GPLv3
 */


// References:
// http://www.itthinx.com/documentation/groups/api/actions/
// http://api.itthinx.com/groups/class-Groups_User_Group.html

add_action( 'groups_created_user_group', 'gpatf_groups_created_user_group', 10, 2 );

function gpatf_groups_created_user_group( $user_id, $group_id ) {
  if ( $premium_group = Groups_Group::read_by_name( 'Premium' ) ) {
    if ( $premium_group->group_id == $group_id ) {
      if ( $foobar_group = Groups_Group::read_by_name( 'Foobar' ) ) {
        Groups_User_Group::create( array( 'user_id' => $user_id, 'group_id' => $foobar_group->group_id ) );
      }
    }
  }
}
