<?php
function generaPassword($lunghezza, $caratteri_selezionati, $ripetizione) {
    // Gestisci le opzioni di ripetizione
    $ripetizione_caratteri = $ripetizione ? '' : 'nrus';

    // Costruisci il set di caratteri basato sulle opzioni selezionate
    $caratteri = '';
    if (in_array('numeri', $caratteri_selezionati)) {
        $caratteri .= '0123456789';
    }
    if (in_array('lettere', $caratteri_selezionati)) {
        $caratteri .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if (in_array('simboli', $caratteri_selezionati)) {
        $caratteri .= '!@#$%^&*()_+=-';
    }

    $password = '';
    $lunghezza_caratteri = strlen($caratteri);

    for ($i = 0; $i < $lunghezza; $i++) {
        $random_index = rand(0, $lunghezza_caratteri - 1);
        $password .= $caratteri[$random_index];
    }

    return $password;
}
?>

