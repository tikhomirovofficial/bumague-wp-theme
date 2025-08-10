jQuery(document).ready(function($) {
    // Обработчик для всех форм
    $('form.window__form, form#calculatorForm').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var formData = new FormData(form[0]);
        var formType = form.closest('dialog').attr('id').replace('-window', '') || 'calculator';
        console.log(formType);
        
        // Для калькулятора
        if (form.attr('id') === 'calculatorForm') {
            formType = 'calculator';
        }
        
        // Добавляем дополнительные данные
        formData.append('action', 'submit_custom_form');
        formData.append('form_type', formType);
        formData.append('nonce', '<?php echo wp_create_nonce("custom_form_nonce"); ?>');
        
        $.ajax({
            type: 'POST',   
            url: '<?php echo admin_url("admin-ajax.php"); ?>',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                form.find('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    // Закрываем текущее модальное окно
                    form.closest('dialog').close();
                    
                    // Показываем соответствующее окно успеха
                    var successModalId = '#' + formType + '-success-window';
                    if (formType === 'calculator') {
                        successModalId = '#request-success-window';
                    }
                    
                    $(successModalId).showModal();
                } else {
                    alert(response.data);
                }
                form.find('button[type="submit"]').prop('disabled', false);
            },
            error: function(xhr) {
                alert('Произошла ошибка при отправке формы: ' + xhr.statusText);
                form.find('button[type="submit"]').prop('disabled', false);
            }
        });
    });
    
    // Закрытие модальных окон
    $('.window__close-btn, .window__form-button').on('click', function() {
        $(this).closest('dialog').close();
    });
});