<div class="section-form">
    <div class="title-page">
        <h1>Enter Your Task</h1>
    </div>

    <form id="section-form-input" action="<?= $this->getBaseUrl() ?>/site/task/add" method="POST">
        <span>Content:</span> <input class="input-content" type="text" name="content" placeholder="Enter your task...">
        <input class="input-alarm-time" name="alarm-time" type="time" />
        <input class="input-submit" type="submit" value="Submit" />

        <div class="account-dropdown">
            <i class="fa fa-user fa-2 btn-show-dropdown <?= isLogined() ? 'have-user' : '' ?>" aria-hidden="true" onclick="dropdownAccount()"></i>

            <div class="select-action-user">
                <a href="<?= $this->getBaseUrl() ?>/admin/user/open-form-login" style="display:<?= isLogined() ? 'none' : 'block' ?>">Sign In</a>
                <a href="<?= $this->getBaseUrl() ?>/admin/user/open-form-register">Register</a>
                <a href="<?= $this->getBaseUrl() ?>/admin/user/logout">Log Out</a>
                <a href="<?= $this->getBaseUrl() ?>/admin/user/show">Show User</a>
            </div>
        </div>
    </form>

    <div class="section-table">
        <div class="task-items">
            <?php if (!empty($this->data['tasks'])) : ?>
                <button class="input-delete" name="delete" onclick="deleteAll()">Delete All</button>
                <?php foreach ($this->data['tasks'] as $item) : ?>
                    <div class="task-item">
                        <span class="task-item__<?= $item->getItemID() . '.' ?>">
                            <?= $item->getItemID() . '.' ?>
                        </span>
                        <span class="task-item-content">
                            <?= $item->getAlarmTime() ?>
                            <?= $item->getContent() ?>
                            <button class="input-delete-item" name="delete-item" onclick="deleteItem('<?= $item->getItemID() ?>')">X</button>
                            <button class="input-update" name="update" onclick="toggleFormUpdate('<?= $item->getItemID() ?>')">+</button>
                        </span>
                        <form action="<?= $this->getBaseUrl() ?>/site/task/update" method="POST" class="d-none-form-update-item form-update-item__<?= $item->getItemID() ?>">
                            <input type="text" name="id" class="input-update-item" value="<?= $item->getItemID() ?>">
                            <input type="text" name="contentNew" class="input-update-item" placeholder="Enter new content">
                            <input type="submit" value="OK" />
                        </form>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</div>