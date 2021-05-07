# Výpis lekcí (GET)


**Struktura**: http://46.28.111.31:3000/kalendar/{token}/{idmistnost}/{datum-od}/{datum-do}

token - unikátní vygenerovaný token  
idmistnost - ID místnosti (kalendáře), z které načítáte data  
datum-od - datum - začátek stahování lekcí. formát: YYYY-MM-DD  
datum-do - datum - konec stahování lekcí. formát: YYYY-MM-DD  

Vrací JSON:
```json
{
  "ok": "1",
  "config": [
    ...
  ],
  "data": [
    ...
  ]
}      
```

**Popis:**  
ok - bude nastaveno, pokud proběhne všechno v pořádku  
config - konfigurace pro místnost  
data - lekce  

##Config
```json
{
  "ok": "1",
  "config": [
     {
      "nazev_define": "VIEW_OLD_AKCE",
      "hodnota": null
    },
    {
      "nazev_define": "HRS_START",
      "hodnota": "7"
    },
    {
      "nazev_define": "HRS_COUNT",
      "hodnota": "17"
    },
    {
      "nazev_define": "HRS_NOT_PRINT",
      "hodnota": ""
    },
    {
      "nazev_define": "KALENDAR_START_DT",
      "hodnota": "1.4.2019"
    },
    {
      "nazev_define": "START_DEN_V_TYDNU",
      "hodnota": "1"
    },
    {
      "nazev_define": "KALENDAR_START_DT_TRVALY",
      "hodnota": null
    }
  ],
  "data": [
    ...
  ]
}      
```

**Popis**  
VIEW_OLD_AKCE  
- jestli se mají zobrazovat již proběhlé lekce  
- hodnota: null, 0 , 1   

HRS_START  
- počáteční hodina pro zobrazení kalendáře  
- hodnota: číslo: 0-24  

HRS_COUNT 
- počet zobrazených hodin v kalendáři  
- hodnota: číslo 0-24  


HRS_NOT_PRINT 
- hodiny v kalendáři, které se nebudou vypisovat  
- hodnota: hodiny oddělené čárkou. např.: 12,13  

KALENDAR_START_DT 
- případné datum, kdy by měl kalendář začínat. Pokud bude nastaveno, tak klient očekává, že kalendář začne v tomto datu, pokud bude datum větší jako aktuální den
- hodnota: datum ve formatu dd.mm.YYYY

START_DEN_V_TYDNU   
- kterým dnem má kalendář začínat
- hodnota: 1 - Po, 2 - Út, 3 - St, 4 - Čt, 5 - Pá, 6 - So, 7 - Ne  

KALENDAR_START_DT_TRVALY  
- trvale nastavený počáteční datum kalendáře  
- hodnota: datum ve formátu dd.mm.YYYY

##Lekce
```json
{
  "ok": "1",
  "config": [
     ...
  ],
  "data": [
     {
      "idakce": 4778,
      "datum": "2019-06-04",
      "od_cas": "08:00",
      "do_cas": "08:30",
      "nazev_lekce": "Jezdíme po kopcích",
      "pocet_volnych_mist": 5,
      "cena": "100",
      "cena1": null,
      "cena2": null,
      "cena3": null,
      "cena4": null,
      "popis": "<p>Budeme jezdit nahoru a dolu dokud nebudeme mít dost</p>",
      "kurz": 0,
      "obtiznost": 3,
      "cena_kurzu": null,
      "cena_kurzu1": null,
      "cena_kurzu2": null,
      "cena_kurzu3": null,
      "cena_kurzu4": null,
      "barva_lekce": null,
      "aktivita": "Bikram jóga",
      "barva_aktivity": "F2FF3D",
      "barva_aktivity_hlavicka": "57FF52",
      "barva_aktivity_text": "292929",
      "firstname": "Alena Derbak",
      "lastname": "Alena Derbak",
      "avatar": null,
      "pohlavi": "M",
      "firstname2": null,
      "lastname2": null,
      "avatar2": null,
      "pohlavi2": null,
      "pocet_rezervaci": 0,
      "pocet_rezervaci_nahradnik": 0
    }
  ]
}      
```
**Popis**    

