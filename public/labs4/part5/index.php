<?php
    require_once "Menu.php";
    use part5\Menu;
    $menu = new Menu();

    $menu->addMenuItem('Home', 'home.php');
    $menu->addMenuItem('About', 'about.php');
    $menu->addMenuItem('Photo', 'photo.php');
    $menu->addMenuItem('Contact us', 'contact.php');
    $menu->addMenuItem('Login', 'login.php');

    $menu->printMenu('600px', '50px', 'blue', 'lightblue');