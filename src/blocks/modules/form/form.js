import {magnificPopupTrigger} from './components/magnificPopupTrigger.js'

const phoneReplace = string => string.replace(/[^\d\+]/g, '');
const regex = '\\+7 \\([0-6,9]{1}[0-9]{2}\\) [0-9]{3}-[0-9]{2}-[0-9]{2}';
const $form = $(".js-form");

$form.find("input").on("keyup", function () {

    const that = $(this);
    const checked = that.siblings().find('input[type="checkbox"]').is(":checked");

    if (phoneReplace(that.val()).length === 12 && checked) {
        that.next().removeAttr("disabled")
    } else {
        that.next().attr("disabled", true)
    }
});

$form.find('input[type="checkbox"]').on("change", function () {
    const that = $(this);
    const phoneVal = that.parents().find('.js-form input[type="tel"]').val();
    const button = that.parents().find('.js-form button[type="submit"]');

    if (phoneReplace(phoneVal).length === 12 && that.is(":checked")) {
        button.removeAttr("disabled")
    } else {
        button.attr("disabled", true)
    }
});

$('input[type="tel"]').inputmask({regex});

$(".js-select").select2({
    width: '100%'
});

function getReplacePhone() {
    setTimeout(function () {
        let phoneManager = $('.header__contacts').find('a').attr('href').replace(/tel\:/gi, '');
        $('input[name="phone_manager"]').val(phoneManager);
    }, 5000);
}

function initForm() {
    $('body').on('submit', '.js-ajax-form', function (e) {
        var t = $(this);
        if (!isFormValidate(t)) {
            e.preventDefault();
            e.stopPropagation();
            $('.has-error', t).first().focus();
        } else if (t.hasClass('js-ajax-form')) {
            e.preventDefault();

            t.closest('.js-ajax-form');
            t.addClass('load');

            sendFormAjax(t, function (data) {
                formSendResult(t, data);
                t.removeClass('load');
            });
        }
    });

    /**
     * Отправляем форму ajax
     * @param {object} form jQuery объект формы
     * @param {function} callback функция обратного вызова
     */
    function sendFormAjax(form, callback) {
        sendAjax("./form", form.serialize(), callback);
    }

    /**
     * Валидация всей формы
     * @param {object} form jQuery объект формы
     * @param {string} error_class класс ошибки
     * @returns {Boolean}
     */
    function isFormValidate(form, error_class) {
        var result = true,
            rq = $('.required', form).length,
            check = [
                'input[type="text"]',
                'input[type="login"]',
                'input[type="password"]',
                'input[type="number"]',
                'input[type="checkbox"]',
                'input[type="tel"]',
                'input[type="email"]',
                'input[type="textarea"]',
                'input[type="select"]',
                'textarea',
                'select',
            ],
            parent;
        error_class = error_class || 'has-error';

        $('.required, input, textarea, select').removeClass(error_class);

        if (rq == 0) {
            return result;
        }

        for (var i = 0; i < rq; i++) {
            parent = $('.required', form).eq(i);
            $(check.join(','), parent).each(function () {
                if (!isFieldValidate($(this), error_class)) {
                    $(this).addClass(error_class);
                    return (result = false);
                }
            });
        }

        return result;
    }

    /**
     * Проверка валидации поля
     * @param {object} field jQuery объект поля формы
     * @param {string} error_class класс ошибки
     * @returns {Boolean}
     */
    function isFieldValidate(field, error_class) {
        let result = true;
        let val = '';

        if (field && field.attr('name')) {
            if (!field.val()) {
                field.val('');
                return false;
            }

            val = (field.val() + '').trim();

            if (field.attr('name') === 'email' && !isValidEmail(val)) {
                result = false;
            } else if (field.attr('type') === 'tel' && !isValidPhone(val)) {
                result = false;
            } else if (field.attr('type') === 'checkbox' && !field.is(':checked')) {
                result = false;
            } else if (val === null || val === '') {
                field.val('');
                result = false;
            }
        }

        return result;
    }

    /**
     * Валидация E-mail адреса
     * @param {string} emailAddress - e-mail для проверки
     * @returns {Boolean}
     */
    function isValidEmail(emailAddress) {
        var pattern = new RegExp(
            /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
        );
        return pattern.test(emailAddress);
    }

    /**
     * Валидация phone адреса
     * @param {string} phine - e-mail для проверки
     * @returns {Boolean}
     */
    function isValidPhone(phone) {
        let pattern = new RegExp(/\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}/i);
        return pattern.test(phone);
    }

    /**
     * Отправляем ajax запрос
     * @param {string} url ссылка
     * @param {object} data данные
     * @param {function} callback функция обратного вызова
     */
    function sendAjax(url, data, callback) {
        callback = callback || function () {
        };

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            data: data,
            success: function (data) {
                callback(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                callback(jqXHR, textStatus, errorThrown, 'error');
            },
        });
    }

    /**
     * Обработка отправки формы
     * @param {object} form jQuery объект формы
     * @param {object} data данные полученные от сервера
     */
    function formSendResult(form, data) {
        if (data.status) {
            magnificPopupTrigger();
            form.trigger("reset");
        } else {
            console.log(data);
        }
    }

    getReplacePhone();
}

initForm();
