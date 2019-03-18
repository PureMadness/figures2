$(document).ready(function () {
    var curPageNum = 1;
    $(document).on('click', "a.page-link", (e) => {
        e.preventDefault();
        let $el = $(e.target);
        let text = $el.text();
        if (text !== "‹" && text !== "›") {
            $.get('/favorites?page=' + text, {}, (response) => {
                //document.getElementsByTagName('table')[0].innerHTML = response;
                $("#table").html(response);
            });
            curPageNum = text;
        } else if (text === "‹") {
            $.get('/favorites?page=' + (Number.parseInt(curPageNum) - 1), {}, (response) => {
                //document.getElementsByTagName('table')[0].innerHTML = response;
                $("#table").html(response);
            });
            curPageNum--;
        } else if (text === "›") {
            $.get('/favorites?page=' + (Number.parseInt(curPageNum) + 1), {}, (response) => {
                //document.getElementsByTagName('table')[0].innerHTML = response;
                $("#table").html(response);
            });
            curPageNum++;
        }
        $el.attr("href");

        return false;
    });

});

function deleteFavorite(value) {
    $.get('/deleteFav/' + value, {}, (response) => {
        var icon = $("#fav-" + value + " i");
        icon.removeClass();
        icon.addClass("far fa-star text-info");
        var elem = $("#fav-" + value);
        elem.attr("onclick", "addFavorite(" + value + ")");
        elem.attr("id", "notFav-" + value);
    });
}

function addFavorite(value) {
    $.get('/addFav/' + value, {}, (response) => {
        var icon = $(`#notFav-${value} i`);
        icon.removeClass();
        icon.addClass("fas fa-star text-warning");
        var elem = $("#notFav-" + value);
        elem.attr("onclick", "deleteFavorite(" + value + ")");
        elem.attr("id", "fav-" + value);
    });
}

function deleteFromFav(value) {
    $.get('/deleteFav/' + value, {}, (response) => {
        $("#figure-" + value).remove();
    });
}


