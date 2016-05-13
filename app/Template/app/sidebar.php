<div class="sidebar">

    <h2>Actions<!--<?= $this->e($user['name'] ?: $user['username']) ?>--></h2>
	
	
	
	<!--<div class="page-header page-header-mobile">-->
        <ul>
            <?php if ($this->user->hasAccess('project', 'create')): ?>
                <li>
                    <a class="chosen-single chosen-default" href="<?= $this->url->href('project', 'create', array(), false, '') ?>">
                        
                        <span><?= t('New project') ?></span>
                    </a>
                </li>
            <?php endif ?>
            <!--
            <li style="display: none;">
                <a class="chosen-single chosen-default" href="<?php //<?= $this->url->href('project', 'createPrivate', array(), false, '') ?>">
                   
                    <span><?php //<?= t('New private project') ?></span>
                </a>
            </li>
            -->
            <li>
                <a class="chosen-single chosen-default" href="<?= $this->url->href('search', 'index', array(), false, '') ?>">
                    <span><?= t('Search') ?></span>
                </a>
            </li>
            <li class="chosen-container chosen-container-single" style="display: none;">
                <a class="chosen-single chosen-default" href="<?= $this->url->href('project', 'index', array(), false, '') ?>">
                    <span><?= t('Project management') ?></span>
                </a>
            </li>
            <?php if ($this->user->hasAccess('user', 'index')): ?>
                <li class="chosen-container chosen-container-single" style="display: none;">
                    <a class="chosen-single chosen-default" href="<?= $this->url->href('user', 'index', array(), false, '') ?>">
                        <span><?= t('User management') ?></span>
                    </a>
                </li>
                <li >
                    <a class="chosen-single chosen-default" href="<?= $this->url->href('config', 'index', array(), false, '') ?>">
                        <span><?= t('Main settings') ?></span>
                    </a>
                </li>
            <?php endif ?>
            <!--
            <li>
                <a class="chosen-single chosen-default" href="<?php //<?= $this->url->href('manual', 'index', array(), false, '') ?>">
                    <span><?php //<?= t('Manual') ?></span>
                </a>
            </li>
            -->
        </ul>
    <!--</div>-->
	
	
	
	
	
	
	
	
	
    <ul>
        <li style="list-style-type:none;" <?= $this->app->getRouterAction() === 'index' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Overview'), 'app', 'index', array('user_id' => $user['id'])) ?>
        </li>
        <li <?= $this->app->getRouterAction() === 'projects' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('My projects'), 'app', 'projects', array('user_id' => $user['id'])) ?>
        </li>
        <li <?= $this->app->getRouterAction() === 'tasks' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('My tasks'), 'app', 'tasks', array('user_id' => $user['id'])) ?>
        </li>
        <!-- <li <?php //<?= $this->app->getRouterAction() === 'subtasks' ? 'class="active"' : '' ?>>
            <?php //<?= $this->url->link(t('My subtasks'), 'app', 'subtasks', array('user_id' => $user['id'])) ?>
        </li>
        -->
        <li <?= $this->app->getRouterAction() === 'calendar' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('My calendar'), 'app', 'calendar', array('user_id' => $user['id'])) ?>
        </li>
        <li <?= $this->app->getRouterAction() === 'activity' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('My activity stream'), 'app', 'activity', array('user_id' => $user['id'])) ?>
        </li>
         
        <!--
        <li <?php // <?= $this->app->getRouterAction() === 'notifications' ? 'class="active"' : '' ?>>
            <?php //<?= $this->url->link(t('My notifications'), 'app', 'notifications', array('user_id' => $user['id'])) ?>
        </li>
        -->
        <?= $this->hook->render('template:dashboard:sidebar') ?>
    </ul>
    <div class="sidebar-collapse"><a href="#" title="<?= t('Hide sidebar') ?>"><i class="fa fa-chevron-left"></i></a></div>
    <div class="sidebar-expand" style="display: none"><a href="#" title="<?= t('Expand sidebar') ?>"><i class="fa fa-chevron-right"></i></a></div>
</div>
