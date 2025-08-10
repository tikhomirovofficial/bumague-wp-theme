<?php
/**
 * Окно формы заявки (переиспользуемая)
 * 
 */

?>
<dialog class="window" id="quick-request-window">
    <div class="window__inner">
        <header class="window__header">
            <h2 class="window__title c-main">Быстрый заказ полиграфии</h2>
            <button class="window__close-btn">
                <img height="17" width="17" src="<?php echo get_template_directory_uri(); ?>/images/icons/close.svg"
                    alt="">
            </button>
        </header>
        <form class="window__form">
            <div class="window__form-fields">
                <label for="quick-request-name" class="window__form-field field">
                    <input required id="quick-request-name" name="name" placeholder="Имя" type="text"
                        class="field__input">
                </label>
                <label for="quick-request-phone" class="window__form-field field">
                    <input required name="phone" inputmode="tel" id="quick-request-phone" placeholder="Телефон"
                        type="text" class="field__input phone-mask">
                </label>
                <div class="window__form-field field field--select field--filled">
                    <div class="field__select-wrapper">
                        <input required type="text" class="field__select-input" placeholder="Способ связи" readonly>
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
                    <select id="quick-request-communication" name="communication" class="field__select-real" required>
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
            </div>
            <button type="submit" class="button window__form-button">
                <span>Отправить заявку</span>
            </button>
        </form>
    </div>
</dialog>
<dialog onclose="window.location.reload()" class="window" id="quick-request-success-window">
    <form onsubmit="window.reload()" method="dialog" class="window__inner">
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
                    наш менеджер свяжется с вами выбранным вами способом
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