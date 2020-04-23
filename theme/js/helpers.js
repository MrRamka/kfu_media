(function ($) {

  console.log('HELPER.JS');

  $(document).ready(function () {

    $('.unix-time').each(function () {
      var offset = new Date().getTimezoneOffset();
      var date = new Date(($(this).html() - offset * 60) * 1000);
      var hours = date.getHours();
      var minutes = '0' + date.getMinutes();
      var seconds = '0' + date.getSeconds();
      var formattedTime = hours + ':' + minutes.substr(-2);
      $(this).html(formattedTime);
    });

    $('.pop-up').fancybox({
      padding: 0,
      fitToView: false,
      autoSize: false,
      height: 800
    });

    $('input[type=submit]').each(function (i, elem) {
      $(this).after('<div class="white-btn form-fake-submit" >' + $(this).val() + '</div>');
      $(this).hide();
    });

    $(document).on('click', '.form-fake-submit', function () {
      $(this).closest('form').find('input[type="submit"]').trigger('click');
    });

    $(document).on('click', '#showSub', function () {
      if ($('#left .menu .submenu').is(':visible')) {
        $('#left .menu .submenu').hide('fast');
        $('#arrow').removeClass('opened');
      } else {
        $('#left .menu .submenu').show('fast');
        $('#arrow').addClass('opened');
      }
    });

    $('.form-item-sort-by').remove();
    $('.form-item-sort-order').remove();
    // "http://media.kpfu.ru/sites/default/files/2017-05/IMG_1213_result.jpg"
    // "http://media.kpfu.ru/sites/default/files/styles/foto/public/2017-05/IMG_1213_result.jpg?itok=D7sQlucS"
    if ($('.colorbox').length) {
      $('.colorbox').colorbox({
        rel: 'group1',
        title: function () {
          return $('<a>Открыть оригинал</a>').attr('href', $(this).attr('href').replace('styles/foto/public/', ''));
        }
      });
    }

    if ($('td.field_from').length) {
      if ($('td.field_from').html().indexOf('http://shelly.kpfu.ru/') != -1) {
        $('td.field_from').html('Главный');
      }
    }

    if ($('#newscalendar').length) {
      var pos = $('#edit-created').parent();
      $('#newscalendar').detach().appendTo(pos);
      $('#newscalendar').detach().appendTo('.form-item-created');
      $('#newscalendar').on('change', function () {
        $('input[name=created]').val($(this).val());
      });
      $('#newscalendar').datepicker({
        onSelect: function (formattedDate, date, inst) {
          $(inst.el).trigger('change');
        }
      });
    }

    $('.language ul li.cs-optgroup ul li').on('click', function () {
      var lang = $(this).attr('class');
      switch (lang.split(' ')[0]) {
        case 'tatar-ico':
          location.replace('https://tat.kpfu.ru');
          break;
        case 'english-ico':
          location.replace('http://kpfu.ru/eng');
          break;
        case 'spanish-ico':
          location.replace('http://kpfu.ru/es');
          break;
        case 'french-ico':
          location.replace('http://kpfu.ru/fr');
          break;
        case 'german-ico':
          location.replace('http://kpfu.ru/de');
          break;
        case 'turkish-ico':
          location.replace('http://kpfu.ru/tr');
          break;
        case 'arabic-ico':
          location.replace('http://kpfu.ru/ar');
          break;
        case 'chinese-ico':
          location.replace('http://kpfu.ru/cn');
          break;
      }
    })

    $('#airdatepicker').datepicker({
      onSelect: function (formattedDate, date, inst) {
        $(inst.el).trigger('change');
      },
      inline: true,
      range: true,
      /*dateFormat: 'mm.dd.yyyy'*/
    });
    $('#airdatepicker').on('change', function () {
      $("input[name=created]").val($(this).val());
    });

  });


})(jQuery);

function getUrlParameter(name, str) {
  name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
  var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
  var results = regex.exec(str);
  return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}


function ShowMore() {

  console.log('Inside show more');
  jQuery.post(
    "/ajax/node", {
      page: jQuery("#page").val()
    },
    onAjaxSuccess
  );

  function onAjaxSuccess(data) {
    for (i in data) {
      //alert(data[i].image);
      var text = '<div class="instItem">' +
        '<div class="instItem-wrapper"><a class="instItem-image uk-overlay uk-overlay-hover" href="' + data[i].url + '">';
      if (data[i].image != null) {
        text += '<img class="uk-overlay-scale" src=" ' + data[i].image + ' "></a>';
      }
      text +=
        '<a class="instItem-content" href="' + data[i].url + '">' +
        '<div class="instItem-title">' + data[i].title + '</div>';
      if (data[i].lead != null) {
        text += '<div class="instItem-text">' + data[i].lead + '</div></a>';
      }
      text += '<div class="instItem-date">' + data[i].created + '</div></div></div>';
      jQuery("#institute .institute-list").append(text);
    }

    //console.log(data);
    jQuery("#page").val(parseInt(jQuery("#page").val()) + 3);

  }
}


function ShowLic() {
  jQuery.post(
    "/ajax/node/lic", {
      page: jQuery("#page-lic").val()
    },
    onAjaxSuccess
  );

  function onAjaxSuccess(data) {
    for (i in data) {
      //alert(data[i].image);
      var text = '<div class="instItem">' +
        '<div class="instItem-wrapper"><a class="instItem-image uk-overlay uk-overlay-hover" href="' + data[i].url + '">';
      if (data[i].image != null) {
        text += '<img class="uk-overlay-scale" src=" ' + data[i].image + ' "></a>';
      }
      text +=
        '<a class="instItem-content" href="' + data[i].url + '">' +
        '<div class="instItem-title">' + data[i].title + '</div>';
      if (data[i].lead != null) {
        text += '<div class="instItem-text">' + data[i].lead + '</div></a>';
      }
      text += '<div class="instItem-date">' + data[i].created + '</div></div></div>';
      jQuery("#lic .lic-list").append(text);
    }

    //console.log(data);
    jQuery("#page-lic").val(parseInt(jQuery("#page").val()) + 3);

  }
}
