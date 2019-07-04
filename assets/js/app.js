$('[data-toggle]').on('click', function (e) {
  e.preventDefault();
  $(`#${$(this).data('toggle')}`).toggleClass('hidden');
});