"idakce":   
- ID lekce  
- hodnota: celé číslo  

"datum":   
- datum lekce  
- datum ve formátu YYYY-MM-DD  

"od_cas":  
- čas začátku lekce  
- hodnota: čas ve formátu HH:MM  

"do_cas":  
- čas konce lekce  
- hodnota: čas ve formátu HH:MM  

"nazev_lekce":   
- zadaný název lekce při vytváření  
- hodnota: string  

"pocet_volnych_mist":   
- počet volných míst na lekci  
- hodnota: integer  

"cena":   
- základní cena lekce  
- hodnota: float  

"cena1":  
- snížená cena lekce pro první slevu  
- hodnota: float  

"cena2":  
- snížená cena lekce pro druhou slevu  
- hodnota: float  

"cena3": 
- snížená cena lekce pro třetí slevu  
- hodnota: float  

"cena4":  
- snížená cena lekce pro čtvrtou slevu  
- hodnota: float  

"popis":   
- popis lekce  
- hodnota: string  

"kurz":   
- jestli se jedná o kurz  
- hodnota: bool  

"obtiznost":   
- zadaná obtížnost  
- hodnota: 0-5  

"cena_kurzu":   
- základní cena celého kurzu  
- hodnota: float  

"cena_kurzu1":  
- snížená cena kurzu pro první slevu  
- hodnota:   

"cena_kurzu2":  
- snížená cena kurzu pro druhou slevu  
- hodnota: float  

"cena_kurzu3":  
- snížená cena kurzu pro třetí slevu  
- hodnota: float  

"cena_kurzu4":  
- snížená cena kurzu pro čtvrtou slevu  
- hodnota: float  

"barva_lekce":  
- případná barva lekce - nemusí být zadaná, pokud bude, přebije barvu aktivity  
- hodnota: 6ti místný hexa kód barvy  

"aktivita":   
- název aktivity  
- hodnota: string  

"barva_aktivity":   
- barva aktivity  
- hodnota:  6ti místný hexa kód barvy  

"barva_aktivity_hlavicka":   
- barva hlavičky pro aktivity  
- hodnota:  6ti místný hexa kód barvy  

"barva_aktivity_text":   
- barva textu pro aktivitu  
- hodnota:  6ti místný hexa kód barvy  

"firstname":   
- jméno instruktora  
- hodnota: string  

"lastname":   
- příjmení instruktora  
- hodnota: string  

"pohlavi":   
- pohlaví instruktora  
- hodnota: Z | M  

"firstname2":   
- jméno druhého instruktora  
- hodnota: string  

"lastname2":   
- příjmení druhého instruktora  
- hodnota: string  

"pohlavi2":   
- pohlaví druhého instruktora  
- hodnota: Z | M  

"pocet_rezervaci":   
- počet existujících rezervací na lekci   
- hodnota: integer  

"pocet_rezervaci_nahradnik":   
- počet existujících rezervací na náhradníka na lekci   
- hodnota: integer  

# Uživatel podle barcodu (GET)


**Struktura**: http://46.28.111.31:3000/user/barcode/{token}/{barcode}

token - unikátní vygenerovaný token  
barcode - čárový kód přiřazený uživateli 

Vrací JSON:
```json
{
  "ok": "1",
  "data": {
    "user": [
      {
        "idsys_member": 41,
        "username": "....",
        "firstname": "....",
        "lastname": "...",
        "email": "...",
        "phone": "...",
        "accesslevel": ".",
        "blocked": "N",
        "pohlavi": "M",
        "kredit": ...
      }
    ],
    "permanentky": [
      {
        "idpermanentka2user": 1139,
        "platnost_od": "2020-08-20T22:00:00.000Z",
        "platnost_do": "2021-08-20T22:00:00.000Z",
        "nazev": "...",
        "celkovy_pocet_rezervaci": 2,
        "penalizace": 0,
        "zmrazeno": null,
        "zaplaceno": "Y",
        "automaticke_odecitani_karta": 1,
        "kalendar": null,
        "pocet_rezervaci": 0,
        "pocet_vstupu": 0,
        "pocet_dostupnych_rezervaci": 2
      }      
    ],
    "clenstvi": [
      {
        "idclenstvi2user": 104,
        "idclenstvi": 4,
        "nazev": "...",
        "platnost_od": "2020-10-13T22:00:00.000Z",
        "platnost_do": "2020-10-19T22:00:00.000Z",
        "pocet_rezervaci": 0,
        "pocet_vstupu": 0
      }
    ]
  }
}
```

