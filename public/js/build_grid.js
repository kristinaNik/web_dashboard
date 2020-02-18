$(window).on('load', app);

function app() {
    var boardMain = $('.board__main');
    boardMain.removeClass('hide-container');
    buildBoard();

 }



window.addEventListener("resize", onResize);
function onResize() {
  var allCells = $('.board__cell');
  var cellHeight = allCells[0].offsetWidth;

  allCells.each(function(index, cell) {
    $(cell).css({"height": cellHeight + 'px'});
    // $(cell).css({"margin": '0 10px 30px'});
  });
}

// Изграждане на таблата
function buildBoard() {
  var resetContainer = $('.reset');
  resetContainer.removeClass('reset--hidden');

  onResize();
  addCellClickListener();
}


/**
  * Listner за кликане на клетка в таблата
  */
function addCellClickListener() {
  const cells = $('.board__cell');
  cells.each(function(index, cell) {
  	$(cell).on("click", function(event){
  		event.preventDefault();
  	});

  });
}

