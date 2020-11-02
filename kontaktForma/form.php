<?php

  //parametri za vezu

  $server = 'localhost';
  $user = 'root';
  $password = '';
  $baza = 'rezervacije';

  //ostvarivanje veze
  
  $konekcija = mysqli_connect($server, $user, $password, $baza);
  
  //provjera konekcije
  if (!$konekcija) {
      // echo "Provjeri parametre veze";
      die("Program je prestao sa radom" . mysqli_connect_error());
  }else {
    //   echo "Konekcija je uspjesna <br><hr>";
 }

 // Preuzimanje podataka iz forme
$ime=$_POST['ime'];
$email=$_POST['email'];
$prezime=$_POST['prezime'];
$poruka=$_POST['poruka'];
$adresa=$_POST['adresa'];

 //Definicija naredbe podataka
    
 $sql_komanda = "INSERT INTO kontaktforma (id, ime, prezime, email, adresa, poruka )
 VALUES (NULL, '$ime', '$prezime','$email', '$adresa','$poruka')";

//Izvrsavanje naredbe

if (mysqli_query($konekcija,$sql_komanda)) {
echo "Uspjesno ste kontaktirali Restoran MaDdoxX<br>";

}else {
echo "Komanda" . $sql_komanda . "nije uspjela zbog" . mysqli_error($konekcija);
}      

// //slanje na email
// $email_from = 'd2dizajndesign@gmail.com';

// $email_subject = 'Nova rezervacija';

// $email_body = "Korisnicko ime: $ime .\n". 
//                 "Korisnicki email: $email .\n" .
//                     "Korisnikova poruka: $poruka . \n" ;
                    
 
// $to='dejan98vgd@gmail.com';        

// $headers="From: $email_from \r\n";

// $headers.="Odgovor od: $visitor_email \r\n";

// mail($to,$email_subject,$email_body,$headers);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Restoran MaDdoxX</title>
</head>
<body class="form-body">   
    <a href="../index.html">Pocetna</a> 
</body>
</html>
<link rel="stylesheet" type="text/css" href="../css/style.css">