kde

*user*

"idsys_member": id uživatele\
"username": uživatelské jméno\
"firstname": křestní jméno\
"lastname": příjmení\
"email": email\
"phone": telefonní číslo\
"accesslevel": přístupový level. 1 - Admin, 2 - Obsluha, 3 - Uživatel, 4 - Obsluha, 5 - Účetní\
"blocked": Y/N - jestli je uživatel v RS blokován\
"pohlavi": M/Z - pohlaví uživatele\
"kredit": výše dobitého kreditu uživatele


*permanentky*

"idpermanentka2user": id permanentky\
"platnost_od": platnost permanentky\
"platnost_do": platnost permanentky\
"nazev": název permanentky\
"celkovy_pocet_rezervaci": celkový počet dostupných vstupů na permanentku\
"penalizace": počet penalizací na permanentku\
"zmrazeno": Y/N - jestli je permanentka zmrazena\
"zaplaceno": Y/N - jestli je permanentka zaplacena\
"automaticke_odecitani_karta": jestli je permanentka nastavena na automaticky odečet vstupu po pípnutí kartou do RS\
"pocet_rezervaci": počet již provedených rezervací na lekce\
"pocet_vstupu": počet registrovaných vstupu do fitcentra\
"pocet_dostupnych_rezervaci": počet dostupných vstupu, které jsou ještě na permanentku dostupné

*clenstvi*

"idclenstvi2user": id členství\
"idclenstvi": id použitého členství\
"nazev": název členství\
"platnost_od": platnost \ 
"platnost_do": platnost \
"pocet_rezervaci": počet již proběhlých rezervací\
"pocet_vstupu": počet již proběhlých vstupů \

# Uživatel podle ID (GET)

**Struktura**: http://46.28.111.31:3000/user/id/{token}/{id}

token - unikátní vygenerovaný token  
id - id uživatele

Vrací JSON:
```json
{
  "ok": "1",
  "data": {
    "user": [
      {
        "idsys_member": 41,
        "username": "....",
        "firstname": "....",
        "lastname": "...",
        "email": "...",
        "phone": "...",
        "accesslevel": ".",
        "blocked": "N",
        "pohlavi": "M",
        "kredit": ...
      }
    ],
    
    ]
  }
}
```

kde

*user*

"idsys_member": id uživatele\
"username": uživatelské jméno\
"firstname": křestní jméno\
"lastname": příjmení\
"email": email\
"phone": telefonní číslo\
"accesslevel": přístupový level. 1 - Admin, 2 - Obsluha, 3 - Uživatel, 4 - Obsluha, 5 - Účetní\
"blocked": Y/N - jestli je uživatel v RS blokován\
"pohlavi": M/Z - pohlaví uživatele\
"kredit": výše dobitého kreditu uživatele


# Uživatel podle Username (GET)

**Struktura**: http://46.28.111.31:3000/user/username/{token}/{username}

token - unikátní vygenerovaný token  
username - username uživatele

Vrací JSON:
```json
{
  "ok": "1",
  "data": {
    "user": [
      {
        "idsys_member": 41,
        "username": "....",
        "firstname": "....",
        "lastname": "...",
        "email": "...",
        "phone": "...",
        "accesslevel": ".",
        "blocked": "N",
        "pohlavi": "M",
        "kredit": ...
      }
    ],
    
    ]
  }
}
```

kde

*user*

