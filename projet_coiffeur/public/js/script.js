$(function() {
    $("#rechercher_salon").on({
        mouseenter: function() {
            this.style.color = "#FCF80A";
        },
        mouseleave: function() {
            this.style.color = "";
        },
    });
});

$(function() {
    $("#trouver_coiffeur_domicile").on({
        mouseenter: function() {
            this.style.color = "#FF63CE";
        },
        mouseleave: function() {
            this.style.color = "";
        },
    });
});