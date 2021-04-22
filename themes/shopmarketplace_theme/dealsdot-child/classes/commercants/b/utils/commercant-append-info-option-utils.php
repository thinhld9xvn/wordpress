<?php 

    namespace Commercants;

    class CommercantAppendInfoOptionUtils {

        public static function append($data) {
          
            $options = \Commercants\CommercantGetListsOptionUtils::get();

            $options .= sprintf("%s: %s" . PHP_EOL . // ENSEIGNE
                                "%s: %s" . PHP_EOL . // NUMERO
                                "%s: %s" . PHP_EOL . // ADDRESSE
                                "%s: %s" . PHP_EOL . // VILLE
                                "%s: %s" . PHP_EOL . // TELEPHONE_COMMERCE
                                "%s: %s" . PHP_EOL . // SECTEUR_ACTIVITY
                                "%s: %s" . PHP_EOL . // CODE_POSTAL
                                "%s: %s" . PHP_EOL . // EMAIL_COMMERCE
                                "%s: %s" . PHP_EOL . // PORTABLE_RESPONSABLE
                                "%s: %s" . PHP_EOL . // EMAIL_RESPONSABLE
                                "%s: %s" . PHP_EOL . // SITE_INTERNET
                                "%s: %s" . PHP_EOL . // PAGE_FACEBOOK
                                "%s: %s" . PHP_EOL . // JOURS_OUVERTURE_HIVER
                                "%s: %s" . PHP_EOL . // HORAIRES_HIVER
                                "%s: %s" . PHP_EOL . // JOURS_FERMETURE_HIVER
                                "%s: %s" . PHP_EOL . // JOURS_OUVERTURE_ETE
                                "%s: %s" . PHP_EOL . // HORAIRES_ETE
                                "%s: %s" . PHP_EOL . /// JOURS_FERMETURE_ETE
                                "%s: %s" . PHP_EOL . // PARTICULARITES_HORAIRES
                                "%s: %s" . PHP_EOL . // ANNUAIRE
                                "%s: %s" . PHP_EOL . // MASQUES_RESCUS
                                "%s: %s" . PHP_EOL, // BAIL_SAISONNIER
                                \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::NUMERO_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::VILLE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::VILLE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE],
                                \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS_IDX],
                                \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER,
                                $data[\DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER_IDX]);

            $options .= \Stores\STORE_DATA::STORE_DELIMITER . PHP_EOL;

            \Commercants\CommercantUpdateListsOptionUtils::update($options);


        }

    }