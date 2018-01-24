Website BC Oberurdorf

# Strucktur

- Hauptseite
  - Allgemeiner Informationstext
  - Anzeigen des nächsten Trainings
  - Anzeigen von Vereinsfotos über Link flickr
  - Link zu Kontakt
  - Link zu Jahresprogramm
			
- Jahresprogramm
  - Nächste Aktivitäten (Training, Ferien, GV ...)
  - Vergangene Aktivitäten (2 Jahr? Keine Ferien)
  
- Spielort
  - Adresse
  - Karte
  - Bild
  - ÖV
  
- Verein
  - Personen mit Funktionen
  - Statuten
  - Vereinsanlässe
  
- Kontakt
  - Kontaktpersonen mit Natel
  - Kontaktmail

# Template 

- http://www.lingulo.com/de/tutorials/css/how-to-build-a-html5-website-from-scratch

## Hauptseite

- Header: Titel, keine Links
- Image: Bild Turnhalle
- Spacer: Training-Termine, kein search
- Body: 
  Haupttext (nicht alles)
  4 Artikel als Link zu Textseiten:
  - Programm
  - Spielort
  - Kontakt
  - Verein


## Textseite

- Header: Titel, keine Links
- Kein Image
- Kein Spacer
- Body: 
  Text oder Daten
  4 Artikel als Link zu anderen Seiten:
  - Programm
  - Spielort
  - Kontakt
  - Verein
  - Home

## Fotoalbum

Evtl.


# Ideen

- Kreise für Kalender:
  <http://themeforest.net/item/ichurch-onepage-multipage-church-template/full_screen_preview/6904002?ref=hdalive>



- formatting for `calendar.yaml`:
  ~~~.yaml
- date: 20140823
  start: 20:00
  end: 21:45
  event: false
  training: true
  title: Badminton
  location: Kanti Urdorf
  description: |
        blah blah blah

- date: 20140823
- date: 20140823
  training: false
- date: 20140823
- date: 20140823
  start: 20:00
  end: 23:00
  event: true
  title: GV BC Oberurdorf
  location: Restaurant Filzball, Urdorf
  description: |
        blah blah blah
 ~~~
 notes: in ics "kein training" wird nicht ausgegeben


notes: in ics "kein training" wird nicht ausgegeben

# Snippets

## Warning on the Home page

```md
![volleyball](/page/images/volleyballnacht.jpg)

<div class="warning">
Am 10. November 2017 findet die Limmattaler Volleyballnacht statt: deshalb kein Badminton!<p>

Als Ersatz: Plausch-Nachtessen gegen 20:00 am 10 November ins Restaurant „Filzball“ in Urdorf.
</div>
```

# Todo

- remove bullets from `slider_content` liste and fix the indent
- use superslides (contesto) for top slideshow


# Resources

- favicon from <http://www.favicon.cc/?action=icon&file_id=276131>
- html template from <http://www.lingulo.com>
    - http://www.lingulo.com/tutorials/css/how-to-build-a-html5-website-from-scratch
    - http://www.lingulo.com/tutorials/css/how-to-build-a-html5-website-from-scratch-part-2
    - http://www.lingulo.com/tutorial-content/html5/
  with the following dependences:
  - Eric Meyer's "Reset CSS" 2.0 (http://www.cssreset.com) and put it into the "css" folder
  - Lightbox2 (http://lokeshdhakar.com/projects/lightbox2/) and put the folders "css", "images" and "js" into the "lightbox" folder
  - Modernizr.js (http://modernizr.com/download/), make sure "html5shiv" is checked and put "modernizr.js" into the "js" folder
  - Respond.min.js (https://github.com/scottjehl/Respond) and put it into the "js" folder
  - jQuery 1.7.2 (http://nienpaper.googlecode.com/files/1.7.2.jquery.min.js) and put it into the "js" folder
  - Prefix Free (http://leaverou.github.io/prefixfree/) and put it into the "js" folder
  - SlidesJS (http://www.slidesjs.com/) and put the "jquery.slides.min.js" into the "js" folder
- ics calender:
  - https://gist.github.com/jakebellacera/635416
  - http://kigkonsult.se/eventCreator/index.php

# Upload

    mkdir php-debug
    mkdir php-markdown
    mkdir php-module
    mkdir php-route
    mkdir php-site
    mkdir php-template
    mkdir php-debug/src
    mkdir php-markdown/src
    mkdir php-module/src
    mkdir php-route/src
    mkdir php-site/src
    mkdir php-template/src

    cd php-debug/src
    put -f php-debug/src/Debug.php
    cd ../..
    cd php-markdown/src
    put -f php-markdown/src/Markdown.php
    cd ../..
    cd php-module/src
    put -f php-module/src/Module.php
    cd ../..
    cd php-route/src
    put -f php-route/src/Route.php
    cd ../..
    cd php-site/src
    put -f php-site/src/Site.php
    cd ../..
    cd php-template/src
    put -f php-template/src/Template.php
    cd ../..
