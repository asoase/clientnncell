(function() {
  let children = $('.headeraktif').data('headeraktif');
  $('.headeraktif li:nth-child(' + children + ')').addClass('active');
}).call(this);