<?php
include "Naglowek.php";

$id = $_SESSION['wybranypost'];

$sql = "SELECT * FROM post where id = '$id'";
$mydb = $_SESSION['mydb'];
$result = $mydb->query($sql);
$row = $result->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="pl" >
    <head>
        <meta charset="UTF-8">
    </head>
<body>
    <div class="post-container">
        <a href = StronaGlowna.php>WRÓĆ DO STRONY GŁÓWNEJ</a>
        <a href = DzialWszystkie.php>WRÓĆ DO PRZEGLĄDANIA POSTÓW</a>
    </div>
<?php

    $id_uzytkownikp = $row['id_uzytkownik'];
    $sql9 = "SELECT * FROM uzytkownik WHERE id='$id_uzytkownikp'";
    $result9 = $mydb->query($sql9);
    $row9 = $result9->fetch_assoc();
    $login = $row9['login'];

    $loginuu = $_SESSION['login'];
    $sql10 = "SELECT * FROM uzytkownik WHERE login='$loginuu'";
    $result10 = $mydb->query($sql10);
    $row10 = $result10->fetch_assoc();
    $administrator = $row10['administrator'];
    $moderator = $row10['moderator'];


    ?>
    <div class="post-container">
        <p class="daty" ><span class="szare">Data dodania:<?php echo $row["data_dodania"]; ?></p>
        <p class="autor">Autor: <span class="szare"><?php echo $row9['login'];?></span></p>
        <p class="tytul"> Tytuł:<span class="szare"><?php echo $row["tytul"]; ?></span></p>
        <p class="tresc"> Treść:<span class="szare"><br><?php echo $row["tresc"]; ?></span><br></p>
    </div>
    <div class="post-container">
        <form method="post">
            <input type="submit" value="DODAJ KOMENTARZ" name="dodajk" id="dodajk">
            <?php
                if($moderator == 1){
                    ?> <input type="submit" value="EDYTUJ POST" name="edytuj" id="edytuj">
                    <?php
                }
                if($administrator==1){
                ?>
            <input type="submit" value="EDYTUJ POST" name="edytuj" id="edytuj">
            <input type="submit" value="USUŃ POST" name="usun" id="usun">
            <?php
            }
                ?>
        </form>
    </div>
    </body>
    </html>
    <?php

