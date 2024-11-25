<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 20px;
            display: inline-block;
        }
        a:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        td a {
            color: #ffffff;
            background-color: #ff9800;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        td a:hover {
            background-color: #e68900;
        }
        td a.delete {
            background-color: #f44336;
        }
        td a.delete:hover {
            background-color: #d32f2f;
        }
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Barang</h1>
        <a href="<?= base_url('barang/form') ?>">Tambah Barang</a>

        <table border="1">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Harga Total</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['category'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>Rp<?= number_format($item['quantity'] * $item['price'], 0, ',', '.') ?></td>
                        <td><?= $item['date'] ?></td>
                        <td>
                            <a href="<?= base_url('barang/form/' . $item['id']) ?>">Edit</a>
                            <a href="<?= base_url('barang/delete/' . $item['id']) ?>" class="delete" onclick="return confirm('Hapus barang ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
