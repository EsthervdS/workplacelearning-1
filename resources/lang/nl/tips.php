<?php

return [
    'tips' => "Tips",
    'create-new' => "Maak nieuwe tip aan",
    "edit" => "Tip aanpassen",
    'all-tips' => "Alle tips",
    'this-tip-statistics' => 'Statistieken van deze tip',
    'add-statistic' => 'Statistiek toevoegen',
    'to-tip' => 'Naar tip',
    'name' => 'Naam',
    'ep-type' => 'Opleidingstype',
    'statistics-count' => 'Statistieken',
    'condition' => 'Voorwaarde',
    'like' => 'Like tip',
    'liked' => 'Je hebt deze tip geliked!',
    'likes' => 'Likes',
    'new' => 'Nieuwe tip',
    'back' => 'Terug naar overzicht',
    'coupled-statistics' => 'Gekoppelde statistieken',
    'coupling-statistics' => 'Statistieken koppelen',
    'couple-statistic' => 'Koppel een statistiek',
    'tiptext' => 'Tip tekst',
    'save' => 'Opslaan',
    'cancel' => 'Annuleren',
    'decouple' => 'Ontkoppelen',
    'statistics' => 'Statistieken',
    'delete-confirm' => 'Weet je zeker dat je deze tip helemaal wilt verwijderen?',
    "form" => [
        "name" => "Tip naam",
        "selecting-statistic" => "Statistiek selecteren",
        "threshold" => "De grenswaarde voor deze statistiek. Bijv. 40%, dan 0.4 invoeren. Voor niet-percentages gewoon volle getallen.",
        "tipText" => "De tekst van de tip. Gebruik de waarde parameters beneden (:statistic-x) om de plek aan te geven waar een berekende waarde moet staan.",
        "tipTextPlaceholder" => "Bij :statistic-1 van je activiteiten werk je alleen.",
        "showInAnalysis" => "Moet de tip zichtbaar zijn in de analyse?",
        "statistic" => "Statistiek voor berekening",
        "enabledCohorts" => "Selecteer de cohorten waar deze tip actief moet zijn",
        "cohorts-enable" => "Selecteer cohorten",
        "save" => "Opslaan",
        'save-statistic-and-again' => 'Opslaan & nog een statistiek toevoegen',
        'save-statistic-and-continue' => 'Opslaan & verder',
        "submit" => "Aanmaken",
        "next-step" => "Volgende stap",
        'comparison-operator' => 'Vergelijking',
        'statistic-value-parameters' => 'Waarde parameters bij deze tip. Waardenaam parameters zijn enkel in gebruik bij "ingebouwde" statistieken. Deze staan dan voor bijvoorbeeld de naam van de meest voorkomende categorie.',
        'table-statistic' => 'Statistiek',
        'table-value-parameter' => 'Waarde parameter (bijv. 20%)',
        'table-value-name-parameter' => 'Waardenaam parameter (bijv. categorie)'
    ],


    'help-steps' => [
        'guide' => 'Gids',
        'back' => 'Vorige',
        'close' => 'Sluiten',
        'last' => 'Laatste',
        'next' => 'Volgende',
        'skip' => 'Overslaan',

        '1' => 'Stel de naam van de tip in. Deze is enkel zichtbaar voor jou, niet voor de studenten.',
        '2' => 'Klik hier om een statistiek te koppelen.',
        '3' => 'Laten we nu een nieuwe statistiek aanmaken.',
        '4' => 'Kies eerst een naam voor de nieuwe statistiek.',
        '5' => 'Kies welk type leeractiveiten gebruikt moeten worden.',
        '6' => 'Kies of de statistiekberekening gedaan moet worden met het aantal activiteiten of met de totale som van de uren van de activiteiten. Belangrijk: enkel statistieken van het type Producing kunnen de uren optie gebruiken.',
        '7' => 'Stel nu de filters in. Bijvoorbeeld enkel activiteiten met als bronpersoon "Alleen".',
        '8' => 'Tip! Je kunt ook meerdere waardes invullen voor een filter, je hoeft ze enkel te scheiden met " || ". Bijvoorbeeld "Alleen || Begeleider".',
        '9' => 'Kies wat voor berekening er gedaan moet worden, bijvoorbeeld een deling (/).',
        '10' => 'Stel ook nog de filters in voor de tweede variabele. Als je geen filter wil toepassen kun je deze velden leeg laten.',
        '11' => 'Maak de statistiek aan!',
        '12' => 'Kies nu de statistiek.',
        '13' => 'Kies nu de vergelijking die gedaan moet worden; groter dan of kleiner dan.',
        '14' => 'Stel de grenswaarde in voor wanneer de tip actief wordt.',
        '15' => 'Koppel nu de statistiek aan de tip.',
        '16' => 'De statistiek is nu gekoppeld aan de tip!',
        '17' => 'Stel nu de tekst in die aan een student getoond moet worden als de tip actief is. Je kunt de berekende waardes van de statistieken hier invoegen door ":statistic-*" te typen, waar de * het nummer van de statistiek is. Deze nummers kun je in de tabel vinden.',
        '18' => 'Stel de zichtbaardheid van de tip voor studenten in.',
        '19' => 'Selecteer de cohorten waar de tip actief mag zijn.',
        '20' => 'De laatste stap: sla de tip op.'
    ],

    'help' => [
        'help'             => 'Help',
        'how-does-it-work' => 'Hoe werkt het?',
        'explain-tips'          => 'Tips kunnen studenten helpen met hun werkplek. Deze tips dienen eerst hier aangemaakt te worden. Een tip wordt getoond aan een student als deze tip actief is. Een tip wordt actief doordat één of meerdere berekende statistieken een grenswaarde passeren en actief worden. Indien meerdere statistieken gekoppeld zijn dienen zij allemaal actief te zijn voordat de tip actief wordt.',
        'explain-statistics' => 'Een statistiek wordt berekend door middel van twee leeractiviteitvariabelen. Deze variabelen hebben de waarde van of het totaal aantal leeractiviteiten of de som van de uren van de leeractiviteiten. De variabelen kunnen ook op attribuut gefilterd worden. Zo wordt het bijvoorbeeld mogelijk om voor de eerste variabele de filter bronpersoon "Alleen" in te stellen en bij variabele twee de filters leeg te laten. De berekening zal dan het percentage leeractiviteiten met bronpersoon "Alleen" geven.',
        'explain-couple' => 'Statistieken die aangemaakt zijn dienen nog gekoppeld te worden aan een tip. Hierbij wordt ook ingesteld hoe bepaald wordt of een statistiek actief is. Bijvoorbeeld wanneer meer dan 50% van de leeractiviteiten alleen zijn door 50% als grenswaarde in te stellen en de vergelijking op "groter dan".',
        'explain-tiptext' => 'De tip tekst is de tekst die getoond wordt aan een student. Hierin is het mogelijk om de berekende statistieken weer te geven met ":statistic-*" waar * het nummer is van de statistiek. Zo kan een student bijvoorbeeld weten wat zijn of haar percentage werk "Alleen" is en zich hier op aanpassen.',
        'explain-footer' => 'Om een beter beeld te krijgen van de workflow van de tips is het mogelijk om interactief te configureren, klik daarvoor op de "Gids" knop rechtsbovenin na het aanmaken van een tip.'
    ]


];