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
            padding: 5px; 
        }
        .header {
            background-color: red; 
            color: black; 
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
         $samsung = [
            "GS22" => "Samsung Galaxy S22",
            "GS22+" => "Samsung Galaxy S22+",
            "A03" => "Samsung A03",
            "XC5" => "Samsung Galaxy Xcover 5",
            "ZF3" => "Samsung Galaxy Z Fold 3"
         ];
    ?>
    <div class="wrapper">
        <table>
            <tr>
                <td class="header"><strong>Daftar Smartphone Samsung</strong></td>
            </tr>
            <?php foreach ($samsung as $key => $item): ?> 
            <tr>
                <td><?= $item; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
