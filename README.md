# IIS Informačné systémy
#### Autori:
* Bolf René <xbolfr00@stud.fit.vutbr.cz>
* Grenčík Radoslav <xgrenc00@stud.fit.vutbr.cz>
* Nemčeková Barbora <xnemce06@stud.fit.vutbr.cz>

Úkolem zadání je vytvořit informační systém pro objednávky a rozvoz jídel vařených ve spravovaných provozovnách. Každá provozovna má nějaké označení, pomocí kterého ji její zákazníci budou moci vhodně odlišit, vlastní nabídku jídel a nápojů a další atributy (např. adresa, uzávěrka objednávek apod.). Nabídky jídel a nápojů se skládají z denních (denní menu, má interní limit položek) nebo trvalých položek (stálá nabídka jídel, občerstvení, nápojů). Položky mají různé vlastnosti: typ (bezlepkové, veganské, apod.), popis, cena, volitelný obrázek, apod. Uživatelé budou moci informační systém použít jak pro správu provozoven a jídel, tak pro objednání jídel a správu objednávek - a to následujícím způsobem:
### Administrátor:

* spravuje uživatele

* má rovněž práva všech následujících rolí

### Operátor:

* vkládá a spravuje provozovny a jejich nabídky

* může vkládat obrázky k položkám nabídek

* ukončuje objednávky pro daný den

* sestavuje plán řidičů (přiřazení objednávek), kteří provedou vyzvednutí a rozvoz jídel

* má rovněž práva strávníka

### Řidič:

* vyřizuje objednávky (přebírá objednávky, vyzvedává a rozváží jídlo)

* má rovněž práva strávníka

### Strávník:

* objednává 1 až n jídel (zvolte vhodné omezení - např. počet jídel, případně vyžadovaná úhrada do uzávěrky objednávek - kontroluje a případně schvaluje/ruší operátor)

* sleduje stav jeho objednávek (přijetí, potvrzení, rozvoz, ...)

* má rovněž práva (a, b) neregistrovaného návštěvníka

### Neregistrovaný návštěvník:

* (a) má možnost procházet jídelní lístky jednotlivých provozoven a sledovat aktuální nabídky (položky denního menu mohou být vyprodané)

* (b) má možnost filtrovat položky nabídek dle různých vlastností (např. bezlepkové, veganské apod.)

* může provést objednání jídla bez registrace: vyžadujte vhodné údaje (má možnost dokončit registraci a stát se strávníkem)

Každý registrovaný uživatel má možnost editovat svůj profil.
# IIS - informačné systémy