if(isset($_POST['edytuj'])){
?>
    <div class="post-container">
        <p class="daty"><span class="szare">Data dodania:<?php echo $row["data_dodania"]; ?></span></p>
        <p class="autor">Autor: <span class="szare"><?php echo $row9['login'];?></span></p>
        <form method="post">
        <label for ="tresc">Tytuł:</label>
        <input type="text" id="tytul" name="tytul" value="<?php echo $row["tytul"]; ?>">
            <br>
        <label for ="tresc">Tresc:</label>
        <input type="text" id="tresc" name="tresc" value="<?php echo $row["tresc"]; ?>">
            <br>
            <input type="submit" value="ZAPISZ" id="zapisz" name="zapisz">
        </form>
    </div>
    <?php
}
    if(isset($_POST['zapisz'])){
        if(isset($_POST['tresc'])){
            $tresc = $_POST['tresc'];
        }
        if(isset($_POST['tytul'])){
            $tytul = $_POST['tytul'];
        }

        $sql12 = "UPDATE post SET tresc='$tresc', tytul='$tytul' WHERE id = '$id'";
        $result12 = mysqli_query($mydb, $sql12);

        if($result12){
            header("Location:Post.php");
        }
    }

    if(isset($_POST['usun'])){
        $id = $_SESSION['wybranypost'];
        echo $id;

        $sql16 = "DELETE FROM post where id='$id'";
        $sql17 = "DELETE FROM komentarz where id_post='$id'";

        $result17 = $mydb->query($sql17);
        $result17 = mysqli_query($mydb, $sql17);

        $result16 = $mydb->query($sql16);
        $result16 = mysqli_query($mydb, $sql16);

        if($result17 && $result16){
            echo "post został usunięty";
            unset($_SESSION['wybranypost']);
            header("Location:DzialWszystkie.php");
        }
    }

    if(isset($_POST['dodajk'])){
    ?>
    <!DOCTYPE html>
    <html lang="pl" >
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="StronaGlowna.css">
    </head>
    <body>
        <div class='post-container'>
    <form method="post">
        <p><?php if(isset($_SESSION['login'])){ echo $_SESSION['login'];}
            else{
                ?>
            <label for="nazwa">IMIE/NAZWA</label>
            <input type="text" id="nazwa" name="nazwa">
            <?php
            }?>
        <label for ="tresc"> Treść:</label><br>
        <input class = 'tresc' type="text" name="tresc" id="tresc" required><br>
        <FORM method="post">
            <input type="submit" value="DODAJ" name="dodajkk" id="dodajkk">
        </FORM>
    </div>
    </form>
    <br>
    <?php
    }
    if(isset($_POST['dodajkk'])){

        header("Location: Post.php");
        if(isset($_SESSION['login'])) {
            $login = $_SESSION["login"];
            $sql2 = "SELECT id FROM uzytkownik WHERE login = '$login'";
            $result2 = mysqli_query($mydb, $sql2);
            $row2 = $result2->fetch_assoc();

            $id_uzytkownika = $row2['id'];
            $data_dodaniak = date("Y-m-d H:i:s");
            $tresc = $_POST['tresc'];

            $sql3 = "INSERT INTO komentarz (tresc,id_uzytkownik,id_post,data_dodania) VALUES('$tresc','$id_uzytkownika','$id','$data_dodaniak')";
        }
        else{
            $login = $_POST['nazwa'];
            $data_dodaniak = date("Y-m-d H:i:s");
            $tresc = $_POST['tresc'];
            $sql3 = "INSERT INTO komentarz (tresc,id_uzytkownik,nazwa,id_post,data_dodania) VALUES('$tresc',NULL,'$login','$id','$data_dodaniak')";
        }
        if (mysqli_query($mydb, $sql3)) {

            echo 'KOMENTARZ ZOSTAŁ DODANY';
            unset($_POST['tresc']);
            unset($_POST['dodajkk']);
            unset($_POST['dodajk']);
            exit();
        }
    }
    if(isset($_POST['wybranykom']) && isset($_POST['usunkom'])){
        $_SESSION['wybranykom'] = $_POST['wybranykom'];
        $idk = $_SESSION['wybranykom'];

        $sql15 = "DELETE FROM komentarz where id= '$idk'";
        $result15 = $mydb->query($sql15);

        if($result15){
            echo "komentarz został usuniety";
            //header("Location:Post.php");
        }
    }

    if(isset($_POST['wybranykom']) && isset($_POST['edytujk'])){
        $edytujk = $_POST['edytujk'];
        $_SESSION['wybranykom'] = $_POST['wybranykom'];
        $idk = $_SESSION['wybranykom'];

        $sql15 = "SELECT * FROM komentarz where id= '$idk'";
        $result15 = $mydb->query($sql15);
        $row15 = $result15->fetch_assoc();

        $tresc = $row15["tresc"];
        $data_dodania = $row15['data_dodania'];
        $id_uzytkownika = $row15['id_uzytkownik'];

        if($id_uzytkownika==null){
            $sql7 = "SELECT nazwa FROM komentarz WHERE tresc='$tresc' && data_dodania='$data_dodania'";
            $result7 = mysqli_query($mydb, $sql7);
            $row7 = $result7->fetch_assoc();
            $loginu = $row7['nazwa'];
        }
        else {
            $sql5 = "SELECT login FROM uzytkownik WHERE id='$id_uzytkownika'";
            $result5 = mysqli_query($mydb, $sql5);
            $row5 = $result5->fetch_assoc();
            $loginu = $row5['login'];
        }

        ?>
        <div class="comennt-cointaner">
            <p class="daty" ><span class="szare">Data dodania:<?php echo $data_dodania; ?></p>
            <?php
            if(!$id_uzytkownika==null){?>
                <p class="tytul"> Użytkownik:<span class="szare"><?php echo $loginu; ?></span></p>
                <?php
            }
            else{?>
                <p class="tytul"> Gość:<span class="szare"><?php echo $loginu; ?></span></p>
                <?php
            }
            ?>
            <label for="tresc">TREŚĆ</label>
            <form method="post">
                <input id = "tresc" name="tresc" value="<?php echo $tresc; ?>">
                <input type="submit" name="zapiszz" value="ZAPISZ">
            </form>
        </div>
        <?php
    }

    if(isset($_POST['zapiszz'])){

        $idk = $_SESSION['wybranykom'];
        if(isset($_POST['tresc'])){
            $tresc = $_POST['tresc'];
        }

        $sql13 = "UPDATE komentarz SET tresc='$tresc' WHERE id = '$idk'";
        $result13 = mysqli_query($mydb, $sql13);

        if($result13){
            echo "komentarz został edytowany";
            //header("Location:Post.php");
        }
    }
    ?>
