<div class="filter-box margin-bottom">
    <form method="get" action="<?= $this->url->dir() ?>" class="search">
        <?= $this->form->hidden('controller', array('controller' => 'UserListController')) ?>
        <?= $this->form->hidden('action', array('action' => 'show')) ?>

<?= var_dump($values); ?>
        <div class="input-addon">
            <?= $this->form->text('search', $values, array(), array('placeholder="'.t('Search').'"'), 'input-addon-field') ?>
        </div>
    </form>
</div>

<div class="table-list-header">
    <div class="table-list-header-count">
        <?php if ($paginator->getTotal() > 1): ?>
            <?= t('%d users', $paginator->getTotal()) ?>
        <?php else: ?>
            <?= t('%d user', $paginator->getTotal()) ?>
        <?php endif ?>
    </div>
    <div class="table-list-header-menu">
        <?= $this->render('user_list/sort_menu', array('paginator' => $paginator)) ?>
    </div>
</div>
