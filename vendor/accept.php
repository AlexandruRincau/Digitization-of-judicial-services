<?php
require_once __DIR__ . '/../config/helper.php';
$directory = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\file\file_upload';
$files = scandir($directory);
var_dump($_POST['file_to_move']);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['file_to_move'])) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'Primire':

                $fileToMove = $_POST['file_to_move'];
                $sourcePath = $directory . '\\' . $fileToMove;
                $destinationPath = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\file\file_accept\\' . $fileToMove;

                if (rename($sourcePath, $destinationPath)) {
                    echo '<p>Fișierul "' . $fileToMove . '" a fost mutat cu succes în directoria "file_accept".</p>';
                } else {
                    echo '<p>Eroare la mutarea fișierului.</p>';
                }

                $fileToDelete = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\file\file_upload\\' . $fileToMove;
                if (unlink($fileToDelete)) {
                    echo '<p>Fișierul "' . $fileToMove . '" a fost șters din directoria "file_upload".</p>';
                } else {
                    echo '<p>Eroare la ștergerea fișierului din directoria "file_upload".</p>';
                }
                break;

            case 'NuDaCurs':

                $fileToMove = $_POST['file_to_move'];
                $sourcePath = $directory . '\\' . $fileToMove;
                $destinationPath = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\file\file_refuse\\' . $fileToMove;

                if (rename($sourcePath, $destinationPath)) {
                    echo '<p>Fișierul "' . $fileToMove . '" a fost mutat cu succes în directoria "file_accept".</p>';
                } else {
                    echo '<p>Eroare la mutarea fișierului.</p>';
                }

                $fileToDelete = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\file\file_upload\\' . $fileToMove;
                if (unlink($fileToDelete)) {
                    echo '<p>Fișierul "' . $fileToMove . '" a fost șters din directoria "file_upload".</p>';
                } else {
                    echo '<p>Eroare la ștergerea fișierului din directoria "file_upload".</p>';
                }

                if (!empty($_POST['text_content'])) {
                    $directory = '../message/';

                    if (!file_exists($directory)) {
                        mkdir($directory, 0777, true);
                    }

                    $filename = $directory . $fileToMove . '.txt';

                    file_put_contents($filename, $_POST['text_content']);

                    redirect('../login/inst.php');
                    exit;
                } else {
                    echo "Textarea este goală!";

                }
                break;

            case 'RefuzaPrimirea':

                $fileToMove = $_POST['file_to_move'];
                $fileToDelete = 'C:\Users\rinca\Desktop\Transefer145\PhpstormProjects\Teza_de_licență\file\file_upload\\' . $fileToMove;
                if (unlink($fileToDelete)) {
                    echo '<p>Fișierul "' . $fileToMove . '" a fost șters din directoria "file_upload".</p>';
                } else {
                    echo '<p>Eroare la ștergerea fișierului din directoria "file_upload".</p>';
                }

                if (!empty($_POST['text_content'])) {
                    $directory = '../message/';

                    if (!file_exists($directory)) {
                        mkdir($directory, 0777, true);
                    }

                    $filename = $directory . $fileToMove . '.txt';

                    file_put_contents($filename, $_POST['text_content']);

                    redirect('../login/inst.php');
                    exit;
                } else {
                    echo "Textarea este goală!";

                }
                break;

            default:

                break;
        }
    }
}