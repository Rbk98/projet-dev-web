<?php
$title = 'Lire une histoire';
ob_start();
?>
    <div class="bg-gray-100 py-3">
        <div id="container">
            <div id="monitor">
                <div id="monitorscreen">
                    <h3 class="text-center text-white mt-2">Le Prince de Pierrette</h3>
                    <p class="p-4 text-white">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Il était une fois un village tranquille au milieu du
                        royaume de
                        Pierrette. Chaque habitant du
                        village avait sa maison, construite avec les pierres de la carrière du village. Ce village était
                        indépendant : il possédait ses fermiers, ses moulins, sa fontaine… Gouverné par le souverain
                        Géraldin, ce petit village vivait paisiblement sa vie. Vous êtes son fils, nommé Clémentin et
                        êtes fou amoureux de la princesse Clarissa. Clarissa est la fille du comte le plus proche et
                        celui-ci refuse que vous l’épousiez. Selon lui, vous n’êtes pas assez valeureux et ne méritez
                        pas la main de sa fille… Pourtant, comment pourriez-vous vivre sans elle ? Cette magnifique
                        brune aux yeux verts vous fait tourner la tête et sa douce voix vous ensorcèle lors de vos
                        rendez-vous secrets.
                        Un matin, alors que votre petit village s’éveille gentillement un postier arrive à cheval l’air
                        affolé :
                        “Où se trouve seigneur Géraldin ?
                        -Sûrement dans son château, vu l’heure matinale. Monsieur n’est pas encore sorti”, lui répond le
                        paysan qui passait à ce moment-là avec sa brouette.
                        Le postier se hâte et se dirige vers le château.
                        Alors que vous vous éveillez tranquillement, votre servante toque à la porte :
                        “Monsieur Clémentin ? Êtes-vous réveillé ?
                        -Mmmh…, marmonnez-vous encore ensommeillé.
                        -Votre père vous demande en urgence. C’est à propos de mademoiselle Clarissa.”
                        Cette fois-ci, vos yeux s'ouvrent grands : que peut-il bien se passer ? Vous vous levez
                        rapidement, vous habillez en vitesse et rejoignez votre père dans la salle de conseil. Celui-ci
                        n’est pas seul est se trouve accompagné d’un postier du village voisin.
                        “Père, que se passe-t-il ?
                        -C’est mademoiselle Clarissa. Elle a été enlevée. Personne ne sait où elle se trouve…
                        - Quoi ? Comment cela est-il possible ? Nous devons la retrouver ! Je pars sur le champ.”
                        Quelques heures plus tard, vous êtes fin prêt à partir. Votre armure sur le dos, votre vassal
                        tente de vous convaincre que prendre votre épée sur votre cheval n’est pas raisonnable et qu’il
                        faut choisir l’un ou l’autre.

                    </p>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>