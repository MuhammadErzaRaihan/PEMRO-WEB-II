<!DOCTYPE html>
<html lang="en">
<head>
    <title>Praktikum104</title>
    <style>

        .wrapper {
            border: solid 1px black; 
            padding: 1px; 
            display: inline-block; 
        }
        table { 
            color: black; 
            border: black; 
            
        }
        td { border: solid 1px; 
            padding: 5px; }
    </style>
</head>
<body>
    <?php
        $samsung = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung A03", "Samsung Galaxy Xcover 5");
    ?>
    <div class="wrapper">
        <table>
            <tr>
                <td><strong>Daftar Smartphone Samsung</strong></td>
            </tr>
            <?php foreach ($samsung as $item): ?> 
            <tr>
                <td><?= $item; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
