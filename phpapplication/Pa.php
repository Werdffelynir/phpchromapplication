<?php

namespace Pa;


/**
 * WORK WITH CINTENT DATA
 * Pa::set('page_content', 'Hello PhpApplication');
 * Pa::t('name');  // output 
 * Pa::data();     // return array with all text variables
 * 
 * WORK WITH FUNCTIONS
 * Pa::setf('login', function($email, $password) {
 *     print_r([
 *         'id' => 102, 
 *         'password' => $password, 
 *         'email' => $email,
 *         'name'=> 'Drink Beerner',
 *     ]);
 * );
 * Pa::f('login', 'drink@mail.com', '123456789');
 * 
 * // Start router 'request_hendler'
 * Pa::start();
 * 
 * SERVER APP
 * Pa::app_close();
 * 
 * 
 * ROUTER
 * '/cataloge/(?<id>[\d]+)'   == '/cataloge/id:n'
 * '/cataloge/(?<name>[\w]+)' == '/cataloge/name:s'
 * Pa::route( '/user/id:n' , callback);
 * Pa::route( '/category/type:s/id:n', callback);
 * Pa::route( '/user/save', callback, 'POST');
 * Pa::route( '/user/delete', callback, 'DELETE');
 * Pa::route( '/user/update', callback, 'PUT');
 * Pa::redirect('/');
 * // Start router hendler
 * Pa::request_hendler();
 * 
 * RENDER
 * Pa::
 * 
 */
class Pa extends PhpApplication
{
    use ApplicationServer;
    use ApplicationFileRender;
    use ApplicationRouter;

    private static Pa | null $pa = null;

    static public function inst()
    {
        if (!self::$pa) {
            self::$pa = new self();
        }
        return self::$pa;
    }


    static public function t(string $key)
    {
        self::inst();
        return self::$pa->get_data($key);
    }

    static public function data()
    {
        self::inst();
        return self::$pa->get_data_all();
    }


    static public function set(string $key, $value): void
    {
        self::inst();
        self::$pa->set_data($key, $value);
    }

    static public function setf(string $key, $value): void
    {
        self::inst();
        self::$pa->set_func($key, $value);
    }

    static public function f(string $key, ...$args)
    {
        self::inst();
        return call_user_func_array(self::$pa->get_func($key), $args);
    }

    static public function start()
    {
        self::inst();
        self::request_hendler();

        $template = 'template.php';
        Pa::render($template, [
            't' => fn ($k) => Pa::t($k),
            'set' => fn ($k, $v) => Pa::set($k, $v),
        ], false);
    }
}

