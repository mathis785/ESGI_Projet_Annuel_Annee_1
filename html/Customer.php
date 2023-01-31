<?php
  class Customer {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }


    public function getCustomers() {
      $this->db->query('SELECT * FROM users ORDER BY created_at DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }