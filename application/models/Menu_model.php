<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getAllMenu()
    {
        // $query = $this->db->get('menu')->result_array();
        $sql = "SELECT MainMenu.menu_id AS Id, MainMenu.menu_name AS Menu, MainMenu.parent_id AS ParentId, (SELECT menu_name FROM menu WHERE menu_id = ParentId) AS Parent,
        count(ChildMenu.menu_id) AS Child, MainMenu.link FROM menu AS MainMenu LEFT JOIN menu AS ChildMenu ON ChildMenu.parent_id = MainMenu.menu_id GROUP BY MainMenu.menu_id, MainMenu.menu_name ORDER BY MainMenu.menu_id ASC";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    public function getAllAkun()
    {
        $query = $this->db->query("SELECT * FROM users JOIN level ON users.id_level= level.id_level ORDER BY username ASC")->result_array();
        return $query;
    }
    public function get_menu_tree($parent_id)
    {
        $sql = " SELECT MainMenu.menu_id, MainMenu.menu_name AS Menu, MainMenu.parent_id AS ParentId, COUNT(ChildMenu.menu_id) as Child, MainMenu.link
		FROM menu AS MainMenu
		LEFT JOIN menu AS ChildMenu ON ChildMenu.parent_id = MainMenu.menu_id
		WHERE MainMenu.parent_id= '$parent_id'
		GROUP BY MainMenu.menu_id, MainMenu.menu_name
		ORDER BY MainMenu.menu_id ASC";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function getAllMenuById($id)
    {
        $sql = "SELECT menu_id, parent_id,menu_name, (SELECT menu_name FROM menu WHERE menu_id = MainMenu.parent_id) AS Parent FROM menu AS MainMenu WHERE menu_id =" . $id;
        $result = $this->db->query($sql)->row_array();
        return $result;
    }

    public function ubahMenu($id)
    {
        $data = [
            'menu_name' => $this->input->post('namamenu'),
        ];
        $this->db->where('menu_id', $id);
        $this->db->update('menu', $data);
    }
    public function getMenuAll()
    {
        $sql = "SELECT MainMenu.menu_id AS Id, MainMenu.menu_name AS Menu, MainMenu.parent_id AS ParentId, (SELECT menu_name FROM menu WHERE menu_id = ParentId) AS Parent,
        count(ChildMenu.menu_id) AS Child, MainMenu.link FROM menu AS MainMenu LEFT JOIN menu AS ChildMenu ON ChildMenu.parent_id = MainMenu.menu_id GROUP BY MainMenu.menu_id, MainMenu.menu_name ORDER BY MainMenu.menu_id ASC";
        return $this->db->query($sql)->result_array();
    }

    public function getMenu($start, $limit)
    {

        // return $this->db->get('menu', $limit, $start)->result_array();
        // return $this->db->query("SELECT * FROM menu LIMIT $start, $limit")->result_array();

        if ($start == NULL) {
            $sql = "SELECT MainMenu.menu_id AS Id, MainMenu.menu_name AS Menu, MainMenu.parent_id AS ParentId, (SELECT menu_name FROM menu WHERE menu_id = ParentId) AS Parent,
        count(ChildMenu.menu_id) AS Child, MainMenu.link FROM menu AS MainMenu LEFT JOIN menu AS ChildMenu ON ChildMenu.parent_id = MainMenu.menu_id GROUP BY MainMenu.menu_id, MainMenu.menu_name ORDER BY MainMenu.menu_id ASC LIMIT $limit";
            return $this->db->query($sql)->result_array();
        } else {
            $sql = "SELECT MainMenu.menu_id AS Id, MainMenu.menu_name AS Menu, MainMenu.parent_id AS ParentId, (SELECT menu_name FROM menu WHERE menu_id = ParentId) AS Parent,
        count(ChildMenu.menu_id) AS Child, MainMenu.link FROM menu AS MainMenu LEFT JOIN menu AS ChildMenu ON ChildMenu.parent_id = MainMenu.menu_id GROUP BY MainMenu.menu_id, MainMenu.menu_name ORDER BY MainMenu.menu_id ASC LIMIT $start,$limit";
            return $this->db->query($sql)->result_array();
        }
        // return $query;
    }
    public function countAllMenu()
    {
        return $this->db->get('menu')->num_rows();
    }
}
