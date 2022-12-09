<style>
    th, td {
        padding: 5px 10px;
    }
    h1{
        text-align: center;
    }
</style>

<h1>All Moviments</h1>

<table class="table">
    <tr>
        <th>#</th>
        <th>Description</th>
        <th>Date</th>
        <th>Value</th>
        <th>Type</th>
    </tr>
    <?php foreach($moviments as $moviment): ?>
        <tr>
            <td><?= $moviment['id'] ?></td>
            <td><?= $moviment['description'] ?></td>
            <td><?= $moviment['date'] ?></td>
            <td><?= $moviment['value'] ?></td>
            <td><?= $moviment['type'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>