"idsys_member": id uživatele\
"username": uživatelské jméno\
"firstname": křestní jméno\
"lastname": příjmení\
"email": email\
"phone": telefonní číslo\
"accesslevel": přístupový level. 1 - Admin, 2 - Obsluha, 3 - Uživatel, 4 - Obsluha, 5 - Účetní\
"blocked": Y/N - jestli je uživatel v RS blokován\
"pohlavi": M/Z - pohlaví uživatele\
"kredit": výše dobitého kreditu uživatele



# Výpis naposled registrovaných uživatelů (GET)

**Struktura**: http://46.28.111.31:3000/user/get_posledni_registrace/{token}/{pocet_dnu}

token - unikátní vygenerovaný token  
pocet_dnu - kolik dnů zpětně se má kontrolovat poslední registrace

Vrací JSON:
```json
{
  "ok": "1",
  "data": {
    "user": [
      {
        "username": "",
        "pohlavi": "M",
        "firstname": "....",
        "lastname": "....",
        "email": "....",
        "phone": "....",
        "accesslevel": "....",
        "blocked": "N",
        "last_login": "....",
        "kredit": 0,
        "newsletter": "Y",
        "platnost_kreditu_do": null,
        "rodne_cislo": "....",
        "adresa": "....",
        "dt_registrace": "....",
        "gdpr_souhlas": "...."
      }
    ],
    
    ]
  }
}
```

kde

*user*

"idsys_member": id uživatele\
"username": uživatelské jméno\
"firstname": křestní jméno\
"lastname": příjmení\
"email": email\
"phone": telefonní číslo\
"accesslevel": přístupový level. 1 - Admin, 2 - Obsluha, 3 - Uživatel, 4 - Obsluha, 5 - Účetní\
"blocked": Y/N - jestli je uživatel v RS blokován\
"pohlavi": M/Z - pohlaví uživatele\
"kredit": výše dobitého kreditu uživatele


# Vytvořit nového uživatele (POST)

**Struktura**: http://46.28.111.31:3000/user/{token}

token - unikátní vygenerovaný token 

**POST data (x-www-form-urlencode)**

username - uživatelské (přihlašovací) jméno uživatele, max 100 znaků, povinná položka\
pass_word - heslo uživatele, povinná položka\
firstname - jméno uživatele, max 100 znaků, povinná položka\
lastname - příjmení uživatele, max 100 znaků, povinná položka\
email - email uživatele, povinná položka\
pohlavi - pohlaví uživatele, povolené znaky Z, M), Z = žena, M = muž\
dt_narozeni - datum narození, formát YYYY-MM-DD\

Vrací JSON:\
Pokud proběhne vše v pořádku:\
```json
{
  "ok": "1",
}
```

Pokud nastane chyba:
```json
{
    "errors": [
        {
            "value": "",
            "msg": "",
            "param": "",
            "location": ""
        }
    ]
}
```

# Dobít kredit (POST)

**Struktura**: http://46.28.111.31:3000/user/dobit_kredit/{token}

token - unikátní vygenerovaný token 

**POST data (x-www-form-urlencode)**

kredit - výše kreditu pro dobití, pokud zadáte záporný kredit, uživateli se kredit odečte. Povinná položka\
idsys_member - id uživatele, kterému se dobijí kredit, povinná položka\
dph - výše DPH, která se použije pro dobití, pokud nejste plátci DPH zadávejte 0 (nulu), povinná položka\


Vrací JSON:
Pokud proběhne vše v pořádku:
```json
{
  "ok": "1",
}
```

Pokud nastane chyba:
```json
{
    "errors": [
        {
            "value": "",
            "msg": "",
            "param": "",
            "location": ""
        }
    ]
}
```


# Výpis dostupných permanentek (GET)

**Struktura**: http://46.28.111.31:3000/permanentka/{token}

token - unikátní vygenerovaný token  

