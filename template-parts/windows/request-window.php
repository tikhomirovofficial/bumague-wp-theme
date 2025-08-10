<?php
/**
 * Окно формы заявки (переиспользуемая)
 * 
 */

?>
<dialog class="window" id="request-window">
    <div class="window__inner">
        <header class="window__header">
            <h2 class="window__title">Заявка на полиграфию</h2>
            <button class="window__close-btn">
                <img height="17" width="17" src="<?php echo get_template_directory_uri(); ?>/images/icons/close.svg"
                    alt="">
            </button>
        </header>
        <form class="window__form">
            <div class="window__form-fields">
                <label for="request-name" class="window__form-field field">
                    <input  required id="request-name" name="name" placeholder="Имя" type="text" class="field__input">
                </label>
                <div class="window__form-field field field--select">
                    <div class="field__select-wrapper">
                        <input type="text" class="field__select-input" placeholder="Услуга" readonly>
                        <div class="field__select-indicator">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 6.43396L19 19M19 19L6.43396 19M19 19L1 1" stroke="currentColor"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="field__select-dropdown">
                        <?php
                        if (have_rows('c_services_list', 'option')):
                            while (have_rows('c_services_list', 'option')):
                                the_row();
                                $service = get_sub_field('c_service_item');
                                if ($service):
                                    $service_title = get_the_title($service);
                                    ?>
                                    <div class="field__select-option" data-value="<?php echo esc_attr($service_title); ?>">
                                        <?php echo esc_html($service_title); ?>
                                    </div>
                                    <?php
                                endif;
                            endwhile;
                        else:
                            // Fallback options if no services are set
                            ?>
                            <div class="field__select-option" data-value="Визитки">Визитки</div>
                            <div class="field__select-option" data-value="Листовки">Листовки</div>
                            <div class="field__select-option" data-value="Открытки">Открытки</div>
                            <div class="field__select-option" data-value="Наклейки">Наклейки</div>
                            <div class="field__select-option" data-value="Меню">Меню</div>
                            <div class="field__select-option" data-value="Буклеты">Буклеты / евробуклеты / лифлет / гармошки
                            </div>
                            <div class="field__select-option" data-value="Каталоги">Каталоги / Брошюры</div>
                        <?php endif; ?>
                    </div>
                    <select id="request-service" name="service" class="field__select-real" required>
                        <option value="">Выберите вариант</option>
                        <?php
                        if (have_rows('c_services_list', 'option')):
                            while (have_rows('c_services_list', 'option')):
                                the_row();
                                $service = get_sub_field('c_service_item');
                                if ($service):
                                    $service_title = get_the_title($service);
                                    ?>
                                    <option value="<?php echo esc_attr($service_title); ?>">
                                        <?php echo esc_html($service_title); ?>
                                    </option>
                                    <?php
                                endif;
                            endwhile;
                        else:
                            // Fallback options if no services are set
                            ?>
                            <option value="Визитки">Визитки</option>
                            <option value="Листовки">Листовки</option>
                            <option value="Открытки">Открытки</option>
                            <option value="Наклейки">Наклейки</option>
                            <option value="Меню">Меню</option>
                            <option value="Буклеты">Буклеты / евробуклеты / лифлет / гармошки</option>
                            <option value="Каталоги">Каталоги / Брошюры</option>
                        <?php endif; ?>
                    </select>
                </div>
                <label for="request-comment" class="window__form-field field">
                    <input id="request-comment" name="comment" placeholder="Комментарий" type="text"
                        class="field__input">
                </label>
                <fieldset class="window__form-group">
                    <label for="request-phone" class="window__form-field field">
                        <input required name="phone" inputmode="tel" id="request-phone" placeholder="Телефон"
                            type="text" class="field__input phone-mask">
                    </label>
                    <div class="window__form-field field field--select field--filled">
                        <div class="field__select-wrapper">
                            <input type="text" class="field__select-input" placeholder="Способ связи" readonly>
                            <div class="field__select-indicator">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 6.43396L19 19M19 19L6.43396 19M19 19L1 1" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                            </div>
                        </div>
                        <div class="field__select-dropdown">
                            <?php
                            if (have_rows('request_ways', 'option')):
                                $index = 1;
                                while (have_rows('request_ways', 'option')):
                                    the_row();
                                    $way = get_sub_field('request_ways_item');
                                    if ($way):
                                        ?>
                                        <div class="field__select-option" data-value="<?php echo $index; ?>">
                                            <?php echo esc_html($way); ?>
                                        </div>
                                        <?php
                                        $index++;
                                    endif;
                                endwhile;
                            else:
                                // Fallback options if no communication ways are set
                                ?>
                                <div class="field__select-option" data-value="1">Звонок на телефон</div>
                                <div class="field__select-option" data-value="2">Сообщение в Whatsapp</div>
                                <div class="field__select-option" data-value="3">Сообщение в Telegram</div>
                            <?php endif; ?>
                        </div>
                        <select required id="request-communication" name="communication" class="field__select-real"
                            required>
                            <option value="">Выберите способ связи</option>
                            <?php
                            if (have_rows('request_ways', 'option')):
                                $index = 1;
                                while (have_rows('request_ways', 'option')):
                                    the_row();
                                    $way = get_sub_field('request_ways_item');
                                    if ($way):
                                        ?>
                                        <option value="<?php echo $index; ?>">
                                            <?php echo esc_html($way); ?>
                                        </option>
                                        <?php
                                        $index++;
                                    endif;
                                endwhile;
                            else:
                                // Fallback options if no communication ways are set
                                ?>
                                <option value="1">Звонок на телефон</option>
                                <option value="2">Сообщение в Whatsapp</option>
                                <option value="3">Сообщение в Telegram</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </fieldset>

                <div class="field field--upload">
                    <input type="file" id="request-files" class="field__upload-input visually-hidden" multiple
                        accept=".jpg,.jpeg,.png,.pdf">
                    <label for="request-files" class="field__upload-preview">
                        <img loading="lazy" height="40" width="40"
                            src="<?php echo get_template_directory_uri(); ?>/images/icons/upload.svg" alt="">
                        <div class="field__upload-preview-text">
                            <span class="field__upload-preview-caption">
                                <span class="c-main">
                                    Нажми для загрузки
                                </span>
                                или перенеси
                            </span>
                            <span class="field__upload-preview-requirement">JPG, JPEG, PNG, PDF вес до 10Мб
                                (максимум 5 файлов)</span>
                        </div>
                    </label>
                    <div class="field__upload-files">
                        <ul class="field__upload-list">

                        </ul>
                        <button class="field__upload-files-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/plus.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
            <button type="submit" class="button window__form-button">
                <span>
                    Отправить заявку
                </span>

            </button>
        </form>
    </div>
</dialog>
<dialog onclose="window.location.reload()" class="window" id="request-success-window">
    <form method="dialog" class="window__inner">
        <header class="window__header">
            <h2 class="window__title"></h2>
            <button class="window__close-btn">
                <img height="17" width="17" src="<?php echo get_template_directory_uri(); ?>/images/icons/close.svg"
                    alt="">
            </button>
        </header>
        <div class="window__content">
            <h2 class="window__title">Спасибо за вашу заявку</h2>
            <div class="window__description">
                <p>
                    Наш менеджер вернётся к вам с уточнениями для просчёта заказа
                </p>
            </div>
        </div>
        <button class="button window__form-button">
            <span>
                Хорошо
            </span>
        </button>
    </form>
</dialog>