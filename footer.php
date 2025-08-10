<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bumague
 */

?>


<?php get_template_part('template-parts/sections/footer'); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/sliders.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/mobile-menu.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/select-field.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/upload-field.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/windows.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/phone-mask.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/forms-validation.js"></script>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/form-senders.js"></script> -->

<script>
    jQuery(document).ready(function ($) {
        // Обработчик для всех форм
        $('form.window__form, form#calculatorForm').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();
            console.log(formData);

            var formType = '';

            // Определяем тип формы
            if (form.attr('id') === 'calculatorForm') {
                formType = 'calculator';

            } else {
                // Пробуем получить тип из ближайшего dialog

                console.log(formType);


                var dialog = form.closest('dialog');
                if (dialog.length) {
                    formType = dialog.attr('id').replace('-window', '');
                } else {
                    // Если нет dialog, используем id формы или другой атрибут
                    formType = form.attr('id').replace('-form', '').replace('form-', '');
                }
            }

            console.log('Form type detected:', formType);

            // Добавляем nonce и тип формы
            formData += '&nonce=' + '<?php echo wp_create_nonce("custom_form_nonce"); ?>';
            formData += '&form_type=' + formType;

            console.log('Submitting form:', formType, formData);

            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                data: {
                    action: 'submit_custom_form',
                    form_data: formData,
                    form_type: formType,
                    nonce: '<?php echo wp_create_nonce("custom_form_nonce"); ?>'
                },
                beforeSend: function () {
                    form.find('button[type="submit"]').prop('disabled', true);
                },
                success: function (response) {
                    console.log('Form submission response:', response);
                    if (response.success) {
                        // Закрываем модальное окно, если оно есть
                        if (form.attr('id') != 'calculatorForm') {
                            form.closest('dialog')?.close?.();
                        }

                        if (form.reset) {
                            form.reset()
                        }

                        // Показываем соответствующее окно успеха
                        var successModalId = '#' + formType + '-success-window';
                        if (formType === 'calculator') {
                            successModalId = '#request-success-window';
                        };
                        console.log(document.querySelector(successModalId));

                        // Проверяем существует ли модальное окно
                        document.querySelector(successModalId).showModal();
                    } else {
                        alert(response.data);
                    }
                    form.find('button[type="submit"]').prop('disabled', false);
                },
                error: function (xhr, status, error) {
                    console.error('Form submission error:', status, error);
                    alert('Произошла ошибка при отправке формы: ' + error);
                    form.find('button[type="submit"]').prop('disabled', false);
                }
            });
        });
    });
</script>
</body>

<?php wp_footer(); ?>