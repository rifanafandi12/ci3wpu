<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Menu_Model extends CI_Model
{
    public function getSubMenu()
    {
        // select * dari table sub_menu dan namanya saja dari table menu
        $query = "  SELECT user_sub_menu.*,user_menu.menu
                    FROM user_sub_menu JOIN user_menu
                    ON user_sub_menu.menu_id = user_menu.id
        ";
        return  $this->db->query($query)->result_array();
    }
}
