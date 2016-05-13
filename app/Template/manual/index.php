<section id="main">
    <br>
    <div class="listing">
        <h3><?= t('Advanced search') ?></h3>
        <p><?= t('Example of query: ') ?><strong>project:"My project" assignee:me due:tomorrow</strong></p>
        <ul>
            <li><?= t('Search by project: ') ?><strong>project:"My project"</strong></li>
            <li><?= t('Search by column: ') ?><strong>column:"Work in progress"</strong></li>
            <li><?= t('Search by assignee: ') ?><strong>assignee:nobody</strong></li>
            <li><?= t('Search by color: ') ?><strong>color:Blue</strong></li>
            <li><?= t('Search by category: ') ?><strong>category:"Feature Request"</strong></li>
            <li><?= t('Search by description: ') ?><strong>description:"Something to find"</strong></li>
            <li><?= t('Search by due date: ') ?><strong>due:2015-07-01</strong></li>
        </ul>
        <p><i class="fa fa-external-link fa-fw"></i><?= $this->url->doc(t('View advanced search syntax'), 'search') ?></p>
    </div>

</section>