<?php
/**
 * Секция "Печать для ресторанов" (переиспользуемая)
 * 
 */
?>

<div class="print">
    <?php
    // Получаем данные из option-полей
    $print_img = get_field('c_print_img', 'option');
    $print_title = get_field('c_print_title', 'option');
    $print_description = get_field('c_print_description', 'option');

    // Вывод изображений (с проверкой и фолбэком)
    $image_url = $print_img ? $print_img : esc_url(get_template_directory_uri() . '/images/print/1.png');
    $image_alt = $print_title ? esc_attr($print_title) : '';
    ?>

    <img loading="lazy" class="print__bg" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
    <img loading="lazy" class="print__bg" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">

    <!-- Заголовок с фолбэком -->
    <h2 class="print__title title--alt">
        <?php echo $print_title ? esc_html($print_title) :
            'ПЕЧАТЬ ДЛЯ РЕСТОРАНОВ: ВСЁ ДЛЯ ВАШЕГО ГОСТЕПРИИМСТВА';
        ?>
    </h2>

    <!-- Описание с фолбэком -->
    <div class="print__description">
        <p>
            <?php echo $print_description ? esc_html($print_description) :
                'Меню, карты напитков, промо-материалы
                и не только — создадим атмосферу
                гостеприимства.';
            ?>
        </p>
    </div>
</div>