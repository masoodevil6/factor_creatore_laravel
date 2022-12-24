///// ============================================================
/// favorite music
///// ============================================================

var formFavorite = $("#add-to-favorite-music");
var formListFavorite = $("#form-list-favorite");
var formAddToFavorite = $("#form-add-to-favorite");

var iconNotMarkFavoriteMusic = $(".icon-not-favorite-music");
var iconMarkFavoriteMusic = $(".icon-favorite-music");

function setFavoriteMusic() {

    var loading = $("#form-list-favorite-group").loadingAjax();
    showFormListFavoriteCategory();

    var data = {
        "music_slug": $('meta[name="slug-music-player"]').attr('content') ,
        "_token": $('meta[name="csrf-token-music-player"]').attr('content')
    };

    $.ajax({
        url : $('meta[name="url-user-get-list-favorite"]').attr('content') ,
        type: "post",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success:function (result) {
            var status = result["status"];
            if (status == 0){
                errorClientNotLogin($('meta[name="url-user-login"]').attr('content'));
            }
            else{
                openFormFavoriteCategory();
                $("#list-favorites-category").html(result["listView"])
            }
        },
        complete: function () {
            loading.end();
        },
        dataType: "json"
    })
}

function addToFavoriteCategoryMusic() {
    var favoriteCategory = $.trim($("#favorite-category").val());
    if (favoriteCategory != ""){
        var data = {
            "title_favorite": favoriteCategory ,
            "_token": $('meta[name="csrf-token-music-player"]').attr('content')
        };
        $.ajax({
            url : $('meta[name="url-user-add-favorite-category-music"]').attr('content') ,
            type: "post",
            data: data,
            success:function (result) {
                var status = result["status"];
                clossFormFavoriteCategory();
                if (status == 0){
                    errorClientNotLogin($('meta[name="url-user-login"]').attr('content'));
                }
                else{
                    setFavoriteMusic();
                }
            },
            dataType: "json"
        });
    }
    else {
        errorEmptyTitleFavoriteCategory()
    }
}


function deleteFavoriteCategory(favoriteCategoryId) {

    var data = {
        "favorite_category_id": favoriteCategoryId ,
        "music_slug": $('meta[name="slug-music-player"]').attr('content') ,
        "_token": $('meta[name="csrf-token-music-player"]').attr('content')
    };

    $.ajax({
        url : $('meta[name="url-user-delete-favorite-category"]').attr('content') ,
        type: "post",
        data: data,
        success:function (result) {
            var status = result["status"];
            clossFormFavoriteCategory();
            if (status == 0){
                errorClientNotLogin($('meta[name="url-user-login"]').attr('content'));
            }
            else{
                if (status == 1){
                    checkExistMusicInToFavoriteUser(result["lastFavorite"])
                    setFavoriteMusic();
                }
                else {
                    messageActionError();
                }

            }
        },
        dataType: "json"
    });

}


function saveMusicToFavoriteCategory() {

    var listCategoryFavorite = [];
    var itemFavorites = $(".item_favorite_user_created");
    for (var i=0; i< itemFavorites.length ; i++){
        if (itemFavorites.eq(i).find(".form-check-input").prop("checked") == true){
            listCategoryFavorite.push(itemFavorites.eq(i).find(".form-check-input").val());
        }
    }

    var data = {
        "list_category_favorite": listCategoryFavorite ,
        "music_slug": $('meta[name="slug-music-player"]').attr('content') ,
        "_token": $('meta[name="csrf-token-music-player"]').attr('content')
    };

    $.ajax({
        url : $('meta[name="url-user-add-to-favorite-category"]').attr('content') ,
        type: "post",
        data: data,
        success:function (result) {
            var status = result["status"];

            clossFormFavoriteCategory();
            if (status == 0){
                errorClientNotLogin($('meta[name="url-user-login"]').attr('content'));
            }
            else{
                checkExistMusicInToFavoriteUser(result["lastFavorite"])
                messageActionSuccess();
            }
        },
        dataType: "json"
    });

}


function checkExistMusicInToFavoriteUser(status) {
    if (status == 0){
        dontMarkFavoriteMusic();
    }
    else if (status == 1){
        markFavoriteMusic();
    }
}


function openFormFavoriteCategory() {
    formFavorite.modal('show');
}
function clossFormFavoriteCategory() {
    formFavorite.modal('hide');
}

function showFormListFavoriteCategory() {
    formListFavorite.removeClass("d-none");
    formAddToFavorite.addClass("d-none");
}
function showFormAddToFavoriteCategory() {
    formAddToFavorite.removeClass("d-none");
    formListFavorite.addClass("d-none");
}

function markFavoriteMusic() {
    iconNotMarkFavoriteMusic.addClass("d-none");
    iconMarkFavoriteMusic.removeClass("d-none");
}
function dontMarkFavoriteMusic() {
    iconNotMarkFavoriteMusic.removeClass("d-none");
    iconMarkFavoriteMusic.addClass("d-none");
}

