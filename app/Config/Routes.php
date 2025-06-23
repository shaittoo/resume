<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Main resume routes
$routes->get('/', 'Resume::index');
$routes->get('/resume', 'Resume::index');
$routes->get('/setup', 'Resume::setup');
$routes->post('/setup', 'Resume::setup');
$routes->get('/download', 'Resume::download');

// Admin routes
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/profile', 'Admin::profile');
$routes->post('/admin/profile', 'Admin::profile');

// Experience management
$routes->get('/admin/experience', 'Admin::experience');
$routes->get('/admin/experience/add', 'Admin::addExperience');
$routes->post('/admin/experience/add', 'Admin::addExperience');
$routes->get('/admin/experience/edit/(:num)', 'Admin::editExperience/$1');
$routes->post('/admin/experience/edit/(:num)', 'Admin::editExperience/$1');
$routes->get('/admin/experience/delete/(:num)', 'Admin::deleteExperience/$1');

// Education management
$routes->get('/admin/education', 'Admin::education');
$routes->get('/admin/education/add', 'Admin::addEducation');
$routes->post('/admin/education/add', 'Admin::addEducation');
$routes->get('/admin/education/edit/(:num)', 'Admin::editEducation/$1');
$routes->post('/admin/education/edit/(:num)', 'Admin::editEducation/$1');
$routes->get('/admin/education/delete/(:num)', 'Admin::deleteEducation/$1');

// Skills management
$routes->get('/admin/skills', 'Admin::skills');
$routes->get('/admin/skills/add', 'Admin::addSkill');
$routes->post('/admin/skills/add', 'Admin::addSkill');
$routes->get('/admin/skills/edit/(:num)', 'Admin::editSkill/$1');
$routes->post('/admin/skills/edit/(:num)', 'Admin::editSkill/$1');
$routes->get('/admin/skills/delete/(:num)', 'Admin::deleteSkill/$1');

// Projects management
$routes->get('/admin/projects', 'Admin::projects');
$routes->get('/admin/projects/add', 'Admin::addProject');
$routes->post('/admin/projects/add', 'Admin::addProject');
$routes->get('/admin/projects/edit/(:num)', 'Admin::editProject/$1');
$routes->post('/admin/projects/edit/(:num)', 'Admin::editProject/$1');
$routes->get('/admin/projects/delete/(:num)', 'Admin::deleteProject/$1');

// Default CodeIgniter route (fallback)
$routes->get('/home', 'Home::index');
