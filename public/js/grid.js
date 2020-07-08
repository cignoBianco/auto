define(['jquery'], function ($) {
    $(function () {
        $(document)
            .on('clearFilters', '.gisauto-grid', function () {
                var gridForm = $(this).closest('.gisauto-grid-block').find('.gisauto-grid-form');
                gridForm.find('input.input-filter').val('');
                $(this).trigger('clearedFilters');
                $(this).trigger('changeData');
            })
            .on('changeData', '.gisauto-grid', function () {
                var $grid = $(this),
                    gridId = $(this).data('grid-id'),
                    $grid = $('.gisauto-grid[data-grid-id="' + gridId + '"] tbody').parent(),
                    url = $(this).closest('.gisauto-grid-block').find('.gisauto-grid-form').data('action'),
                    data = $(this).closest('.gisauto-grid-block').find('.gisauto-grid-form').find('input').serialize();

                if (url == '') {
                    return false;
                }

                $.ajax({
                    'type': 'POST',
                    'url': url,
                    'data': data,
                    'dataType': 'json',
                    'success': function (resp) {
                        if (!resp.success) {
                            return false;
                        }

                        $grid.find('tbody').remove();
                        $grid.append(resp.data.dataTemplate);
                        var $paginator = $('.gisauto-grid-paginator[data-grid-id="' + gridId + '"]');
                        var $paginatorParent = $paginator.parent();
                        $paginator.remove();
                        $paginatorParent.append(resp.data.paginator);

                        if (resp.data.filters) {
                            var filters = resp.data.filters;
                            for (var index in filters) {
                                filterCurrentVal = $('input.input-filter[name="' + filters[index].name + '"]').val();
                                if (Object.keys(filters[index].data).length) {
                                    var filterCurrentVals = filterCurrentVal.split(',');
                                    if (filters[index].type == 'select') {
                                        var filterData = filters[index].data;
                                        var options = '';
                                        for (var indx in filterData) {
                                            var selected = $.grep(filterCurrentVals, function (val) {
                                                return val == filterData[indx]
                                            }).length != 0 ? ' selected' : '';
                                            options += '<option value="' + filterData[indx] + '" ' + selected + '>' + indx + '</option>';
                                        }
                                        $('select[data-for="' + filters[index].name + '"]').empty().append(options);
                                        $('input.input-filter[name="' + filters[index].name + '"]').val($('select[data-for="' + filters[index].name + '"]').val());
                                    }
                                }
                            }
                        }

                        if (resp.data.counters) {
                            var counters = resp.data.counters;

                            for (var index in counters) {
                                var count = parseInt(counters[index].value);
                                $(counters[index].selector).each(function () {
                                    $(this).html(count);
                                    $(this).toggle(count > 0);
                                });
                            }
                        }

                        $grid.trigger('changedData');
                        $(window).resize();
                    }
                });
            });

        $(document)
            .on('click', '.sortable', function () {
                var field = $(this).data('field'),
                    gridId = $(this).closest('.gisauto-grid').data('grid-id'),
                    parent = $(this).closest('.gisauto-grid-block');
                parent.find('.gisauto-grid-form input[name="sortBy"]').val(field);
                parent.find('.sortable div').removeClass('unable').addClass('unable');
                if ($(this).is('.sortable_asc')) {
                    parent.find('.gisauto-grid-form input[name="sortType"]').val('desc');
                    parent.find('.sortable').removeClass('sortable_asc').removeClass('sortable_desc');
                    $(this).removeClass('sortable_asc').addClass('sortable_desc');
                    $(this).find('.filter-up').removeClass('unable');
                } else if ($(this).is('.sortable_desc')) {
                    parent.find('.gisauto-grid-form input[name="sortType"]').val('asc');
                    parent.find('.sortable').removeClass('sortable_asc').removeClass('sortable_desc');
                    $(this).removeClass('sortable_desc').addClass('sortable_asc');
                    $(this).find('.filter-down').removeClass('unable');
                } else {
                    parent.find('.gisauto-grid-form input[name="sortType"]').val('asc');
                    parent.find('.sortable').removeClass('sortable_asc').removeClass('sortable_desc');
                    $(this).addClass('sortable_asc');
                    $(this).find('.filter-down').removeClass('unable');
                }

                $('.gisauto-grid[data-grid-id="' + gridId + '"]:not(.thead-fixed)').trigger('changeData');
            })
            .on('click', '#pager li', function () {
                if ($(this).is('.disabled')) {
                    return false;
                }

                var parent = $(this).closest('.gisauto-grid-paginator'),
                    gridId = parent.data('grid-id'),
                    perPage = parent.find('#cntRowx').val(),
                    page = $(this).find('a').data('page'),
                    gridForm = $('.gisauto-grid[data-grid-id="' + gridId + '"]').closest('.gisauto-grid-block').find('.gisauto-grid-form');
                gridForm.find('input[name="currentPage"]').val(page);
                gridForm.find('input[name="perPage"]').val(perPage);

                $('.gisauto-grid[data-grid-id="' + gridId + '"]:not(.thead-fixed)').trigger('changeData');

                return false;
            })
            .on('change', '#rec_per_page select', function () {
                var perPage = $(this).val(),
                    parent = $(this).closest('.gisauto-grid-paginator'),
                    gridId = parent.data('grid-id'),
                    gridForm = $('.gisauto-grid[data-grid-id="' + gridId + '"]').closest('.gisauto-grid-block').find('.gisauto-grid-form');
                gridForm.find('input[name="currentPage"]').val(1);
                gridForm.find('input[name="perPage"]').val(perPage);

                $('.gisauto-grid[data-grid-id="' + gridId + '"]:not(.thead-fixed)').trigger('changeData');
            })
            .on('change', '.gisauto-grid-filter', function () {
                var filterFor = $(this).data('for'),
                    gridId = $(this).data('grid-id'),
                    val = $(this).val();

                if ($(this).is('input[type="checkbox"]')) {
                    val = $(this).is(':checked') ? 1 : 0;
                }
                $('input[name="' + filterFor + '"]').val(val);

                grid = gridId ? '.gisauto-grid[data-grid-id="' + gridId + '"]:not(.thead-fixed)' : '.gisauto-grid:not(.thead-fixed)';
                $(grid).trigger('changeFilter');
                $(grid).trigger('changeData');
            });
    });
});
