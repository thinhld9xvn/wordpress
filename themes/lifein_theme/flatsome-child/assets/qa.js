jQuery(function($) {

    const QAS = [
        {
            id : "qa_1",
            question : `Avez-vous fait l’objet d’une interdiction d’accueil du public lors du <br/> 
            second confinement du 30 octobre 2020?`,
            isQAFinish : false,
            hasSubFooter : false,
            ans : {
                yes : {
                    next_qid : "qa_2"
                },
                no : {
                    next_qid : "qa_finish_2"
                }
            }
        },
        {
            id : "qa_2",
            question : "Avez-vous + de 10 salariés?",
            isQAFinish : false,
            ans : {
                yes : {
                    next_qid : "qa_finish_2"
                },
                no : {
                    next_qid : "qa_3"
                }
            }
        },
        {
            id : "qa_3",
            question : "Votre chiffre d’affaire dépasse 2 millions d’euros par an?",
            isQAFinish : false,
            hasSubFooter : false,
            ans : {
                yes : {
                    next_qid : "qa_finish_2"
                },
                no : {
                    next_qid : "qa_4"
                }
            }
        },
        {
            id : "qa_4",
            question : "Votre commerce a-t-il été créé avant le 30 octobre 2020 ?",
            isQAFinish : false,
            hasSubFooter : false,
            ans : {
                yes : {
                    next_qid : "qa_5"
                },
                no : {
                    next_qid : "qa_finish_2"
                }
            }
        },
        {
            id : "qa_5",
            question : `Etes-vous à jour de vos obligations à l'égard de l'administration <br/>
            fiscale et de l'organisme de recouvrement des cotisations <br/>
            patronales de sécurité sociale ?`,
            isQAFinish : false,
            hasSubFooter : false,
            ans : {
                yes : {
                    next_qid : "qa_6"
                },
                no : {
                    next_qid : "qa_finish_2"
                }
            }
        },
        {
            id : "qa_6",
            question : `Etes-vous déclaré en situation de liquidation judiciaire, à ce jour ?`,
            isQAFinish : false,
            hasSubFooter : false,
            ans : {
                yes : {
                    next_qid : "qa_finish_2"
                },
                no : {
                    next_qid : "qa_7"
                }
            }
        },
        {
            id : "qa_7",
            question : `Faites-vous partie de l’un de ces secteurs d’activité ?`,
            subtext : 'Activité exercée (APE)',
            hasSubFooter : true,
            isQAFinish : false,
            subFooter : {
                subtext : `4751 - Commerce de détail de textiles en magasin spécialisé <br>
							4761 - Commerce de détail de livres en magasin spécialisé <br>
							4764 - Commerce de détail d'articles de sport en magasin spécialisé <br>
							4771 - Commerce de détail d'habillement en magasin spécialisé <br>
							4772 - Commerce de détail de chaussures et d'articles en cuir en magasin spécialisé<br>
4775 - Commerce de détail de parfumerie et de produits de beauté en magasin spécialisé<br>
4776 - Commerce de détail de fleurs, plantes, graines, engrais, animaux de compagnie et aliments pour ces animaux en magasin spécialisé<br>
							4777 - Commerce de détail d'articles d'horlogerie et de bijouterie en magasin spécialisé<br>
							551 - Hôtels et hébergement similaire <br>
							552 - Hébergement touristique et autre hébergement de courte durée <br>
							553 - Terrains de camping et parcs pour caravanes ou véhicules de loisirs <br>
							5610A - Restauration traditionnelle <br>
							5610B - Cafétérias et autres libres-services <br>
							563 - Débits de boissons <br>
							79 - Activités des agences de voyage, voyagistes, services de réservation et activités connexes <br>
							823 - Organisation de salons professionnels et congrès <br>
							9602 - Coiffure et soins de beauté <br>
							9604 - Entretien corporel <br>
							R - Arts, spectacles et activités récréatives`

            },        
            ans : {
                yes : {
                    next_qid : "qa_finish_1"
                },
                no : {
                    next_qid : "qa_finish_2"
                }
            }
        },
        {
            id : "qa_finish_1",
            text : `Bravo ! Vous êtes éligible !`,
            subtext : `Félicitations! Votre solution ne vous coûtera rien avant 2 ans grâce au chèque numérique du gouvernement et à LifeIn. 
Vous pourrez après ce terme souscrire un abonnement à partir de 19,99€ pour continuer à utiliser ce service.`,
            isQAFinish : true,
            hasSubFooter : false,
            button : {
                text : `Profitez de l'offre`,
                url : '//commerce.lifein.click/user/free-register'
            }
        },
        {
            id : "qa_finish_2",
            text : `Vous n’êtes pas éligible`,
            subtext : `Vous pouvez toujours profiter de nos offres. Découvrez les abonnements que nous proposons.`,
            isQAFinish : true,
            hasSubFooter : false,
            button : {
                text : `Profitez de l'offre`,
                url : '//commerce.lifein.click/user/choose-bussiness'
            }
        },
        
    ];

    const question_html = `
        <div class="popup-wrapper">
        <a href="javascript:;" class="close-popup" data-id="popup_1" data-animation="scale">&times;</a>
            <div class="popup-content-top">
                <img class="img-top img-heart" src="${IMG_DIR}images/img-heart.png" width="110" height="89" alt="" style="">
            <figcaption>
                <img src="${IMG_DIR}images/img-text-heart.png" width="119" height="37">
            </figcaption>
            <h3 class="title-popup">{question}</h3>
            <div class="popup-footer">
                <button id="btnPopupYes" data-next-qid="{yes_next_qid}">Oui</button>
                <button id="btnPopupNo" data-next-qid="{no_next_qid}">Non</button>
            </div>
        </div>`;

    const question_has_subFooter_html = `
        <div class="popup-wrapper">
        <a href="javascript:;" class="close-popup" data-id="popup_1" data-animation="scale">&times;</a>
            <div class="popup-content-top">
                    <img class="img-top img-heart" src="${IMG_DIR}images/img-heart.png" width="110" height="89" alt="" style="">
                <figcaption>
                    <img src="${IMG_DIR}images/img-text-heart.png" width="119" height="37">
                </figcaption>
                <h3 class="title-popup">{text}</h3>
                <p>{subText}</p>
            </div>
            <div class="popup-footer">
                    <button id="btnPopupYes" data-next-qid="{yes_next_qid}">Oui</button>
                    <button id="btnPopupNo" data-next-qid="{no_next_qid}">Non</button>
                </div>
            <div class="popup-show-details">
                <a class="" href="#">
                    <span>Afficher les activités acceptées</span>
                    <span class="fa fa-angle-double-down padLeft5"></span>
                </a>
            </div>
            <div class="popup-content-bottom">
                <p>{subFooterText}</p>                
            </div>
        </div>`;

    const qa_finish_html = `
        <div class="popup-wrapper">
            <a href="javascript:;" class="close-popup" data-id="popup_1" data-animation="scale">&times;</a>
            <div class="popup-content-top">
                <img class="img-top img-heart" src="${IMG_DIR}images/img-popup-1.png" width="110" height="89" alt="" style="">            
                <h3 class="title-popup">{text}</h3>
                <p>{subText}</p>
                <div class="box-btn"><a href="{buttonURL}" class="btn">{buttonText}</a></div>
            </div>
        </div>
        `;

    function isNormalTypeQA(qa) {

        return ! qa.isQAFinish && ! qa.hasSubFooter;

    }

    function isSubFooterTypeQA(qa) {

        return qa.hasSubFooter && ! qa.isQAFinish;

    }

    function isFinishTypeQA(qa) {

        return qa.isQAFinish;

    }

    function createNormalQAUI(qa) {

        let html = question_html,
            {id, question, ans} = qa;

        html = html.replace(/\{question\}/ig, question)
                    .replace(/\{yes_next_qid\}/ig, ans.yes.next_qid)
                    .replace(/\{no_next_qid\}/ig, ans.no.next_qid);

        $('#popup_1').find('.popup-content').html(html).removeClass('align-unset');

    } 

    function createSubFooterQAUI(qa) {

        let html = question_has_subFooter_html,
            {id, question, subtext, subFooter, ans} = qa;

        html = html.replace(/\{text\}/ig, question)
                    .replace(/\{subText\}/ig, subtext)
                    .replace(/\{subFooterText\}/ig, subFooter.subtext)
                    .replace(/\{yes_next_qid\}/ig, ans.yes.next_qid)
                    .replace(/\{no_next_qid\}/ig, ans.no.next_qid);

        $('#popup_1').find('.popup-content').html(html)
                                            .removeClass('align-unset');

    }

    function createFinishQAUI(qa) {

        let html = qa_finish_html,
            {id, text, button, subtext} = qa;

        html = html.replace(/\{subText\}/ig, subtext)
                    .replace(/\{text\}/ig, text)
                    .replace(/\{buttonText\}/ig, button.text)
                    .replace(/\{buttonURL\}/ig, button.url);             

        $('#popup_1').find('.popup-content').html(html).removeClass('align-unset');

    }

    function showQA(id) {

        const qa = QAS.filter(qa => qa.id.toString().toLowerCase() === id.toString().toLowerCase())[0];

        if ( isNormalTypeQA(qa) ) {

            createNormalQAUI(qa);

        }

        else if ( isSubFooterTypeQA(qa) ) {

            createSubFooterQAUI(qa);

        }

        else if ( isFinishTypeQA(qa) ) {

            createFinishQAUI(qa);

        }

    }

    function onClick_expandQASubFooter(e) {

        e.preventDefault();

        $('.popup .popup-content-bottom').addClass('__expand');
        $('.popup .popup-content').addClass('align-unset');

        $(this).parent().remove();


    }

    function onClick_nextQA(e) {

        e.preventDefault();

        const next_qid = $(this).data('next-qid');
        
        showQA(next_qid);

    }    

    function QAStart() {

        showQA('qa_1');
        
    }

    $(document).on('click', '#btnPopupYes', onClick_nextQA)
    .on('click', '#btnPopupNo', onClick_nextQA)
    .on('click', '.popup-show-details > a', onClick_expandQASubFooter);

    $(document).on('click', '.open-popup', QAStart);


});