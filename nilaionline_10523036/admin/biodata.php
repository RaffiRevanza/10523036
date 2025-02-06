<?php

$biodata = [
    "Nama" => "Raffi Revanza",
    "Alamat" => "kp.Pamoyanan, Desa sukalaksana, Kecamatan Talegong, Kabupaten Garut ",
    "Tanggal Lahir" => "Garut 13 Oktober 2003", 
    "Hobi" => "Treveling",
];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffi Revanza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            background-color: #1c396f; 
            color: white; 
        }
        .biodata {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: white; 
            color: #333; 
        }
        .biodata h1 {
            text-align: center;
            color: #333;
        }
        .biodata ul {
            list-style-type: none;
            padding: 0;
        }
        .biodata li {
            margin-bottom: 10px;
        }
        .biodata li strong {
            color: #555;
        }
        .biodata img {
            max-width: 150px;
            height: auto;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .back-button {
            display: block;
            margin: 20px auto;
            text-align: center;
        }
        .back-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .back-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="biodata">
        <img src="Fi.jpg" alt="Foto Saya">
        <ul>
            <?php foreach ($biodata as $key => $value): ?>
                <li><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="back-button">
            <a href="./?adm=mahasiswa">Kembali</a>
        </div>
    </div>
</body>
</html>