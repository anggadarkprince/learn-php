<html lang="en">
<body>
<h1>$_SERVER</h1>

<table style="border: 1px solid #000">
    <?php foreach ($_SERVER as $key => $value) { ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $value ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>