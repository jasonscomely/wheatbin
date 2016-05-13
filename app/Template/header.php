<header style="font-family:Helvetica, Arial, sans-serif;">
    <nav style="font-family:Helvetica, Arial, sans-serif;">
        <h1 style="font-family:Helvetica, Arial, sans-serif;font-size:1.8em;"><?= $this->url->link('<img alt="logo" width="30" height="25" src="'.$this->url->dir().'assets/img/WHEATBIN-logo-dashboard.png">', 'app', 'index', array(), false, '', t('Dashboard')).' '.$this->e($title) ?><!-- 'logo' -->
            <?php if (! empty($description)): ?>
                <span class="tooltip" title='<?= $this->e($this->text->markdown($description)) ?>'>
                    <i class="fa fa-info-circle"></i>
                </span>
            <?php endif ?>
			<?php
			if( !isset($project) ){
				$link = "$_SERVER[REQUEST_URI]";
				if(preg_match("#project/([0-9]+)$#",$link,$pro_id)){
				    $project['id'] = $pro_id[1];
				}
                /*
                if(preg_match("/project_id=([0-9]+)/",$link,$pro_id)){
				    $project['id'] = $pro_id[1];
				}else if(preg_match("#project/([0-9]+)$#",$link,$pro_id)){
				    $project['id'] = $pro_id[1];
				}
                */
			}
			?>
            
            <?php if(isset($project)){ print "&gt; "; ?>
            <?php
                if ($this->user->hasProjectAccess('project', 'edit', $project['id'])): ?>
                  <?= $this->url->link(t('Settings'), 'project', 'show', array('project_id' => $project['id'])) ?>
            <?php  endif ?>
            <?php } ?>
            
        </h1>
        <ul>
            <?php if (isset($board_selector) && ! empty($board_selector)): ?>
            
            <?php endif ?>
            <li>
                <?php if ($this->user->hasNotifications()): ?>
                    <?= $this->url->link('<i class="fa fa-bell web-notification-icon"></i>', 'app', 'notifications', array('user_id' => $this->user->getId()), false, '', t('Unread notifications')) ?>
                <?php endif ?>

                <?= $this->url->link(t('Logout'), 'auth', 'logout') ?>
                <span class="username hide-tablet">(<?= $this->user->getProfileLink() ?>)</span>
            </li>
        </ul>
    </nav>
</header>