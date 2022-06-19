$(".prod").click(function(){
    $(".produit").slideToggle(620);
});

$(".cat").click(function(){
    $(".categorie").slideToggle(550);
});


$(".fourn").click(function(){
    $(".fournisseur").slideToggle(550);
});

$(".client").click(function(){
    $(".cli").slideToggle(550);
});


$(".com").click(function(){
    $(".commande").slideToggle(550);
});


$(".app").click(function(){
    $(".appro").slideToggle(550);
});

// --------------------------------- listProduit -----------------------------------------

$(".edit").click(function(){
    $(".popup").addClass("active");
    $(".upOverlay").addClass("active");
});

$(".upClose").click(function(){
    $(".popup").removeClass("active");
    $(".upOverlay").removeClass("active");
});


$(".edit").click(function() {
    $("#popup").load("../Produits/popup.html");
});

















