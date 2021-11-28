<div class='container has-text-centered'>
    <div class='columns is-mobile is-centered'>
        <div class="table-container">
            <table class='table'>
                <thead>
                <tr>
                    <?php foreach ($_SESSION['columns'] as $row_key): ?>
                        <th><?= $row_key; ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION['rows'] as $row_key => $row): ?>
                    <tr>
                        <?php foreach ($_SESSION['columns'] as $field_key): ?>
                            <td><?= $row[$field_key]; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (count($_SESSION['rows']) == 0): ?>
        <h2>Sin resultados</h2>
    <?php endif ?>
</div>