vrací JSON:
```json
{
  "ok": "1",
  "data": [
    {
      "idpermanekta": ...,
      "nazev": "...",
      "volnych_vstupu_perioda": 5,
      "perioda": 30,
      "platnost_dnu": 30,
      "celkovy_pocet_rezervaci": 5,
      "text_pocet_vstupu": null,
      "fond_na_lekci": null,
      "cena": 100,
      "cena1": null,
      "cena2": null,
      "cena3": null,
      "cena4": null,      
      "automaticky_po_prihlaseni": 0,
      "automaticky_po_prihlaseni_zaplaceno": 1,
      "platnost_od": null,
      "pocet_dostupnych": null,
      "automaticke_odecitani_karta": 0
    },
  .....      
  ]
}
```

kde:

"idpermanekta": - id permanentky\
"nazev": název permanentky\
"volnych_vstupu_perioda": počet vstupů za interval\
"perioda": interval vstupu\
"platnost_dnu": počet dnů platnosti\
"celkovy_pocet_rezervaci": celkový počet dostupných rezervací\
"text_pocet_vstupu": text pro celkový počet vstupů\
"fond_na_lekci": omezení počtu rezervací na permanentku na jednu lekci,\
"cena": základní cena permanentky\
"cena1": cena permanentky pro slevu číslo 1 (viz. RS Nastavení - Slevy (student, senior,...)\
"cena2": cena permanentky pro slevu číslo 2 (viz. RS Nastavení - Slevy (student, senior,...)\
"cena3": cena permanentky pro slevu číslo 3 (viz. RS Nastavení - Slevy (student, senior,...)\
"cena4": cena permanentky pro slevu číslo 4 (viz. RS Nastavení - Slevy (student, senior,...)\
"automaticky_po_prihlaseni": 0/1 - jestli bude permanentka přidělena automaticky po registraci\
"automaticky_po_prihlaseni_zaplaceno": 0/1 - jestli bude automaticky přidělená permanentka nastavená na zaplaceno\
"platnost_od": jestli bude mít natvrdo nastavený datum od kdy bude permanentka platná\
"pocet_dostupnych": jestli je k prodeji omezený počet permanentek\
"automaticke_odecitani_karta": jestli bude permanentka nastavena na automatické odečítání vstupu po pípnutí karty do RS

*link pro přesměrování na koupi permanentky v RS*

https://URL_RS.inrs.cz/rs/odkaz/permanentka/{idpermanekta}


# Výpis dostupných členství (GET)


**Struktura**: http://46.28.111.31:3000/clenstvi/{token}

token - unikátní vygenerovaný token  

vrací JSON:
```json
{
  "ok": "1",
  "data": [
    {
      "nazev": "...",
      "pocet_dnu_platnosti": 30,
      "cena": 100,
      "cena1": 50,
      "cena2": 40,
      "cena3": 30,
      "cena4": null,
      "pocet_dostupnych": 5000,
      "pocet_video": null,
      "cena_prodlouzeni_procenta": null
    },
  .....      
  ]
}
```

kde:

"nazev": název členství\
"pocet_dnu_platnosti": počet dnů pro platnost členství\
"cena": základní cena členství\
"cena1": cena permanentky pro slevu číslo 1 (viz. RS Nastavení - Slevy (student, senior,...)\
"cena2": cena permanentky pro slevu číslo 2 (viz. RS Nastavení - Slevy (student, senior,...)\
"cena3": cena permanentky pro slevu číslo 3 (viz. RS Nastavení - Slevy (student, senior,...)\
"cena4": cena permanentky pro slevu číslo 4 (viz. RS Nastavení - Slevy (student, senior,...)\
"pocet_dostupnych": počet dostupných členství\
"pocet_video": případný počet videí, která budou zpřístupněna přes členství\
"cena_prodlouzeni_procenta": cena za prodloužení již zakoupeného členství

*link pro přesměrovaní na koupi permanentky v RS*

https://URL_RS.inrs.cz/rs/odkaz/clenstvi/{idclenstvi}



# Odkazy na RS  

## Odkaz na přihlášení do RS  
https://URL_RS.inrs.cz/rs/kalendar_vypis/kalendar_vypis_login  

## Odkaz na registraci do RS  
https://URL_RS.inrs.cz/rs/sys_member/registrace/?clear=1  

## Odkaz na lekci  
https://URL_RS.inrs.cz/rs/akce/zobrazit_akci/{idakce}  



