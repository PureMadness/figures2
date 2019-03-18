$(document).ready(function () {

    $(document).on('click', "a.page-link", (e) => {
        e.preventDefault();
        let $el = $(e.target);
        $.get('/favorites?page=' + $el.text(), {}, (response) => {
            //document.getElementsByTagName('table')[0].innerHTML = response;
            $("#table").html(response);
        });
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


