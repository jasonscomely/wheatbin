<?php

namespace Kanboard\Controller;

/**
 * Manual controller
 *
 * @package  controller
 * @author   Frederic Guillot
 */
class Manual extends Base
{
    public function index()
    {
        $this->response->html($this->template->layout('manual/index', array(
            'values' => array(
                'controller' => 'manual',
                'action' => 'index',
            ),
            'title' => t('Manual')
        )));
    }
}
