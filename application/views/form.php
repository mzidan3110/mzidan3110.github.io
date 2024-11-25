<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Barang</title>
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
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 30px;
        }
        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="date"], input[type="number"], select {
            background-color: #f9f9f9;
        }
        button {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input, .form-group select {
            font-size: 16px;
        }
        .form-group input[type="number"] {
            width: 48%;
            display: inline-block;
        }
        .form-group input[type="text"] {
            width: 100%;
        }
        .form-group select {
            width: 100%;
        }
        .form-group .half {
            width: 48%;
            display: inline-block;
        }
        .form-group .half:last-child {
            margin-left: 4%;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1><?= isset($item) ? 'Edit Barang' : 'Tambah Barang' ?></h1>
        <form action="<?= base_url('barang/save') ?>" method="post">
            <input type="hidden" name="id" value="<?= isset($item) ? $item['id'] : '' ?>">

            <div class="form-group">
                <label for="name">Nama Barang:</label>
                <input type="text" name="name" id="name" value="<?= isset($item) ? $item['name'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori:</label>
                <select name="category" id="category" required>
                    <option value="Elektronik" <?= isset($item) && $item['category'] == 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
                    <option value="Pakaian" <?= isset($item) && $item['category'] == 'Pakaian' ? 'selected' : '' ?>>Pakaian</option>
                    <option value="Makanan" <?= isset($item) && $item['category'] == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                    <option value="Lainnya" <?= isset($item) && $item['category'] == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Jumlah Barang:</label>
                <input type="number" name="quantity" id="quantity" min="1" value="<?= isset($item) ? $item['quantity'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="price">Harga per Unit:</label>
                <input type="number" name="price" id="price" min="100" value="<?= isset($item) ? $item['price'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="date">Tanggal Masuk:</label>
                <input type="date" name="date" id="date" value="<?= isset($item) ? $item['date'] : '' ?>" required>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>

</body>
</html>
