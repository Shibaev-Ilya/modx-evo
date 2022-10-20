$(()=> {

    $(".js-form-select").select2({
        language: { noResults: ()=>  "Ничего не найдено"}
    });

    let models = [];
    const stockListElement = document.querySelector('.js-stock-list');

    if (stockListElement) {
        const ITEM_PER_PAGE = 3;

        $.ajaxSetup({async: false});
        $.getJSON('/_import/new.json', function (element) {
            $.each(element, function (key, value) {
                let model_push = [];
                $.each(value, function (key, value) {
                    if (key == 'color') model_push['color'] = value;
                    if (key == 'complectation') model_push['complectation'] = value;
                    if (key == 'model') model_push['model'] = value;
                    if (key == 'engine') model_push['engine'] = value;
                });
                models.push(model_push);
            });
        });
        $.ajaxSetup({async: true});

        // сток -------------------------------------------------------------------------------

        const createElement = (template) => {
            const newElement = document.createElement('div');
            newElement.innerHTML = template;

            return newElement.firstElementChild;
        };

        const getStockItemTemplate = (model) => {
            return (`
<li class="stock__list-item"
    data-category-model="${model['model']}"
    data-category-color="${model['color']}"
    data-category-engine="engine"
    data-category-complectation="${model['complectation']}" >
      <span class="stock__list-text">
        <span class="stock__list-key">Модель:</span>
        <span class="stock__list-model">${model['model']}</span>
      </span>
    <span class="stock__list-text">
        <span class="stock__list-key">Комплектация:</span>
        <span>${model['complectation']}</span>
      </span>
    <span class="stock__list-text">
        <span class="stock__list-key">Двигатель:</span>
        <span>${model['engine']}</span>
      </span>
    <span class="stock__list-text">
        <span class="stock__list-key">Цвет:</span>
        <span>${model['color']}</span>
      </span>
    <button class="btn btn_dark js-popup-link" data-mfp-src="#modal-call">
        <span>Получить предложение</span>
    </button>
</li>
`)
        };

        const getShowMoreButtonTemplate = () => {
            return (`
        <button class="btn btn_light btn_show-more js-show-more" style="padding: 21px 40px; margin: 20px auto">
            <span>Показать ещё</span>
        </button>
        `)
        };

        const stockInit = (models) => {

            let stock = models.slice(0, ITEM_PER_PAGE);
            let showedCounter = ITEM_PER_PAGE;
            const showMoreButton = createElement(getShowMoreButtonTemplate());

            for (let model of stock) {
                const stockItem = createElement(getStockItemTemplate(model));

                $(stockItem).find('.js-popup-link').magnificPopup({
                    type: 'inline',
                    midClick: true
                });

                stockListElement.insertAdjacentElement('beforeend', stockItem);
            }

            const onShowMoreButtonClick = () => {
                models.slice(showedCounter, showedCounter + ITEM_PER_PAGE).forEach(item => {
                    const stockItem = createElement(getStockItemTemplate(item));
                    $(stockItem).find('.js-popup-link').magnificPopup({
                        type: 'inline',
                        midClick: true
                    });

                    stockListElement.insertAdjacentElement('beforeend', stockItem);
                });

                showedCounter += ITEM_PER_PAGE;

                if (showedCounter >= models.length) {
                    showMoreButton.remove();
                }

            };

            showMoreButton.addEventListener('click', onShowMoreButtonClick);

            if (models.length > showedCounter) {
                stockListElement.insertAdjacentElement('afterend', showMoreButton);
            }

            if (models.length === 0) {
                $('.model__not-available').html('Автомобилей нет в наличии');
            } else $('.model__not-available').html('');
        };

        const clearStockList = () => {
            $('.stock__list-item').remove();
            $('.js-show-more').remove();
        };

        // фильтры ------------------------------------------------------------------------

        function filterInit() {

            //получаем значения селекторов
            var model = $('.js-form-select[name=model]').val();
            var complectation = $('.js-form-select[name=complectation]').val();
            var engine = $('.js-form-select[name=engine]').val();
            var color = $('.js-form-select[name=color]').val();

            var search_keys = {};
            if (model !== 'Все модели') search_keys['model'] = model;
            if (complectation !== 'Комплектация') search_keys['complectation'] = complectation;
            if (engine !== 'Двигатель') search_keys['engine'] = engine;
            if (color !== 'Цвет') search_keys['color'] = color;

            let modelsOnly = [];
            models.forEach(item => {
                if (!modelsOnly.includes(item.model)) {
                    modelsOnly.push(item.model);
                }
            });

            var filter = {
                'model': ['Все модели',].concat(modelsOnly),
                'complectation': ['Комплектация',],
                'engine': ['Двигатель',],
                'color': ['Цвет',],
            };

            //фильтруем базу машин - подготавливаем select filter
            $.each(models, function (model_key, model) {
                var check_add_to_select_filter = true;

                $.each(search_keys, function (search_key, search_this) {

                    if (model != 'Все модели' && $.inArray(model['model'],
                        filter['model']) === 0 && $.type(model['model']) === "string") {
                        filter['model'].push(model['model'])
                    }

                    if ((model[search_key] != search_this &&
                            search_key != 'complectation') &&
                        (model[search_key] != search_this &&
                            search_key != 'engine') &&
                        (model[search_key] != search_this &&
                            search_key != 'color')) {
                        check_add_to_select_filter = false;
                    }

                });

                if (check_add_to_select_filter) {
                    if ($.inArray(model['complectation'], filter['complectation']) === -1) {
                        if ($.type(model['complectation']) === "string") filter['complectation'].push(model['complectation']);
                    }
                    if ($.inArray(model['engine'], filter['engine']) === -1) {
                        if ($.type(model['engine']) === "string") filter['engine'].push(model['engine']);
                    }
                    if ($.inArray(model['color'], filter['color']) === -1) {
                        if ($.type(model['color']) === "string") filter['color'].push(model['color']);
                    }
                }
            });

            $('.js-form-select option:not(:selected)').remove();

            $.each(filter, function (filter_select, filter_values) {
                $.each(filter_values, function (key, value) {
                    $('.js-form-select[name=' + filter_select + ']').append($('<option>', {
                        value: value,
                        text: value,
                    }));
                });
            });

            $('.stock__list-item').hide();

            var filter_data = '';
            if (model !== 'Все модели') filter_data += '[data-category-model="' + model + '"]';
            if (complectation !== 'Комплектация') filter_data += '[data-category-complectation="' + complectation + '"]';
            if (engine !== 'Двигатель') filter_data += '[data-category-engine="' + engine + '"]';
            if (color !== 'Цвет') filter_data += '[data-category-color="' + color + '"]';

            if ($('.stock__list-item' + filter_data).length === 0) {
                $('.model__not-available').html('Автомобиля нет в наличии');
            } else {
                $('.model__not-available').html('')
            }

            $('.stock__list-item' + filter_data).show();

            stockInit(models);
        }

        filterInit();

        const onChangeFilter = () => {

            //получаем значения селекторов
            var model = $('.js-form-select[name=model]').val();
            var complectation = $('.js-form-select[name=complectation]').val();
            var engine = $('.js-form-select[name=engine]').val();
            var color = $('.js-form-select[name=color]').val();

            var search_keys = {
                'model': 'all',
                'complectation': 'all',
                'engine': 'all',
                'color': 'all'
            };

            if (model !== 'Все модели') search_keys['model'] = model;
            if (complectation !== 'Комплектация') search_keys['complectation'] = complectation;
            if (engine !== 'Двигатель') search_keys['engine'] = engine;
            if (color !== 'Цвет') search_keys['color'] = color;

            let modelsOnly = [];
            models.forEach(item => {
                if (!modelsOnly.includes(item.model)) {
                    modelsOnly.push(item.model);
                }
            });

            var filter = {
                'model': ['Все модели',].concat(modelsOnly),
                'complectation': ['Комплектация',],
                'engine': ['Двигатель',],
                'color': ['Цвет',],
            };

            const checkModel = (model) => {
                return (
                    (model['model'] === search_keys['model'] || search_keys['model'] === 'all') &&
                    (model['complectation'] === search_keys['complectation'] || search_keys['complectation'] === 'all') &&
                    (model['engine'] === search_keys['engine'] || search_keys['engine'] === 'all') &&
                    (model['color'] === search_keys['color'] || search_keys['color'] === 'all')
                );
            };

            //фильтруем базу машин - подготавливаем select filter
            $.each(models, function (model_key, model) {
                var check_add_to_select_filter = true;

                $.each(search_keys, function (search_key, search_this) {

                    if (search_this === 'all') {
                        return
                    }

                    if (
                        (model[search_key] != search_this && search_key != 'complectation') &&
                        (model[search_key] != search_this && search_key != 'engine') &&
                        (model[search_key] != search_this && search_key != 'color')) {
                        check_add_to_select_filter = false;
                    }

                });


                if (check_add_to_select_filter) {

                    if ($.inArray(model['complectation'], filter['complectation']) === -1) {
                        if ($.type(model['complectation']) === "string") filter['complectation'].push(model['complectation']);
                    }
                    if ($.inArray(model['engine'], filter['engine']) === -1) {
                        if ($.type(model['engine']) === "string") filter['engine'].push(model['engine']);
                    }
                    if ($.inArray(model['color'], filter['color']) === -1) {
                        if ($.type(model['color']) === "string") filter['color'].push(model['color']);
                    }
                }
            });

            $('.js-form-select option:not(:selected)').remove();

            $.each(filter, function (filter_select, filter_values) {
                $.each(filter_values, function (key, value) {
                    $('.js-form-select[name=' + filter_select + ']').append($('<option>', {
                        value: value,
                        text: value,
                    }));
                });
            });

            const getFilteredStock = () => {
                return models.filter(checkModel);
            };

            clearStockList();

            stockInit(getFilteredStock());

        };

        $(".js-form-select").on('change', onChangeFilter);

        function changeModel() {
            const models = document.querySelectorAll('#model option');

            let modelArr = [];
            for (let model of models) {
                let modelName = model.innerHTML;
                modelArr.push(modelName);
            }

            const tabItems = document.querySelectorAll('.js-tab-item');

            for (let item of tabItems) {
                let example = $(".js-form-select").select2();

                $(item).on("click", function () {
                    let itemModel = $(item).attr("data-model");
                    if (modelArr.includes(itemModel, 0) === true) {
                        example.val(itemModel).trigger("change");
                    } else {
                        $('#select2-model-container').text(itemModel);
                        $('.model__not-available').html('Автомобиля нет в наличии');
                        $('.stock__list-item').hide();
                    }
                });
            }
        }

        changeModel();
    }
});
