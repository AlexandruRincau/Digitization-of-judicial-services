<?php

require_once __DIR__ . '/../config/helper.php';

checkAuth();

$user = currentUser();
$data = currentData();
$pers_jur = currentPers_jur();
$file = basename(__FILE__);
$_SESSION['file_upload'] = $file;

?>

<!doctype html>
<html lang="ro" data-theme="light">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>JusticeMD</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.tiny.cloud/1/48pg52737x04x4vx1cybbvf1jh0lpjh4l75nqlt8cuqj70v3/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'image',
            content_css: '../style/custom-style.css',
            setup: function(editor) {
                editor.on('change', function(e) {
                    $.ajax({
                        type: 'POST',
                        url: 'config/save.php',
                        data: {
                            editor: tinymce.get('editor').getContent()
                        },
                        success: function(data) {
                            $('#editor').val('');
                            console.log(data);
                        }
                    });
                });
            }
        });
    </script>
    <script>
            function redirect() {
            var selectBox = document.getElementById("pagina");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue) {
            window.location.href = selectedValue;
        }
        }
    </script>
</head>
<body class="body1">

<header>
    <nav>
        <ul>
            <li><a href="../login/home.php"><img class="img2" src="../img/logo.png" alt="Logo"></a></li>
            <li><a href="../login/home.php" class="logo">JusticeMD</a></li>
            <li><a href="../login/home.php">Profil</a></li>
            <li><a href="../login/cerere.php">Cerere</a></li>
            <li><a href="../login/file_upload.php">Trimite cererea</a></li>
            <li><a href="form.php">Forma</a></li>
        </ul>
    </nav>
