<?php

// аналогичны категориям, только статьи связаны с несколькими ключевыми словами, также используются в meta keywords
// 'category_key' => null - Общие ключевые слова для всего сайта в основных разделах меню

$keywords = [
    // Общие ключевые слова 
    1 => ['key' => 1, 'category_key' => null, 'name' => 'стекло', 'label' => 'steklo', 'pop' => ''],
    2 => ['key' => 2, 'category_key' => null, 'name' => 'зеркало', 'label' => 'zerkalo', 'pop' => ''],
    3 => ['key' => 3, 'category_key' => null, 'name' => 'изделия из стекла', 'label' => 'izdeliya-iz-stekla', 'pop' => ''],
    4 => ['key' => 4, 'category_key' => null, 'name' => 'конструкции из стекла', 'label' => 'konstrukcii-iz-stekla', 'pop' => ''],
    5 => ['key' => 5, 'category_key' => null, 'name' => 'стекольная мастерская', 'label' => 'stekolnaya-masterskaya', 'pop' => ''],
    6 => ['key' => 6, 'category_key' => null, 'name' => 'обработка стекла', 'label' => 'obrabotka-stekla', 'pop' => ''],
    7 => ['key' => 7, 'category_key' => null, 'name' => 'стекло обычное', 'label' => 'steklo-obychnoe', 'pop' => ''],
    8 => ['key' => 8, 'category_key' => null, 'name' => 'стекло осветленное', 'label' => 'steklo-osvetlennoe', 'pop' => ''],
    9 => ['key' => 9, 'category_key' => null, 'name' => 'стекло цветное', 'label' => 'steklo-tsevetnoe', 'pop' => ''],
    10 => ['key' => 10, 'category_key' => null, 'name' => 'стекло с рисунком', 'label' => 'steklo-s-risunkom', 'pop' => ''],
    11 => ['key' => 11, 'category_key' => null, 'name' => 'стекло с узором', 'label' => 'steklo-s-uzorom', 'pop' => ''],
    12 => ['key' => 12, 'category_key' => null, 'name' => 'стекло ламинированное', 'label' => 'steklo-laminirovannoe', 'pop' => ''],
    13 => ['key' => 13, 'category_key' => null, 'name' => 'зеркало с узором', 'label' => 'zerkalo-s-uzorom', 'pop' => ''],


    // Ключевые слова по категориям
    10101 => ['key' => 10101, 'category_key' => 10100, 'name' => 'фотопечать на стекле', 'label' => 'fotopechat-na-stekle', 'pop' => ''],
    10102 => ['key' => 10102, 'category_key' => 10100, 'name' => 'печать на стекле', 'label' => 'pechat-na-stekle', 'pop' => ''],
    10103 => ['key' => 10103, 'category_key' => 10100, 'name' => 'стекло с фотопечатью', 'label' => 'steklo-s-fotopechatu', 'pop' => ''],
    10104 => ['key' => 10104, 'category_key' => 10100, 'name' => 'фото на стекле', 'label' => 'foto-na-stekle', 'pop' => ''],

    10201 => ['key' => 10201, 'category_key' => 10200, 'name' => 'резка стекла', 'label' => 'rezka-stekla', 'pop' => ''],
    10202 => ['key' => 10202, 'category_key' => 10200, 'name' => 'резка зеркала', 'label' => 'rezka-zerkala', 'pop' => ''],
    10203 => ['key' => 10203, 'category_key' => 10200, 'name' => 'резка стекла нижний новгород', 'label' => 'rezka-zerkala-nizgniy-novgorod', 'pop' => ''],

    10301 => ['key' => 10301, 'category_key' => 10300, 'name' => 'сверление стекла', 'label' => 'sverlenie-stekla', 'pop' => ''],
    10302 => ['key' => 10302, 'category_key' => 10300, 'name' => 'сверление зеркала', 'label' => 'sverlenie-zerkala', 'pop' => ''],
    10303 => ['key' => 10303, 'category_key' => 10300, 'name' => 'отверстие в стекле', 'label' => 'otverstie-v-stekle', 'pop' => ''],

    // матирование стекла, сатинат, матовое стекло
    10401 => ['key' => 10401, 'category_key' => 10400, 'name' => 'матирование стекла', 'label' => 'matirovanie-stekla', 'pop' => ''],
    10402 => ['key' => 10402, 'category_key' => 10400, 'name' => 'сатинат', 'label' => 'matirovanie-satinat', 'pop' => ''],
    10403 => ['key' => 10403, 'category_key' => 10400, 'name' => 'матовое стекло ', 'label' => 'matovoe-steklo', 'pop' => ''],

    10501 => ['key' => 10501, 'category_key' => 10500, 'name' => 'кромка стекла', 'label' => 'kromka-stekla', 'pop' => ''],
    10502 => ['key' => 10502, 'category_key' => 10500, 'name' => 'фацет стекла', 'label' => 'facet-stekla', 'pop' => ''],
    10503 => ['key' => 10503, 'category_key' => 10500, 'name' => 'кромка зеркала', 'label' => 'kromka-zerkala', 'pop' => ''],
    10504 => ['key' => 10504, 'category_key' => 10500, 'name' => 'фацет зеркала', 'label' => 'facet-zerkala', 'pop' => ''],
    10505 => ['key' => 10505, 'category_key' => 10500, 'name' => 'обработка кромки', 'label' => 'obrabotka-kromki', 'pop' => ''],
    10506 => ['key' => 10506, 'category_key' => 10500, 'name' => 'создание фацета', 'label' => 'sozdanie-faceta', 'pop' => ''],

    // УФ-склейка стекла, ультрафиолетовое склеивание, склеивание стекла
    10601 => ['key' => 10601, 'category_key' => 10600, 'name' => 'УФ-склейка стекла', 'label' => 'uf-skleika-stekla', 'pop' => ''],
    10602 => ['key' => 10602, 'category_key' => 10600, 'name' => 'ультрафиолетовое склеивание', 'label' => 'ultrafioletovoe-skleivanie', 'pop' => ''],
    10603 => ['key' => 10603, 'category_key' => 10600, 'name' => 'склеивание стекла', 'label' => 'skleivanie-stekla', 'pop' => ''],

    //закаливание стекла, закалка стекла, закаленное стекло
    10701 => ['key' => 10701, 'category_key' => 10700, 'name' => 'закалка стекла', 'label' => 'zakalka-stekla', 'pop' => ''],
    10702 => ['key' => 10702, 'category_key' => 10700, 'name' => 'закаливание стекла', 'label' => 'zakalivanie-stekla', 'pop' => ''],
    10703 => ['key' => 10703, 'category_key' => 10700, 'name' => 'закаленное стекло', 'label' => 'zakalennoe-steklo', 'pop' => ''],

    10801 => ['key' => 10801, 'category_key' => 10800, 'name' => 'тонированное стекло', 'label' => 'tonirovannoe-steklo', 'pop' => ''],
    10802 => ['key' => 10802, 'category_key' => 10800, 'name' => 'бронзовое стекло', 'label' => 'bronzovoe-steklo', 'pop' => ''],
    10803 => ['key' => 10803, 'category_key' => 10800, 'name' => 'черное стекло', 'label' => 'chernoe-steklo', 'pop' => ''],
    10804 => ['key' => 10804, 'category_key' => 10800, 'name' => 'прозрачное цветное стекло', 'label' => 'prozrachnoe-steklo', 'pop' => ''],
    10805 => ['key' => 10805, 'category_key' => 10800, 'name' => 'серое стекло', 'label' => 'seroe-steklo', 'pop' => ''],
    10806 => ['key' => 10806, 'category_key' => 10800, 'name' => 'зеленое стекло', 'label' => 'zelenoe-steklo', 'pop' => ''],
    10807 => ['key' => 10807, 'category_key' => 10800, 'name' => 'голубое стекло', 'label' => 'goluboe-steklo', 'pop' => ''],
    10808 => ['key' => 10808, 'category_key' => 10800, 'name' => 'синее стекло', 'label' => 'sinee-steklo', 'pop' => ''],
    10809 => ['key' => 10809, 'category_key' => 10800, 'name' => 'желтое стекло', 'label' => 'zheltoe-steklo', 'pop' => ''],
    10810 => ['key' => 10810, 'category_key' => 10800, 'name' => 'темное стекло', 'label' => 'temnoe-steklo', 'pop' => ''],
    10811 => ['key' => 10811, 'category_key' => 10800, 'name' => 'покраска стекла', 'label' => 'pokraska-stekla', 'pop' => ''],
    10812 => ['key' => 10812, 'category_key' => 10800, 'name' => 'окрашивание стекла', 'label' => 'okrashivanie-stekla', 'pop' => ''],
    10813 => ['key' => 10813, 'category_key' => 10800, 'name' => 'окраска стекла', 'label' => 'okraska-stekla', 'pop' => ''],
    10814 => ['key' => 10814, 'category_key' => 10800, 'name' => 'краска для стекла', 'label' => 'kraska-dlia-stekla', 'pop' => ''],
    10815 => ['key' => 10815, 'category_key' => 10800, 'name' => 'окраска поверхности стекла', 'label' => 'okraska-poverhnosti-stekla', 'pop' => ''],

    11001 => ['key' => 11001, 'category_key' => 11000, 'name' => 'ламинирование стекол', 'label' => 'laminirovanie-stekol', 'pop' => ''],
    11002 => ['key' => 11002, 'category_key' => 11000, 'name' => 'триплексование стекол', 'label' => 'tripleksovanie-stekol', 'pop' => ''],
    11003 => ['key' => 11003, 'category_key' => 11000, 'name' => 'триплекс', 'label' => 'triplex', 'pop' => ''],
    11004 => ['key' => 11004, 'category_key' => 11000, 'name' => 'полиплекс', 'label' => 'polyplex', 'pop' => ''],
    11005 => ['key' => 11005, 'category_key' => 11000, 'name' => 'пленочный триплекс', 'label' => 'plenochnyi-triplex', 'pop' => ''],
    11006 => ['key' => 11006, 'category_key' => 11000, 'name' => 'ламинированное стекло', 'label' => 'laminirovannnoe-steklo', 'pop' => ''],

    20101 => ['key' => 20101, 'category_key' => 20100, 'name' => 'кухонный фартук', 'label' => 'kuhonnyi-fartuk', 'pop' => ''],
    20102 => ['key' => 20102, 'category_key' => 20100, 'name' => 'фартук из стекла', 'label' => 'fartuk-iz-stekla', 'pop' => ''],
    20103 => ['key' => 20103, 'category_key' => 20100, 'name' => 'стеклянный фартук', 'label' => 'stekliannyi-fartuk', 'pop' => ''],

    20201 => ['key' => 20201, 'category_key' => 20200, 'name' => 'панно из стекла', 'label' => 'panno-iz-stekla', 'pop' => ''],
    20202 => ['key' => 20202, 'category_key' => 20200, 'name' => 'стеновое панно', 'label' => 'stenovoe-panno', 'pop' => ''],
    20203 => ['key' => 20203, 'category_key' => 20200, 'name' => 'стеклянное панно', 'label' => 'stekliannyi-panno', 'pop' => ''],
    
    20301 => ['key' => 20301, 'category_key' => 20300, 'name' => 'панно из зеркала', 'label' => 'panno-iz-zerkala', 'pop' => ''],
    20302 => ['key' => 20302, 'category_key' => 20300, 'name' => 'стеновое зеркало', 'label' => 'stenovoe-zerkalo', 'pop' => ''],
    20303 => ['key' => 20303, 'category_key' => 20300, 'name' => 'зеркальная плитка', 'label' => 'zerkalnaia-plitka', 'pop' => ''],
    20304 => ['key' => 20304, 'category_key' => 20300, 'name' => 'зеркало-панно', 'label' => 'zerkalo-panno', 'pop' => ''],
    20305 => ['key' => 20305, 'category_key' => 20300, 'name' => 'зеркальное панно', 'label' => 'zerkalnoe-panno', 'pop' => ''],

    20401 => ['key' => 20401, 'category_key' => 20400, 'name' => 'перегородка из стекла', 'label' => 'peregorodka-iz-stekla', 'pop' => ''],
    20402 => ['key' => 20402, 'category_key' => 20400, 'name' => 'стеклянная перегородка', 'label' => 'stekliannyi-peregorodka', 'pop' => ''],
    20403 => ['key' => 20403, 'category_key' => 20400, 'name' => 'перегородка цельнотянутая', 'label' => 'peregorodka-tselnotianutaia', 'pop' => ''],
    20404 => ['key' => 20404, 'category_key' => 20400, 'name' => 'вход из стекла', 'label' => 'vhod-iz-stekla', 'pop' => ''],
    20405 => ['key' => 20405, 'category_key' => 20400, 'name' => 'стеклянный вход', 'label' => 'stekliannyi-vhod', 'pop' => ''],

    20501 => ['key' => 20501, 'category_key' => 20500, 'name' => 'ниша из стекла', 'label' => 'nisha-iz-stekla', 'pop' => ''],
    20502 => ['key' => 20502, 'category_key' => 20500, 'name' => 'нища со стеклом', 'label' => 'nisha-so-steklom', 'pop' => ''],
    20503 => ['key' => 20503, 'category_key' => 20500, 'name' => 'ниша с витражом', 'label' => 'nisha-s-vitrazhom', 'pop' => ''],

    20701 => ['key' => 20701, 'category_key' => 20700, 'name' => 'потолок со стеклом', 'label' => 'potolok-so-steklom', 'pop' => ''],
    20702 => ['key' => 20702, 'category_key' => 20700, 'name' => 'потолочное панно', 'label' => 'potolochnoe-panno', 'pop' => ''],
    20703 => ['key' => 20703, 'category_key' => 20700, 'name' => 'стеклянный потолок', 'label' => 'stekliannyi-potolok', 'pop' => ''],

    20801 => ['key' => 20801, 'category_key' => 20800, 'name' => 'лестница из стекла', 'label' => 'lestnitca-iz-stekla', 'pop' => ''],
    20802 => ['key' => 20802, 'category_key' => 20800, 'name' => 'ступень из стекла', 'label' => 'stupen-iz-stekla', 'pop' => ''],
    20803 => ['key' => 20803, 'category_key' => 20800, 'name' => 'ограждение из стекла', 'label' => 'ograzhdenie-iz-stekla', 'pop' => ''],
    20804 => ['key' => 20804, 'category_key' => 20800, 'name' => 'перила со стеклом', 'label' => 'perila-so-stekla', 'pop' => ''],

    20901 => ['key' => 20901, 'category_key' => 20900, 'name' => 'пол из стекла', 'label' => 'pol-iz-stekla', 'pop' => ''],
    20902 => ['key' => 20902, 'category_key' => 20900, 'name' => 'встроенный пол', 'label' => 'vstroennyi-pol', 'pop' => ''],
    20903 => ['key' => 20903, 'category_key' => 20900, 'name' => 'стеклянный пол', 'label' => 'stekliannyi-pol', 'pop' => ''],
    20904 => ['key' => 20904, 'category_key' => 20900, 'name' => 'стекло для пола', 'label' => 'steklo-dlia-pola', 'pop' => ''],

    21001 => ['key' => 21001, 'category_key' => 21000, 'name' => 'ограждение из стекла', 'label' => 'ograzhdenie-iz-stekla', 'pop' => ''],
    21002 => ['key' => 21002, 'category_key' => 21000, 'name' => 'стеклянное ограждение', 'label' => 'stekliannoe-ograzhdenie', 'pop' => ''],
    21003 => ['key' => 21003, 'category_key' => 21000, 'name' => 'стеклянная секция ограждения', 'label' => 'stekliannaia-sektciia-ograzhdeniia', 'pop' => ''],
    21004 => ['key' => 21004, 'category_key' => 21000, 'name' => 'забор из стекла', 'label' => 'zabor-iz-stekla', 'pop' => ''],
    21005 => ['key' => 21005, 'category_key' => 21000, 'name' => 'ограда из стекла', 'label' => 'ograda-iz-stekla', 'pop' => ''],
    21006 => ['key' => 21006, 'category_key' => 21000, 'name' => 'перила из стекла', 'label' => 'perila-iz-stekla', 'pop' => ''],

    30101 => ['key' => 30101, 'category_key' => 30100, 'name' => 'стеклоблок', 'label' => 'stekloblok', 'pop' => ''],
    30102 => ['key' => 30102, 'category_key' => 30100, 'name' => 'стеклоблок классический', 'label' => 'stekloblok-klassicheskii', 'pop' => ''],
    30103 => ['key' => 30103, 'category_key' => 30100, 'name' => 'стеклоблок стандартный', 'label' => 'stekloblok-standartnyi', 'pop' => ''],
    30104 => ['key' => 30104, 'category_key' => 30100, 'name' => 'стеклоблок простой', 'label' => 'stekloblok-prostoi', 'pop' => ''],
    30105 => ['key' => 30105, 'category_key' => 30100, 'name' => 'стеклоблок классика', 'label' => 'stekloblok-klassika', 'pop' => ''],
    30201 => ['key' => 30201, 'category_key' => 30200, 'name' => 'стеклоблок', 'label' => 'stekloblok', 'pop' => ''],
    30202 => ['key' => 30202, 'category_key' => 30200, 'name' => 'стеклоблок с наполнением', 'label' => 'stekloblok-s-napolneniem', 'pop' => ''],
    30203 => ['key' => 30203, 'category_key' => 30200, 'name' => 'стеклоблок подарочный', 'label' => 'stekloblok-podarochnyi', 'pop' => ''],
    30204 => ['key' => 30204, 'category_key' => 30200, 'name' => 'стеклоблок с витражом', 'label' => 'stekloblok-s-vitrazhom', 'pop' => ''],
    30301 => ['key' => 30301, 'category_key' => 30300, 'name' => 'стеклоблок', 'label' => 'stekloblok', 'pop' => ''],
    30302 => ['key' => 30302, 'category_key' => 30300, 'name' => 'стеклоблок мини', 'label' => 'stekloblok-mini', 'pop' => ''],
    30303 => ['key' => 30303, 'category_key' => 30300, 'name' => 'мини стеклоблок', 'label' => 'mini-stekloblok', 'pop' => ''],
    30304 => ['key' => 30304, 'category_key' => 30300, 'name' => 'стеклоблок современный', 'label' => 'stekloblok-sovremennyi', 'pop' => ''],
    30305 => ['key' => 30305, 'category_key' => 30300, 'name' => 'стеклоблок маленький', 'label' => 'stekloblok-malenkii', 'pop' => ''],

    30401 => ['key' => 30401, 'category_key' => 30400, 'name' => 'стол из стекла', 'label' => 'stol-iz-stekla', 'pop' => ''],
    30402 => ['key' => 30402, 'category_key' => 30400, 'name' => 'столешница из стекла', 'label' => 'stoleshnitsa-iz-stekla', 'pop' => ''],
    30403 => ['key' => 30403, 'category_key' => 30400, 'name' => 'тв-стойка из стекла', 'label' => 'tv-stoika-iz-stekla', 'pop' => ''],

    30501 => ['key' => 30501, 'category_key' => 30500, 'name' => 'полка из стекла', 'label' => 'polka-iz-stekla', 'pop' => ''],
    30502 => ['key' => 30502, 'category_key' => 30500, 'name' => 'полка для стены', 'label' => 'polka-dlia-steny', 'pop' => ''],
    30503 => ['key' => 30503, 'category_key' => 30500, 'name' => 'полка для шкафа', 'label' => 'polka-dlia-shkafa', 'pop' => ''],

    30601 => ['key' => 30601, 'category_key' => 30600, 'name' => 'витрина из стекла', 'label' => 'vitriny-iz-stekla', 'pop' => ''],
    30602 => ['key' => 30602, 'category_key' => 30600, 'name' => 'шкаф из стекла', 'label' => 'shkaf-iz-stekla', 'pop' => ''],
    30603 => ['key' => 30603, 'category_key' => 30600, 'name' => 'стеллаж из стекла', 'label' => 'vitriny-iz-stekla', 'pop' => ''],
    30604 => ['key' => 30604, 'category_key' => 30600, 'name' => 'стойка из стекла', 'label' => 'stoika-iz-stekla', 'pop' => ''],

    30701 => ['key' => 30701, 'category_key' => 30700, 'name' => 'дверка из стекла', 'label' => 'dverka-iz-stekla', 'pop' => ''],
    30702 => ['key' => 30702, 'category_key' => 30700, 'name' => 'стеклянная дверка', 'label' => 'stekliannaia-dverka', 'pop' => ''],
    30703 => ['key' => 30703, 'category_key' => 30700, 'name' => 'дверца из стекла', 'label' => 'dvertsa-iz-stekla', 'pop' => ''],
    30704 => ['key' => 30704, 'category_key' => 30700, 'name' => 'фасад из стекла', 'label' => 'fasad-iz-stekla', 'pop' => ''],

    30801 => ['key' => 30801, 'category_key' => 30800, 'name' => 'дверка шкаф-купе из зеркала', 'label' => 'dverкa-shkaf-kupe-iz-zerkala', 'pop' => ''],
    30802 => ['key' => 30802, 'category_key' => 30800, 'name' => 'дверка шкаф-купе зеркальные', 'label' => 'dverкa-shkaf-kupe-zerkalnye', 'pop' => ''],
    30803 => ['key' => 30803, 'category_key' => 30800, 'name' => 'шкаф-купе дверки из стекла', 'label' => 'dverкa-shkaf-kupe-iz-stekla', 'pop' => ''],
    30804 => ['key' => 30804, 'category_key' => 30800, 'name' => 'шкаф-купе дверки раздвижные', 'label' => 'shkaf-kupe-dverкi-razdvignye', 'pop' => ''],

    30901 => ['key' => 30901, 'category_key' => 30900, 'name' => 'зеркало настенное', 'label' => 'zerkalo-nastennoe', 'pop' => ''],
    30902 => ['key' => 30902, 'category_key' => 30900, 'name' => 'зеркало с багетом', 'label' => 'zerkalo-s-bagetom', 'pop' => ''],
    30903 => ['key' => 30903, 'category_key' => 30900, 'name' => 'зеркало с рисунком', 'label' => 'zerkalo-s-risunkom', 'pop' => ''],
    30904 => ['key' => 30904, 'category_key' => 30900, 'name' => 'фасад из стекла', 'label' => 'zerkalo-iz-stekla', 'pop' => ''],

    31201 => ['key' => 31201, 'category_key' => 31200, 'name' => 'душевая кабина', 'label' => 'dushevaia-kabina', 'pop' => ''],
    31202 => ['key' => 31202, 'category_key' => 31200, 'name' => 'дверь для душа из стекла', 'label' => 'dver-dly-dusha-iz-stekla', 'pop' => ''],
    31203 => ['key' => 31203, 'category_key' => 31200, 'name' => 'душевая перегородка из стекла', 'label' => 'dushevaia-peregorodka-is-stekla', 'pop' => ''],
    31204 => ['key' => 31204, 'category_key' => 31200, 'name' => 'кабина для душа', 'label' => 'kabina-dly-dusha', 'pop' => ''],
    
    31501 => ['key' => 31501, 'category_key' => 31500, 'name' => 'дверь из стекла', 'label' => 'dver-iz-stekla', 'pop' => ''],
    31502 => ['key' => 31502, 'category_key' => 31500, 'name' => 'дверь распашная', 'label' => 'dver-raspashnaia', 'pop' => ''],
    31503 => ['key' => 31503, 'category_key' => 31500, 'name' => 'стеклянная дверь', 'label' => 'stekliannaia-dver', 'pop' => ''],
    31504 => ['key' => 31504, 'category_key' => 31500, 'name' => 'дверь из зеркала', 'label' => 'dver-iz-zerkala', 'pop' => ''],
    31601 => ['key' => 31601, 'category_key' => 31600, 'name' => 'дверь раздвижная', 'label' => 'dver-razdvizgnaia', 'pop' => ''],

    40101 => ['key' => 40101, 'category_key' => 40100, 'name' => 'багет', 'label' => 'baget', 'pop' => ''],
    40102 => ['key' => 40102, 'category_key' => 40100, 'name' => 'багет из пластика', 'label' => 'baget-iz-plastika', 'pop' => ''],
    40103 => ['key' => 40103, 'category_key' => 40100, 'name' => 'багет из металла', 'label' => 'baget-iz-metalla', 'pop' => ''],
    40104 => ['key' => 40104, 'category_key' => 40100, 'name' => 'багет пластиковый', 'label' => 'baget-plastikovyi', 'pop' => ''],
    40105 => ['key' => 40105, 'category_key' => 40100, 'name' => 'багет металлический', 'label' => 'baget-metallicheskii', 'pop' => ''],
    40106 => ['key' => 40106, 'category_key' => 40100, 'name' => 'багет из дерева', 'label' => 'baget-iz-dereva', 'pop' => ''],
    40106 => ['key' => 40106, 'category_key' => 40100, 'name' => 'багет emafyl', 'label' => 'baget-emafyl', 'pop' => ''],
    40106 => ['key' => 40106, 'category_key' => 40100, 'name' => 'багет эмафил', 'label' => 'baget-emafil', 'pop' => ''],

    40201 => ['key' => 40201, 'category_key' => 40200, 'name' => 'фурнитура для стекла', 'label' => 'furnitura-dlia-stekla', 'pop' => ''],
    40202 => ['key' => 40202, 'category_key' => 40200, 'name' => 'фурнитура для душа', 'label' => 'furnitura-dlia-dusha', 'pop' => ''],
    40203 => ['key' => 40203, 'category_key' => 40200, 'name' => 'держатель стекла', 'label' => 'derzhatel-dlia-stekla', 'pop' => ''],
    40203 => ['key' => 40203, 'category_key' => 40200, 'name' => 'фитинг для стекла', 'label' => 'fiting-dlia-stekla', 'pop' => ''],
    40205 => ['key' => 40205, 'category_key' => 40200, 'name' => 'петля для стекла', 'label' => 'petlia-dlia-stekla', 'pop' => ''],
    40206 => ['key' => 40206, 'category_key' => 40200, 'name' => 'коннектор для стекла', 'label' => 'konnektor-dlia-stekla', 'pop' => ''],
    40207 => ['key' => 40207, 'category_key' => 40200, 'name' => 'ручка для стекла', 'label' => 'ruchka-dlia-stekla', 'pop' => ''],
    40208 => ['key' => 40208, 'category_key' => 40200, 'name' => 'ручка для кабин', 'label' => 'ruchka-dlia-kabin', 'pop' => ''],
    40209 => ['key' => 40209, 'category_key' => 40200, 'name' => 'фитинг для кабин', 'label' => 'fiting-dlia-kabin', 'pop' => ''],

    50101 => ['key' => 50101, 'category_key' => 50100, 'name' => 'стекло декоративное', 'label' => 'steklo-dekorativnoe', 'pop' => ''],
    50102 => ['key' => 50102, 'category_key' => 50100, 'name' => 'стекло с узором', 'label' => 'steklo-s-uzorom', 'pop' => ''],
    50103 => ['key' => 50103, 'category_key' => 50100, 'name' => 'стекло декоргласс', 'label' => 'steklo-dekorglass', 'pop' => ''],
    50104 => ['key' => 50104, 'category_key' => 50100, 'name' => 'стекло dekorglass', 'label' => 'steklo-dekorglass', 'pop' => ''],
    50105 => ['key' => 50105, 'category_key' => 50100, 'name' => 'стекло матовое', 'label' => 'steklo-matovoe', 'pop' => ''],
    50106 => ['key' => 50106, 'category_key' => 50100, 'name' => 'стекло сатин', 'label' => 'steklo-satin', 'pop' => ''],

    50301 => ['key' => 50301, 'category_key' => 50300, 'name' => 'стекло optivate', 'label' => 'steklo-optivate', 'pop' => ''],
    50302 => ['key' => 50302, 'category_key' => 50300, 'name' => 'стекло cristal vigion', 'label' => 'steklo-cristal-vigion', 'pop' => ''],

    50701 => ['key' => 50701, 'category_key' => 50700, 'name' => 'стекло glasspan', 'label' => 'steklo-glasspan', 'pop' => ''],
    50702 => ['key' => 50702, 'category_key' => 50700, 'name' => 'панели glasspan', 'label' => 'paneli-glasspan', 'pop' => ''],

    60101 => ['key' => 60101, 'category_key' => 60100, 'name' => 'витраж пленочный', 'label' => 'vitrazhi-plenochnyi', 'pop' => ''],
    60102 => ['key' => 60102, 'category_key' => 60100, 'name' => 'витраж Regalet', 'label' => 'vitrazhi-regalet', 'pop' => ''],
    60103 => ['key' => 60103, 'category_key' => 60100, 'name' => 'витраж из пленки', 'label' => 'vitrazhi-iz-plenki', 'pop' => ''],
];

