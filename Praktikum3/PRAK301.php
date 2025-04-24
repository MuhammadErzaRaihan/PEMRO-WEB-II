
<!DOCTYPE html>
<html lang="en">
    <body>
        <form action="" method="post">
            Jumlah Peserta: <input type="text" name="peserta">
            <button type="submit" name="print">Cetak</button>
        </form>
    </body>
</html>


<?php
    if(isset($_POST["print"])){
        $i = 1;
        $number = $_POST ['peserta'];

        while($i <= $number){
            if($i % 2 !=0){
                echo "<h1><font color='red'> Peserta ke-$i</h2>";
            }
            else {
                echo "<h1><font color='green'> Peserta ke-$i</h2>";
            }
            echo "<br><br>";
            $i++;
        }
    }
?>
