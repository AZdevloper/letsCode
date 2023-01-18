<?php

class HommeController{

    public function index($page){

        include('views/'.$page.'.php');

    }
}