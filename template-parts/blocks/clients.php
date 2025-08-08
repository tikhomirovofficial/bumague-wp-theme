<?php
/**
 * Секция клиенты (переиспользуемая)
 */
?>


<div class="clients">
    <h2 class="clients__title title--alt">
        Наши клиенты
    </h2>

    <?php
    $client_logos = get_field('clients', 'option'); // Получаем галерею из option-поля
    if ($client_logos): ?>
        <ul class="clients__list">
            <?php foreach ($client_logos as $logo): ?>
                <li class="clients__item">
                    <img class="clients__img" src="<?php echo esc_url($logo); ?>" alt="Логотип клиента" loading="lazy">
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <!-- Fallback если галерея не заполнена -->
        <ul class="clients__list">
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <li class="clients__item">
                    <img class="clients__img"
                        src="<?php echo esc_url(get_template_directory_uri() . "/images/clients/{$i}.png"); ?>" alt=""
                        loading="lazy">
                </li>
            <?php endfor; ?>
        </ul>
    <?php endif; ?>
</div>