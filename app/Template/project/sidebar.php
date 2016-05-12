<div class="sidebar">
    <h2><?= t('Actions') ?></h2>
    <ul>
        <li <?= $this->app->getRouterAction() === 'show' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Summary'), 'project', 'show', array('project_id' => $project['id'])) ?>
        </li>
        <li <?= $this->app->getRouterController() === 'project' && $this->app->getRouterAction() === 'edit' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Edit project'), 'project', 'edit', array('project_id' => $project['id'])) ?>
        </li>

        <?php if ($this->user->hasProjectAccess('project', 'edit', $project['id'])): ?>
            <li <?= $this->app->getRouterController() === 'project' && $this->app->getRouterAction() === 'share' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Public access'), 'project', 'share', array('project_id' => $project['id'])) ?>
            </li>
            <!--
            <li <?php //<?= $this->app->getRouterController() === 'project' && $this->app->getRouterAction() === 'notifications' ? 'class="active"' : '' ?>>
                <?php //<?= $this->url->link(t('Notifications'), 'project', 'notifications', array('project_id' => $project['id'])) ?>
            </li>
            -->
            <li <?= $this->app->getRouterController() === 'column' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Columns'), 'column', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->getRouterController() === 'category' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Categories'), 'category', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->getRouterController() === 'project' && $this->app->getRouterAction() === 'duplicate' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Duplicate'), 'project', 'duplicate', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->getRouterController() === 'project' && ($this->app->getRouterAction() === 'disable' || $this->app->getRouterAction() === 'enable') ? 'class="active"' : '' ?>>
                <?php if ($project['is_active']): ?>
                    <?= $this->url->link(t('Disable'), 'project', 'disable', array('project_id' => $project['id']), true) ?>
                <?php else: ?>
                    <?= $this->url->link(t('Enable'), 'project', 'enable', array('project_id' => $project['id']), true) ?>
                <?php endif ?>
            </li>
            <li <?= $this->app->getRouterController() === 'taskImport' && $this->app->getRouterAction() === 'step1' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Import'), 'taskImport', 'step1', array('project_id' => $project['id'])) ?>
            </li>
            <?php if ($this->user->hasProjectAccess('project', 'remove', $project['id'])): ?>
                <li <?= $this->app->getRouterController() === 'project' && $this->app->getRouterAction() === 'remove' ? 'class="active"' : '' ?>>
                    <?= $this->url->link(t('Remove'), 'project', 'remove', array('project_id' => $project['id'])) ?>
                </li>
            <?php endif ?>
        <?php endif ?>
        
        <!-- Starting Modification -->
        
        <h2><?= t('Information') ?></h2>
        <li>
            <?= $this->url->link(t('Activity'), 'activity', 'project', array('project_id' => $project['id'])) ?>
        </li>
        
        <?php if ($this->user->hasProjectAccess('customfilter', 'index', $project['id'])): ?>
        <li>
            <?= $this->url->link(t('Custom filters'), 'customfilter', 'index', array('project_id' => $project['id'])) ?>
        </li>
        <?php endif ?>
        
        <?php if ($project['is_public']): ?>
        <li>
            <?= $this->url->link(t('Public link'), 'board', 'readonly', array('token' => $project['token']), false, '', '', true) ?>
        </li>
        <?php endif ?>
        
        <?= $this->hook->render('template:project:dropdown', array('project' => $project)) ?>
        
        <?php if ($this->user->hasProjectAccess('analytic', 'tasks', $project['id'])): ?>
            <li>
                <?= $this->url->link(t('Analytics'), 'analytic', 'tasks', array('project_id' => $project['id'])) ?>
            </li>
        <?php endif ?>
        
        <?php if ($this->user->hasProjectAccess('export', 'tasks', $project['id'])): ?>
            <li>
                <?= $this->url->link(t('Exports'), 'export', 'tasks', array('project_id' => $project['id'])) ?>
            </li>
        <?php endif ?>
        
        <li <?= $this->app->getRouterController() === 'project' && $this->app->getRouterAction() === 'integrations' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Integrations'), 'project', 'integrations', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->getRouterController() === 'swimlane' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Swimlanes'), 'swimlane', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <?php if ($project['is_private'] == 0): ?>
            <li <?= $this->app->getRouterController() === 'project' && $this->app->getRouterAction() === 'permissions' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Permissions'), 'ProjectPermission', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <?php endif ?>
            <li <?= $this->app->getRouterController() === 'action' ? 'class="active"' : '' ?>>
                <?= $this->url->link(t('Automatic actions'), 'action', 'index', array('project_id' => $project['id'])) ?>
            </li>
        <!-- End Modification -->

        <?= $this->hook->render('template:project:sidebar') ?>
    </ul>
    <div class="sidebar-collapse"><a href="#" title="<?= t('Hide sidebar') ?>"><i class="fa fa-chevron-left"></i></a></div>
    <div class="sidebar-expand" style="display: none"><a href="#" title="<?= t('Expand sidebar') ?>"><i class="fa fa-chevron-right"></i></a></div>
</div>
