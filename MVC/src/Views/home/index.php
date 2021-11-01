<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $title ?? 'Home' ?></title>
</head>
<body>
<div class="container py-3">
    <h4 class="mb-3"><?= $title ?></h4>

    <table class="table table-bordered">
        <caption>List of revenues</caption>
        <thead>
        <tr>
            <th class="text-center" style="width: 70px">No</th>
            <th>Year</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $index => $item): ?>
            <tr>
                <td class="text-center"><?= $index + 1 ?></td>
                <td><?= $item['year'] ?></td>
                <td><?= $item['amount'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>