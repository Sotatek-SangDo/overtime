<?php
/**
* Created by: sang.do
* Date: 20/09/2017
*/

class Teacher {
    public $name;
    public $age;
    public $level;
    public $information;
    public $image;
    public $table;

    public function __construct()
    {
        $this->table  = 'edu_teachers';
    }
    public function create_table()
    {
        global $wpdb;
        $sql = "CREATE TABLE IF NOT EXISTS `$this->table` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` varchar(255) NOT NULL,
            `image` varchar(255),
            `age` int(3),
            `img_id` int(11),
            `level` varchar(255) NOT NULL,
            `information` longtext
        )";
        $wpdb->query($sql);
    }
    public function getList()
    {
        global $wpdb;
        $sql = "SELECT * FROM `$this->table`";

        $teachers = $wpdb->get_results($sql, ARRAY_A);
        return $teachers;
    }

    public function store($teacher)
    {
        global $wpdb;

        $wpdb->insert($this->table, $teacher);
    }

    public function update($id, $data)
    {
        global $wpdb;

        $wpdb->update($this->table, $data, $id);
    }

    public function show($id)
    {
        global $wpdb;
        $query = "SELECT * FROM `$this->table` WHERE id = " . $id;

        $teachers = $wpdb->get_row($query, ARRAY_A);
        return $teachers;
    }

    public function destroy($id)
    {
        global $wpdb;

        $teachers = $wpdb->delete($this->table, $id);
        return $teachers;
    }
}
