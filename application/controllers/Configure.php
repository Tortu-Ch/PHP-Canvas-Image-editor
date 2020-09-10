<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Configure extends CI_Controller
    {
        public function __construct()
        {
            parent:: __construct();
        }

        Public function index() {
            $this->load->view('home');
            $this->load->view('configure');
        }

        public function uploadImage() {
            $receipt_name = $_FILES['file']['name'];
            $filename = preg_split("/\./", $receipt_name);
            $filename[0] = "temp";
            $location = "assets/".$filename[0].".".$filename[1];
            if (move_uploaded_file($_FILES['file']['tmp_name'],$location)) {
                echo "success";
            } else {
                echo"error";
            }
        }
    }