</header>

    <label for="pagina" class="textSt2">Schimbarea șablonului</label><br>
    <select id="pagina" onchange="redirect()" class="select">
        <option value="">Alege o pagină</option>
        <?php
        $directory = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\sablon';
        $files = scandir($directory);
        foreach ($files as $file) {
            if (!in_array($file, array(".", ".."))) {
                echo '<option value="' . $file . '">' . $file . '</option>';
            }
        }
        ?>
    </select>

    <form method="post" action="../config/save.php" class="form">
        <div id="editor">
             <div class="text">
                 <img src="../img/img1.png" class="img" alt="Stema">
                 <div class="text2">COMPANIA NAȚIONALĂ DE ASIGURĂRI ÎN MEDICINĂ AGENȚIA TERITORIALĂ EST</div>
                 <hr class="hr2">
                 <hr class="hr">
                 <hr class="hr2">
                 <div class="text3"><?= $pers_jur['codul_post'] ?>, or.<?= $pers_jur['localitatea'] ?>, str.<?= $pers_jur['strada'] ?>; Tel.: <?= $pers_jur['telefon'] ?>, E-mail: <?= $pers_jur['email_comp'] ?> </div>
                 <div class="text4">Judecătoria Căușeni</div>
                 <div class="text5">(sediul-central)</div>
                 <div class="text6">or. Căușeni, str. Ștefan cel Mare 86</div>
                 <div class="text7"><a class="text9">Reclamant: </a><?= $pers_jur['den_comp'] ?>  ,</div>
                 <div class="text8">Agenția Teritorială Est</div>
                 <div class="text10">sediul: or. <?= $pers_jur['localitatea'] ?>, str. <?= $pers_jur['strada'] ?>, IDNO <?= $pers_jur['IDNO'] ?> </div>
                 <div class="text10">Codul băncii: TMZMD2X </div>
                 <div class="text10">Contul Trezorerial de încasare pentru prima AOAM în sumă fixă și </div>
                 <div class="text10">Date bancare: Beneficiar: Ministerul Finanțelor - Trezoreria de Stat</div>
                 <div class="text11">Codul fiscal: <?= $pers_jur['codul_fisc'] ?> </div>
                 <div class="text10">Banca beneficiară: Ministerul Finanțelor - Trezoreria de Stat</div>
                 <div class="text10">penalitatea de întîrziere <a class="text11">IBAN: <?= $pers_jur['IBAN'] ?> </a></div>
                 <div class="text11">Scutită de achitarea taxei de stat în temeiul art. 4 alin. 1 pct 141 a Legii</div>
                 <div class="text11">Nr. 1216 din 03.12.1992 și art 85 alin. 1 lit.(o) CPC R. Moldova.</div>
                 <div class="text11"><a class="text9">Pârât: </a><?= $data['numele2'] ?> <?= $data['prenumele2'] ?> <?= $data['patronimic'] ?> , IDNP <?= $data['IDNP'] ?> </div>
                 <div class="text10"><a class="text11">Domiciliu: <?= $data['localitatea2'] ?> ,</a> fondator Gospodărie</div>
                 <div class="text10">Țărănească <a class="text11">“”, c/f - <?= $data['codul_fisc2']?></a></div>
                 <div class="just">
                     <div class="bold top">Cerere de chemare în judecată</div>
                     <div class="bold">privind încasarea primei de asigurare obligatorie de asistență medicală</div>
                     <div class="bold bottom">și a penalității aferente</div>
                     <div class="par">      <?= $pers_jur['den_comp'] ?>(în continuare-CNAM), reprezentată de Agenția Teritorială Est în persoana lui Anatolie Nițelea, desemnat în funcția de Director al Agenției Teritoriale Est prin Ordinul CNAM nr. 191-c din 15.06.2018, care activează în baza Statutului Agenției Teritoriale Est, aprobat prin Ordinul CNAM nr. 489-A din 18.10.2017, înaintează prezenta cerere de chemare în judecată privind încasarea sumei datorate pentru perioada anului 2023 în mărime de  lei, compusă din prima de asigurare obligatorie de asistență medicală în mărime de   lei și a penalității aferente în sumă de lei de la <?= $data['numele2'] ?> <?= $data['prenumele2'] ?> <?= $data['patronimic'] ?> , IDNP <?= $data['IDNP'] ?>, domiciliul: <?= $data['localitatea2'] ?>, fondator al Gospodăriei Țărănești “<?= $data['den_comp2'] ?>” c/f - <?= $data['codul_fisc2'] ?>.</div>
                     <div class="par">Prezenta cerere se întemeiază pe următoarele motive:</div>
                     <div class="par">în fapt:</div>
                     <div class="par">In temeiul Legii cu privire la asigurarea obligatorie de asistență medicală, nr. 1585-XIII din 27.02.1998, cu modificările și completările ulterioare, asigurarea obligatorie de asistență medicală are un cararcter obligatoriu pentru toți cetățenii Republicii Moldova. Obligativitatea asigurării este expres stabilită ca principiu în art. 5 alin. (1) lit. d) din Legea 1585/1998, pe baza căruia se organizează și fincționează sistemul asigurăeii obligatorii de asistență medicală și potrivit căruia persoanele fizice și juridice au, conform Legii, obligația de a participa la sistemul asigurării obligatorii de asistență medicală.</div>
                     <div class="par">Obligativitatea instituită prin efectul legii, de fapt, reprezintă un instrument de responsabilizare a cetățenilor de a participa la sistemul asigurării obligatorii de asistență medicală prin achitarea primelor în fondurile asigurării obligatorii de asistență medicală pentru acumularea mijloacelor financiare în scopul acoperirii cheltuielilor de tratament ce pot surveni asupra stării sănătății a persoanelor. Potrivit prevederilor art. 26 alin (1) lit. c) al Legii finanțelor publice și responsabilității bugetar-fiscale, nr. 181 din 25.07.2014 - fondurile asigurării obligatorii de asistență medicală sânt parte componentă a bugetului public național.</div>
                     <div class="par">Neexecutarea obligației de achitare a primei de asigurare în termen, atrage după sine aplicarea sancțiunilor pecuniare față de persoana care nu si-a onorat obligația.</div>
                     <div class="par">Mijloacele finaciare acumulate în fondurile de asigurare, inclusiv sumele penalităților pentru neachitarea în termen a primelor, sânt destinate realizării activității specifice asigurării obligatorii de asistență medicală și se utilizează în strictă conformitate cu Regulamentul cu privire la modul de constituire și administrare a fondurilor asigurării obligatorii de asistență medicală, aprobat prin HG RM nr. 594 din 14.05.2002 cu modificările și completările ulterioare.</div>
                     <div class="par">În sistemul asigurării obligatorii de asistență medicală, Companiei Naționale de Asigurări în Medicină și agențiilor ei teritoriale îi revine calitatea de asigurător, în timp ce calitatea de persoane asigurate o pot avea atât cetățenii R. Moldova, cât și străinii, în condițiile stabilite de legislație (art. 4 alin. (1),(6),(7) al Legii 1585/1998) și care se dobîndește ca urmare a achitării primelor de asigurare obligatorie de asistență medicală în cotă procentuală sau în sumă fixă în dependență de categoria de plătitori la care persoana se atribuie (Anexele 1 și 2 la Legea 1593 din 26.12.2002).</div>
                     <div class="par">Legiuitorul distinge două categorii de plătitori enunțate în Anexele 1 și 2 ale Legii cu privire la mărimea, modul și termenele de achitare a primelor de asigurare obligatorie de asistență medicală, nr. 1593-XV din 26.12.2002, cu modificările și completările ulterioare: categoriile de plătitori ai primelor de asigurare obligatorie de asistență medicală în formă de contribuție procentuală la salariu și la alte recompense (anexa nr. 1) și categoriile de plătitori ai primelor de asigurare obligatorie de asistență medicală în sumă fixă, care se asigură în mod individual (anexa nr. 2). La rândul său, Anexa nr. 2 la Legea 1593/2002 enumera categoriile de plătitori ai primelor de asigurare obligatorie de asistență medicală în sumă fixă, persoane fizice neangajate, cu domiciliul în R. Moldova, care se asigură în mod individual, la pct. 1 lit. b) fiind enunțați expres fondatorii de întreprinderi individuale. La fel, art. 2 și art. 3 al Legii nr. 1353 din 03.11.2000 privind gospodăriile țărănești difînește Gospodăria țărănească ca întreprindere individuală, bazată pe proprietatea privată asupra terenurilor agricole, care poate desfășura activitate individuală de întreprinzător în agricultură, având statut juridic de persoană fizică.</div>
                     <div class="par">În temeiul art. 22 alin. (1) din Legea 1593/2002 cu modificările și completările ulterioare, persoanele atribuite la categoria sus-menționată (plătitorii primei în sumă fixă) au obligația să achite prima de asigurare obligatorie de asistență medicală în sumă fixă anual, până la data de 31 martie a anului de gestiune. Respectiv, pentru persoanele care se asigură în mod individual, statutul de persoană asigurată se acordă de la achitarea primei AOAM în sumă fixă în mărimea stabilită de legislație și se suspendă la 31 ianuarie a anului următor celui de gestiune, conform art. 6 alin (4) lit. d) din Legea 1585/1998.</div>
                     <div class="par">Potrivit art. 14 alin (1) din Legea 1585/1998 și art. 30 alin. (1) din Legea 1593/2002, neachitarea primei de asigurare obligatorie de asistență medicală până la data stabilită în art. 22 alin. (1) al Legii 1593/2002, atrage după sine achitarea și a unei penalități, stabilite în mărime de 0,1% din suma primei pentru fiecare zi de întârziere a plății.</div>
                     <div class="par">Conform art. 17 alin. (4) al Legii 1593/2002, termenul de prescripție extensivă pentru stingerea primelor de asigurare obligatorie de asistență medicală, a penalităților aferente acestora este de 3 ani.</div>
                     <div class="par">CNAM, în temeiul art. 17 alin. (I1) din Legea 1593/2002, prin intermediul agențiilor teritoriale, efectuiază evidența corectitudinii virării în termen la contul său a primelor de asigurare obligatorie de asistență medicală în sumă fixă și a penalităților.</div>
                     <div class="par">În scopul exercitării atribuțiilor sale, potrivit pct. 11 lit. k) din Statutul CNAM, aprobat prin HG RM nr. 156 din 11.02.2002, cu modificările și completările ulterioare „CNAM are dreptul să dezvolte sistemul informațional integrat pentru toate nivelurile subordonate companiei și să creeze baza informaționale de date referitor la subiecții asigurării obligatorii de asistență medicală”.</div>
                     <div class="par">Astfel, în conformitate cu art. 61 alin. (3) din Legea 1585/1998, statutul persoanei fizice asigurate în sistemul asigurării obligatorii de asistență medicală se confirmă prin interogarea electronică a sistemului informațional al CNAM, utilizând numărul de identificare de stat sau seria și numărul buletinului de identitate provizoriu pentru persoanele care nu dețin număr de identitate.</div>
                     <div class="par">Totodată, în conformitate cu pct. 3-5 din Regulamentul privind acordare/suspendarea statutului de persoană asigurată în sistemul asigurării obligatorii de asistență medicală, aprobat prin HG RM nr. 1246 din 19.12.2018, CNAM ține evidența persoanelor fizice încadrate în sistemul asigurării obligatorii de asistență medicală în Registrul de evidență a persoanelor asigurate în sistemul asigurării obligatorii de asistență medicală, bază unică de date a CNAM, organizată în conformitate cu cerințele legale, parte componentă a Sistemului informațional automatizat „Asigurarea obligatorie se asistență medicală” (în continuare - SIA AOAM). Evidența în Registrul de evidență a persoanelor asigurate în sistemul asigurării obligatorii de asistență medicală se realizează pe baza numărului de identificare de stat (IDNP) sau a seriei și numărului actului de identitate valabil în sistemul național de pașapoarte, pentru persoanele care nu dețin IDNP, și a numărului de asigurare obligatorie de asistență medicală. Statutul de persoană asigurată se verifică prin interogarea electronică a SIA AOAM.</div>
                     <div class="par">Potrivit informației plasate pe site-ul oficial al Serviciului Fiscal de Stat (https://servicii.fisc.md/contribuabil.asDx).  , IDNP , domiciliul: , este întreprinzător individual-fondator al GȚ „<”, c/f - , cu statut activ (extrasul se anexează), la fel pe site-ul oficial al Agenției Servicii Publice https://date.gov.md/ckaix/ro/dataset/ date din registrul de stat al unităților de drept, susnumitul figurează ca fondator al prezentei întreprinderi individuale (extrasul se anexează).</div>
                     <div class="par">Potrivit Legii nr. 35 8 din 22.12.2022 a fondurilor asigurării obligatorii de asistență medical pe anul 2023, pct. (5) - persoanele fizice prevăzute la pct.l lit. b)-d), e) și f), pct. 3 și 4 din Anexa 2 la Legea 1593/2002 cu privire la mărimea, modul și termenele de achitare a primelor de asigurare obligatorie de asistență medicală, precum și cetățenii Republicii Moldova care nu fac parte din categoriile de plătitori prevăzuți la legea menționată, care achită prima în termenul stabilit la art. 22 alin. (1) din legea menționată, prima de asigurare obligatorie de asistență medicală în sumă fixă se stabilește în cuantum de 2028, 00 lei.</div>
                     <div class="par">Conform art. 23 alin.4 din Legea 1593/2002 - persoanele fizice care, concomitent, fac parte din categoriile de persoane neangajate, asigurate de Guvern, indicate la art. 4 alin. (4) lit. i) și j) din Legea nr. 1585/1998 cu privire la asigurarea obligatorie de asistență medicală, și din categoriile de plătitori ai primelor de asigurare obligatorie de asistență medicală în sumă fixă, prevăzute la pct. 1 lit. a) și d) din anexa nr. 2 la prezenta lege, nu vor achita prima de asigurare obligatorie de asistență medicală în sumă fixă [An.23 al. (4) modificat prin LP40 din 03.03.23, MO92/21.03.23 art. 140; în vigoare 21.03.23].</div>
                     <div class="par">În sensul Legii menționate, obligația de a achita prima de asigurare în sumă fixă o au persoanele cu dizabilități și pensionarii în afară de proprietarii terenurilor cu destinație agricolă și titularii patentei de întreprinzător în rest, persoanele menționate care se atribuie concomitant și la categoriile prevăzute în Anexa 2 a legii 1593/2002 achită prima de asigurare în sumă fixă.</div>
                     <div class="par">În conformitate cu prevederile art. 4 alin. (2) din Legea nr. 358/22.12.2022 prima de asigurare obligatorie de asistență medical în sumă fixă, calculată pentru categoriile de plătitori prevăzute la Anexa nr. 2 la legea nr. 1593/2002 cu privire la mărimea, modul și termenele de achitare a primelor de asigurare obligatorie de asistență medicală, se stabilește, potrivit prevederilor art. 17 alin. (4) din Legea nr. 1585/1998 cu privire la asigurarea obligatorie de asistență medicală, în cuantum de  lei.</div>
                     <div class="par">Conform datelor din SIA AOAM, sistem înregistrat cu nr. de înregistrare 0000074-001 din data de 20.08.2013 în Registrul de evidență al operatorilor de date cu caracter personal al Centrului Național pentru Protecția Datelor cu Caracter Personal al RM, pe perioada anului 2023, pîrîtul nu si-a onorat obligația prevăzută de legislația în vigoare de a achita prima de asigurare obligatorie de asistență medicală în termenul legal stabilit, (raportul detaliat privind extrasele bancare din contul fondurilor CNAM se anexează la cerere).</div>
                     <div class="par">Pentru anul 2023 datoria constituie   lei, ce rezultă din prima de asigurare obligatorie de asistență medicală calculată în sumă fixă în valoare absolută în mărime de  lei, stabilită de art. 4 alin. (2) din Legea fondurilor asigurării obligatorii de asistență medicală pe anul 2023, nr. 358 din 22.12.2022, scadența fiind de la 01 aprilie 2023 inclusiv, penalitatea pentru   zile în sumă de  lei,  lei x 0,1% = 12,64 lei/zi; perioada  -   =  zile;   x 12,64 lei/zi =   lei.</div>
                     <div class="par">În temeiul art. 166 lit. h) CPC RM, în adresa debitorului a fost expediată notificarea cu nr. 04/75-576 din 30.08.2023, privind solicitarea achitării datoriei pentru anul 2023. în pofida faptului că notificarea a fost expediată în adresa pârâtului prin scrisoare recomandată, care de ultimul a fost recepționată, fapt demonstrat de semnătura de pe avizul de recepție, prezentat de organul Poșta Moldovei, susnumitul nu a achitat datoria atestată.</div>
                     <div class="par">În drept, prezenta cerere se întemeiază pe dispozițiile art. 38 alin (1), art. 58 alin. (1), art. 85 alin. (1) lit. o), art. Art. 166-167 CPC RM, Legea cu privire la asigurarea obligatorie de asistență medicală nr. 185-XIII din 27.02.1998 cu modificările și completările ulterioare, Legea cu privire la mărimea, modul și termenele de achitare a primelor de asigurare obligatorie de asistență medicală nr. 1593-XV din 26.12.2002 cu modificările și completările ulterioare, Regulamentul privind acordarea/suspendarea statutului de persoană asigurată în sistemul asigurării obligatorii de asistență medicală, aprobat prin HG RM nr. 1246 din 19.12.2018,Legea fondurilor asigurării obligatorii de asistență medicală pe anul 2023, nr. 358 din 22.12.2022.</div>
                     <div class="par">În baza circumstanțelor de fapt și de drept menționate mai sus, CNAM,</div>
                     <div class="bold bottom top20">SOLICITĂ:</div>
                     <div>1.Admiterea prezentei acțiuni.</div>
                     <div class="just">2.	încasarea de la, IDNP , domiciliul: , în folosul CNAM a sumei totale de   lei, compusă din prima de asigurare obligatorie de asisteță medicală pe anul 2023, în mărime de   lei și a penalității aferente în sumă de   lei.</div>
                     <div class="bold1 italic under top20">Anexe:</div>
                     <div class="font11">-	Extrase din baza de date a Companiei Naționale de Asigurări în Medicină, care confirmă statutul persoanei și neachitarea primelor de asigurare obligatorie de asistență medicală;</div>
                     <div class="font11">-	Copia Notificării nr. 04/75-576 din 30.08.2023 și avizul de recepție care confirmă respectarea procedurii prealabile sesizării instanței.</div>
                     <div class="font11">-	Extras Servicii fiscale electronice FISC, ce confirmă statutul de fondator cu statut activ.</div>
                     <div class="font11">-	Extras din Lista fondatorilor Gospodăriilor Țărănești prezentate de Serviciul Fiscal de Stat.</div>
                     <div class="font11">-	Extras din Statutul Agenției Teritoriale Est a Companiei Naționale de Asigurări în Medicină.</div>
                     <div class="font11 bottom">-Copia procurei pe numele AnațoJieîNițelea - persoană cu drept de semnătură.</div>
                     <div class="top bold1 bottom50">Director AT Est a CNAM <a class="left">Anatolie Nițelea</a></div>
                     <div class="font11">Ex. <?= $user['numele'] ?>  <?= $user['prenumele'] ?> </div>
                     <div class="font11">Mob. <?= $user['tel_mob'] ?> </div>
                     <div class="font11">e-mail: <?= $user['email'] ?></div>
                 </div>
           </div>
        </div>
        <label class="font14" for="numeFisier">Denumirea fișierului</label>
        <input
                type="text"
                id="numeFisier"
                name="numeFisier"
                value= "<?php echo old('numeFisier')?>"
            <?php hasError('numeFisier') ?>
        >
        <?php if(hasValidationError('numeFisier')): ?>

            <small><?php getError('numeFisier');?></small>

        <?php endif; ?>
        <input type="submit" id="btnTrimite" value="Trimite">
    </form>

    <div class="back">
        <p class="font10">(c) 2024 | Teză de licență în cadrul Universității Tehnice a Moldovei (Facultatatea Calculatoare, Informatică și Microelectronică)</p>
    </div>

</body>
</html>
