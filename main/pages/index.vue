<template>
    <main>
        <h4>Une carte de fidélité : oui, mais pourquoi ?</h4>

        <div class="content-ctnr">
            <div class="left">
                <img src="/caisse-commerce.jpg" alt="">
            </div>
            <div class="right">
                <h5>Fidéliser, c’est avant tout économiser !</h5>
                
                <p>
                    Vous identifiez vos clients en caisse avec leur carte de fidélité et récompensez leurs achats.
                    Lorsqu’ils ont quitté votre point de vente, <strong>gardez le lien avec des communications personnalisées.</strong>
                </p>
                <p>
                    Avec l’entrée en vigueur du RGPD, la réglementation se veut plus sévère envers les mails promotionnels, au profit des mails relationnels.
                    <strong>à travers la carte de fidélité pour rester en conformité !</strong>
                </p>
                <p>
                    Carte de fidélité mono ou multi-enseignes, en magasin et/ou en ligne…
                    Plusieurs types de programme sont disponibles, <strong>les récompenses attribuées dépendent de vos envies d’animation !</strong>
                </p>
            </div>
        </div>

        <h4>Pourquoi la fidélité ça anime bien ?</h4>

        <div class="content-ctnr">
            <div class="left">
                <h5>Renforcez votre relation client avec une carte de fidélité</h5>
                
                <ul>
                    <li>
                        <strong>lien de confiance renforcé</strong> : 
                        la carte de fidélité crée un lien avec le commerce et permet au consommateur de s’identifier au commerce et à la marque. 
                        Il se sent privilégié par rapport aux autres consommateurs.
                    </li>
                    <li>
                        <strong>offres personnalisées</strong> : 
                        grâce à la collecte de données, vous connaissez mieux votre clientèle. Vous lui proposez des offres et des animations adaptées, 
                        l’incitant à se rendre régulièrement sur votre point de vente.
                    </li>
                    <li>
                        <strong>avantage compétitif</strong> : 
                        en bref, la carte de fidélité apporte une réelle valeur ajoutée à votre commerce, 
                        appréciée des consommateurs et vous différenciant de vos concurrents !
                    </li>
                </ul>
            </div>
            <div class="right">
                <img src="/vendeuse-tablette.jpg" alt="">
            </div>
        </div>

        <h4>La carte de fidélité, ça rapporte !</h4>
        
        <div class="content-ctnr">
            <div class="left">
                <img src="/commerçant-cool.png" alt="">
            </div>
            <div class="right">
                <h5>Boostez votre chiffre d’affaires avec un programme de fidélité</h5>
               
               <ul>
                    <li>
                        <strong>Un panier moyen plus élevé</strong> : 
                        en moyenne, un client ayant une carte de fidélité repart avec un panier moyen 10 à 20% plus élevé !
                    </li>
                    <li>
                        <strong>Une fréquentation en hausse</strong> : 
                        vos clients appréciant votre service visiteront davantage votre commerce pour bénéficier des avantages de votre programme de fidélisation.
                    </li>
                    <li>
                        <strong>Un lien de proximité</strong> : 
                        l’identification en caisse, avec ou sans la carte de fidélité en mains, vous permet de réserver un accueil chaleureux et personnalisé à vos clients.
                    </li>
                </ul>
            </div>
        </div>

        <div class="lc">
            <h4>LoyaltyCard c'est tout ces avantages cumulés</h4>

            <a href="" class="btn xl">Connectez-vous !</a>
        </div>

        <div class="advantages">
            <div class="advantage">
                <div class="top">
                    <img src="/icon-points.png" alt="" class="icon">
                </div>
                <div class="bottom">
                    <h6>Fidélité à points</h6>

                    <p>
                        Le client cumule des points au fur et à mesure de ses achats.
                        Le client reçoit une récompense lorsqu’il a atteint 
                        le nombre de points nécessaires.
                    </p>
                </div>
            </div>
            <div class="advantage">
                <div class="top">
                    <img src="/icon-heart.png" alt="" class="icon">
                </div>
                <div class="bottom">
                    <h6>Digitalisez tous vos points de vente</h6>

                    <p>
                        En complément de votre programme, 
                        intégrez facilement vos articles sur notre boutique en ligne.
                    </p>
                </div>
            </div>
            <div class="advantage">
                <div class="top">
                    <img src="/icon-visible.png" alt="" class="icon">
                </div>
                <div class="bottom">
                    <h6>Visible</h6>

                    <p>
                        Restez visible sur le mobile de vos clients.
                        Envoyez-leur des notifications push liées à leurs avantages fidélité ou mettez en avant vos nouvelles offres ou collections.
                    </p>
                </div>
            </div>
        </div>
        <h4>Démonstration simulée :</h4>
        <ThreeScene/>
        <Footer/>
    </main>
</template>

<script>

</script>

<style lang='css' scoped>
    main {
        margin-top: 32px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    main > h4 {
        margin: 64px 0;
    }

    .content-ctnr {
        margin-top: 32px;
        display: flex;
    }
    .content-ctnr h5 {
        color: var(--imperial-red);
    }
    .content-ctnr .left {
        padding: 0 16px;
    }
    .content-ctnr img {
        border-radius: 10px;
    }
    .content-ctnr li::before {
        color: var(--imperial-red);
    }
    .content-ctnr li {
        display: block;
        margin-top: 16px;
    }

    .lc {
        margin: 32px;
        padding: 0 16px;
        border-top: 1px solid;
        border-bottom: 1px solid;
        display: flex;
        flex-direction: column;
        align-items: center;
        
    }
    .lc h4 {
        margin: 16px 0;
    }
    .lc .btn  {
        width: 150px;
        margin: 16px 0;
    }

    .advantages{
        display: flex;
        justify-content: space-between;
    }
    .advantages .advantage {
        width: 180px;
        margin: 0 16px;
        text-align: center;
    }
    .advantages .advantage .top {
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .advantages .advantage h6 {
        margin: 32px 0;
    }

    @media (max-width: 767.98px) {
        .content-ctnr {
            padding: 0 32px;
            flex-direction: column;
        }
        .content-ctnr .left, .content-ctnr .right {
            text-align: center;
        }
        .advantages {
            flex-direction: column;
            justify-content: center;
        }
        .advantages .advantage {
            margin: 16px 0;
        }  
    }
</style>
