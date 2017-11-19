;
(function ($) {
    $(document).ready(function () {
        var body = $('body');
        var product_search = $('#product_search');
        product_search.on('change', function () {
            product_search.trigger('submit');
        });

        body.on('submit', '#product_search', function (e) {
            e.preventDefault();

            var loading = $('.sr-loading');
            var formData = $(this).serializeObject();

            formData.action = 'search_products';
            loading.fadeIn();
            $.ajax({
                url: global.url,
                type: 'POST',
                data: formData,
                dataType: 'json'
            }).done(function (respons) {
                var searchResult = $('#search_results');
                searchResult.html('');
                if (respons.Fungicide) {
                    var list = getMarkup(respons.Fungicide, 'fungicide');
                    searchResult.append(list);
                }
                if (respons.Herbicide) {
                    var list = getMarkup(respons.Herbicide, 'herbicide');
                    searchResult.append(list);
                }
                if (respons.Insecticide) {
                    var list = getMarkup(respons.Insecticide, 'insecticide');
                    searchResult.append(list);
                }
                loading.fadeOut();
            });
        });
        if (product_search.length > 0) {
            product_search.trigger('submit');

            $("#sr_select, #sr_select_key").dropdown({
                searchNoData: '<li style="color:#ddd">No Results</li>',
                input: '<input type="text" maxLength="20" placeholder="Search">',
                choice: function () {
                    product_search.trigger('submit');
                }
            }).on('click.iui-dropdown', '.del', function () {
                product_search.trigger('submit');
            });
        }
    });

    function getMarkup(data, className) {
        if (data.posts.length == 0) {
            return '';
        }
        var wrapper = $('<div class="sr-result__container ' + className + '" />');
        var header = $('<div class="sr-result__header sr-result__row" />');
        header.append('<div class="sr-result__item">Product Name</div>');
        header.append('<div class="sr-result__item">Active Ingredient</div>');
        header.append('<div class="sr-result__item">Compare To</div>');
        header.append('<div class="sr-result__item">Downloads</div>');


        wrapper.append(header);
        data.posts.forEach(function (item) {
            var plink = $('<a href="' + item.plink + '" />');
            var row = $('<div class="sr-result__row" />');
            row.append('<div class="sr-result__item"><img src="' + item.product_logo + '" alt=""></div>');
            row.append('<div class="sr-result__item">' + item.active_ingredient + '</div>');
            row.append('<div class="sr-result__item">' + item.compare_to + '</div>');
            var specimen_label = '';
            if (item.downloads.specimen_label) {
                specimen_label = '<a href="' + item.downloads.specimen_label + '" download>label</a>';
            }
            var sds_href = '';
            if (item.downloads.sds_href) {
                sds_href = '<a href="' + item.downloads.sds_href + '" download>sds</a>';
            }
            row.append('<div class="sr-result__item sr-result__item--downloads">label/sds<div class="sr-downloads">' + specimen_label + sds_href + '</div></div>');
            plink.append(row);
            wrapper.append(plink);

        });
        return wrapper
    }

    $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);