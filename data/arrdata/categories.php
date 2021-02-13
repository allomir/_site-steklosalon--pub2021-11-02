<?php 
// Смешной глюк - label не должен содержать сочетание tel

$categories = [

    // #Тип. articles. #Группа 1. Обработка стекла

    10100 => ['key' => 10100, 'group_key' => 1, 'pop' => 50, 'label_eng' => 'photoprint_on_glass', 'label' => 'fotopechat-na-stekle', 'name' => 'Фотопечать на стекле', 'icon' => '_img-fotopechat_v1.png', 'breaf' => 'Декорирование на стекле, стеклянные изделия с фотореалистичным изображением'],
    // #10 совместно Стекло с фотопечатью
    10200 => ['key' => 10200, 'group_key' => 1, 'pop' => 0, 'label_eng' => 'glass_cutting', 'label' => 'rezka-stekla', 'name' => 'Резка стекла, зеркал', 'icon' => '_img-rezka_v1.png', 'breaf' => 'Профессиональная резка стекла по размеру и по проекту, цена'],
    // #16
    10300 => ['key' => 10300, 'group_key' => 1, 'pop' => 0, 'label_eng' => 'glass_drilling', 'label' => 'sverlenie-stekla', 'name' => 'Сверление стекла, зеркал', 'icon' => '_img-sverlenie_v1.png', 'breaf' => 'Профессиональное сверление стекла на двустороннем станке, цена'],
    // #18
    10400 => ['key' => 10400, 'group_key' => 1, 'pop' => 80, 'label_eng' => 'glass_matting', 'label' => 'matirovanie-stekla', 'name' => 'Матирование на стекле, зеркале', 'icon' => '_img-steklo-matovoe_v6.png', 'breaf' => 'Создание на стекле или зеркале матового эффекта или рисунка'],
    // #11 совместно с Стекло, зеркало матовое 
    // ## ссылки на Стекло сатинированное и Стекло матовое (скорее всего матовое стекло в продукции и есть сатинат, тк производится хим способом)
    10500 => ['key' => 10500, 'group_key' => 1, 'pop' => 100, 'label_eng' => 'glass_facet_edge', 'label' => 'kromka-facet', 'name' => 'Создание кромки, фацета стекла', 'icon' => '_img-zerkalo-facet_v1.png', 'breaf' => 'Обработка фацета на фрезерном или полировочном оборудовании'],
    // #13 совместно Стекло, зеркало с фацетом
    10600 => ['key' => 10600, 'group_key' => 1, 'pop' => 0, 'label_eng' => 'glass_gluing', 'label' => 'uf-skleika-stekla', 'name' => 'УФ-склейка стекол (ультрафиолет)', 'icon' => '_img-ufskleika_v1.png', 'breaf' => 'Склеивание стекол, приклеивание фурнитуры и декора, цена'],
    // #17 
    10700 => ['key' => 10700, 'group_key' => 1, 'pop' => 0, 'label_eng' => 'glass_hardening', 'label' => 'zakalka-stekla', 'name' => 'Закаливание стекла', 'icon' => '_img-steklo_v4.png', 'breaf' => 'Выполняем закаливание стекла'],
    // #12 совместно с Стекло закаленное
    10800 => ['key' => 10800, 'group_key' => 1, 'pop' => 100, 'label_eng' => 'glass_painting', 'label' => 'pokraska-stekla', 'name' => 'Покраска, тонирование стекла', 'icon' => '_img-steklo-pokraska_v1.png', 'breaf' => 'Окрашивание, тонирование стекла: серебро, бронза, графит, золото, таблица RAL'],
    // #14 совместно с Стекло цветное, ##Ссылки из статей Листового стекла цветное
    // 10900 => ['key' => 10900, 'group_key' => 1, 'pop' => 0, 'label_eng' => 'glass_toning', 'label' => 'tonirovanie-zerkala', 'name' => 'Тонирование зеркала', 'icon' => '_img-steklo-pokraska_v1.png', 'breaf' => 'Изготовление зеркал с пленками из серебра, золота, свинца, хрома, Al'],
    // #15 совместно с Зеркало цветное, обычное ##Скорее всего тонирование зеркала не нужно, такие зеркала должны производится на заводе с готовой пленкой отражающей
    11000 => ['key' => 11000, 'group_key' => 1, 'pop' => 0, 'label_eng' => 'glass_lamination', 'label' => 'laminirovanie-stekol', 'name' => 'Ламинирование стекол', 'icon' => 'laminirovanie-stekol.jpg', 'breaf' => 'Изготовление триплекса из нескольких слоев стекол'],
    // ## совместно с Ламинированное стекло, псевдоним Триплексование

    
    // #Тип. articles. #Группа 2. Стеклоконструкции и монтаж

    20100 => ['key' => 20100, 'group_key' => 2, 'pop' => 110, 'label_eng' => 'glass_kitchen_apron', 'label' => 'kuhonnye-fartuki-iz-stekla', 'name' => 'Кухонные фартуки из стекла', 'icon' => '_img-fartuk_v4.png', 'breaf' => 'Изготовление фартука стеклянного с фотопечатью, рисунком, витражом'],
    // #7 Добавить ссылку на фотопечать на стекле
    20200 => ['key' => 20200, 'group_key' => 2, 'pop' => 90, 'label_eng' => 'glasscanvas', 'label' => 'fotopechat-steklo-panno', 'name' => 'Стеновые панно из стекла', 'icon' => '_img-vitragi_v41.png', 'breaf' => 'Декорирование стен стеклами, картины из стекла с фотореалистичным изображением'],
    // #10 совместно с Стекло с фотопечатью, Добавить ссылку на фотопечать на стекле
    20300 => ['key' => 20300, 'group_key' => 2, 'pop' => 90, 'label_eng' => 'mirrorcanvas', 'label' => 'zerkalo-panno', 'name' => 'Панно из зеркала и зеркальная плитка', 'icon' => '_foto-zerkalo-matovoe_v1.png', 'breaf' => 'Декорирование стен зеркалами, зеркальные ниши, зеркальные стены в помещениях'],
    // #15 совместно Зеркало с фацетом #13, Зеркало цветное, обычное #15
    20400 => ['key' => 20400, 'group_key' => 2, 'pop' => 0, 'label_eng' => 'glass_partitions_sm', 'label' => 'peregorodki-iz-stekla-tc', 'name' => 'Перегородки из стекла (ТЦ)', 'icon' => '_img-peregorodka-tc_v3.png', 'breaf' => 'Изготовление и монтаж перегородок и ограждений из стекла в торговых центрах, декорирование'],
    // совместно Перегородки стеклянные (ТЦ) #31, совместно перегородки стеклянные #32, включает также магазин, офисы, дать ссылку на №14 №15
    20500 => ['key' => 20500, 'group_key' => 2, 'pop' => 80, 'label_eng' => 'glass_partitions_home', 'label' => 'peregorodki-iz-stekla-dom', 'name' => 'Перегородки, ниши (помещения)', 'icon' => '_img-peregorodka-tc_v2a.png', 'breaf' => 'Изготовление и монтаж межкомнатных перегородок из стекла, ниш со стеклом, ниш с витражем, декорирование'],
    // совместно Перегородки стеклянные (ТЦ) #31, совместно перегородки стеклянные #32
    21000 => ['key' => 21000, 'group_key' => 2, 'pop' => 0, 'label_eng' => 'glass_fence', 'label' => 'ograzhdeniiy-iz-stekla-zabori', 'name' => 'Ограждения помещений и лестниц', 'icon' => '_foto-ograda_v1.png', 'breaf' => 'Изготовление секций ограждений из стекла (ограды, заборы) для помещений, для лестниц (перила)'],
    // 20600 => ['key' => 20600, 'group_key' => 2, 'pop' => 0, 'label_eng' => 'glass_partitions_office', 'label' => 'peregorodki-iz-stekla-ofis', 'name' => 'Перегородки из стекла (офисные)', 'icon' => '_foto-peregorodka-ofis_v1.png', 'breaf' => 'Изготовление перегородок, ниш из стекла в профиле Al, МДФ в помещениях'],
    // совместно Перегородки офисные #33, дать ссылку на №13 №14
    20700 => ['key' => 20700, 'group_key' => 2, 'pop' => 0, 'label_eng' => 'glass_ceilings', 'label' => 'potolki-iz-stekla', 'name' => 'Потолки со стеклом', 'icon' => '_img-potolok_v3.png', 'breaf' => 'Изготовление цельных потолков из стекла, отдельных потолочных панно из стекла, потолочных ниш, панно с подсветкой, зеркальный потолок'],
    // #37 
    20800 => ['key' => 20800, 'group_key' => 2, 'pop' => 0, 'label_eng' => 'glass_stairs', 'label' => 'lestnitci-iz-stekla', 'name' => 'Лестницы из стекла', 'icon' => '_foto-lestnitca_v5.png', 'breaf' => 'Изготовление стеклянных ступеней и ограждение лестниц из стекла'],
    // #38
    20900 => ['key' => 20900, 'group_key' => 2, 'pop' => 0, 'label_eng' => 'glass_floor', 'label' => 'poli-iz-stekla', 'name' => 'Полы из стекла', 'icon' => '_img-pol_v2a.png', 'breaf' => 'Изготовление ниш в полу из стекла, вставки в пол, балконы, танцпол'],
    
    
    // #Тип. product. #Группа 3. Стеклоизделия и предметы

    30100 => ['key' => 30100, 'group_key' => 3, 'pop' => 90, 'label_eng' => 'glassblock', 'label' => 'steklobloki', 'name' => 'Стеклоблоки классические', 'icon' => 'steklobloki.jpg', 'breaf' => 'Стеклоблоки классика, подбор по каталогам производителей и выставочным образцам'],
    // #1
    30200 => ['key' => 30200, 'group_key' => 3, 'pop' => 90, 'label_eng' => 'glassblock_filling', 'label' => 'steklobloki-s-napolneniem', 'name' => 'Стеклоблоки c наполнением', 'icon' => 'steklobloki-s-napolneniem.jpg', 'breaf' => 'Стеклоблоки с наполнением, подбор по каталогам производителей и выставочным образцам'],
    // #1
    30300 => ['key' => 30300, 'group_key' => 3, 'pop' => 90, 'label_eng' => 'glassblock_mini', 'label' => 'steklobloki-mini', 'name' => 'Стеклоблоки мини', 'icon' => 'steklobloki-mini.jpg', 'breaf' => 'Стеклоблоки современные, мини, подбор по каталогам производителей и выставочным образцам'],
    // #1
    30400 => ['key' => 30400, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'desks', 'label' => 'stoli-stoleshnitcy-iz-stekla', 'name' => 'Столы, тв-стойки, столешницы из стекла', 'icon' => 'stoli-stoleshnitcy-iz-stekla.jpg', 'breaf' => 'Изготовление столов из стекла, тв-стоек, стеклянных столешниц, ножек'],
    // #19
    30500 => ['key' => 30500, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'shelf', 'label' => 'polki-iz-stekla', 'name' => 'Полки из стекла', 'icon' => 'polki-iz-stekla(2).png', 'breaf' => 'Изготовление полок из стекла в нишах, в шкафах, в стойках, на стенах, на тросах'],
    // #20
    30600 => ['key' => 30600, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'glasscase', 'label' => 'shkafy-vitriny-iz-stekla', 'name' => 'Шкафы, витрины из стекла', 'icon' => 'shkafy-vitriny-iz-stekla.png', 'breaf' => 'Изготовление шкафов, витрин, стеллажей, стоек из стекла для товаров и предметов, дверцы для витрин и шкафов из стекла, фурнитура на выбор'],
    // #21
    30700 => ['key' => 30700, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'smalldoor', 'label' => 'fasady-iz-stekla', 'name' => 'Дверки (фасады) мебельные из стекла', 'icon' => 'fasady-iz-stekla.png', 'breaf' => 'Изготовление дверок (фасадов) из стекла для мебели, шкафов и витрин с рисунком, витражом, из обычного и тонированного стекла. Фурнитура для стеклянных дверок на выбор'],
    // #22
    30800 => ['key' => 30800, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'sliding_wardrobe', 'label' => 'dverki-shkaf-kupe-iz-stekla-zerkala', 'name' => 'Дверки шкаф-купе из стекла, зеркала', 'icon' => 'dverki-shkaf-kupe-iz-stekla.png', 'breaf' => 'Изготовление дверок из стекла, зеркала с любым декором, с матированием, рисунком, витражем, с фотографией'],
    // #23
    30900 => ['key' => 30900, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'mirror', 'label' => 'zerkala-s-dekorom-bagetom', 'name' => 'Зеркала с декором', 'icon' => 'zerkala-s-dekorom-bagetom.png', 'breaf' => 'Изготовление зеркал навесных, приставных, настольных, настенных с багетом, с фацетом, с любым декором, витражем, матовым рисунком'],
    // #6
    // 31000 => ['key' => 31000, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'racks', 'label' => 'kartiny-panno-iz-stekla', 'name' => 'Картины из стекла', 'icon' => '', 'breaf' => 'Изготовление картин из стекла навесных, приставных, настольных, настенных с фотопечатью, рисунком, витражом, с подсветкой (картины-светильники)'],
    // #8
    // 31100 => ['key' => 31100, 'group_key' => 3, 'pop' => 0, 'label_eng' => '', 'lamps' => 'svetilniki-dizainerskie', 'name' => 'Светильники дизайнерские', 'icon' => '', 'breaf' => 'Светильники подвесные, настенные с декором, витражным стеклом, с витражами Тиффани'],
    // #9
    31200 => ['key' => 31200, 'group_key' => 3, 'pop' => 80, 'label_eng' => 'shower_cabin', 'label' => 'dushevye-kabiny-iz-stekla', 'name' => 'Душевые кабины и перегородки (каталоги, проекты)', 'icon' => 'dushevye-kabiny-iz-stekla.png', 'breaf' => 'Изготовление душевых кабин, дверей для душа, душевых перегородок из стекла под размер помещения. Фурнитура и каркас на выбор. Готовые душевые кабины по каталогам производителей'],
    // #25 + #26 + #27 + #29 + #30 душевые перегородки Душевые перегородки отменены, тк очень редки. Можно добавить в статьях перегородки (дом), или обединить с душевые кабины и перегордки
    // 31300 => ['key' => 31400, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'glass_picture', 'label' => 'shtorki-dlia-vann-iz-stekla', 'name' => 'Шторки для ванн из стекла (по каталогу или проекту)', 'icon' => '', 'breaf' => 'Подбор и монтаж шторок для ванн из стекла по каталогам производителей. Фурнитура и каркас на выбор'],
    // #27
    31500 => ['key' => 31500, 'group_key' => 3, 'pop' => 0, 'label_eng' => 'doors_swing', 'label' => 'dveri-iz-stekla-raspashnye', 'name' => 'Двери из стекла распашные', 'icon' => 'dveri-iz-stekla-raspashnye.png', 'breaf' => 'Изготовление дверей распашных из стекла, межкомнатных, входных. Фурнитура и каркас на выбор'],
    // #35
    31600 => ['key' => 31600, 'group_key' => 3, 'pop' => 80, 'label_eng' => 'doors_sliding', 'label' => 'dveri-iz-stekla-razdvignye', 'name' => 'Двери из стекла раздвижные', 'icon' => 'dveri-iz-stekla-razdvignye.png', 'breaf' => 'Изготовление дверей раздвижных из стекла, межкомнатных, входных. Фурнитура и каркас на выбор'],
    // #34

    // #Тип. product. #Группа 4. Фурнитура, изделия для декора

    40100 => ['key' => 40100, 'group_key' => 4, 'pop' => 100, 'label_eng' => 'baguette', 'label' => 'bagety', 'name' => 'Багеты, рамы для картин', 'icon' => 'bagety.png', 'breaf' => 'Багеты из пластика, дерева, металла (Италия, Франция)'],
        // #2 багеты
    40200 => ['key' => 40200, 'group_key' => 4, 'pop' => 45, 'label_eng' => 'fittings_shower', 'label' => 'furnitura-shower-cabin', 'name' => 'Фурнитура для душевых кабин и перегородок', 'icon' => 'fittings-shower-hinges-cover(2).png', 'breaf' => 'Фурнитуры для душевых кабин, дверей для душа, душевых перегородок из стекла, шторок для ванн'],
        // #30 фурнитура душевая
    // 40300 => ['key' => 40300, 'group_key' => 4, 'pop' => 0, 'label_eng' => '', 'label' => '', 'name' => 'Фурнитура для шкафа-купэ', 'icon' => '', 'breaf' => ''],
        // #24
    // 40400 => ['key' => 40400, 'group_key' => 4, 'pop' => 0, 'label_eng' => '', 'label' => '', 'name' => 'Фурнитура для распашных дверей', 'icon' => '', 'breaf' => ''],
        // #35 Фурнитура для дверей
    // 40500 => ['key' => 40500, 'group_key' => 4, 'pop' => 0, 'label_eng' => '', 'label' => '', 'name' => 'Фурнитура для раздвижных дверей', 'icon' => '', 'breaf' => ''],
        // #35 Фурнитура для дверей
    // 40600 => ['key' => 40600, 'group_key' => 4, 'pop' => 0, 'label_eng' => '', 'label' => '', 'name' => 'Фурнитура для перегородок', 'icon' => '', 'breaf' => ''],
        // #36

    // #Тип. product. #Группа 5 или 4 (меняется только group_key чтобы отражать в одной категории). Листовое стекло, виды (относим к 4 группе, включаем вариант 2 в группах, если вариант 1 в группах то меняем group_key на 5

    50100 => ['key' => 50100, 'group_key' => 4, 'pop' => 50, 'label_eng' => 'glass_decorative', 'label' => 'steklo-dekorativnoe', 'name' => 'Стекло декоративное', 'icon' => 'steklo_dekorativnoe.jpg', 'breaf' => 'Стекло декоративное DEKORGLASS, Россия. Резка в размер'],
        // #4 + #11 Стекло матовое
    // 50200 => ['key' => 50200, 'group_key' => 4, 'pop' => 0, 'label_eng' => 'glass_textured', 'label' => 'steklo-riflenoe', 'name' => 'Стекло рифленое', 'icon' => 'steklo_riflenoe.png', 'breaf' => 'Стекло декоративное цветное Glaverbel, Чехия. Резка в размер'],
        // #5
    50300 => ['key' => 50300, 'group_key' => 4, 'pop' => 0, 'label_eng' => 'glass_normal', 'label' => 'steklo-obychnoe-osvetlennoe', 'name' => 'Стекло обычное, осветленное', 'icon' => 'steklo-obychnoe-osvetlennoe(3).jpg', 'breaf' => 'Прозрачные стекла обычные и осветленные. Подбор по каталогам или образцам. Резка в размер'],
    // 50400 => ['key' => 50400, 'group_key' => 4, 'pop' => 0, 'label_eng' => '', 'label' => '', 'name' => 'Стекло цветное Lacobel', 'icon' => '', 'breaf' => ''],
        // #14
    50500 => ['key' => 50500, 'group_key' => 4, 'pop' => 60, 'label_eng' => 'glass_toned_panibel', 'label' => 'steklo-tonirovannoe-panibel', 'name' => 'Стекло цветное Panibel', 'icon' => 'steklo-tonirovannoe-panibel.png', 'breaf' => 'Стекло цветное тонированное Panibel, Россия. Подбор по каталогам или образцам. Резка в размер'],
        // #15
    50700 => ['key' => 50700, 'group_key' => 4, 'pop' => 0, 'label_eng' => 'glasspan', 'label' => 'steklo-tsvetnoe-glasspan', 'name' => 'Стекло цветное glasspan', 'icon' => 'steklo-tsvetnoe-glasspan.jpg', 'breaf' => 'Стекло цветное Glasspan с узорами и вкроплениямия, Россия. Подбор по каталогам или образцам. Резка в размер'],
    // 50800 => ['key' => 50800, 'group_key' => 4, 'pop' => 0, 'label_eng' => '', 'label' => '', 'name' => 'Стекло ламинированное (триплекс) (бренд)', 'icon' => '', 'breaf' => ''],
    // 50900 => ['key' => 50900, 'group_key' => 4, 'pop' => 0, 'label_eng' => '', 'label' => '', 'name' => 'Стекло армированное (бренд)', 'icon' => '', 'breaf' => ''],

    // #Тип. vitrazhi. #Группа 6. Витражи - как статьи

    60100 => ['key' => 60100, 'group_key' => 6, 'pop' => 0, 'label_eng' => 'stainedglass_regalet', 'label' => 'vitrazhi-regalet', 'name' => 'Витражи пленочные Regalet', 'icon' => 'vitrazhi.jpg', 'breaf' => 'Пленочный витраж Regaled, Tiffany. Декорирование стекла, орнаменты на стекле'],

];

