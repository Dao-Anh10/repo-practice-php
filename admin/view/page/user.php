<div class="table-wrapper">
    <table>
        <tr>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PASS</th>
        </tr>
        <?php foreach ($this->data['users'] as &$item) { ?>
            <tr>
                <td><?= $item->getUsername() ?></td>
                <td><?= $item->getEmail() ?></td>
                <td><?= substr($item->getPass(), 1, 20) . '...' ?></td>
            </tr>
        <?php } ?>
    </table>
</div>