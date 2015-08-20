<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
        
        <h1>Opdracht sessions: deel 1</h1>

        <ul>
            <li>

                <h2>Registratiepagina</h2>

                <ul>

                    <li>Maak een formulier dat er als volgt uitziet:
                        
                        <div class="facade-minimal" data-url="http://www.app.local/opdracht-sessions-pagina-01-registratie.php">
                            <h1>Deel 1: registratiegegevens</h1>
                            <form>
                                <ul>
                                    <li>
                                        <label for="email">e-mail</label>
                                        <input type="text" id="email">
                                    </li>
                                    <li>
                                        <label for="nickname">nickname</label>
                                        <input type="text" id="nickname">
                                    </li>
                                </ul>
                                <input type="submit" value="Volgende">
                            </form>
                        </div>

                    </li>
                    <li>Werk via een POST-methode</li>
                    <li>De action is ingesteld op de adresgegevens pagina</li>
                    <li>Wanneer er op volgende wordt gedrukt moeten de values van de input elementen opgeslagen worden in de session.</li>


                </ul>
            </li>

            <li>

                <h2>Adrespagina</h2>

                <ul>
                    <li>Toon het emailadres en de nickname onder een titel "Registratiegegevens"</li>
                    <li>Maak opnieuw een formulier zodat de adrespagina er als volgt uitziet:
                        
                        <div class="facade-minimal" data-url="http://www.app.local/opdracht-sessions-pagina-02-adres.php">
                        
                            <h1>Registratiegegevens</h1>

                            <ul>
                                <li>e-mail: richard@piedpiper.com</li>
                                <li>nickname: The Puppet Master</li>
                            </ul>

                            <h1>Deel 2: adres</h1>
                            <form>
                                <ul>
                                    <li>
                                        <label for="straat">straat</label>
                                        <input type="text" id="straat">
                                    </li>
                                    <li>
                                        <label for="nummer">nummer</label>
                                        <input type="number" id="nummer">
                                    </li>
                                    <li>
                                        <label for="gemeente">gemeente</label>
                                        <input type="text" id="gemeente">
                                    </li>
                                    <li>
                                        <label for="postcode">postcode</label>
                                        <input type="text" id="postcode">
                                    </li>
                                </ul>
                                <input type="submit" value="Volgende">
                            </form>
                        </div>

                    </li>
                    <li>Zorg er nu voor, dat wanneer de pagina gefresht wordt door middel van <kbd>F5</kbd> / <kbd>⌘-R</kbd> de ingevulde informatie in de invulvelden blijft staan.</li>
                    <li>Zorg ook voor een link waarmee je de sessie kan vernietigen (zodat alle informatie in de sessie verwijderd wordt). Dit kan je gebruiken om beter te testen ipv manueel je session-id te moeten verwijderen.</li>
                     <li>Werk via een POST-methode</li>
                    <li>De action is ingesteld op de overzichtspagina</li>
                    <li>Wanneer er op volgende wordt gedrukt moeten de values van de input elementen opgeslagen worden in de session.</li>
                </ul>

                <li>
                    
                    <h2>Overzichtspagina</h2>

                    <ul>
                        <li>Deze pagina bevat alle gegevens die in de voorgaande pagina's ingevuld zijn. Deze ziet er als volgt uit: 
                            
                            <div class="facade-minimal" data-url="http://www.app.local/opdracht-sessions-pagina-03-overzicht.php">
                        
                                <h1>Overzichtspagina</h1>

                                <ul>
                                    <li>e-mail: richard@piedpiper.com | <a href="">wijzig</a></li>
                                    <li>nickname: The Puppet Master | <a href="">wijzig</a></li>
                                    <li>straat: Great America Parkway | <a href="">wijzig</a></li>
                                    <li>nummer: 4401 | <a href="">wijzig</a></li>
                                    <li>gemeente: Palo Alto | <a href="">wijzig</a></li>
                                    <li>postcode: CA 95054 | <a href="">wijzig</a></li>
                                </ul>
                            </div>

                        </li>
                        <li>Voorzie een link "wijzig" bij elk gegeven. Wanneer er op deze link wordt geklikt, ga je naar de pagina waar het invulveld voor dit stukje informatie zich bevindt.</li>

                        <li>Het te wijzigen veld wordt automatisch gefocust:

                             <div class="facade-minimal" data-url="http://www.app.local/opdracht-sessions-pagina-02-adres.php">
                        
                                <h1>Registratiegegevens</h1>

                                <ul>
                                    <li>e-mail: richard@piedpiper.com</li>
                                    <li>nickname: The Puppet Master</li>
                                </ul>

                                <h1>Deel 2: adres</h1>
                                <form>
                                    <ul>
                                        <li>
                                            <label for="straat" >straat</label>
                                            <input type="text" id="straat" value="Great America Parkway" class="emphasize" data-tooltip="Dit is automatisch gefocust">
                                        </li>
                                        <li>
                                            <label for="nummer">nummer</label>
                                            <input type="number" id="nummer" value="4401">
                                        </li>
                                        <li>
                                            <label for="gemeente">gemeente</label>
                                            <input type="text" id="gemeente" value="Palo Alto">
                                        </li>
                                        <li>
                                            <label for="postcode">postcode</label>
                                            <input type="text" id="postcode" value="CA 95054">
                                        </li>
                                    </ul>
                                    <input type="submit" value="Volgende">
                                </form>
                            </div>

                        </li>
                        <li>Je mag kiezen hoe je dit focussen instelt (via get, via session, ...) en hoe je de focus visueel weergeeft (via klasse of via autofocus attribuut). Onderzoek wat volgens jou de beste optie is.</li>
                    </ul>

                </li>
            </li>
        </ul>
        
    </body>
</html>
