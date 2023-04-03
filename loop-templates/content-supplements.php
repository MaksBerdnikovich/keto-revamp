<?php

?>

<div class="dashboard">
    <div class="container">
        <div class="supplements-db"><!--Supplements Start-->
            <div class="supplements-db-grid grid">
                <div class="grid-row">
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                    <div class="grid-col col-50">
                        <div class="grid-item panel">
                            <div class="supplements-db-item">
                                <div class="supplements-db-item__image">
                                    <img src="<?=get_image_url('db/supplement.png')?>" alt="image" />
                                </div>
                                <div class="supplements-db-item__data">
                                    <div class="supplements-db-item__info">
                                        <div class="title m-bottom-1">Keto Bacon Recipes</div>
                                        <div class="short m-bottom-1">
                                            <p>
                                                The BioSlim supplement is packed with all the specific probiotic strains that
                                                have been scientifically proven to burn body fat and get your body in the
                                                best shape you've ever seen...
                                            </p>
                                        </div>
                                        <div class="text read-more">
                                            <a href="javascript:void(0)" class="read-more__open">Read more</a>
                                            <div class="read-more__block">
                                                <p class="m-bottom-1">
                                                    And unlike a lot of probiotics on the market that will kick you out of
                                                    ketosis and ruin all your hard work BioSlim works in synergy with the
                                                    ketogenic diet to supercharge the fat burning effects.
                                                </p>
                                                <p class="m-bottom-1">
                                                    <b>Fat burning bacteria in BioSlim include:</b>
                                                </p>
                                                <ol class="m-bottom-1">
                                                    <li>
                                                        <p>
                                                            Bacillus Subtilus - Referred to as the “king of probiotics” due to
                                                            its spore like form. In clinical trials, it was shown to
                                                            “significantly reduce weight without changes in food intake”.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            Bacillus Subtilus - Referred to as the “king of probiotics” due to
                                                            its spore like form. In clinical trials, it was shown to
                                                            “significantly reduce weight without changes in food intake”.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            Bacillus Subtilus - Referred to as the “king of probiotics” due to
                                                            its spore like form. In clinical trials, it was shown to
                                                            “significantly reduce weight without changes in food intake”.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            Bacillus Subtilus - Referred to as the “king of probiotics” due to
                                                            its spore like form. In clinical trials, it was shown to
                                                            “significantly reduce weight without changes in food intake”.
                                                        </p>
                                                    </li>
                                                </ol>
                                                <p>
                                                    All of which work together to rebalance your gut bacteria and help shed
                                                    unwanted body fat.
                                                    BioSlim is natural, free of additives and made right here in the USA.
                                                </p>
                                            </div>
                                            <a href="javascript:void(0)" class="read-more__close">Read less</a>
                                        </div>
                                    </div>
                                    <div class="supplements-db-item__btns">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="btn btn-solid btn-primary btn-large light-1">
                                                    I Want 1 bottle
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="btn btn-solid btn-primary btn-large light-2">
                                                    I Want 3 bottle
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="btn btn-solid btn-primary btn-large light-3">
                                                    I Want 6 bottle
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
