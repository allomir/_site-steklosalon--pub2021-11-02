<?php 
// советы и полезности-заметки к категориям, полезное о категориях, аналогично breaf в категориях
// 'category_key' => null - Общие советы
// !!! не менее 2х в категории

$tips = [
    // общие советы
    1 => ['key' => 1, 'category_key' => null, 'label' => 'About as', 'name' => 'Готовые стеклоизделия', 'desc' => 'Компания "Элта" реализует стекло, зеркала и стеклоизделия, а также фурнитуру и декор для стеклоизделий. У нас Вы найдете продукцию от известных российских и иностранных производителей, а также продукцию производства компании ООО ПКФ "ЭЛТА".'],
    2 => ['key' => 2, 'category_key' => null, 'label' => 'About as', 'name' => 'Наша специализация', 'desc' => 'Мы производственно коммерческая организация, специализируемся в изготовлении стеклоизделий, обработке стекла. Выполняем полный цикл изготовления изделий и конструкций из стекла: дизайн, проектирование, подбор комплектующих, расчет цены, производство, доставку и монтаж.'],
    
    // Советы для категорий
    10101 => ['key' => 10101, 'category_key' => 10100, 'label' => '', 'name' => 'Фотопечать на стекле', 'desc' => 'Стекло с фотореалистичными изображениями находит свое применение почти во всех стеклоизделиях и конструкциях.'],
    10102 => ['key' => 10102, 'category_key' => 10100, 'label' => '', 'name' => 'Фотопечать на стекле', 'desc' => 'Стекло с фотореалистичными изображениями находит свое применение почти во всех стеклоизделиях и конструкциях.'],
    10103 => ['key' => 10103, 'category_key' => 10100, 'label' => '', 'name' => 'Фотопечать на стекле', 'desc' => 'Стекло с фотореалистичными изображениями находит свое применение почти во всех стеклоизделиях и конструкциях.'],

    10201 => ['key' => 10201, 'category_key' => 10200, 'label' => '', 'name' => 'Резка стекла на станке', 'desc' => 'Резка стекла выполняется по эскизам или проектам клиента. Вы можете заказать выезд специалистов для замера стекла или зеркала и составить проект на месте.'],
    10202 => ['key' => 10202, 'category_key' => 10200, 'label' => '', 'name' => 'Резка стекла на станке', 'desc' => 'Резка стекла выполняется по эскизам или проектам клиента. Вы можете заказать выезд специалистов для замера стекла или зеркала и составить проект на месте.'],

    10301 => ['key' => 10301, 'category_key' => 10300, 'label' => '', 'name' => 'Сверление стекла', 'desc' => 'В производственных условиях для сверления отверстий и вырезов в стекле применяют сверлильный станок с двусторонним сверлением.'],
    10302 => ['key' => 10302, 'category_key' => 10300, 'label' => '', 'name' => 'Сверление стекла', 'desc' => 'В производственных условиях для сверления отверстий и вырезов в стекле применяют сверлильный станок с двусторонним сверлением.'],

    10401 => ['key' => 10401, 'category_key' => 10400, 'label' => '', 'name' => 'Матирование стекла, зеркала', 'desc' => 'Художественное матирование – создание на поверхности стекла сложного графического рисунка с помощью комбинации матовых и гладких участков.'],
    10402 => ['key' => 10402, 'category_key' => 10400, 'label' => '', 'name' => 'Матирование стекла, зеркала', 'desc' => 'Художественное матирование – создание на поверхности стекла сложного графического рисунка с помощью комбинации матовых и гладких участков.'],

    10501 => ['key' => 10501, 'category_key' => 10500, 'label' => '', 'name' => 'Создание кромки, фацета стекла', 'desc' => 'Кромка, фацет  стекла придают изделию законченный внешний вид, добавляет выразительности и делает края изделия безопасными.'],
    10502 => ['key' => 10502, 'category_key' => 10500, 'label' => '', 'name' => 'Создание кромки, фацета стекла', 'desc' => 'Кромка, фацет  стекла придают изделию законченный внешний вид, добавляет выразительности и делает края изделия безопасными.'],

    10601 => ['key' => 10601, 'category_key' => 10600, 'label' => '', 'name' => 'Ультрафиолетовое склеивание стекла', 'desc' => 'Ультрафиолетовое склеивание стекла (УФ-склейка) - соединение стекла со стеклом или стекла с металлом с помощью прозрачного клеющего материала, твердеющего от ультрафиолета.'],
    10602 => ['key' => 10602, 'category_key' => 10600, 'label' => '', 'name' => 'Ультрафиолетовое склеивание стекла', 'desc' => 'Ультрафиолетовое склеивание стекла (УФ-склейка) - соединение стекла со стеклом или стекла с металлом с помощью прозрачного клеющего материала, твердеющего от ультрафиолета.'],
    
    10701 => ['key' => 10701, 'category_key' => 10700, 'label' => '', 'name' => 'Подготовка к закалке', 'desc' => 'Перед закалкой стеклянных деталей выполняются все механические операции по их обработке, к которым относятся резка стекла, сверление отверстий, обработка кромки и матирование стекла.'],
    10702 => ['key' => 10702, 'category_key' => 10700, 'label' => '', 'name' => 'Подготовка к закалке', 'desc' => 'Перед закалкой стеклянных деталей выполняются все механические операции по их обработке, к которым относятся резка стекла, сверление отверстий, обработка кромки и матирование стекла.'],
    
    10801 => ['key' => 10801, 'category_key' => 10800, 'label' => '', 'name' => 'Тонированное стекло от производителей', 'desc' => 'Тонированные и окрашенные стекла по характеристикам аналогичны обычному стеклу, могут подвергаться сверлению, закалке, полированию, ламинированию.'],
    10802 => ['key' => 10802, 'category_key' => 10800, 'label' => '', 'name' => 'Тонированное стекло от производителей', 'desc' => 'Для поверхностной окраски стекла может быть использовано прозрачные, тонированные, рифленые стекла. Тонированное стекло изготавливается с помощью добавления пигмента при производстве стекла.'],

    11001 => ['key' => 11001, 'category_key' => 11000, 'label' => '', 'name' => 'Ламинирование стекол в стекольной мастерской', 'desc' => 'Ламинированное стекло - наиболее универсальное и прочное стекло, может подвергатся механической обрабатке. Клеящий слой из пленки может выступать в качестве тонирующей основы.'],

    20101 => ['key' => 20101, 'category_key' => 20100, 'label' => '', 'name' => 'Фартуки из стекла недорого', 'desc' => 'Стоимость производства и монтажа фартуков из стекла не так высока, как может показаться, она сравнима со стоимостью плитки с рисунком'],

    20201 => ['key' => 20201, 'category_key' => 20200, 'label' => '', 'name' => 'Стеновые панно из стекла', 'desc' => 'Стоимость производства и монтажа панно из стекла с фотографией или рисунком не так высока, как может показаться, она сравнима со стоимостью плитки с рисунком'],

    20301 => ['key' => 20301, 'category_key' => 20300, 'label' => '', 'name' => 'Стеновые панно из зеркала', 'desc' => 'Стоимость производства и монтажа панно из зеркала не так высока, как может показаться, она сравнима со стоимостью плитки'],

    20401 => ['key' => 20401, 'category_key' => 20400, 'label' => '', 'name' => 'Перегордки из стекла ТЦ', 'desc' => 'Проектирование, изготовление, дизайн, монтаж под ключ цельнотянутых перегородок из стекла для торговых центров, магазинов и офисов'],

    20501 => ['key' => 20501, 'category_key' => 20500, 'label' => '', 'name' => 'Перегордки из стекла Дом - стоимость', 'desc' => 'Стоимость производства и монтажа перегородок из стекла с декором не так высока, как может показаться, она сравнима со стоимостью перегородки из пеноблоков с отделкой'],
    20502 => ['key' => 20502, 'category_key' => 20500, 'label' => '', 'name' => 'Перегордки из стекла Дом - без грязи', 'desc' => 'Преимущество стеклянных перегородок в отсутствии процессов, образующих грязь. Сборка и монтаж перегородок составляет несколько часов.'],

    20701 => ['key' => 20701, 'category_key' => 20700, 'label' => '', 'name' => 'Лестница из стекла', 'desc' => 'Потолочные панно из стекла - альтернатива светильникам и люстрам.'],
    
    20801 => ['key' => 20801, 'category_key' => 20800, 'label' => '', 'name' => 'Потолочное панно из стекла', 'desc' => 'Изготовление ступеней из стекла, ограждений для лестниц, общая сборка лестниц из стекла - это эксклюзивная работа, требующая высокой квалификации.'],

    20901 => ['key' => 20901, 'category_key' => 20900, 'label' => '', 'name' => 'Пол из стекла', 'desc' => 'Стекло для пола состоит из отдельных слоев: верхнего для защиты и нижнего для несения нагрузки. Верхнее стекло может быть съемным.'],

    21001 => ['key' => 21001, 'category_key' => 21000, 'label' => '', 'name' => 'Ограждения из стекла помещений и лестниц', 'desc' => 'Преимущества ограждений из стекла: современный дизайн, не затеняют помещения и лестницы, позволяют расширить пространство.'],

    30401 => ['key' => 30401, 'category_key' => 30400, 'label' => '', 'name' => 'Столы и столешницы из стекла', 'desc' => 'Из стекла изготавливают рабочие поверхности для столов кухонных, журнальных, письменных, офисных, а также столешницы для кухни.'],

    30501 => ['key' => 30501, 'category_key' => 30500, 'label' => '', 'name' => 'Полки из стекла', 'desc' => 'Полки из стекла устанавливаются на любых поверхностях, могут быть подвесными или крепиться к вертикальным штангам. Для полок из стекла может быть ваполнено любое декорирование и использоваться скрытая светодиодная подсветка в торец.'],

    30601 => ['key' => 30601, 'category_key' => 30600, 'label' => '', 'name' => 'Витрины, шкафы из стекла', 'desc' => 'Витрин, шкафы, стеллажи, стойки из стекла для товаров и предметов увеличивают привлекательность товаров и предметов, позволяют навести порядок в помещении, упорядочить товары, диски, книги, и не затеняет интерьер.'],

    30701 => ['key' => 30701, 'category_key' => 30700, 'label' => '', 'name' => 'Фасады (дверки) мебельные', 'desc' => 'Фасады (дрерки) мебельные позволяют подчеркнуть ваш стиль с помощью декорирования: фотопечать по стеклу для фотографии на стекле, матирование или покраска для монотонного изображения, создание витражей.'],

    30801 => ['key' => 30801, 'category_key' => 30800, 'label' => '', 'name' => 'Дверки шкаф-купе', 'desc' => 'Дверки шкаф-купе позволяют подчеркнуть ваш стиль с помощью декорирования: фотопечать по стеклу для фотографии на стекле, матирование или покраска для монотонного изображения, создание витражей.'],
    
    30901 => ['key' => 30901, 'category_key' => 30900, 'label' => '', 'name' => 'Зеркала навесные с декором, с багетом', 'desc' => 'Для изготовления зеркала по проекту выполняем резку листового зеркала в размер, обработку кромки, декорирование (дизайн) зеркала, обрамление в багет. Багеты для зеркала на выбот по каталогам. Готовые зеркала подбираются по каталогам.'],

    31201 => ['key' => 31201, 'category_key' => 31200, 'label' => '', 'name' => 'Душевые кабины и перегородки', 'desc' => 'Изготовление по проекту и монтаж душевых кабин, дверей для душа, душевых перегородок из стекла под размер помещения. Фурнитура и каркас на выбор. Готовые душевые кабины по каталогам производителей'],

    31501 => ['key' => 31501, 'category_key' => 31500, 'label' => '', 'name' => 'Двери из стекла распашные', 'desc' => 'Изготовление дверей распашных из стекла, межкомнатных, входных. Фурнитура и каркас на выбор'],

    31601 => ['key' => 31601, 'category_key' => 31600, 'label' => '', 'name' => 'Двери из стекла раздвижные', 'desc' => 'Изготовление дверей раздвижных из стекла, межкомнатных, входных. Фурнитура и каркас на выбор'],

    50301 => ['key' => 50301, 'category_key' => 50300, 'label' => '', 'name' => 'Стекло обычное, осветленное', 'desc' => 'У простого стекла имеется кромка с зеленым оттенком. Осветленное стекло Optiweit при больших размерах изделия имеет голубую кромку. Осветленное стекло Cristal Vigion при больших размерах изделия имеет сероватую кромку'],

    50501 => ['key' => 50501, 'category_key' => 50500, 'label' => '', 'name' => 'Тонированное стекло panibel', 'desc' => 'Тонированные и окрашенные стекла по характеристикам аналогичны обычному стеклу, могут подвергаться сверлению, закалке, полированию, ламинированию'],
    
    50701 => ['key' => 50701, 'category_key' => 50700, 'label' => '', 'name' => 'Цветное стекло glasspan', 'desc' => 'Стекла Glasspan обладают уникальными узорами и вкроплениями. Являются ламинированными и обладают повышенной прочностью.'],

    60101 => ['key' => 60101, 'category_key' => 60100, 'label' => '', 'name' => 'Витражи пленочные в нише', 'desc' => 'Стоимость производства и монтажа витражей из пленки не так высока, как может показаться, она сравнима со стоимостью отделки с помощью качественных обоев'],
];

