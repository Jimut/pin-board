var $pins = $('#pins').masonry({
  // options
  itemSelector: '.box',
  isFitWidth: true,
  //columnWidth: 300
});

$pins.imagesLoaded().progress(function () {
  $pins.masonry('layout');
});
