<?php

    namespace MyApp\controllers;

    Class Home {

        protected $container;

        public function __construct($container) {

        }


        public function Index($req, $res) {
            return $res->write('testando index');
        }
    }