<!DOCTYPE html>
<html>
<head>
    <title>PRAK501</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('akademia.avif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            backdrop-filter: brightness(0.8); 
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            display: inline-block;
            width: 200px;
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <h1>Welcome to Akademia</h1>
    <ul>
        <li><a href="Member.php">Manage Member</a></li> <br>
        <li><a href="Buku.php">Manage Book</a></li> <br>
        <li><a href="Peminjaman.php">Borrow list</a></li>
    </ul>
</body>
</html>
