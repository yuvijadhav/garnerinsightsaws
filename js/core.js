$(document).ready(function() {

    $('#datepicker-example1').Zebra_DatePicker();
    $('#datepicker-example01').Zebra_DatePicker();

    $('#from_date').Zebra_DatePicker({
        direction: 1    // boolean true would've made the date picker future only
                        // but starting from today, rather than tomorrow
    });
    $('#to_date').Zebra_DatePicker({
        direction: 1    // boolean true would've made the date picker future only
                        // but starting from today, rather than tomorrow
    });

    $('#datepicker-example3').Zebra_DatePicker({
        direction: true,
        disabled_dates: ['* * * 0,6']   // all days, all monts, all years as long
                                        // as the weekday is 0 or 6 (Sunday or Saturday)
    });

    $('#datepicker-example4').Zebra_DatePicker({
        direction: [1, 10]
    });

    $('#datepicker-example5').Zebra_DatePicker({
        // remember that the way you write down dates
        // depends on the value of the "format" property!
        direction: ['2012-08-01', '2012-08-12']
    });

    $('#datepicker-example6').Zebra_DatePicker({
        // remember that the way you write down dates
        // depends on the value of the "format" property!
        direction: ['2012-08-01', false]
    });

    $('#datepicker-from').Zebra_DatePicker({
        direction: false,
        pair: $('#datepicker-to')
    });

    $('#datepicker-to').Zebra_DatePicker({
        direction: 0
    });

    $('#datepicker-example8').Zebra_DatePicker({
        format: 'M d, Y'
    });

    $('#datepicker-example9').Zebra_DatePicker({
        show_week_number: 'Wk'
    });

    $('#datepicker-example10').Zebra_DatePicker({
        view: 'years'
    });

    $('#datepicker-example11').Zebra_DatePicker({
        format: 'm Y'
    });

    $('#datepicker-example12').Zebra_DatePicker({
        onChange: function(view, elements) {
            if (view == 'days') {
                elements.each(function() {
                    if ($(this).data('date').match(/\-24$/))
                        $(this).css({
                            background: '#C40000',
                            color:      '#FFF'
                        });
                });
            }
        }
    });

    $('#datepicker-example13').Zebra_DatePicker({
        always_visible: $('#container')
    });

    $('#datepicker-example14').Zebra_DatePicker();

});

$(function () {
                        // Get page title
                        var pageTitle = $("title").text();

                        // Change page title on blur
                        $(window).blur(function () {
                            setTimeout(function () {
                                var link = document.querySelector("link[rel*='icon']") || document.createElement('link');
                                link.type = 'image/x-icon';
                                link.rel = 'shortcut icon';
                                link.href = '<?php echo base_url(); ?>/web_assets/img/RM icon.png';
                                document.getElementsByTagName('head')[0].appendChild(link);

                                var isOldTitle = true;
                                var oldTitle = $("title").text();
                                var newTitle = "Continue Reading...";
                                var interval = null;
                                function changeTitle() {
                                    document.title = isOldTitle ? oldTitle : newTitle;
                                    if (isOldTitle) {
                                        $("link[rel*='icon']").prop("href", '<?php echo base_url(); ?>/web_assets/img/favicon.png');
                                    } else {
                                        $("link[rel*='icon']").prop("href", '<?php echo base_url(); ?>/web_assets/img/RM icon.png');
                                    }
                                    isOldTitle = !isOldTitle;
                                }
                                interval = setInterval(changeTitle, 700);

                                $(window).focus(function () {
                                    clearInterval(interval);
                                    $("title").text(oldTitle);
                                    $("link[rel*='icon']").prop("href", '<?php echo base_url(); ?>/web_assets/img/favicon.png');
                                });
                            }, 90000);
                        });

                        // Change page title back on focus
                        $(window).focus(function () {
                            $("title").text(pageTitle);
                        });
                    });