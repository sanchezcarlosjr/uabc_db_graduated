<div class='container has-text-centered'>
    <div class='columns is-mobile is-centered'>
        <div class="table-container">
            <table class='table'>
                <thead>
                <tr>
                    <th></th>
                    <?php foreach ($_SESSION['columns'] as $row_key): ?>
                        <th><?= $row_key; ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($_SESSION['rows'] as $row_key => $row): ?>
                    <tr>
                        <td>
                            <form method="post" action="<?= "/?id=".$row['id_posgrado']; ?>">
                                <button class="button" name="DELETE" type="submit">
                                        <span class="icon is-small">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                </button>
                            </form>
                            <a class="button" href="<?= "/editar?id=".$row['id_posgrado']; ?>"
                                    >
                                        <span class="icon is-small">
                                            <i class="fas fa-edit"></i>
                                        </span>
                            </a>
                        </td>
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