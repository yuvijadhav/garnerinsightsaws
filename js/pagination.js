function getData(serviceUrl, activePage, limit, parent, pagination, template) {
    $.ajax({
        url: baseURL + "/" + serviceUrl,
        method: "get",
        data: {'active_page': activePage, 'limit': limit},
        success: function (result) {
            total_count = result.total_count;
            data = result.data;
            showPagination(total_count, limit, activePage, pagination);
            showPaginationData(data, parent, template);
        },
        error: function (error) {
        }
    });
}
function getFilterData(serviceUrl, categories, regions, search, activePage, limit, parent, pagination, template) {
    $.ajax({
        url: baseURL + "/" + serviceUrl,
        method: "get",
        data: {'active_page': activePage, 'limit': limit, 'categories': categories, 'regions': regions, 'search': search},
        success: function (result) {
            total_count = result.total_count;
            data = result.data;
            showPagination(total_count, limit, activePage, pagination);
            showPaginationData(data, parent, template);
        },
        error: function (error) {
        }
    });
}

function showPagination(totalCount, limit, activePage, parent) {
    $(pagination).empty();
    totalPages = Math.ceil(totalCount / limit);
    if (totalPages < 6) {
        startPage = 1;
        endPage = totalPages;
    } else if (activePage <= 3) {
        startPage = 1;
        endPage = 5;
    } else if (activePage > totalPages - 3) {
        startPage = totalPages - 4;
        endPage = totalPages;
    } else {
        startPage = activePage - 2;
        endPage = activePage + 2;
    }
    $(parent).append("<li><a class='direction' id='1'><<</a></li>");
    activeClass = "";
    for (currentPage = startPage; currentPage <= endPage; currentPage++) {
        if (activePage == currentPage) {
            activeClass = "active";
        }
        $(parent).append("<li><a class='page " + activeClass + "'>" + currentPage + "</a></li>");
        activeClass = "";
    }
    $(parent).append("<li><a class='direction' id=" + totalPages + ">>></a></li>");
}


function showPaginationData(data, parent, template) {
    $(parent).empty();

    var rex = /(<([^>]+)>|&nbsp;)/ig;

    $.each(data, function (i, item) {


        if (item.long_description != undefined) {
            item.long_description = item.long_description.replace(rex, "");
            item.long_description = item.long_description.substring(0, 150);
        }

        if (item.short_description != undefined) {
            item.short_description = item.short_description.replace(rex, "");
            item.short_description = item.short_description.substring(0, 150);
        }

        if (item.news_title != undefined) {
            item.news_title = item.news_title.replace(rex, "");
            item.news_title = item.news_title.substring(0, 50);
        }

        if (item.news_info != undefined) {
            item.news_info = item.news_info.replace(rex, "");
            item.news_info = item.news_info.substring(0, 200);
        }
        if (item.article_description != undefined) {
            item.article_description = item.article_description.replace(rex, "");


            item.article_description = item.article_description.substring(0, 400);
        }

        if (item.article_title != undefined) {

            item.article_title = item.article_title.replace(rex, "");


            item.article_title = item.article_title.substring(0, 200);

        }

        if (item.report_title != undefined) {

            if (item.report_title.length > 45) {
                item.report_title = item.report_title.substring(0, 45) + "...";
            }
        }

        if (item.sub_category_image != undefined) {
            item.sub_category_image = item.sub_category_image.replace(rex, "");
            item.sub_category_image = item.sub_category_image.substring(0, 150);
        }

        if (item.sub_category_name != undefined) {
            item.sub_category_name = item.sub_category_name.replace(rex, "");
            item.sub_category_name = item.sub_category_name.substring(0, 150);
        }

        var child = Mustache.render(template, item);
        $(parent).append(child);
    });
}
