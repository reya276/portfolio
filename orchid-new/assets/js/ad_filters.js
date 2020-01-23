//Load Personal Line Tiles
// function loadPtiles(sort_order) {
//     var fstate = $("#fstate").val();
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             if (sort_order == 2){
//                 var sortlink = '<i class="fa fa-sort fa-lg" aria-hidden="true" onclick="loadPtiles(1);" title="Sort Tiles"></i>';
//                 $('#sortTrigP').html(sortlink);
//                 $('#rowP').html(this.responseText);
//                 console.log(sort_order, fstate);
//             } else if (sort_order == 1) {
//                 var sortlink = '<i class="fa fa-sort fa-lg" aria-hidden="true" onclick="loadPtiles(2);" title="Sort Tiles"></i>';
//                 $('#sortTrigP').html(sortlink);
//                 $('#rowP').html(this.responseText);
//                 console.log(sort_order, fstate);
//             } else {
//                 document.getElementById("rowP").innerHTML = this.responseText;
//                 console.log(this.responseText);
//             }
//         }
//     };
//     xmlhttp.open("GET", "/get_ptiles.php?sort="+sort_order+"&fstate="+fstate, true);
//     xmlhttp.send();
// }
// //Load Commercial Line Tiles
// function loadCtiles(sort_order) {
//     var fstate = $("#fstate").val();
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             if (sort_order == 2){
//                 var sortlink = '<i class="fa fa-sort fa-lg" aria-hidden="true" onclick="loadCtiles(1);" title="Sort Tiles"></i>';
//                 $('#sortTrigC').html(sortlink);
//                 $('#rowC').html(this.responseText);
//                 console.log(sort_order, fstate);
//             } else if (sort_order == 1) {
//                 var sortlink = '<i class="fa fa-sort fa-lg" aria-hidden="true" onclick="loadCtiles(2);" title="Sort Tiles"></i>';
//                 $('#sortTrigC').html(sortlink);
//                 $('#rowC').html(this.responseText);
//                 console.log(sort_order, fstate);
//             } else {
//                 document.getElementById("rowC").innerHTML = this.responseText;
//                 console.log(this.responseText);
//             }
//         }
//     };
//     xmlhttp.open("GET", "/get_ctiles.php?sort="+sort_order+"&fstate="+fstate, true);
//     xmlhttp.send();
// }
// //Load State List
// function loadStates() {
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("fstate").innerHTML = this.responseText;
//             console.log(this.responseText);
//         }
//     };
//     xmlhttp.open("GET", "get_ad_states.php", true);
//     xmlhttp.send();
// }
// //Load Filter Functions
// function loadProducts() {
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("products").innerHTML = this.responseText;
//             console.log(this.responseText);
//         }
//     };
//     xmlhttp.open("GET", "get_ad_products.php", true);
//     xmlhttp.send();
// }
// function loadCatergories() {
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             document.getElementById("categories").innerHTML = this.responseText;
//             console.log(this.responseText);
//         }
//     };
//     xmlhttp.open("GET", "get_ad_categories.php", true);
//     xmlhttp.send();
// }
$(function () {
    refreshTiles();
    fillTemplate();
    //filter for sorting
    document.querySelector('#sort_order').addEventListener('input', function (e) {
  	   refreshTiles();
    });
    //filter for sorting
    document.querySelector('#fstate').addEventListener('input', function (e) {
  	   refreshTiles();
    });
    //click handler
    document.querySelector('#rowP').addEventListener('click', handleTileClick);
    document.querySelector('#rowC').addEventListener('click', handleTileClick);
});
//Function refreshTilesLocal
function refreshTiles() {
	var tiles = document.querySelector('#tiles');
  var ttp = document.querySelector('#rowP').innerHTML;
  var ttc = document.querySelector('#rowC').innerHTML;
  var tsp = '';
  var tsc = '';

  //Loop through the tiles
  tileDataP.forEach(row => {
  	tsp += fillTemplate(ttp, row);
  });
  tileDataC.forEach(row => {
  	tsc += fillTemplate(ttc, row);
  });

  rowP.innerHTML = tsp;
  rowC.innerHTML = tsc;

}
//Tile click Function
function handleTileClick(e) {
	var tile = e.target.closest('X-TILE');

  if (!tile) {
 		return;
  }

  var ic = tile.getAttribute('data-id');
  var tileData = lastData.filter(row => row.id == ic)[0];

  alert(tileData.type);
}

//Products Filter
function prodChange() {
    var product = $('[name="filterby"]:checked').val();
    if (product == 0) {
        $('.col-md-10 .ad-personal').removeClass('hidden');
            $('.ad-personal').removeClass('expand');
        $('.col-md-10 .ad-commercial').removeClass('hidden');
            $('.ad-commercial').removeClass('expand');
        console.log("Product: Personal");
    } else if (product == 1) {
        $('.ad-commercial').addClass('hidden');
        $('.ad-personal').removeClass('hidden');
        $('.ad-personal').addClass('expand');
        console.log("Product: Personal"+product);
    } else if (product == 2) {
        $('.ad-personal').addClass('hidden');
        $('.ad-commercial').removeClass('hidden');
        $('.ad-commercial').addClass('expand');
        console.log("Product: Commercial"+product);
    }

}
