<?php

namespace frontend\models;

class CompanyInfo
{
    public function getInfo() : array
    {
        $tel = '8 (831) 278-18-05';
        $tel2 = '8 (909) 297-61-17';
        $tels = [
            'Офис' => $tel,
            'Офис(2)' => '8 (831) 278-18-04',
            'Татьяна' => $tel2,
            'Елена' => '8 (960) 161-18-87', 
            'Юлия' => '8 (962) 513-94-62',
            'Денис' => '8 (910) 103-54-40',
        ];

        $email = 'steklosalon@yandex.ru';
        $working_time = '09:00 — 18:00';
        $working_days = 'Пн - Сб :';
        $logo = 'images/site/logo-default-296x116.png';
        $logo_lt = 'images/site/logo-light.png';
        $address = 'Н.Новгород, ул. Казанское шоссе, 14 корп. 1';
        $name = 'компания ЭЛТА';
        $contacts ='ООО Производственно-коммерческая фирма «ЭЛТА» | Эл. почта: steklosalon@yandex.ru | Адрес: Н. Новгород, ул. Казанское шоссе, 14 корп. 1. | Тел.: (831)278-18-05; 8(909)297-61-17'; 
        // реквизиты
        $details = '';
        $desc ='Мы производственно-коммерческая организация, специализируемся в изготовлении стеклоизделий, обработке стекла. Выполняем полный цикл изготовления изделий и конструкций из стекла: дизайн, проектирование, подбор комплектующих, расчет цены, производство, доставку и монтаж.';

        return [
            'tel' => $tel,
            'tel2' => $tel2,
            'tels' => $tels,
            'email' => $email,
            'working_time' => $working_time,
            'working_days' => $working_days,
            'logo' => $logo,
            'logo_lt' => $logo_lt,
            'address' => $address,
            'name' => $name,
            'contacts' => $contacts,
            'details' => $details,
            'desc' => $desc,
        ];
    }
}