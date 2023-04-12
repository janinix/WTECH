<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/prod_det_style.css">
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
      <!-- navigacia -->
      <nav class="navbar navbar-light fw-bold navbar-expand-md">
        <div class="container">
            <a href="/" class="navbar-brand"><img src="images/logo_black.png" alt="" width="130" height=""></a>
            <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav"
                    aria-label="Expand navigation">
                <span class="navbar-toggler-icon "><i class="fa fa-bars fs-1"></i></span>
            </button>
            <div class="collapse navbar-collapse text-center " id="nav">
                <ul class="navbar-nav ms-auto links-font ">
                    <li class="nav-item">
                        <a href="register" class="nav-link fs-2">Registrácia</a>
                    </li>
                    <li class="nav-item">
                        <a href="login" class="nav-link fs-2">Prihlásenie</a>
                    </li>
                    <li class="nav-item">
                        <a href="kosik_prehlad" class="nav-link">
                            <i class="fa fa-shopping-cart fs-1" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <!--kategórie-->
        <div class="container justify-content-around">
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
            <div class="col text-center mb-2 mb-lg-8">
              <a class="nav-link nav-links text-uppercase" href="prehlad_produktov">športová výživa</a>
            </div>
            <div class="col text-center mb-2 mb-lg-8">
              <a class="nav-link nav-links text-uppercase" href="prehlad_produktov">športové oblečenie</a>
            </div>
            <div class="col text-center mb-2 mb-lg-8">
              <a class="nav-link nav-links text-uppercase" href="prehlad_produktov">príslušenstvo</a>
            </div>
            <div class="col text-center mb-2 mb-lg-8">
              <a class="nav-link nav-links text-uppercase" href="prehlad_produktov">zdravé potraviny</a>
            </div>
          </div>
        </div>

      <section class="main_product">
        <div class="row">
          <!-- lava cast - obrazky-->
          <section class="col1">
            <div class="main_photo">
              <img src="/images/img1.png">
            </div>
            <div class="small_photo_row">
              <div class="small_photo">
                <img src="../images/img2.png" width="80%">
              </div>
              <div class="small_photo">
                <img src="../images/img3.png" width="80%">
              </div>
              <div class="small_photo">
                <img src="../images/img4.png" width="80%">
              </div>
              <div class="small_photo">
                <img src="../images/img1.png" width="75%">
              </div>
            </div>

          </section>
          <!-- prava cast - textova cast, tlacidla na vyber prichuti, mnozstvo, pridanie do kosika-->
          <section class="col2">
            <!-- recenzie nad nadpisom-->
            <div class="reviews">
              <i class="fa-solid fa fa-star fs-2"></i>
              <i class="fa-solid fa fa-star fs-2"></i>
              <i class="fa-solid fa fa-star fs-2"></i>
              <i class="fa-solid fa fa-star fs-2"></i>
              <i class="fa-solid fa fa-star fs-2"></i>
              <p>98% (298) </p>
            </div>
            <h1 class="text">
              Proteín 100% Whey Gold Standard
            </h1>
            <h3>
              Výrobca: <a href="#">Optimum Nutrition</a>
            </h3>
            <p class="text">
              <strong>Proteín 100 % Whey Gold Standard</strong> obsahuje funkčnú kombináciu srvátkového izolátu, koncentrátu a hydrolyzátu.
              Má priaznivé aminokyselinové spektrum, vyniká rýchlou vstrebateľnosťou a navyše sa pýši dokonale vyladenou chuťou.
              To je len niekoľko z mnohých dôvodov, prečo patrí medzi najpredávanejšie proteíny na svete.
            </p>
            <p class="stock_info">Skladom v predajni</p>
            <div class="options">
              <!-- vyber z prichuti-->
              <div class="variations">
                <p>príchuť:</p>
                <select  name="príchuť">
                  <option value="0">príchuť</option>
                  <option value="1">Čokoláda</option>
                  <option value="2">Vanilka</option>
                  <option value="3">Banán</option>
                </select>
              </div>
              <div>
                <p>množstvo:</p>
                <!-- zadanie mnozstva-->
                <div class="col-2  d-flex flex-wrap">
                  <div class="mnozstvo">
                    <button class="amount">
                      <i class="fa-sharp fa fa-plus fs-0 "></i>
                    </button>
                    <span class="p-2">1</span>
                    <button class="amount">
                      <i class="fa-sharp fa fa-minus fs-0 "></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <h2>
              29.99€
            </h2>
            <!--tlacidlo na pridanie do kosika-->
            <div class="add">
              <a href="kosik_prehlad" class="btn">
                Pridať do košíka
              </a>
            </div>

          </section>

        </div>

        <hr class="bg-dark border-2 border-top border-dark">

        <section class="fav_product">
          <h2 class="title">
            Zákazníci tiež zakúpili
          </h2>
          <!--prehlad najcastejsie zakupenych produktov-->
          <div class="row2">
            <div class="col3">
              <a href="product_detail"><img src="../images/img1.png" width="80%"></a>
              <h4>
                Whey Protein
              </h4>
              <p>49.90€</p>
            </div>
            <div class="col3">
              <a href="product_detail"><img src="../images/img1.png" width="80%"></a>
              <h4>
                Whey Protein
              </h4>
              <p>49.90€</p>
            </div>
            <div class="col3">
              <a href="product_detail"><img src="../images/img1.png" width="80%"></a>
              <h4>
                Whey Protein
              </h4>
              <p>49.90€</p>
            </div>
            <div class="col3">
              <a href="product_detail"><img src="../images/img1.png" width="80%"></a>
              <h4>
                Whey Protein
              </h4>
              <p>49.90€</p>
            </div>
          </div>
        </section>

        <hr class="bg-dark border-2 border-top border-dark">

        <!-- informácie o produkte, zlozenie, recenzie - na preklik -->
        <section class="information_wrapper">
          <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link links active" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info" aria-selected="true">Informácie o produkte</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link links" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="false">Zloženie</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link links" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Recenzie</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <!-- cast informácie o produkte-->
            <div class="tab-pane fade show active" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
              <p><strong>Proteín 100 % Whey Gold Standard</strong> sa radí k špičke vo svojej kategórii. Aj to je dôvod, prečo už niekoľko rokov patrí medzi najpredávanejšie proteíny na svete.
                Ide o unikátnu kombináciu niekoľkých typov srvátkových bielkovín, vďaka čomu má skvelé funkčné vlastnosti.
                Pomáha napríklad udržať zdravie kostí a prácne vybudovanú svalovú hmotu.
                To oceníte najmä v prípade, že sa snažíte schudnúť a máte nižší energetický príjem.
                Rovnako sú bielkoviny dôležité aj pre silových športovcov, pretože prispievajú k svalovému rastu.
                Tento lahodný nápoj obsahuje v každej porcii najmenej <strong>33 g bielkovín</strong>, ako aj ďalšie starostlivo vybrané zložky, ktoré podporia vašu stravu zameranú na redukciu hmotnosti.</p>
              <p><strong>Použitie a dávkovanie:</strong> Protein užívajte 25g / 1  a ¼ odmerky ráno nalačno alebo 25g / 1  a ¼ odmerky po tréningu. Doporučenú dávku rozmiešame približne v 2 dcl vody alebo mlieka. </p>
              <p><strong>Upozornenie:</strong> Nie je určený pre deti, tehotné a dojčiace ženy. Výrobok sa nesmie používať ako náhrada pestrej stravy. Doporučená denná dávka sa nesmie prekročiť. <strong>Alergén: Mlieko, laktóza.</strong></p>
              <p><strong>Výrobca:</strong> Vyrobené na Slovensku </p>
            </div>
            <!-- cast zlozenie-->
            <div class="tab-pane fade" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
              <p><strong>BANÁNOVÁ PRÍCHUŤ:</strong> zmes bielkovín (75%) (koncentrát srvátkovej bielkoviny (mlieko) [obsahuje emulgátory: slnečnicový lecitín, sójový lecitín], koncentrát mliečnej bielkoviny, izolát srvátkovej bielkoviny (mlieko) [obsahuje emulgátory: slnečnicový lecitín, sójový lecitín]), ovsená múka (8%), inulín (8%), prírodná aróma, L-glutamín (2%), mleté ľanové semienka (Linum usitatissimum) (2%), CLA prípravok (triglycerid konjugovanej kyseliny linolovej (z požltového oleja), sušina kukuričného sirupu, mliečne bielkoviny, stabilizátor (hydrogénfosforečnan draselný), protihrudkové činidlo (oxid kremičitý), antioxidant (zmes tokoferolov)), extrakt zo zeleného čaju (Camellia sinensis), zahusťovadlo (xantánová guma), práškový DL-cholín bitartrát (cholín bitartrát, protihrudkové činidlo (oxid kremičitý)), sladidlo (sukralóza), extrakt z kurkumového oleja, DigeZyme™ (proteáza, amyláza, beta-D-galaktozidáza, lipáza, celuláza).</p>
                <p><strong>ČOKOLÁDOVÁ PRÍCHUŤ:</strong> zmes srvátkových proteínov (91 %) [mlieko] (izolát srvátkového proteínu, koncentrát srvátkového proteínu, hydrolyzovaný izolát srvátkového proteínu, emulgátor: sójový lecitín), kakaový prášok so zníženým obsahom tuku, arómy, chlorid sodný, zahusťovadlo (xantánová guma), sladidlo (sukralóza).</p>
              <p><strong>VANILKOVÁ PRÍCHUŤ:</strong> srvátkový proteinový koncentrát WPC 80 (mlieko), odtučnené kakao, Inulín vláknina z čakanky, L-Glutamín,  L-Carnitin Tartrát, Vitamínová zmes: ( Kyselina L-askorbová , Niacínamid,  Suchý vitamín E 50% CWS/S, Calcium D-Pantotenát, Pyridoxín hydrochlorid, Riboflavín z fermentácie, Tiamín mononitrát,  kyselina listová 10% na nosiči zo zemiakového maltodextrínu, , D-Biotín 1% na nosiči zo zemiakového maltodextrínu, Vitamín B-12 0,1% WS N, kukuričný maltodextrín D11-14), Enzým Bromelain (1200GDU/g), prírodná aróma, aróma, sladidlo: sukralóza.</p>
            </div>
            <!-- cast recenzie-->
            <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
              <div class="all_reviews">
                <div class="stars">
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                </div>

                <h3> 100%</h3>
                <p> (244 hodnotení)</p>
              </div>

              <div class="all_reviews">
                <div class="stars">
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                </div>

                <h3> 80%</h3>
                <p> (32 hodnotení)</p>
              </div>

              <div class="all_reviews">
                <div class="stars">
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                </div>

                <h3> 60%</h3>
                <p> (11 hodnotení)</p>
              </div>

              <div class="all_reviews">
                <div class="stars">
                  <i class="fa-solid fa fa-star fs-2"></i>
                  <i class="fa-solid fa fa-star fs-2"></i>
                </div>

                <h3> 40%</h3>
                <p> (6 hodnotení)</p>
              </div>

              <div class="all_reviews">
                <div class="stars">
                  <i class="fa-solid fa fa-star fs-2"></i>
                </div>

                <h3> 20%</h3>
                <p> (5 hodnotení)</p>
              </div>

            </div>
          </div>
        </section>

      </section>

      <!-- päta stranky-->
      <footer id="footer" class="mt-5  text-center ">
        <div class="container">
          <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6">
            <div class="col text-center mb-2 mb-lg-0">
              <a class="footer_link" href="#"><i class="fa fa-facebook fa-lg "></i> FITShop</a>
            </div>
            <div class="col text-center mb-2 mb-lg-0">
              <a class="footer_link" href="#"><i class="fa fa-instagram fa-lg "></i> FITShop</a>
            </div>
            <div class="col text-center mb-2 mb-lg-0">
              <i class="fa fa-phone fa-lg " aria-hidden="true"></i> 0954235214
            </div>
            <div class="col text-center mb-2 mb-lg-0">
              <i class="fa fa-envelope fa-lg "></i>fitshop@gmail.com
            </div>
            <div class="col text-center mb-2 mb-lg-0">
              <i class="fa fa-snapchat fa-lg "></i>Fitshopp
            </div>
            <div class="col text-center">
              <address>Adresa: Staré Grunty C7</address>
            </div>
          </div>
        </div>
        <div class="text-center">
          <small class="text-dark">&copy; Copyright 2023, FITShop</small>
        </div>
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>