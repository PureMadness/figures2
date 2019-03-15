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
        var icon = $(`i#notFav-${value}`);
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


