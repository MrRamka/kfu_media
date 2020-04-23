(function ($) {

  $('.multiple-select select').multipleSelect();
  var multiSelectCounter = 0;
  $('.multiple-select').each(function () {
    multiSelectCounter += 1;
    $(this).attr('data-counter', multiSelectCounter);
  });
  $('select.has-show-all').each(function () {
    $(this).parent().after('<div class = "show-all"><input type="checkbox" class="form-checkbox"><label>Развернуть весь список</label></div>');
  });
  $(document).on('click', '.show-all label, .show-all-list label', function () {
    $(this).prev('input[type="checkbox"]').trigger('click');
  });
  $(document).on('change', '.show-all > input[type="checkbox"]', function () {
    var select = $(this).closest('.show-all').prev('.multiple-select');
    if ($(this).is(':checked')) {
      var html = '<div class = "show-all-list">';
      select.find('option').each(function () {
        if ($(this).is(':selected')) {
          html += '<input type = "checkbox" value = "' + $(this).val() + '" checked><label>' + $(this).text() + '</label>';
        } else {
          html += '<input type = "checkbox" value = "' + $(this).val() + '"><label>' + $(this).text() + '</label>';
        }
      });
      html += '</div>';
      select.next('.show-all').append(html);
    } else {
      select.next('.show-all').find('.show-all-list').remove();
    }
    $(this).closest('.show-all').prev('.multiple-select').toggle();
  });
  $(document).on('change', '.show-all-list input[type="checkbox"]', function () {
    if ($(this).is(':checked')) {
      $(this).closest('.show-all').prev('.multiple-select').find('option[value="' + $(this).val() + '"]').prop('selected', true);
    } else {
      $(this).closest('.show-all').prev('.multiple-select').find('option[value="' + $(this).val() + '"]').prop('selected', false);
    }
    $(this).closest('.show-all').prev('.multiple-select').find('select.has-show-all').multipleSelect("refresh");
  });
  $(document).on('click', '.ms-choice > div', function () {
    var counter = $(this).closest('.multiple-select').data('counter');
    setTimeout(function () {
      if ($('.multiple-select[data-counter="' + counter + '"] .iScrollVerticalScrollbar').length == 0) {
        var iScroll = new IScroll('.multiple-select[data-counter="' + counter + '"] .ms-drop', {
          mouseWheel: true,
          preventDefaultException: {
            tagName: /^(LI|A|SPAN|INPUT)$/
          },
          scrollbars: true
        });
      }
    }, 0);
  });






})(jQuery);
