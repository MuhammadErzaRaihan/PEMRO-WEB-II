<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="" method="post">
        <input type="text" name="inputString">
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = $_POST['inputString'];
        $length = strlen($input);
        $i = 0;
        while ($i < $length) {
            $char = $input[$i];
            $output = strtoupper($char); // Karakter pertama kapital

            $j = 1;
            while ($j < $length) {
                $output .= strtolower($char); // Sisanya huruf kecil
                $j++;
            }

            echo $output;
            $i++;
        }
    }
    ?>
</body>
</html>