<div class="post-container">
        <?php

$sql1 = "SELECT * FROM komentarz where id_post = '$id'";
$result1 = $mydb->query($sql1);

while ($row1 = $result1->fetch_assoc()) {
    $tresc = $row1["tresc"];
    $data_dodania = $row1['data_dodania'];
    $sql4 = "SELECT * FROM komentarz WHERE tresc='$tresc' && data_dodania='$data_dodania'";
    $result4 = mysqli_query($mydb, $sql4);
    $row4 = $result4->fetch_assoc();
    $id_uzytkownika = $row4['id_uzytkownik'];
    $idk = $row4['id'];
    if($id_uzytkownika==null){
        $sql7 = "SELECT nazwa FROM komentarz WHERE tresc='$tresc' && data_dodania='$data_dodania'";
        $result7 = mysqli_query($mydb, $sql7);
        $row7 = $result7->fetch_assoc();
        $loginu = $row7['nazwa'];
    }
    else {
        $sql5 = "SELECT login FROM uzytkownik WHERE id='$id_uzytkownika'";
        $result5 = mysqli_query($mydb, $sql5);
        $row5 = $result5->fetch_assoc();
        $loginu = $row5['login'];
    }
    ?>
    <div class="comennt-cointaner">
        <p class="daty" ><span class="szare">Data dodania:<?php echo $data_dodania; ?></p>
        <?php
        if(!$id_uzytkownika==null){?>
            <p class="tytul"> Użytkownik:<span class="szare"><?php echo $loginu; ?></span></p>
            <?php
        }
        else{?>
            <p class="tytul"> Gość:<span class="szare"><?php echo $loginu; ?></span></p>
            <?php
        }
        ?>
        <p class="tresc"> Treść:<span class="szare"><br><?php echo $row1["tresc"]; ?></span><br></p>
    <?php
if($moderator == 1) {
    ?>
    <form method="post">
        <input type="hidden" name="wybranykom" id="wybranykom" value="<?php echo $idk; ?>">
        <input type="submit" value="EDYTUJ KOMENTARZ" id="edytujk" name="edytujk">
    </form>
    </div>
<?php
}
if($administrator==1){?>
    <form method="post">
        <input type="hidden" name="wybranykom" id="wybranykom" value="<?php echo $idk; ?>">
        <input type="submit" value="EDYTUJ KOMENTARZ" id="edytujk" name="edytujk">
        <input type="hidden" name="wybranykom" id="wybranykom" value="<?php echo $idk; ?>">
        <input type="submit" name="usunkom" id="usunkom" value="USUŃ KOMENTARZ">
        </form>
    </div>
        <?php
}
}
?>
</div>
    </body>
    </html>
<?php
?>
