<html class="no-js" lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Składanie zamówienia</title>
    </head>
    <body>
        <?php
            if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset ($_POST['numer']) && isset ($_POST['email']) && isset ($_POST['termin']) && isset ($_POST['uwagi']))
            {
                if (!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['numer']) && !empty($_POST['email']) && !empty($_POST['termin']) && !empty($_POST['uwagi']))
                {
                    $imie = filter_var($_POST['imie'], FILTER_SANITIZE_STRING);
                    $nazwisko = filter_var($_POST['nazwisko'], FILTER_SANITIZE_STRING);
                    $numer = filter_var($_POST['numer'], FILTER_SANITIZE_STRING);
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                    $termin = filter_var($_POST['termin'], FILTER_SANITIZE_STRING);
                    $uwagi = filter_var($_POST['uwagi'], FILTER_SANITIZE_STRING);
                echo "Gratulacje złożyłeś(-aś) zamówienie.";
                }   

                else
                    echo "Nie podałeś wszystkich wymaganych danych do formularza. Spróbuj ponownie <a href='index.html'>tutaj</a>";
                
            $db1 = mysqli_connect('localhost', 'root', '', 'piece') or die(mysqli_error($db1));
                 if (!$db1) {
                     die('Could not connect: ' . mysql_error());
                 }
                 //echo 'Connected successfully';

             $query = "INSERT INTO zamowienia
                 (ID_Zamowienia, Imie, Nazwisko, Numer, email, Termin, Uwagi)
                 VALUES
                 ('', '$imie', '$nazwisko', '$numer', '$email', '$termin', '$uwagi')
                 ";
             mysqli_query($db1, $query) or die(mysqli_error($db1));

             mysqli_close($db1);
                 
            }
           
        ?>

        </body>
</html>