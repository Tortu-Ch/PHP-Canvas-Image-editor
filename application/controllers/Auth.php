<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Auth extends CI_Controller
    {
        public function __construct(){
            parent:: __construct();
            ob_start();
        }

        public function index(){
            $this->load->view('home');
            $this->load->view('welcome');
        }
    }