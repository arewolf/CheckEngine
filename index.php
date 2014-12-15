<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/app/core/initialize.php');

// Main Sections
Router::add('/', '/app/controllers/home.php');

//Customer

Router::add('/customer/form', '/app/controllers/customers/form.php');
Router::add('/customer/process_form', '/app/controllers/customers/process_form.php');
Router::add('/customers', '/app/controllers/customers/list.php');
Router::add('/customer/remove', '/app/controllers/customers/remove.php');
//on for every page that we can have.
//the path url and the path you want to hit.

//Users
Router::add('/login', '/app/controllers/users/login.php');
Router::add('/create', '/app/controllers/users/create.php');
Router::add('/process_user', '/app/controllers/users/process_user.php');
Router::add('/process_login', '/app/controllers/users/process_login.php');
Router::add('/logout', '/app/controllers/users/logout.php');

//Tires
Router::add('/tires/landing', '/app/controllers/tires/landing.php');
Router::add('/tires/insert', '/app/controllers/tires/insert.php');
Router::add('/tires/rotate', '/app/controllers/tires/rotate.php');
Router::add('/tires/log', '/app/controllers/tires/log.php');
Router::add('/tires/process_form', '/app/controllers/tires/process_form.php');

//Oil

Router::add('/oil/landing', '/app/controllers/oil/landing.php');
Router::add('/oil/insert', '/app/controllers/oil/insert.php');
Router::add('/oil/log', '/app/controllers/oil/log.php');
Router::add('/oil/process_form', '/app/controllers/oil/process_form.php');

//Filters
Router::add('/filters/landing', '/app/controllers/filters/landing.php');
Router::add('/filters/cabin', '/app/controllers/filters/cabin.php');
Router::add('/filters/process_form', '/app/controllers/filters/process_form.php');
Router::add('/filters/air_process_form', '/app/controllers/filters/air_process_form.php');
Router::add('/filters/air', '/app/controllers/filters/air.php');
Router::add('/filters/log', '/app/controllers/filters/log.php');

//Insurance

Router::add('/insurance/landing', '/app/controllers/insurance/landing.php');
Router::add('/insurance/insert', '/app/controllers/insurance/insert.php');
Router::add('/insurance/update', '/app/controllers/insurance/update.php');
Router::add('/insurance/log', '/app/controllers/insurance/log.php');
Router::add('/insurance/process_form', '/app/controllers/insurance/process_form.php');

//Cars
Router::add('/cars/landing', '/app/controllers/cars/landing.php');
Router::add('/cars/new', '/app/controllers/cars/new.php');
Router::add('/cars/select', '/app/controllers/cars/select.php');
Router::add('/cars/process_form', '/app/controllers/cars/process_form.php');
Router::add('/cars/process_select', '/app/controllers/cars/process_select.php');




// Issue Route
Router::route();